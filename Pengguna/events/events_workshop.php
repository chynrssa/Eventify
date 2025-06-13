<?php include '../../views/layout/header.php'; ?>

<!-- Main Content -->
<main class="flex-grow container mx-auto px-4 py-6">
  <div class="mb-6">
    <h1 class="text-2xl mt-16 font-bold text-gray-800">Daftar Event Workshop</h1>
    <p class="text-gray-600">Temukan event workshop favoritmu dan pesan tiketnya sekarang!</p>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    
    <!-- Event 1 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="https://images.unsplash.com/photo-1573497491208-6b1acb260507" alt="Workshop Desain UI/UX" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Workshop Desain UI/UX</h3>
        <p class="text-gray-600 text-sm">15 - 16 Juli 2025 | Bandung Creative Hub</p>
        <button class="mt-4 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md w-full">Pesan Tiket</button>
      </div>
    </div>

    <!-- Event 2 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="https://images.unsplash.com/photo-1581090700227-1c51c2aef4cd" alt="Workshop Data Science" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Workshop Data Science</h3>
        <p class="text-gray-600 text-sm">20 - 22 Agustus 2025 | Universitas Indonesia</p>
        <button class="mt-4 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md w-full">Pesan Tiket</button>
      </div>
    </div>

    <!-- Event 3 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984" alt="Workshop Fotografi Digital" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Workshop Fotografi Digital</h3>
        <p class="text-gray-600 text-sm">5 - 6 September 2025 | Museum Nasional, Jakarta</p>
        <button class="mt-4 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md w-full">Pesan Tiket</button>
      </div>
    </div>

    <!-- Event 4 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="https://images.unsplash.com/photo-1522199794611-8e3e5aa94d72" alt="Workshop Public Speaking" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Workshop Public Speaking</h3>
        <p class="text-gray-600 text-sm">12 - 13 Oktober 2025 | Hotel Santika, Yogyakarta</p>
        <button class="mt-4 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md w-full">Pesan Tiket</button>
      </div>
    </div>

    <!-- Event 5 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="https://images.unsplash.com/photo-1532619187600-7c61c78d4da5" alt="Workshop Digital Marketing" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Workshop Digital Marketing</h3>
        <p class="text-gray-600 text-sm">25 - 27 November 2025 | Startup Hub Surabaya</p>
        <button class="mt-4 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md w-full">Pesan Tiket</button>
      </div>
    </div>

  </div>
</main>

<?php include '../../views/layout/footer.php'; ?>
