<?php
session_start();

// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "eventify"); // Ganti sesuai konfigurasi lokalmu

// Cek apakah request berasal dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];

    if ($action == "login") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Cek ke database berdasarkan email dan kata_sandi
        $query = "SELECT * FROM user WHERE email = '$email' AND kata_sandi = '$password'";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            // Simpan ke session
            $_SESSION['user'] = [
                'id' => $user['id'],
                'nama_lengkap' => $user['nama_lengkap'],
                'email' => $user['email']
            ];

            // Redirect ke halaman home
            header("Location: ../../body/index.php");
            exit;
        } else {
            echo "<script>alert('Email atau kata sandi salah!'); window.location.href='../../pengguna/login/login.php';</script>";
        }
    }

    if ($action == "register") {
        $nama = $_POST['fullName'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Cek apakah email sudah terdaftar
        $check = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email'");
        if (mysqli_num_rows($check) > 0) {
            echo "<script>alert('Email sudah terdaftar!'); window.location.href='../../pengguna/login/login.php';</script>";
        } else {
            // Insert ke database
            $query = "INSERT INTO user (nama_lengkap, email, kata_sandi) VALUES ('$nama', '$email', '$password')";
            if (mysqli_query($koneksi, $query)) {
                echo "<script>alert('Pendaftaran berhasil! Silakan login.'); window.location.href='../../pengguna/login/login.php';</script>";
            } else {
                echo "<script>alert('Pendaftaran gagal!'); window.location.href='../../pengguna/login/login.php';</script>";
            }
        }
    }
}
?>
