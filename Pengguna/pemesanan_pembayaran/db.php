<?php
$host = 'localhost';      // atau 127.0.0.1
$user = 'root';           // username database
$pass = '';               // password database (kosongkan jika default)
$dbname = 'eventify';     // nama database kamu

$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Set charset ke UTF-8 agar kompatibel dengan data teks
$conn->set_charset("utf8mb4");
?>
