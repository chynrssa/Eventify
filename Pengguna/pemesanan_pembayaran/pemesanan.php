<?php 
session_start();

include '../../views/layout/header.php'; 
include '../pemesanan_pembayaran/db.php'; // koneksi DB

// Proses POST form pemesanan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil input dari form dan bersihkan input
    $idEvent = isset($_POST['idEvent']) ? (int)$_POST['idEvent'] : 0;
    $namaEvent = isset($_POST['namaEvent']) ? trim($_POST['namaEvent']) : '';
    $namaPemesan = isset($_POST['namaPemesan']) ? trim($_POST['namaPemesan']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $jumlahTiket = isset($_POST['jumlahTiket']) ? (int)$_POST['jumlahTiket'] : 1;
    $totalHargaRaw = isset($_POST['total_harga_raw']) ? (float)$_POST['total_harga_raw'] : 0.0;

    // Validasi sederhana input
    if ($idEvent <= 0 || !$namaEvent || !$namaPemesan || !$email || !filter_var($email, FILTER_VALIDATE_EMAIL) || $jumlahTiket < 1 || $totalHargaRaw <= 0) {
        echo '<p class="text-red-600 font-bold mt-16">Data pemesanan tidak lengkap atau tidak valid.</p>';
        exit;
    }

    // Cek stok tiket event
    $stmtStok = $conn->prepare("SELECT stok FROM event WHERE id = ?");
    if (!$stmtStok) die("Prepare stok event gagal: " . $conn->error);
    $stmtStok->bind_param("i", $idEvent);
    if (!$stmtStok->execute()) die("Execute stok event gagal: " . $stmtStok->error);
    $resStok = $stmtStok->get_result()->fetch_assoc();
    $stmtStok->close();

    if (!$resStok || $resStok['stok'] < $jumlahTiket) {
        echo '<p class="text-red-600 font-bold mt-16">Stok tiket tidak cukup. <a href="daftar_event.php" class="text-blue-600 underline">Kembali ke daftar event</a></p>';
        exit;
    }

    // Cek apakah user sudah ada berdasarkan email
    $stmtUser = $conn->prepare("SELECT id FROM user WHERE email = ?");
    if (!$stmtUser) die("Prepare cek user gagal: " . $conn->error);
    $stmtUser->bind_param("s", $email);
    if (!$stmtUser->execute()) die("Execute cek user gagal: " . $stmtUser->error);
    $resUser = $stmtUser->get_result()->fetch_assoc();
    $stmtUser->close();

    if ($resUser) {
        $userId = $resUser['id'];
    } else {
        // Insert user baru, kata_sandi kosong (bisa diupdate nanti)
        $stmtInsertUser = $conn->prepare("INSERT INTO user (nama_lengkap, email, kata_sandi) VALUES (?, ?, '')");
        if (!$stmtInsertUser) die("Prepare insert user gagal: " . $conn->error);
        $stmtInsertUser->bind_param("ss", $namaPemesan, $email);
        if (!$stmtInsertUser->execute()) die("Execute insert user gagal: " . $stmtInsertUser->error);
        $userId = $stmtInsertUser->insert_id;
        $stmtInsertUser->close();
    }

    // Ambil promo dari event (jika ada)
    $stmtPromo = $conn->prepare("SELECT promo FROM event WHERE id = ?");
    if (!$stmtPromo) die("Prepare promo event gagal: " . $conn->error);
    $stmtPromo->bind_param("i", $idEvent);
    if (!$stmtPromo->execute()) die("Execute promo event gagal: " . $stmtPromo->error);
    $resPromo = $stmtPromo->get_result()->fetch_assoc();
    $stmtPromo->close();

    $promo = $resPromo ? (float)$resPromo['promo'] : 0.0;

    // Insert transaksi ke tabel transaksi dengan status 'pending'
    // Note: total_harga dan promo bertipe decimal, gunakan tipe d (double/float)
$stmtTrans = $conn->prepare("INSERT INTO transaksi (user_id, event_id, qty, total_harga, promo) VALUES (?, ?, ?, ?, ?)");
if (!$stmtTrans) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}
$stmtTrans->bind_param("iiidi", $userId, $idEvent, $jumlahTiket, $totalHargaRaw, $promo);
$stmtTrans->execute();
$transaksiId = $stmtTrans->insert_id;
$stmtTrans->close();


    if (!$transaksiId) {
        echo '<p class="text-red-600 font-bold mt-16">Gagal membuat transaksi.</p>';
        exit;
    }

    // Simpan data penting ke session untuk halaman pembayaran
    $_SESSION['namaEvent'] = $namaEvent;
    $_SESSION['namaPemesan'] = $namaPemesan;
    $_SESSION['email'] = $email;
    $_SESSION['jumlahTiket'] = $jumlahTiket;
    $_SESSION['transaksi_id'] = $transaksiId;

    // Redirect ke halaman pembayaran
    header("Location: pembayaran.php");
    exit;
}

// Jika GET: tampilkan halaman pemesanan

// Ambil nama event dari URL, validasi sederhana
$namaEvent = isset($_GET['event']) ? trim($_GET['event']) : '';

if (!$namaEvent) {
    echo '<main class="container mx-auto px-4 py-6">';
    echo '<p class="text-red-600 font-bold mt-16">Event tidak ditemukan. <a href="daftar_event.php" class="text-blue-600 underline">Kembali ke daftar event</a></p>';
    echo '</main>';
    include '../../views/layout/footer.php';
    exit;
}

// Query event berdasarkan nama dengan prepared statement
$stmt = $conn->prepare("SELECT id, nama_event, harga, stok, promo FROM event WHERE nama_event = ?");
if (!$stmt) die("Prepare event gagal: " . $conn->error);
$stmt->bind_param("s", $namaEvent);
if (!$stmt->execute()) die("Execute event gagal: " . $stmt->error);
$result = $stmt->get_result();
$eventData = $result->fetch_assoc();
$stmt->close();

if (!$eventData) {
    echo '<main class="container mx-auto px-4 py-6">';
    echo '<p class="text-red-600 font-bold mt-16">Event tidak ditemukan di database. <a href="daftar_event.php" class="text-blue-600 underline">Kembali ke daftar event</a></p>';
    echo '</main>';
    include '../../views/layout/footer.php';
    exit;
}

// Hitung harga diskon jika ada promo
$hargaAsli = (float)$eventData['harga'];
$promo = (float)$eventData['promo']; // contoh: 0.15 = diskon 15%
$hargaDiskon = ($promo > 0 && $promo < 1) ? round($hargaAsli * (1 - $promo)) : $hargaAsli;

?>

<main class="flex-grow container mx-auto px-4 py-6">
  <div class="mb-6">
    <h1 class="text-2xl mt-16 font-bold text-gray-800">Pemesanan Tiket: <?php echo htmlspecialchars($eventData['nama_event']); ?></h1>
    <p class="text-gray-600">Isi data pemesanan dengan lengkap.</p>
  </div>

  <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" onsubmit="return validasiForm()">
    <input type="hidden" name="idEvent" value="<?php echo (int)$eventData['id']; ?>">
    
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2">Nama Event</label>
      <input name="namaEvent" type="text" value="<?php echo htmlspecialchars($eventData['nama_event']); ?>" readonly
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" />
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2">Harga Tiket per Orang (Rp)</label>
      <input id="hargaTiket" type="text" value="<?php echo number_format($hargaDiskon, 0, ',', '.'); ?>" readonly
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" />
    </div>

    <input type="hidden" name="harga_raw" id="hargaRaw" value="<?php echo $hargaDiskon; ?>">

    <?php if ($promo > 0 && $promo < 1): ?>
      <p class="text-green-600 font-semibold mb-4">Diskon promo: <?php echo ($promo * 100); ?>%</p>
    <?php endif; ?>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="namaPemesan">Nama Pemesan</label>
      <input name="namaPemesan" id="namaPemesan" type="text" required
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" autocomplete="name" />
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
      <input name="email" id="email" type="email" required
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" autocomplete="email" />
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="jumlahTiket">Jumlah Tiket</label>
      <input name="jumlahTiket" id="jumlahTiket" type="number" value="1" min="1" max="<?php echo (int)$eventData['stok']; ?>" required
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" oninput="hitungTotal()" />
      <p class="text-sm text-gray-600 mt-1">Stok tersedia: <?php echo (int)$eventData['stok']; ?></p>
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2">Total Harga (Rp)</label>
      <input id="totalHarga" type="text" value="<?php echo number_format($hargaDiskon, 0, ',', '.'); ?>" readonly
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" />
    </div>

    <input type="hidden" name="total_harga_raw" id="totalHargaRaw" value="<?php echo $hargaDiskon; ?>">

    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
        Lanjut ke Pembayaran
      </button>
    </div>
  </form>
</main>

<script>
function hitungTotal() {
    const hargaPerTiket = parseFloat(document.getElementById("hargaRaw").value) || 0;
    let jumlah = parseInt(document.getElementById("jumlahTiket").value) || 1;
    const stok = <?php echo (int)$eventData['stok']; ?>;

    if (jumlah > stok) {
        alert(`Jumlah tiket maksimal adalah ${stok} karena stok terbatas.`);
        jumlah = stok;
        document.getElementById("jumlahTiket").value = stok;
    }

    fetch(`../pemesanan_pembayaran/ajax_hitung_total.php?harga=${hargaPerTiket}&qty=${jumlah}`)
        .then(response => response.json())
        .then(data => {
            const total = data.total || (hargaPerTiket * jumlah);
            document.getElementById("totalHarga").value = total.toLocaleString('id-ID');
            document.getElementById("totalHargaRaw").value = total;
        })
        .catch(err => {
            console.error(err);
            const totalFallback = hargaPerTiket * jumlah;
            document.getElementById("totalHarga").value = totalFallback.toLocaleString('id-ID');
            document.getElementById("totalHargaRaw").value = totalFallback;
        });
}

function validasiForm() {
    const nama = document.getElementById('namaPemesan').value.trim();
    const email = document.getElementById('email').value.trim();
    const jumlah = parseInt(document.getElementById('jumlahTiket').value);

    if (!nama) {
        alert('Nama pemesan harus diisi.');
        return false;
    }

    if (!email || !email.includes('@')) {
        alert('Email tidak valid.');
        return false;
    }

    if (jumlah < 1) {
        alert('Jumlah tiket minimal 1.');
        return false;
    }

    return true;
}
</script>

<?php include '../../views/layout/footer.php'; ?>
