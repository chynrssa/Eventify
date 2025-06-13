<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../pemesanan_pembayaran/db.php'; // koneksi database

// Cek apakah request POST dan file bukti ada
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['transaksi_id']) && isset($_FILES['bukti_pembayaran'])) {
    $transaksi_id = (int) $_POST['transaksi_id'];

    // Cek transaksi_id valid dan transaksi ada di database
    $stmt = $conn->prepare("SELECT id, status FROM transaksi WHERE id = ?");
    $stmt->bind_param("i", $transaksi_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        die("Transaksi tidak ditemukan.");
    }

    $transaksi = $result->fetch_assoc();

    // Jika status sudah bukan pending, tolak upload (misal sudah dibayar)
    if ($transaksi['status'] != 'pending') {
        die("Transaksi sudah diproses, tidak bisa upload bukti ulang.");
    }

    $stmt->close();

    // Proses upload file
    $file = $_FILES['bukti_pembayaran'];

    // Validasi file
    $allowed_types = ['image/jpeg', 'image/jpg', 'image/png'];
    if (!in_array($file['type'], $allowed_types)) {
        die("Format file tidak diperbolehkan. Gunakan JPG, JPEG, atau PNG.");
    }

    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Terjadi kesalahan saat upload file.");
    }

    // Buat folder upload jika belum ada
    $upload_dir = '../../uploads';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // Generate nama file unik
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $new_filename = 'bukti_' . $transaksi_id . '_' . time() . '.' . $ext;
    $upload_path = $upload_dir . $new_filename;

    // Pindahkan file
    if (!move_uploaded_file($file['tmp_name'], $upload_path)) {
        die("Gagal menyimpan file bukti pembayaran.");
    }

    // Simpan nama file dan update status transaksi ke 'menunggu_verifikasi'
    $stmt = $conn->prepare("UPDATE transaksi SET bukti = ?, status = 'menunggu_verifikasi' WHERE id = ?");
    $stmt->bind_param("si", $new_filename, $transaksi_id);

    if ($stmt->execute()) {
        $stmt->close();

        // Bersihkan session karena sudah selesai upload bukti
        unset($_SESSION['namaEvent'], $_SESSION['namaPemesan'], $_SESSION['email'], $_SESSION['jumlahTiket'], $_SESSION['transaksi_id']);

        // Redirect ke halaman sukses atau konfirmasi
        header("Location: ../pemesanan_pembayaran/konfirmasi.php?status=success");
        exit();

    } else {
        die("Gagal menyimpan data bukti pembayaran ke database.");
    }

} else {
    die("Akses tidak valid.");
}
