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
        <img src="https://dorangadget.com/wp-content/uploads/2024/03/Event-Lari-Terbesar-di-Indonesia-copy.jpg" alt="Marathon Nusantara" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Marathon Nusantara 2025</h3>
        <p class="text-sm text-gray-500 mt-1">Jakarta | 20 Juli 2025</p> 
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 50.000</p>
       <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Fun Run 5K'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- Event 2 -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="relative aspect-square bg-gray-200">
        <img src="https://pawon.uajy.ac.id/images/article/Juara_Basket_UAJY_2025-11.jpg" alt="Basket Championship" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Basket Championship</h3>
        <p class="text-sm text-gray-500 mt-1">Bandung | 5 Agustus 2025</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 140.000</p>
       <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Kejuaraan Basket Regional'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- Event 3 -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="relative aspect-square bg-gray-200">
        <img src="https://images.unsplash.com/photo-1517649763962-0c623066013b" alt="Turnamen Sepak Bola" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Turnamen Sepak Bola Antar Mahasiswa</h3>
        <p class="text-sm text-gray-500 mt-1">Surabaya | 15 September 2025</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 120.000</p>
       <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Turnamen Futsal Antar Mahasiswa'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
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
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 130.000</p>
       <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Turnamen Bulu Tangkis Nasional'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- Event 5 -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="relative aspect-square bg-gray-200">
        <img src="https://img.harianjogja.com/posts/2024/09/04/1187082/whatsapp-image-2024-09-04-at-12.22.37.jpeg" alt="Fun Run 10K Indonesia" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Fun Run 10K Indonesia</h3>
        <p class="text-sm text-gray-500 mt-1">Bali | 10 November 2025</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 90.000</p>
       <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Lomba Lari 10K Kota Metropolitan'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- Event 6 -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="relative aspect-square bg-gray-200">
        <img src="https://img.antaranews.com/cache/1200x800/2022/06/27/voli-pantai.jpg.webp" alt="Voli Pantai Nusantara" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Voli Pantai Nusantara</h3>
        <p class="text-sm text-gray-500 mt-1">Lombok | 5 Desember 2025</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 100.000</p>
       <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Liga Voli Mahasiswa'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

  </div>
</main>

<?php include '../../views/layout/footer.php'; ?>
