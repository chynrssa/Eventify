<?php include '../../views/layout/header.php'; ?>

<!-- Main Content -->
<main class="flex-grow container mx-auto px-4 py-6">
  <div class="mb-6">
    <h1 class="text-2xl mt-16 font-bold text-gray-800">Event Olahraga</h1>
    <p class="text-gray-600">Temukan event olahraga favoritmu dan pesan tiketnya sekarang!</p>
  </div>

  <!-- Event List -->
  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">

    <!-- Event 1 -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="relative aspect-square bg-gray-200">
        <img src="https://images.unsplash.com/photo-1599058918141-fd9e0d7bd729" alt="Marathon Nusantara" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Marathon Nusantara 2025</h3>
        <p class="text-sm text-gray-500 mt-1">Jakarta | 20 Juli 2025</p>
        <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-full text-sm">Pesan Tiket</button>
      </div>
    </div>

    <!-- Event 2 -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="relative aspect-square bg-gray-200">
        <img src="https://images.unsplash.com/photo-1610964171527-14d43c542b08" alt="Basket Championship" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Basket Championship</h3>
        <p class="text-sm text-gray-500 mt-1">Bandung | 5 Agustus 2025</p>
        <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-full text-sm">Pesan Tiket</button>
      </div>
    </div>

    <!-- Event 3 -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="relative aspect-square bg-gray-200">
        <img src="https://images.unsplash.com/photo-1517649763962-0c623066013b" alt="Turnamen Sepak Bola" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Turnamen Sepak Bola Nasional</h3>
        <p class="text-sm text-gray-500 mt-1">Surabaya | 15 September 2025</p>
        <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-full text-sm">Pesan Tiket</button>
      </div>
    </div>

    <!-- Event 4 -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="relative aspect-square bg-gray-200">
        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b" alt="Kejuaraan Bulu Tangkis" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Kejuaraan Bulu Tangkis Asia</h3>
        <p class="text-sm text-gray-500 mt-1">Yogyakarta | 22 Oktober 2025</p>
        <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-full text-sm">Pesan Tiket</button>
      </div>
    </div>

    <!-- Event 5 -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="relative aspect-square bg-gray-200">
        <img src="https://images.unsplash.com/photo-1599058904443-95ee07de8a64" alt="Triathlon Indonesia" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Triathlon Indonesia</h3>
        <p class="text-sm text-gray-500 mt-1">Bali | 10 November 2025</p>
        <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-full text-sm">Pesan Tiket</button>
      </div>
    </div>

    <!-- Event 6 -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="relative aspect-square bg-gray-200">
        <img src="https://images.unsplash.com/photo-1598476400543-99913b06e95e" alt="Voli Pantai Nusantara" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Voli Pantai Nusantara</h3>
        <p class="text-sm text-gray-500 mt-1">Lombok | 5 Desember 2025</p>
        <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-full text-sm">Pesan Tiket</button>
      </div>
    </div>

  </div>
</main>

<?php include '../../views/layout/footer.php'; ?>
