<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventify - Temukan & Beli Tiket Event</title>
    <script src="https://cdn.tailwindcss.com/3.4.1"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#6200EA',secondary:'#FF1744'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500&family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css">
    <link rel="stylesheet" href="/eventify/body/index.css" />
</head>
<body class="bg-gray-50">

<header class="fixed w-full z-50">
    <nav class="gradient-bg text-white shadow-lg">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center">
                <a href="/eventify/body/index.php" class="text-2xl font-['Pacifico'] text-white">Eventify</a>
                <div class="hidden md:flex ml-10 space-x-6">
                    <a href="/eventify/body/index.php" class="font-medium hover:text-gray-200 transition">Beranda</a>
                    <a href="/eventify/Pengguna/events/events.php" class="font-medium hover:text-gray-200 transition">Events</a>
                    <a href="/eventify/Pengguna/tiket_saya/tiket_saya.php" class="font-medium hover:text-gray-200 transition">Tiket Saya</a>
                </div>
            </div>
            
            <div class="hidden md:flex items-center">
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <div class="flex items-center space-x-4">
                        <span class="font-semibold">Hi, <?php echo htmlspecialchars($_SESSION['nama_lengkap']); ?></span>
                        <a href="/eventify/Pengguna/Login/logout.php" class="bg-secondary text-white font-semibold py-2 px-6 rounded-button whitespace-nowrap hover:bg-opacity-90 transition">Logout</a>
                    </div>
                <?php else: ?>
                    <div class="flex items-center space-x-2">
                        <a href="/eventify/Pengguna/Login/login.php" class="bg-white text-primary font-semibold py-2 px-6 rounded-button whitespace-nowrap hover:bg-gray-100 transition">Masuk</a>
                        <a href="/eventify/Pengguna/Login/register.php" class="bg-secondary text-white font-semibold py-2 px-6 rounded-button whitespace-nowrap hover:bg-opacity-90 transition">Daftar</a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-white">
                    <i class="ri-menu-line text-2xl"></i>
                </button>
            </div>
        </div>
        
        <div id="mobile-menu" class="md:hidden hidden bg-white text-gray-800 shadow-lg absolute w-full">
            <div class="container mx-auto px-4 py-3 flex flex-col space-y-3">
                <a href="/eventify/body/index.php" class="font-medium py-2 hover:text-primary transition">Beranda</a>
                <a href="/eventify/Pengguna/events/events.php" class="font-medium py-2 hover:text-primary transition">Events</a>
                <a href="/eventify/Pengguna/tiket_saya/tiket_saya.php" class="font-medium py-2 hover:text-primary transition">Tiket Saya</a>
                <div class="flex space-x-3 py-2 border-t mt-2">
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                        <div class="w-full">
                            <p class="font-semibold text-center mb-2">Hi, <?php echo htmlspecialchars($_SESSION['nama_lengkap']); ?></p>
                            <a href="/eventify/Pengguna/Login/logout.php" class="bg-secondary text-white text-center font-semibold py-2 px-6 rounded-button whitespace-nowrap block w-full hover:bg-opacity-90 transition">Logout</a>
                        </div>
                    <?php else: ?>
                        <a href="/eventify/Pengguna/Login/login.php" class="bg-primary text-white text-center font-semibold py-2 px-6 rounded-button whitespace-nowrap flex-1 hover:bg-opacity-90 transition">Masuk</a>
                        <a href="/eventify/Pengguna/Login/register.php" class="bg-secondary text-white text-center font-semibold py-2 px-6 rounded-button whitespace-nowrap flex-1 hover:bg-opacity-90 transition">Daftar</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    }
});
</script>
