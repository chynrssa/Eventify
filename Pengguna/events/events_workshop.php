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
                <p class="text-sm text-blue-600 font-bold mt-1">Rp 200.000</p>
       <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Workshop UI/UX Design'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- Event 2 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="https://infopublik.id/assets/upload/headline//Diskominfo_Jatim_Gelar_Workshop_Codeless_Data_Science.jpeg" alt="Workshop Data Science" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Workshop Data Science</h3>
        <p class="text-gray-600 text-sm">20 - 22 Agustus 2025 | Universitas Indonesia</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 250.000</p>
       <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Workshop Data Science'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- Event 3 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984" alt="Workshop Fotografi Digital" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Workshop Fotografi Digital</h3>
        <p class="text-gray-600 text-sm">5 - 6 September 2025 | Museum Nasional, Jakarta</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 210.000</p>
       <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Workshop Fotografi Profesional'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- Event 4 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="https://web.faperta.ugm.ac.id/wp-content/uploads/sites/19/2024/11/Artikel-Public-Speaking-Workshop_fix3.jpeg" alt="Workshop Public Speaking" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Workshop Public Speaking</h3>
        <p class="text-gray-600 text-sm">12 - 13 Oktober 2025 | Hotel Santika, Yogyakarta</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 180.000</p>
       <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Workshop Public Speaking Profesional'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- Event 5 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="https://orderonline.id/blog/wp-content/uploads/2022/11/Cover-Blog-2-1024x640.jpg" alt="Workshop Digital Marketing" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Workshop Digital Marketing</h3>
        <p class="text-gray-600 text-sm">25 - 27 November 2025 | Startup Hub Surabaya</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 220.000</p>
       <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Workshop Digital Marketing'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

  </div>
</main>

<?php include '../../views/layout/footer.php'; ?>
