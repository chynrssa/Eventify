<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Eventify</title>
    <script src="https://cdn.tailwindcss.com/3.4.1"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#C930C1',secondary:'#8A2BE2'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
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
                    
                    <form action="proses_register.php" method="POST">
                        <div class="mb-4">
                            <label for="fullName" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-user-line text-gray-400"></i>
                                </div>
                                <input type="text" name="nama_lengkap" id="fullName" class="form-input w-full pl-10 pr-3 py-2 border border-gray-300 rounded-button text-gray-900 focus:outline-none" placeholder="Nama lengkap Anda" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="registerEmail" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-mail-line text-gray-400"></i>
                                </div>
                                <input type="email" name="email" id="registerEmail" class="form-input w-full pl-10 pr-3 py-2 border border-gray-300 rounded-button text-gray-900 focus:outline-none" placeholder="email@example.com" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="registerPassword" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-lock-line text-gray-400"></i>
                                </div>
                                <input type="password" name="password" id="registerPassword" class="form-input w-full pl-10 pr-10 py-2 border border-gray-300 rounded-button text-gray-900 focus:outline-none" placeholder="Minimal 8 karakter" required>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-lock-line text-gray-400"></i>
                                </div>
                                <input type="password" name="confirm_password" id="confirmPassword" class="form-input w-full pl-10 pr-10 py-2 border border-gray-300 rounded-button text-gray-900 focus:outline-none" placeholder="Konfirmasi kata sandi Anda" required>
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-primary text-white py-2.5 px-4 rounded-button font-medium hover:bg-primary/90 transition-colors duration-300 !rounded-button whitespace-nowrap">Daftar</button>
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
