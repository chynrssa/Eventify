<?php



session_start();


if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: /eventify/index.php");
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



$email = $password = "";
$login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["email"]))) {
        $login_err = "Mohon masukkan email.";
    } else {
        $email = trim($_POST["email"]);
    }
    
    if (empty(trim($_POST["password"]))) {
        $login_err = "Mohon masukkan kata sandi.";
    } else {
        $password = trim($_POST["password"]);
    }
    

    if (empty($login_err)) {
        $sql = "SELECT id, nama_lengkap, kata_sandi FROM user WHERE email = ?";
        
        if ($stmt = $koneksi->prepare($sql)) {
            $stmt->bind_param("s", $email);
            
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                
                if ($result->num_rows == 1) {
                    $user = $result->fetch_assoc();
                    
                    if (password_verify($password, $user['kata_sandi'])) {
                        session_start();
                        
                        $_SESSION["loggedin"] = true;
                        $_SESSION["user_id"] = $user['id'];
                        $_SESSION["nama_lengkap"] = $user['nama_lengkap'];                            
                        
                        header("location: /eventify/index.php");
                        exit;
                    } else {
                        $login_err = "Email atau kata sandi salah.";
                    }
                } else {
                    $login_err = "Email atau kata sandi salah.";
                }
            } else {
                $login_err = "Oops! Terjadi kesalahan. Silakan coba lagi.";
            }
            $stmt->close();
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
    <title>Login - Eventify</title>
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
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Temukan Event Luar Biasa</h1>
                <p class="text-lg text-white opacity-90">Bergabunglah dengan ribuan orang untuk menikmati konser dan acara terbaik</p>
            </div>
        </div>

        <div class="w-full md:w-1/2 flex items-center justify-center p-6 md:p-12">
            <div class="w-full max-w-md">
                <div class="text-center mb-8">
                    <h1 class="font-['Pacifico'] text-primary text-4xl mb-2">Eventify</h1>
                </div>

                <div id="loginForm">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Masuk ke Eventify</h2>
                    <p class="text-gray-600 mb-8">Temukan dan pesan tiket event favoritmu</p>

                    <?php 
                    if(!empty($login_err)){
                        echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">' . $login_err . '</div>';
                    }        
                    ?>

                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" required class="form-input w-full pl-10 pr-3 py-2 border border-gray-300 rounded-button" placeholder="email@example.com">
                        </div>
                        <div class="mb-6">
                             <div class="flex justify-between items-center mb-1">
                                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                            </div>
                            <input type="password" id="password" name="password" required class="form-input w-full pl-10 pr-10 py-2 border border-gray-300 rounded-button" placeholder="••••••••">
                        </div>
                        <button type="submit" class="w-full bg-primary text-white py-2.5 px-4 rounded-button font-medium">Masuk</button>
                    </form>

                    <div class="text-center mt-6">
                        <p class="text-gray-600">
                            Belum punya akun?
                            <a href="register.php" class="text-primary font-medium hover:underline">Daftar Sekarang</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
