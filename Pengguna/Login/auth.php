<?php
// Selalu mulai session di awal
session_start();

// Panggil file koneksi ke database. Pastikan path ini benar.
// Disarankan untuk membuat file db.php terpisah agar lebih rapi.
$koneksi = new mysqli("localhost", "root", "", "eventify");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

// Cek apakah request berasal dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- PROSES LOGIN ---
    if (isset($_POST['action']) && $_POST['action'] == "login") {
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Menggunakan Prepared Statements untuk mencegah SQL Injection
        $stmt = $koneksi->prepare("SELECT id, nama_lengkap, kata_sandi FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verifikasi password yang di-hash
            if (password_verify($password, $user['kata_sandi'])) {
                // Password benar, simpan data ke session
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['nama_lengkap'] = $user['nama_lengkap'];

                // Redirect ke halaman utama
                header("Location: /eventify/body/index.php");
                exit;
            } else {
                // Password salah
                echo "<script>alert('Email atau kata sandi salah!'); window.location.href='login.php';</script>";
            }
        } else {
            // Email tidak ditemukan
            echo "<script>alert('Email atau kata sandi salah!'); window.location.href='login.php';</script>";
        }
        $stmt->close();
    }

    // --- PROSES REGISTER ---
    if (isset($_POST['action']) && $_POST['action'] == "register") {
        $nama = $_POST['fullName'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validasi sederhana (bisa ditambahkan validasi konfirmasi password)
        if (empty($nama) || empty($email) || empty($password)) {
             echo "<script>alert('Semua kolom harus diisi!'); window.location.href='login.php';</script>";
             exit;
        }

        // Cek apakah email sudah ada
        $stmt = $koneksi->prepare("SELECT id FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "<script>alert('Email sudah terdaftar!'); window.location.href='login.php';</script>";
        } else {
            // Hash password sebelum disimpan
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert ke database menggunakan prepared statement
            $insert_stmt = $koneksi->prepare("INSERT INTO user (nama_lengkap, email, kata_sandi) VALUES (?, ?, ?)");
            $insert_stmt->bind_param("sss", $nama, $email, $hashed_password);

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
