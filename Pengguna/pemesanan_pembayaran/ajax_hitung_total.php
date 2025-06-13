<?php
include '../pemesanan_pembayaran/db.php';

$harga = isset($_GET['harga']) ? (float)$_GET['harga'] : 0;
$qty = isset($_GET['qty']) ? (int)$_GET['qty'] : 1;

if ($harga <= 0 || $qty <= 0) {
    echo json_encode(['total' => 0]);
    exit;
}

// Panggil fungsi hitung_total_harga di MySQL
$sql = "SELECT hitung_total_harga(?, ?) AS total_harga";
$stmt = $conn->prepare($sql);
$stmt->bind_param("di", $harga, $qty);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

$totalHarga = isset($row['total_harga']) ? $row['total_harga'] : 0;

echo json_encode(['total' => $totalHarga]);
