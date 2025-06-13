<?php 
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Cek apakah halaman dipanggil lewat POST (dari halaman pemesanan)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Simpan data dari form ke variable
    $namaEvent = htmlspecialchars($_POST['namaEvent']);
    $namaPemesan = htmlspecialchars($_POST['namaPemesan']);
    $email = htmlspecialchars($_POST['email']);
    $jumlahTiket = htmlspecialchars($_POST['jumlahTiket']);
} 
// Jika tidak ada data POST, redirect ke halaman pembayaran
else {
    header("Location: ../../pembayaran.php");
    exit();
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
    <section class="mb-12">
      <h2 class="text-2xl text-center font-semibold text-gray-800 mb-6 border-b pb-4">Detail Pemesanan</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-gray-700 text-base">
        <div><span class="font-medium text-gray-600">Nama Event:</span><br><?php echo $namaEvent; ?></div>
        <div><span class="font-medium text-gray-600">Nama Pemesan:</span><br><?php echo $namaPemesan; ?></div>
        <div><span class="font-medium text-gray-600">Email:</span><br><?php echo $email; ?></div>
        <div><span class="font-medium text-gray-600">Jumlah Tiket:</span><br><?php echo $jumlahTiket; ?></div>
      </div>
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
      <form action="upload_bukti.php" method="POST" enctype="multipart/form-data" class="space-y-6">

        <!-- Hidden Input -->
        <input type="hidden" name="namaEvent" value="<?php echo $namaEvent; ?>">
        <input type="hidden" name="namaPemesan" value="<?php echo $namaPemesan; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="jumlahTiket" value="<?php echo $jumlahTiket; ?>">

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
