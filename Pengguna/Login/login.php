<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: ../../body/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventify - Platform Tiket Event & Konser</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#C930C1',
                        secondary: '#8A2BE2'
                    },
                    borderRadius: {
                        'button': '8px'
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <link rel="stylesheet" href="login.css" />
</head>
<body class="bg-white">
    <div class="auth-container flex flex-col md:flex-row">
        <div class="event-bg w-full md:w-1/2 flex items-center justify-center p-8 text-center bg-secondary">
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

                <!-- LOGIN FORM -->
                <div id="loginForm">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Masuk ke Eventify</h2>
                    <p class="text-gray-600 mb-8">Temukan dan pesan tiket event favoritmu</p>

                    <form method="POST" action="auth.php">
                        <input type="hidden" name="action" value="login">
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-mail-line text-gray-400"></i>
                                </div>
                                <input type="email" id="email" name="email" required class="form-input w-full pl-10 pr-3 py-2 border border-gray-300 rounded-button text-gray-900 focus:outline-none" placeholder="email@example.com">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-lock-line text-gray-400"></i>
                                </div>
                                <input type="password" id="password" name="password" required class="form-input w-full pl-10 pr-10 py-2 border border-gray-300 rounded-button text-gray-900 focus:outline-none" placeholder="••••••••">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <button type="button" id="togglePassword" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-primary text-white py-2.5 px-4 rounded-button font-medium hover:bg-primary/90 transition-colors duration-300">Masuk</button>
                    </form>

                    <div class="divider my-6 text-center text-gray-400">atau</div>

                    <div class="text-center mt-6">
                        <p class="text-gray-600">
                            Belum punya akun?
                            <a href="#" id="showRegister" class="text-primary font-medium hover:underline">Daftar Sekarang</a>
                        </p>
                    </div>
                </div>

                <!-- REGISTER FORM -->
                <div id="registerForm" class="hidden">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Daftar di Eventify</h2>
                    <p class="text-gray-600 mb-8">Buat akun untuk mengakses semua fitur</p>

                    <form method="POST" action="auth.php">
                        <input type="hidden" name="action" value="register">
                        <div class="mb-4">
                            <label for="fullName" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-user-line text-gray-400"></i>
                                </div>
                                <input type="text" id="fullName" name="fullName" required class="form-input w-full pl-10 pr-3 py-2 border border-gray-300 rounded-button text-gray-900 focus:outline-none" placeholder="Nama lengkap Anda">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="registerEmail" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-mail-line text-gray-400"></i>
                                </div>
                                <input type="email" id="registerEmail" name="email" required class="form-input w-full pl-10 pr-3 py-2 border border-gray-300 rounded-button text-gray-900 focus:outline-none" placeholder="email@example.com">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="registerPassword" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-lock-line text-gray-400"></i>
                                </div>
                                <input type="password" id="registerPassword" name="password" required class="form-input w-full pl-10 pr-10 py-2 border border-gray-300 rounded-button text-gray-900 focus:outline-none" placeholder="Minimal 8 karakter">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <button type="button" id="toggleRegisterPassword" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-lock-line text-gray-400"></i>
                                </div>
                                <input type="password" id="confirmPassword" required class="form-input w-full pl-10 pr-10 py-2 border border-gray-300 rounded-button text-gray-900 focus:outline-none" placeholder="Konfirmasi kata sandi Anda">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <button type="button" id="toggleConfirmPassword" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-primary text-white py-2.5 px-4 rounded-button font-medium hover:bg-primary/90 transition-colors duration-300">Daftar</button>
                    </form>

                    <div class="text-center mt-6">
                        <p class="text-gray-600">
                            Sudah punya akun?
                            <a href="#" id="showLogin" class="text-primary font-medium hover:underline">Masuk</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="login.js"></script>
</body>
</html>
