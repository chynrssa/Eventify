<?php
session_start();
include '../pemesanan_pembayaran/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../Pengguna/login/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../pemesanan_pembayaran/daftar_event.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$event_id = intval($_POST['idEvent']);
$qty = intval($_POST['jumlahTiket']);
$namaPemesan = trim($_POST['namaPemesan']);
$email = trim($_POST['email']);

if ($qty < 1 || empty($namaPemesan) || empty($email)) {
    die("Data pemesanan tidak valid.");
}

$stmt = $conn->prepare("SELECT harga, promo, stok FROM event WHERE id = ?");
$stmt->bind_param("i", $event_id);
$stmt->execute();
$result = $stmt->get_result();
$event = $result->fetch_assoc();
$stmt->close();

if (!$event) {
    die("Event tidak ditemukan.");
}
if ($qty > $event['stok']) {
    die("Jumlah tiket melebihi stok tersedia.");
}

$harga_event = $event['harga'];
$promo = $event['promo'];

// Hitung total harga pakai fungsi DB
$stmt = $conn->prepare("SELECT hitung_total_harga(?, ?) AS total_harga");
$stmt->bind_param("di", $harga_event, $qty);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

$total_harga = $row['total_harga'] ?? 0;

// Simpan transaksi
$created_at = date('Y-m-d H:i:s');
$stmt = $conn->prepare("INSERT INTO transaksi (user_id, event_id, qty, total_harga, promo, created_at) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("iiidds", $user_id, $event_id, $qty, $total_harga, $promo, $created_at);

if (!$stmt->execute()) {
    die("Gagal menyimpan transaksi: " . $stmt->error);
}
$transaksi_id = $stmt->insert_id;
$stmt->close();

// Update stok
$new_stok = $event['stok'] - $qty;
$updateStmt = $conn->prepare("UPDATE event SET stok = ? WHERE id = ?");
$updateStmt->bind_param("ii", $new_stok, $event_id);
$updateStmt->execute();
$updateStmt->close();

// Redirect ke halaman pembayaran
header("Location: ../pemesanan_pembayaran/pembayaran.php?transaksi_id=$transaksi_id");
exit;
?>

