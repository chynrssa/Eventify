<?php include '../../views/layout/header.php'; ?>

<!-- Main Content -->
<main class="flex-grow container mx-auto px-4 py-6">
  <div class="mb-6">
    <h1 class="text-2xl mt-16 font-bold text-gray-800">Event Pameran</h1>
    <p class="text-gray-600">Temukan event pameran favoritmu dan pesan tiketnya sekarang!</p>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    
    <!-- Event 1 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="https://images.unsplash.com/photo-1531058020387-3be344556be6" alt="Pameran Seni Modern" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Pameran Seni Modern 2025</h3>
        <p class="text-gray-600 text-sm">18 - 22 Juli 2025 | Jakarta Convention Center</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 80.000</p>
        <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Pameran Seni Rupa Nusantara'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
    </div>
    </div>

    <!-- Event 2 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="https://img.antaranews.com/cache/1200x800/2024/07/26/CjkinzN007007_20240726_CBMFN0A001.JPG.webp" alt="Pameran Teknologi Inovasi" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Pameran Teknologi Inovasi 2025</h3>
        <p class="text-gray-600 text-sm">10 - 13 Agustus 2025 | ICE BSD, Tangerang</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 150.000</p>
        <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Pameran Teknologi & Robotik'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- Event 3 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="../../image/fotografidunia.png" alt="Pameran Fotografi Dunia" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Pameran Fotografi Dunia</h3>
        <p class="text-gray-600 text-sm">5 - 7 September 2025 | Grand Indonesia, Jakarta</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 90.000</p>
        <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Pameran Fotografi Alam'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- Event 4 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="https://gizmologi.id/wp-content/uploads/2023/06/NextRise-2023--860x530.jpeg" alt="Pameran Startup & UMKM" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Pameran Startup & UMKM</h3>
        <p class="text-gray-600 text-sm">20 - 24 Oktober 2025 | Jogja Expo Center</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 100.000</p>
        <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Pameran Startup Digital'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- Event 5 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="https://asset.kompas.com/crops/5xOkts0_sf1W7Eoxba64WDMzUXE=/0x0:1024x683/1200x800/data/photo/2024/07/17/6696f1b937e54.jpg" alt="Pameran Otomotif Nusantara" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Pameran Otomotif Nusantara</h3>
        <p class="text-gray-600 text-sm">15 - 19 November 2025 | Surabaya Grand City</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 160.000</p>
<a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Pameran Otomotif Nasional'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

  </div>
</main>

<?php include '../../views/layout/footer.php'; ?>
