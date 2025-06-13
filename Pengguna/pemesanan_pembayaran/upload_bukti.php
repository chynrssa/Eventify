<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../pemesanan_pembayaran/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['transaksi_id']) && isset($_FILES['bukti_pembayaran'])) {
    $transaksi_id = (int)$_POST['transaksi_id'];

    // Direktori upload bukti pembayaran
    $uploadDir = '../../uploads/bukti/';
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
            // Cek apakah data pembayaran sudah ada untuk transaksi ini
            $stmtCheck = $conn->prepare("SELECT id FROM pembayaran WHERE transaksi_id = ?");
            $stmtCheck->bind_param("i", $transaksi_id);
            $stmtCheck->execute();
            $resCheck = $stmtCheck->get_result()->fetch_assoc();
            $stmtCheck->close();

            if ($resCheck) {
                // Update bukti dan status menjadi 'berhasil', update timestamp
                $stmt = $conn->prepare("UPDATE pembayaran SET bukti = ?, status = 'berhasil', created_at = NOW() WHERE transaksi_id = ?");
                $stmt->bind_param("si", $newFileName, $transaksi_id);
            } else {
                // Insert data pembayaran baru dengan status 'berhasil'
                $stmt = $conn->prepare("INSERT INTO pembayaran (transaksi_id, bukti, status) VALUES (?, ?, 'berhasil')");
                $stmt->bind_param("is", $transaksi_id, $newFileName);
            }

            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $success = true;
            } else {
                $error = "Gagal menyimpan data ke database.";
            }
            $stmt->close();
        } else {
            $error = "Gagal mengupload file.";
        }
    } else {
        $error = "Format file tidak diperbolehkan (hanya JPG, JPEG, PNG).";
    }
} else {
    header("Location: ../pemesanan_pembayaran/pembayaran.php");
    exit();
}
?>

<?php include '../../views/layout/header.php'; ?>

<main class="flex-grow container mx-auto px-4 py-16">
  <div class="max-w-2xl mt-16 mx-auto bg-white rounded-3xl shadow-2xl p-10 text-center border border-blue-100">
    <?php if (!empty($success)): ?>
      <h1 class="text-3xl font-extrabold text-green-600 mb-6">Pembayaran Berhasil!</h1>
      <p class="text-gray-700 text-lg mb-10">Terima kasih, bukti pembayaran Anda telah berhasil diunggah dan dikonfirmasi.</p>
      <a href="../../body/index.php" class="mt-6 inline-block text-blue-600 hover:underline">Kembali ke Beranda</a>
    <?php else: ?>
      <h1 class="text-2xl font-bold text-red-600 mb-6">Upload Gagal!</h1>
      <p class="text-gray-700 text-lg"><?php echo isset($error) ? $error : 'Terjadi kesalahan.'; ?></p>
      <a href="pembayaran.php" class="mt-6 inline-block text-blue-600 hover:underline">Kembali ke Pembayaran</a>
    <?php endif; ?>
  </div>
</main>

<?php include '../../views/layout/footer.php'; ?>
