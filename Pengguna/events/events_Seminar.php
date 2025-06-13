<?php include '../../views/layout/header.php'; ?>

<main class="flex-grow container mx-auto px-4 py-6">
  <div class="mb-6">
    <h1 class="text-2xl mt-16 font-bold text-gray-800">Event Seminar</h1>
    <p class="text-gray-600">Temukan event seminar favoritmu dan pesan tiketnya sekarang!</p>
  </div>

  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">

    <!-- 1 -->
    <div class="category-card bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="relative aspect-square bg-gray-200">
        <img src="https://images.unsplash.com/photo-1581092334600-5f8f62b699b0" alt="Seminar AI 2025" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Seminar Teknologi AI 2025</h3>
        <p class="text-sm text-gray-500 mt-1">20 Juli 2025</p>
        <p class="text-sm text-gray-500 mt-1">Jakarta Convention Center</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 250.000</p>
        <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Seminar Teknologi AI 2025'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- 2 -->
    <div class="category-card bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="relative aspect-square bg-gray-200">
        <img src="https://images.unsplash.com/photo-1581091870622-2c9e8f2a2a7d" alt="Kesehatan Mental Mahasiswa" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Seminar Kesehatan Mental Mahasiswa</h3>
        <p class="text-sm text-gray-500 mt-1">5 Agustus 2025</p>
        <p class="text-sm text-gray-500 mt-1">Universitas Indonesia</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 120.000</p>
        <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Seminar Kesehatan Mental Mahasiswa'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- 3 -->
    <div class="category-card bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="relative aspect-square bg-gray-200">
        <img src="https://images.unsplash.com/photo-1605296867304-46d5465a13f1" alt="Kepemimpinan Muda" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Seminar Kepemimpinan Muda</h3>
        <p class="text-sm text-gray-500 mt-1">10 September 2025</p>
        <p class="text-sm text-gray-500 mt-1">Gedung Serbaguna Bandung</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 100.000</p>
        <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Seminar Kepemimpinan Muda'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- 4 -->
    <div class="category-card bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="relative aspect-square bg-gray-200">
        <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095" alt="Seminar Ekonomi Digital" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Seminar Ekonomi Digital</h3>
        <p class="text-sm text-gray-500 mt-1">1 Oktober 2025</p>
        <p class="text-sm text-gray-500 mt-1">Balai Kartini Jakarta</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 300.000</p>
        <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Seminar Ekonomi Digital'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- 5 -->
    <div class="category-card bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="relative aspect-square bg-gray-200">
        <img src="../../image/seminar_hukumcyber.png" alt="Seminar Hukum Cyber" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Seminar Hukum Cyber</h3>
        <p class="text-sm text-gray-500 mt-1">15 November 2025</p>
        <p class="text-sm text-gray-500 mt-1">Hotel Mulia Jakarta</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 400.000</p>
        <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Seminar Hukum Cyber'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- dst... -->
    <!-- kamu tinggal lanjutkan pola ini ke seluruh event lain -->

  </div>
</main>

<?php include '../../views/layout/footer.php'; ?>
