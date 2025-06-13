<?php
// Proses upload file
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namaEvent = htmlspecialchars($_POST['namaEvent']);
    $namaPemesan = htmlspecialchars($_POST['namaPemesan']);
    $email = htmlspecialchars($_POST['email']);
    $jumlahTiket = htmlspecialchars($_POST['jumlahTiket']);

    // Folder penyimpanan bukti pembayaran
    $uploadDir = '../../uploads/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = basename($_FILES['bukti_pembayaran']['name']);
    $fileTmp = $_FILES['bukti_pembayaran']['tmp_name'];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $allowedExt = ['jpg', 'jpeg', 'png'];

    if (in_array($fileExt, $allowedExt)) {
        $newFileName = uniqid('bukti_') . '.' . $fileExt;
        $filePath = $uploadDir . $newFileName;

        if (move_uploaded_file($fileTmp, $filePath)) {
            // Simulasi data tersimpan (bisa disimpan ke database juga)
            $success = true;
        } else {
            $error = "Gagal mengupload file.";
        }
    } else {
        $error = "Format file tidak diperbolehkan.";
    }
} else {
    header("Location: pembayaran.php");
    exit();
}
?>

<?php include '../../views/layout/header.php'; ?>

<main class="flex-grow container mx-auto px-4 py-16">
  <div class="max-w-2xl mt-16 mx-auto bg-white rounded-3xl shadow-2xl p-10 text-center border border-blue-100">
    <?php if (!empty($success)): ?>
      <!-- Popup sukses -->
      <h1 class="text-3xl font-extrabold text-green-600 mb-6">Pembayaran Berhasil!</h1>
      <p class="text-gray-700 text-lg mb-10">Terima kasih, bukti pembayaran Anda telah berhasil diunggah.</p>
    <a href="../../body/index.php" class="mt-6 inline-block text-blue-600 hover:underline">Kembali</a>

    <?php else: ?>
      <h1 class="text-2xl font-bold text-red-600 mb-6">Upload Gagal!</h1>
      <p class="text-gray-700 text-lg"><?php echo $error; ?></p>
      <a href="../pembayaran.php" class="mt-6 inline-block text-blue-600 hover:underline">Kembali</a>
    <?php endif; ?>
  </div>
</main class="flex-grow container mx-auto px-4 py-16">


<?php include '../../views/layout/footer.php'; ?>
