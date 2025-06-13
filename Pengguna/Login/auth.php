<?php
// Selalu mulai session di awal
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// --- KONEKSI DATABASE ---
// Sebaiknya, buat file db.php terpisah agar rapi, tapi untuk sementara kita letakkan di sini.
$koneksi = new mysqli("localhost", "root", "", "eventify");
if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}
// --- AKHIR KONEKSI ---

// Cek jika ada request dari form dan ada 'action'
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {

    // --- PROSES LOGIN ---
    if ($_POST['action'] == "login") {
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Menggunakan Prepared Statements untuk mencegah SQL Injection
        $stmt = $koneksi->prepare("SELECT id, nama_lengkap, kata_sandi FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verifikasi password yang di-hash dari database
            if (password_verify($password, $user['kata_sandi'])) {
                // Password benar, simpan data ke session
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['nama_lengkap'] = $user['nama_lengkap'];

                // --- PATH REDIRECT DIPERBAIKI ---
                // Mengarahkan ke index.php di root folder
                header("Location: ../../index.php");
                exit;
            }
        }
        
        // Jika email tidak ditemukan ATAU password salah, berikan pesan error yang sama
        echo "<script>alert('Email atau kata sandi salah!'); window.location.href='login.php';</script>";
        $stmt->close();
    }

    // --- PROSES REGISTER ---
    if ($_POST['action'] == "register") {
        $nama_lengkap = $_POST['fullName'];
        $email = $_POST['email'];
        $password = $_POST['password']; // Sebaiknya ada validasi konfirmasi password di sisi klien/server

        // Cek apakah email sudah ada
        $stmt = $koneksi->prepare("SELECT id FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "<script>alert('Email sudah terdaftar!'); window.location.href='login.php';</script>";
        } else {
            // HASH PASSWORD sebelum disimpan ke database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert pengguna baru ke database
            $insert_stmt = $koneksi->prepare("INSERT INTO user (nama_lengkap, email, kata_sandi) VALUES (?, ?, ?)");
            $insert_stmt->bind_param("sss", $nama_lengkap, $email, $hashed_password);

            if ($insert_stmt->execute()) {
                echo "<script>alert('Pendaftaran berhasil! Silakan login.'); window.location.href='login.php';</script>";
            } else {
                echo "<script>alert('Pendaftaran gagal!'); window.location.href='login.php';</script>";
            }
            $insert_stmt->close();
        }
        $stmt->close();
    }
}

$koneksi->close();
?>
