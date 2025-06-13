<?php
session_start();
include '../../views/layout/header.php';

$status = $_GET['status'] ?? '';

$message = '';
if ($status === 'success') {
    $message = "Terima kasih! Bukti pembayaran Anda telah berhasil diunggah. Kami akan memverifikasi pembayaran Anda dalam waktu 1x24 jam.";
} elseif ($status === 'failed') {
    $message = "Maaf, terjadi kesalahan saat mengunggah bukti pembayaran. Silakan coba lagi.";
} else {
    $message = "Status konfirmasi tidak diketahui.";
}
?>

<main class="flex-grow container mx-auto px-4 py-16">
  <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-10 text-center">
    <h1 class="text-3xl font-bold mb-6 text-blue-700">Konfirmasi Pembayaran</h1>
    <p class="text-gray-700 text-lg"><?php echo htmlspecialchars($message); ?></p>
    <a href="../pemesanan_pembayaran/pemesanan.php" class="inline-block mt-8 px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
      Kembali ke Pemesanan
    </a>
  </div>
</main>

<?php include '../../views/layout/footer.php'; ?>
