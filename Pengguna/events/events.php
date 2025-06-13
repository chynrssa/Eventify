<?php include '../../views/layout/header.php'; ?>

<!-- Main Content -->
<main class="flex-grow container mx-auto px-4 py-6">
  <div class="mb-6">
    <h1 class="text-2xl mt-16 font-bold text-gray-800">Kategori Event</h1>
    <p class="text-gray-600">Temukan event favoritmu dan pesan tiketnya sekarang!</p>
  </div>

  <!-- Search Bar -->
  <div class="flex flex-col md:flex-row gap-4 mb-6">
    <div class="relative flex-grow">
      <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
        <i class="ri-search-line text-gray-400"></i>
      </div>
      <input type="text" id="searchInput" placeholder="Cari Kategori Event" class="search-input w-full pl-10 pr-4 py-3 border border-gray-300 rounded-md focus:outline-none text-sm" onkeyup="filterCategories()"/>
    </div>
  </div>

  <!-- Kategori Event -->
  <div id="categoryGrid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
    <!-- Seminar -->
    <div class="category-card bg-white rounded-lg shadow-sm overflow-hidden" data-category="Seminar" onclick="redirectToEventPage('Seminar')">
      <div class="relative aspect-square bg-gray-200">
        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d" alt="Seminar" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Seminar</h3>
        <p class="text-sm text-gray-500 mt-1">Lihat semua event</p>
      </div>
    </div>

    <!-- Konser -->
    <div class="category-card bg-white rounded-lg shadow-sm overflow-hidden" data-category="Konser" onclick="redirectToEventPage('Konser')">
      <div class="relative aspect-square bg-gray-200">
        <img src="https://images.unsplash.com/photo-1507874457470-272b3c8d8ee2" alt="Konser" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Konser</h3>
        <p class="text-sm text-gray-500 mt-1">Lihat semua event</p>
      </div>
    </div>

    <!-- Workshop -->
    <div class="category-card bg-white rounded-lg shadow-sm overflow-hidden" data-category="Workshop" onclick="redirectToEventPage('Workshop')">
      <div class="relative aspect-square bg-gray-200">
        <img src="../../image/workshop.png" alt="Workshop" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Workshop</h3>
        <p class="text-sm text-gray-500 mt-1">Lihat semua event</p>
      </div>
    </div>

    <!-- Pameran -->
    <div class="category-card bg-white rounded-lg shadow-sm overflow-hidden" data-category="Pameran" onclick="redirectToEventPage('Pameran')">
      <div class="relative aspect-square bg-gray-200">
        <img src="../../image/pameran.png" alt="Pameran" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Pameran</h3>
        <p class="text-sm text-gray-500 mt-1">Lihat semua event</p>
      </div>
    </div>

    <!-- Olahraga -->
    <div class="category-card bg-white rounded-lg shadow-sm overflow-hidden" data-category="Olahraga" onclick="redirectToEventPage('Olahraga')">
      <div class="relative aspect-square bg-gray-200">
        <img src="../../image/eventslain.png" alt="Olahraga" class="w-full h-full object-cover"/>
      </div>
      <div class="p-4 text-center">
        <h3 class="font-bold text-gray-800">Olahraga</h3>
        <p class="text-sm text-gray-500 mt-1">Lihat semua event</p>
      </div>
    </div>
  </div>
</main>

<script>
  function redirectToEventPage(categoryName) {
    // Sesuaikan dengan nama file masing-masing kategori
    const fileMap = {
      'Seminar': 'events_Seminar.php',
      'Konser': 'events_Konser.php',
      'Workshop': 'events_Workshop.php',
      'Pameran': 'events_Pameran.php',
      'Olahraga': 'events_olahraga.php'
    };

    const fileName = fileMap[categoryName];
    if (fileName) {
      window.location.href = fileName;
    }
  }

  function filterCategories() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const categories = document.querySelectorAll('#categoryGrid .category-card');
    
    categories.forEach(card => {
      const category = card.getAttribute('data-category').toLowerCase();
      if (category.includes(input)) {
        card.style.display = 'block';
      } else {
        card.style.display = 'none';
      }
    });
  }
</script>

<?php include '../../views/layout/footer.php'; ?>
