<?php 
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ambil koneksi database
include '../pemesanan_pembayaran/db.php';

// Cek apakah session tersedia
if (
    isset($_SESSION['namaEvent'], $_SESSION['namaPemesan'], $_SESSION['email'], $_SESSION['jumlahTiket'], $_SESSION['transaksi_id'])
) {
    $namaEvent = $_SESSION['namaEvent'];
    $namaPemesan = $_SESSION['namaPemesan'];
    $email = $_SESSION['email'];
    $jumlahTiket = $_SESSION['jumlahTiket'];
    $transaksi_id = $_SESSION['transaksi_id'];
} else {
    // Redirect ke halaman pemesanan jika data tidak ditemukan
    header("Location: ../pemesanan_pembayaran/pemesanan.php");
    exit();
}

$pesan_error = "";
$totalHarga = 0; // untuk ditampilkan di detail

// Ambil data transaksi terbaru dari database, termasuk total harga dan promo
$sql = "SELECT t.total_harga, t.promo
        FROM transaksi t
        WHERE t.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $transaksi_id);
$stmt->execute();
$result = $stmt->get_result();
$transaksi = $result->fetch_assoc();
$stmt->close();

if ($transaksi) {
    $totalHarga = $transaksi['total_harga'];
    $promo = $transaksi['promo'];
} else {
    $totalHarga = 0;
    $promo = 0;
}

// Proses form promo jika submit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kode_promo'])) {
    $kode_promo = trim($_POST['kode_promo']);

    // Ambil user_id dan event_id dari transaksi sebelumnya
    $sql2 = "SELECT user_id, event_id, qty FROM transaksi WHERE id = ?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("i", $transaksi_id);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $dataTransaksi = $result2->fetch_assoc();
    $stmt2->close();

    if ($dataTransaksi) {
        $p_user_id = $dataTransaksi['user_id'];
        $p_event_id = $dataTransaksi['event_id'];
        $p_qty = $dataTransaksi['qty'];

        // Panggil stored procedure sp_buat_transaksi_promo
        $stmt3 = $conn->prepare("CALL sp_buat_transaksi_promo(?, ?, ?, ?, @p_total, @p_status)");
        $stmt3->bind_param("iiis", $p_user_id, $p_event_id, $p_qty, $kode_promo);
        $stmt3->execute();
        $stmt3->close();

        // Ambil output procedure
        $result3 = $conn->query("SELECT @p_total AS total, @p_status AS status");
        $row3 = $result3->fetch_assoc();

        if ($row3['status'] === 'OK') {
            // Update transaksi_id session ke transaksi terbaru (asumsi terakhir insert)
            $resId = $conn->query("SELECT id FROM transaksi WHERE user_id = $p_user_id AND event_id = $p_event_id ORDER BY id DESC LIMIT 1");
            if ($resId && $rowId = $resId->fetch_assoc()) {
                $_SESSION['transaksi_id'] = $rowId['id'];
                $transaksi_id = $rowId['id'];
            }
            $totalHarga = $row3['total'];
            $pesan_error = "Kode promo berhasil diterapkan.";
        } elseif ($row3['status'] === 'INVALID_PROMO') {
            $pesan_error = "Kode promo tidak valid.";
        } elseif ($row3['status'] === 'OUT_OF_STOCK') {
            $pesan_error = "Stok tidak cukup.";
        } else {
            $pesan_error = "Terjadi kesalahan pada proses.";
        }
    } else {
        $pesan_error = "Data transaksi tidak ditemukan.";
    }
}

?>

<?php include '../../views/layout/header.php'; ?>

<main class="flex-grow container mx-auto px-4 py-16">
  <div class="mb-12 text-center">
    <h1 class="text-4xl font-extrabold text-blue-700">Pembayaran Tiket</h1>
    <p class="text-gray-600 mt-4 text-lg max-w-2xl mx-auto">
      Silakan lakukan pembayaran menggunakan QRIS di bawah ini, kemudian upload bukti pembayaran Anda.
    </p>
  </div>

  <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-2xl p-10 border border-blue-100">

    <!-- Detail Pemesanan -->
    <section class="mb-6">
      <h2 class="text-2xl text-center font-semibold text-gray-800 mb-6 border-b pb-4">Detail Pemesanan</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-gray-700 text-base">
        <div><span class="font-medium text-gray-600">Nama Event:</span><br><?php echo htmlspecialchars($namaEvent); ?></div>
        <div><span class="font-medium text-gray-600">Nama Pemesan:</span><br><?php echo htmlspecialchars($namaPemesan); ?></div>
        <div><span class="font-medium text-gray-600">Email:</span><br><?php echo htmlspecialchars($email); ?></div>
        <div><span class="font-medium text-gray-600">Jumlah Tiket:</span><br><?php echo (int)$jumlahTiket; ?></div>
        <div><span class="font-medium text-gray-600">Promo Potongan:</span><br>Rp <?php echo number_format($promo, 0, ',', '.'); ?></div>
        <div><span class="font-medium text-gray-600">Total Harga:</span><br>Rp <?php echo number_format($totalHarga, 0, ',', '.'); ?></div>
      </div>
    </section>

    <!-- Form Kode Promo -->
    <section class="mb-12 text-center">
      <form method="POST" class="max-w-md mx-auto flex gap-4">
        <input 
          type="text" 
          name="kode_promo" 
          placeholder="Masukkan Kode Promo" 
          class="w-full rounded-lg border border-gray-300 px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" 
          required
        >
        <button 
          type="submit" 
          class="bg-blue-600 text-white px-6 rounded-lg hover:bg-blue-700 transition"
        >Gunakan</button>
      </form>
      <?php if($pesan_error): ?>
        <p class="mt-3 text-sm text-red-600"><?php echo htmlspecialchars($pesan_error); ?></p>
      <?php endif; ?>
    </section>

    <!-- QRIS -->
    <section class="mb-12 text-center">
      <h3 class="text-xl font-bold text-gray-800 mb-6">Scan QRIS Untuk Pembayaran</h3>
      <div class="flex justify-center">
        <div class="border-4 border-blue-200 rounded-2xl p-5 bg-blue-50 shadow-lg">
          <img src="../../image/qris.png" alt="QRIS" class="w-72 h-72 object-contain mx-auto">
        </div>
      </div>
    </section>

    <!-- Upload Bukti Pembayaran -->
    <section>
      <h3 class="text-xl font-semibold text-gray-800 mb-6 border-b pb-4 text-center">Upload Bukti Pembayaran</h3>
      <form action="../pemesanan_pembayaran/upload_bukti.php" method="POST" enctype="multipart/form-data" class="space-y-6">

        <!-- Kirim transaksi_id sebagai acuan -->
        <input type="hidden" name="transaksi_id" value="<?php echo (int)$transaksi_id; ?>">

        <div class="flex flex-col items-center">
          <label class="block mb-2 font-medium text-gray-700 text-center">Pilih Foto Bukti Pembayaran (JPG, JPEG, PNG)</label>
          <input 
            type="file" 
            name="bukti_pembayaran" 
            required 
            class="block w-full max-w-md file:rounded-lg file:border file:border-gray-300 file:px-4 file:py-2 file:bg-white file:text-gray-700 file:cursor-pointer focus:outline-none" 
            accept=".jpg, .jpeg, .png"
          >
        </div>

        <div class="text-center">
          <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-semibold text-lg py-3 px-10 rounded-full shadow-md transition">
            Upload & Konfirmasi
          </button>
        </div>

      </form>
    </section>

  </div>
</main>

<?php include '../../views/layout/footer.php'; ?>
