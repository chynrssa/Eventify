<?php 
session_start();

$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "eventify";

$koneksi = new mysqli($db_server, $db_username, $db_password, $db_name);

if ($koneksi->connect_error) {
    die("KONEKSI KE DATABASE GAGAL: " . $koneksi->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idEvent = isset($_POST['idEvent']) ? (int)$_POST['idEvent'] : 0;
    $namaPemesan = isset($_POST['namaPemesan']) ? trim($_POST['namaPemesan']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $jumlahTiket = isset($_POST['jumlahTiket']) ? (int)$_POST['jumlahTiket'] : 1;
    $totalHargaRaw = isset($_POST['total_harga_raw']) ? (float)$_POST['total_harga_raw'] : 0.0;

    if ($idEvent <= 0 || !$namaPemesan || !$email || !filter_var($email, FILTER_VALIDATE_EMAIL) || $jumlahTiket < 1) {
        $error_message = "Data pemesanan tidak lengkap atau tidak valid.";
    } else {
        $stmtStok = $koneksi->prepare("SELECT stok FROM event WHERE id = ?");
        $stmtStok->bind_param("i", $idEvent);
        $stmtStok->execute();
        $resStok = $stmtStok->get_result()->fetch_assoc();
        $stmtStok->close();

        if (!$resStok || $resStok['stok'] < $jumlahTiket) {
            $error_message = 'Stok tiket tidak cukup. <a href="daftar_event.php" class="text-blue-600 underline">Kembali ke daftar event</a>';
        } else {
            $userId = $_SESSION['user_id'] ?? null; 

            if (!$userId) {
                $stmtUser = $koneksi->prepare("SELECT id FROM user WHERE email = ?");
                $stmtUser->bind_param("s", $email);
                $stmtUser->execute();
                $resUser = $stmtUser->get_result()->fetch_assoc();
                $stmtUser->close();

                if ($resUser) {
                    $userId = $resUser['id'];
                } else {
                    $stmtInsertUser = $koneksi->prepare("INSERT INTO user (nama_lengkap, email, kata_sandi) VALUES (?, ?, '')");
                    $stmtInsertUser->bind_param("ss", $namaPemesan, $email);
                    $stmtInsertUser->execute();
                    $userId = $stmtInsertUser->insert_id;
                    $stmtInsertUser->close();
                }
            }

            $stmtPromo = $koneksi->prepare("SELECT promo FROM event WHERE id = ?");
            $stmtPromo->bind_param("i", $idEvent);
            $stmtPromo->execute();
            $resPromo = $stmtPromo->get_result()->fetch_assoc();
            $stmtPromo->close();
            $promo = $resPromo ? (float)$resPromo['promo'] : 0.0;

            $stmtTrans = $koneksi->prepare("INSERT INTO transaksi (user_id, event_id, qty, total_harga, promo) VALUES (?, ?, ?, ?, ?)");
            $stmtTrans->bind_param("iiidd", $userId, $idEvent, $jumlahTiket, $totalHargaRaw, $promo);
            $stmtTrans->execute();
            $transaksiId = $stmtTrans->insert_id;
            $stmtTrans->close();

            if ($transaksiId) {
                $_SESSION['transaksi_id'] = $transaksiId;
                
                $stmtUpdateStok = $koneksi->prepare("UPDATE event SET stok = stok - ? WHERE id = ?");
                $stmtUpdateStok->bind_param("ii", $jumlahTiket, $idEvent);
                $stmtUpdateStok->execute();
                $stmtUpdateStok->close();

                header("Location: pembayaran.php");
                exit;
            } else {
                $error_message = "Gagal membuat transaksi.";
            }
        }
    }
}

$namaEvent = isset($_GET['event']) ? trim($_GET['event']) : '';
if (!$namaEvent) {
    $error_message = 'Event tidak valid. Silakan pilih event dari <a href="daftar_event.php" class="text-blue-600 underline">daftar event</a>.';
} else {
    $stmt = $koneksi->prepare("SELECT id, nama_event, harga, stok, promo FROM event WHERE nama_event = ?");
    $stmt->bind_param("s", $namaEvent);
    $stmt->execute();
    $result = $stmt->get_result();
    $eventData = $result->fetch_assoc();
    $stmt->close();

    if (!$eventData) {
        $error_message = 'Event tidak ditemukan. <a href="daftar_event.php" class="text-blue-600 underline">Kembali</a>';
    } else {
        $hargaAsli = (float)$eventData['harga'];
        $promo = (float)$eventData['promo'];
        $hargaDiskon = ($promo > 0 && $promo < 1) ? round($hargaAsli * (1 - $promo)) : $hargaAsli;
    }
}

include '../../views/layout/header.php'; 
?>

<main class="flex-grow container mx-auto px-4 py-6">
  <?php if (!empty($error_message)): ?>
    <div class="mt-24 text-center p-4 bg-red-100 text-red-700 rounded-lg">
        <p><?php echo $error_message; ?></p>
    </div>
  <?php elseif (isset($eventData)): ?>
    <div class="mb-6">
        <h1 class="text-2xl mt-16 font-bold text-gray-800">Pemesanan Tiket: <?php echo htmlspecialchars($eventData['nama_event']); ?></h1>
        <p class="text-gray-600">Isi data pemesanan dengan lengkap.</p>
    </div>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?event=<?php echo urlencode($namaEvent); ?>" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <input type="hidden" name="idEvent" value="<?php echo (int)$eventData['id']; ?>">
        
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2">Nama Event</label>
          <input name="namaEvent" type="text" value="<?php echo htmlspecialchars($eventData['nama_event']); ?>" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-gray-100" />
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2">Harga Tiket per Orang (Rp)</label>
          <input id="hargaTiket" type="text" value="<?php echo number_format($hargaDiskon, 0, ',', '.'); ?>" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-gray-100" />
        </div>

        <input type="hidden" id="hargaRaw" value="<?php echo $hargaDiskon; ?>">

        <?php if ($promo > 0 && $promo < 1): ?>
          <p class="text-green-600 font-semibold mb-4">Diskon promo: <?php echo ($promo * 100); ?>%</p>
        <?php endif; ?>

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="namaPemesan">Nama Pemesan</label>
          <input name="namaPemesan" id="namaPemesan" type="text" value="<?php echo $_SESSION['nama_lengkap'] ?? ''; ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" autocomplete="name" />
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
          <input name="email" id="email" type="email" value="<?php echo $_SESSION['email'] ?? ''; ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" autocomplete="email" />
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="jumlahTiket">Jumlah Tiket</label>
          <input name="jumlahTiket" id="jumlahTiket" type="number" value="1" min="1" max="<?php echo (int)$eventData['stok']; ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" oninput="hitungTotal()" />
          <p class="text-sm text-gray-600 mt-1">Stok tersedia: <?php echo (int)$eventData['stok']; ?></p>
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2">Total Harga (Rp)</label>
          <input id="totalHarga" type="text" value="<?php echo number_format($hargaDiskon, 0, ',', '.'); ?>" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-gray-100" />
        </div>

        <input type="hidden" name="total_harga_raw" id="totalHargaRaw" value="<?php echo $hargaDiskon; ?>">

        <div class="flex items-center justify-between">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
            Lanjut ke Pembayaran
          </button>
        </div>
    </form>
  <?php endif; ?>
</main>

<script>
function hitungTotal() {
    const hargaPerTiket = parseFloat(document.getElementById("hargaRaw").value) || 0;
    let jumlah = parseInt(document.getElementById("jumlahTiket").value) || 1;
    const stok = <?php echo (isset($eventData['stok'])) ? (int)$eventData['stok'] : 0; ?>;

    if (jumlah < 1) {
        jumlah = 1;
        document.getElementById("jumlahTiket").value = 1;
    }

    if (stok > 0 && jumlah > stok) {
        alert(`Jumlah tiket maksimal adalah ${stok} karena stok terbatas.`);
        jumlah = stok;
        document.getElementById("jumlahTiket").value = stok;
    }

    const total = hargaPerTiket * jumlah;
    document.getElementById("totalHarga").value = total.toLocaleString('id-ID');
    document.getElementById("totalHargaRaw").value = total;
}
</script>

<?php 
$koneksi->close();
include '../../views/layout/footer.php'; 
?>
