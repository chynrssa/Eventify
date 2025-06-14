<?php include '../../views/layout/header.php'; ?>

<!-- Main Content -->
<main class="flex-grow container mx-auto px-4 py-6">
  <div class="mb-6">
    <h1 class="text-2xl mt-16 font-bold text-gray-800">Event Konser</h1>
    <p class="text-gray-600">Temukan event konser favoritmu dan pesan tiketnya sekarang!</p>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    
    <!-- Event 1 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="https://images.unsplash.com/photo-1507874457470-272b3c8d8ee2" alt="Konser Musik Jazz" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Konser Musik Jazz</h3>
        <p class="text-gray-600 text-sm">10 Juli 2025 | Jakarta Convention Center</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 350.000</p>
       <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Konser Musik Jazz Malam Minggu'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- Event 2 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="../../image/FestivalMusikIndieNusantara.png" alt="Festival Musik Indie Nusantara" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Festival Musik Indie Nusantara</h3>
        <p class="text-gray-600 text-sm">20 Juli 2025 | Lapangan Gasibu Bandung</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 400.000</p>
        <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Festival Musik Indie Nusantara'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- Event 3 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30" alt="Live Concert K-Pop Stars" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Live Concert K-Pop Stars</h3>
        <p class="text-gray-600 text-sm">5 Agustus 2025 | GBK Jakarta</p>
          <p class="text-sm text-blue-600 font-bold mt-1">Rp 750.000</p>
       <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Live Concert K-Pop Stars 2025'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- Event 4 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="https://www.visions.de/wp-content/uploads/Kraftklub-Nils-Lucas-9482-1536x1025.jpg" alt="Rock Festival Indonesia" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Rock Festival Indonesia</h3>
        <p class="text-gray-600 text-sm">15 September 2025 | Stadion Manahan Solo</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 450.000</p>
        <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Festival Musik Rock & Metal'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

    <!-- Event 5 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img src="https://imgcdn.espos.id/@espos/images/2023/12/konser-pemilu-wonogiri.jpg?quality=60" alt="Konser Musik Dangdut" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="font-bold text-lg text-gray-800">Konser Musik Dangdut</h3>
        <p class="text-gray-600 text-sm">10 Oktober 2025 | Alun-Alun Kota Malang</p>
        <p class="text-sm text-blue-600 font-bold mt-1">Rp 250.000</p>
       <a href="../pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Konser Dangdut Malam Spektakuler'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
      </div>
    </div>

  </div>
</main>

<?php include '../../views/layout/footer.php'; ?>
