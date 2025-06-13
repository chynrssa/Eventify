<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Eventify</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Inter&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    .logo {
      font-family: 'Pacifico', cursive;
    }
    .gradient-bg {
      background: linear-gradient(135deg, #6200EA, #FF1744);
    }
  </style>
</head>
<body>
  <header class="fixed w-full z-50">
    <nav class="gradient-bg text-white shadow-lg">
      <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <!-- Logo + Menu -->
        <div class="flex items-center">
          <a href="#" class="text-2xl logo text-white">Eventify</a>
          <div class="hidden md:flex ml-10 space-x-6">
            <a href="../../index.php" class="font-medium hover:text-gray-200 transition">Beranda</a>
            <a href="../../Pengguna/events/events.php" class="font-medium hover:text-gray-200 transition">Events</a>
            <a href="#" class="font-medium hover:text-gray-200 transition">Tiket Saya</a>
          </div>
        </div>

        <!-- Mobile menu toggle -->
        <div class="md:hidden">
          <button id="mobile-menu-button" class="text-white text-2xl">
            <i class="ri-menu-line"></i>
          </button>
        </div>
      </div>
    </nav>
  </header>
</body>
</html>
