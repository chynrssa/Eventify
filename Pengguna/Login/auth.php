<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$koneksi = new mysqli("localhost", "root", "", "eventify");
if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {

    if ($_POST['action'] == "login") {
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $koneksi->prepare("SELECT id, nama_lengkap, kata_sandi FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['kata_sandi'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['nama_lengkap'] = $user['nama_lengkap'];

                header("Location: ../../index.php");
                exit;
            }
        }
        
        echo "<script>alert('Email atau kata sandi salah!'); window.location.href='login.php';</script>";
        $stmt->close();
    }

    if ($_POST['action'] == "register") {
        $nama_lengkap = $_POST['fullName'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $koneksi->prepare("SELECT id FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "<script>alert('Email sudah terdaftar!'); window.location.href='login.php';</script>";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

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
