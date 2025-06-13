<?php



session_start();


if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: /eventify/body/index.php");
    exit;
}


$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "eventify";


$koneksi = new mysqli($db_server, $db_username, $db_password, $db_name);


if ($koneksi->connect_error) {
    die("KONEKSI GAGAL: " . $koneksi->connect_error);
}




$nama_lengkap = $email = $password = $confirm_password = "";
$nama_err = $email_err = $password_err = $confirm_password_err = $register_success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["nama_lengkap"]))) {
        $nama_err = "Mohon masukkan nama lengkap.";
    } else {
        $nama_lengkap = trim($_POST["nama_lengkap"]);
    }

    if (empty(trim($_POST["email"]))) {
        $email_err = "Mohon masukkan email.";
    } else {
        $sql_check = "SELECT id FROM user WHERE email = ?";
        if ($stmt_check = $koneksi->prepare($sql_check)) {
            $stmt_check->bind_param("s", $param_email_check);
            $param_email_check = trim($_POST["email"]);
            
            if ($stmt_check->execute()) {
                $stmt_check->store_result();
                if ($stmt_check->num_rows == 1) {
                    $email_err = "Email ini sudah terdaftar.";
                } else {
                    $email = trim($_POST["email"]);
                }
            }
            $stmt_check->close();
        }
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Mohon masukkan kata sandi.";
    } elseif (strlen(trim($_POST["password"])) < 8) {
        $password_err = "Kata sandi minimal harus 8 karakter.";
    } else {
        $password = trim($_POST["password"]);
    }
    
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Mohon konfirmasi kata sandi.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Konfirmasi kata sandi tidak cocok.";
        }
    }

    if (empty($nama_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        
        $sql_insert = "INSERT INTO user (nama_lengkap, email, kata_sandi) VALUES (?, ?, ?)";
         
        if ($stmt_insert = $koneksi->prepare($sql_insert)) {
            $stmt_insert->bind_param("sss", $param_nama, $param_email, $param_password);
            
            $param_nama = $nama_lengkap;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
            if ($stmt_insert->execute()) {
                $register_success = "Pendaftaran berhasil! Silakan <a href='login.php' class='font-bold underline'>login</a>.";
            } else {
                echo "<script>alert('Oops! Terjadi kesalahan. Silakan coba lagi nanti.');</script>";
            }
            $stmt_insert->close();
        }
    }
    
    $koneksi->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Eventify</title>
    <script src="https://cdn.tailwindcss.com/3.4.1"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#C930C1',secondary:'#8A2BE2'},borderRadius:{'button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css">
    <link rel="stylesheet" href="login.css" /> 
</head>
<body class="bg-white">
    <div class="auth-container flex flex-col md:flex-row">
        <div class="event-bg w-full md:w-1/2 flex items-center justify-center p-8 text-center">
            <div class="max-w-md">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Gabung dengan Komunitas Event Terbesar</h1>
                <p class="text-lg text-white opacity-90">Daftar sekarang untuk mulai menemukan event yang tak terlupakan.</p>
            </div>
        </div>

        <div class="w-full md:w-1/2 flex items-center justify-center p-6 md:p-12">
            <div class="w-full max-w-md">
                <div class="text-center mb-8">
                     <a href="/eventify/body/index.php" class="font-['Pacifico'] text-primary text-4xl mb-2 inline-block">Eventify</a>
                </div>
                
                <div id="registerForm">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Buat Akun Baru</h2>
                    <p class="text-gray-600 mb-8">Hanya butuh beberapa detik untuk memulai.</p>
                    
                    <?php 
                    if(!empty($register_success)){
                        echo '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">' . $register_success . '</div>';
                    }
                    ?>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="mb-4">
                            <label for="fullName" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="fullName" class="form-input w-full pl-10 pr-3 py-2 border <?php echo (!empty($nama_err)) ? 'border-red-500' : 'border-gray-300'; ?> rounded-button" value="<?php echo htmlspecialchars($nama_lengkap); ?>" required>
                            <span class="text-red-500 text-xs italic"><?php echo $nama_err; ?></span>
                        </div>
                        <div class="mb-4">
                            <label for="registerEmail" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" id="registerEmail" class="form-input w-full pl-10 pr-3 py-2 border <?php echo (!empty($email_err)) ? 'border-red-500' : 'border-gray-300'; ?> rounded-button" value="<?php echo htmlspecialchars($email); ?>" required>
                            <span class="text-red-500 text-xs italic"><?php echo $email_err; ?></span>
                        </div>
                        <div class="mb-4">
                            <label for="registerPassword" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                            <input type="password" name="password" id="registerPassword" class="form-input w-full pl-10 pr-10 py-2 border <?php echo (!empty($password_err)) ? 'border-red-500' : 'border-gray-300'; ?> rounded-button" placeholder="Minimal 8 karakter" required>
                             <span class="text-red-500 text-xs italic"><?php echo $password_err; ?></span>
                        </div>
                        <div class="mb-6">
                            <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                            <input type="password" name="confirm_password" id="confirmPassword" class="form-input w-full pl-10 pr-10 py-2 border <?php echo (!empty($confirm_password_err)) ? 'border-red-500' : 'border-gray-300'; ?> rounded-button" required>
                            <span class="text-red-500 text-xs italic"><?php echo $confirm_password_err; ?></span>
                        </div>
                        <button type="submit" class="w-full bg-primary text-white py-2.5 px-4 rounded-button font-medium hover:bg-primary/90">Daftar</button>
                    </form>
                    
                    <div class="text-center mt-8">
                        <p class="text-gray-600">
                            Sudah punya akun? 
                            <a href="login.php" class="text-primary font-medium hover:underline">Masuk di sini</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
