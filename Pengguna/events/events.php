<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eventify - Platform Pemesanan Tiket Event Terpercaya</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css"
    />
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: { primary: "#8A2BE2", secondary: "#FF4081" },
            borderRadius: {
              none: "0px",
              sm: "4px",
              DEFAULT: "8px",
              md: "12px",
              lg: "16px",
              xl: "20px",
              "2xl": "24px",
              "3xl": "32px",
              full: "9999px",
              button: "8px",
            },
          },
        },
      };
    </script>
    <style>
      :where([class^="ri-"])::before { content: "\f3c2"; }
    </style>
  </head>
  <body class="bg-gray-50 min-h-screen">
    <!-- Header -->
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
  <header class="fixed w-full z-50 margin">
    <nav class="gradient-bg text-white shadow-lg">
      <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <!-- Logo + Menu -->
        <div class="flex items-center">
          <a href="#" class="text-2xl logo text-white">Eventify</a>
          <div class="hidden md:flex ml-10 space-x-6">
            <a href="#" class="font-medium hover:text-gray-200 transition">Beranda</a>
            <a href="#" class="font-medium hover:text-gray-200 transition">Events</a>
            <a href="#" class="font-medium hover:text-gray-200 transition">Tiket Saya</a>
            <a href="#" class="font-medium hover:text-gray-200 transition">Tentang Kami</a>
          </div>
        </div>

        <!-- Search + Buttons -->
        <div class="hidden md:flex items-center space-x-4">
          <div class="relative">
            <input type="text" placeholder="Cari event..." class="py-2 pl-4 pr-10 rounded-full text-gray-800 w-64 focus:outline-none focus:ring-2 focus:ring-white" />
            <div class="absolute right-3 top-2.5 text-gray-500">
              <i class="ri-search-line text-lg"></i>
            </div>
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


    <!-- Event Categories -->
    <section class="pt-24 py-12 bg-white">

      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-800">Kategori Event</h2>
          <p class="text-gray-600 mt-2">
            Temukan event sesuai dengan minat Anda
          </p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
          <a href="#" class="group">
            <div
              class="bg-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition"
            >
              <div
                class="h-40 bg-cover bg-center"
                style="background-image: url('https://readdy.ai/api/search-image?query=A%20professional%20music%20concert%20with%20vibrant%20stage%20lighting%2C%20enthusiastic%20crowd%2C%20and%20performers%20on%20stage%2C%20modern%20aesthetic%2C%20high-quality%20professional%20photograph%20with%20clean%20minimalist%20background&width=400&height=300&seq=2&orientation=landscape');"
              ></div>
              <div class="p-4 text-center">
                <h3
                  class="font-semibold text-gray-800 group-hover:text-primary transition"
                >
                  Musik & Konser
                </h3>
                <p class="text-sm text-gray-600 mt-1">120+ Event</p>
              </div>
            </div>
          </a>
          <a href="#" class="group">
            <div
              class="bg-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition"
            >
              <div
                class="h-40 bg-cover bg-center"
                style="background-image: url('https://readdy.ai/api/search-image?query=A%20professional%20business%20seminar%20or%20workshop%20with%20engaged%20attendees%20in%20a%20modern%20conference%20room%2C%20speakers%20presenting%20on%20stage%2C%20professional%20setting%2C%20high-quality%20professional%20photograph%20with%20clean%20minimalist%20background&width=400&height=300&seq=3&orientation=landscape');"
              ></div>
              <div class="p-4 text-center">
                <h3
                  class="font-semibold text-gray-800 group-hover:text-primary transition"
                >
                  Seminar & Workshop
                </h3>
                <p class="text-sm text-gray-600 mt-1">85+ Event</p>
              </div>
            </div>
          </a>
          <a href="#" class="group">
            <div
              class="bg-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition"
            >
              <div
                class="h-40 bg-cover bg-center"
                style="background-image: url('https://readdy.ai/api/search-image?query=A%20professional%20art%20exhibition%20or%20gallery%20showing%20with%20visitors%20viewing%20paintings%20and%20sculptures%2C%20elegant%20setting%2C%20high-quality%20professional%20photograph%20with%20clean%20minimalist%20background&width=400&height=300&seq=4&orientation=landscape');"
              ></div>
              <div class="p-4 text-center">
                <h3
                  class="font-semibold text-gray-800 group-hover:text-primary transition"
                >
                  Pameran & Festival
                </h3>
                <p class="text-sm text-gray-600 mt-1">64+ Event</p>
              </div>
            </div>
          </a>
          <a href="#" class="group">
            <div
              class="bg-gray-100 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition"
            >
              <div
                class="h-40 bg-cover bg-center"
                style="background-image: url('https://readdy.ai/api/search-image?query=A%20professional%20sporting%20event%20with%20athletes%20competing%20and%20spectators%20cheering%2C%20dynamic%20action%2C%20high-quality%20professional%20photograph%20with%20clean%20minimalist%20background&width=400&height=300&seq=5&orientation=landscape');"
              ></div>
              <div class="p-4 text-center">
                <h3
                  class="font-semibold text-gray-800 group-hover:text-primary transition"
                >
                  Olahraga
                </h3>
                <p class="text-sm text-gray-600 mt-1">42+ Event</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </section>
    <!-- Featured Events -->
    <section class="py-12 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
          <div>
            <h2 class="text-3xl font-bold text-gray-800">Event Terpopuler</h2>
            <p class="text-gray-600 mt-2">Event yang paling banyak diminati</p>
          </div>
          <a
            href="#"
            class="text-primary font-medium hover:underline flex items-center"
          >
            Lihat Semua
            <div class="w-5 h-5 ml-1 flex items-center justify-center">
              <i class="ri-arrow-right-line"></i>
            </div>
          </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div
            class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition"
          >
            <div
              class="h-48 bg-cover bg-center"
              style="background-image: url('https://readdy.ai/api/search-image?query=A%20spectacular%20music%20festival%20with%20famous%20DJ%20performing%20on%20stage%2C%20colorful%20light%20show%2C%20enthusiastic%20crowd%2C%20professional%20photography%20with%20clean%20minimalist%20background&width=600&height=400&seq=6&orientation=landscape');"
            ></div>
            <div class="p-6">
              <div class="flex justify-between items-start mb-4">
                <div>
                  <span
                    class="inline-block px-3 py-1 bg-primary/10 text-primary text-xs font-medium rounded-full mb-2"
                    >Musik</span
                  >
                  <h3 class="font-bold text-xl text-gray-800">
                    Jakarta Electronic Festival 2025
                  </h3>
                </div>
                <span
                  class="bg-red-100 text-red-600 px-2 py-1 rounded text-xs font-medium"
                  >Terbatas</span
                >
              </div>
              <div class="flex items-center text-gray-600 mb-4">
                <div class="w-4 h-4 flex items-center justify-center mr-2">
                  <i class="ri-calendar-line"></i>
                </div>
                <span>12 - 14 Juli 2025</span>
              </div>
              <div class="flex items-center text-gray-600 mb-6">
                <div class="w-4 h-4 flex items-center justify-center mr-2">
                  <i class="ri-map-pin-line"></i>
                </div>
                <span>Senayan, Jakarta</span>
              </div>
              <div class="flex justify-between items-center">
                <div>
                  <p class="text-sm text-gray-500">Mulai dari</p>
                  <p class="text-lg font-bold text-gray-800">Rp 850.000</p>
                </div>
                <a
                  href="#"
                  class="bg-primary text-white px-4 py-2 rounded-button font-medium hover:bg-primary/90 transition whitespace-nowrap"
                  >Beli Tiket</a
                >
              </div>
            </div>
          </div>
          <div
            class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition"
          >
            <div
              class="h-48 bg-cover bg-center"
              style="background-image: url('https://readdy.ai/api/search-image?query=A%20professional%20business%20conference%20with%20keynote%20speaker%20on%20stage%2C%20attentive%20audience%20in%20a%20modern%20venue%2C%20professional%20lighting%2C%20high-quality%20professional%20photograph%20with%20clean%20minimalist%20background&width=600&height=400&seq=7&orientation=landscape');"
            ></div>
            <div class="p-6">
              <div class="flex justify-between items-start mb-4">
                <div>
                  <span
                    class="inline-block px-3 py-1 bg-blue-100 text-blue-600 text-xs font-medium rounded-full mb-2"
                    >Seminar</span
                  >
                  <h3 class="font-bold text-xl text-gray-800">
                    Indonesia Digital Summit 2025
                  </h3>
                </div>
                <span
                  class="bg-green-100 text-green-600 px-2 py-1 rounded text-xs font-medium"
                  >Tersedia</span
                >
              </div>
              <div class="flex items-center text-gray-600 mb-4">
                <div class="w-4 h-4 flex items-center justify-center mr-2">
                  <i class="ri-calendar-line"></i>
                </div>
                <span>25 - 26 Juni 2025</span>
              </div>
              <div class="flex items-center text-gray-600 mb-6">
                <div class="w-4 h-4 flex items-center justify-center mr-2">
                  <i class="ri-map-pin-line"></i>
                </div>
                <span>JCC Senayan, Jakarta</span>
              </div>
              <div class="flex justify-between items-center">
                <div>
                  <p class="text-sm text-gray-500">Mulai dari</p>
                  <p class="text-lg font-bold text-gray-800">Rp 1.250.000</p>
                </div>
                <a
                  href="#"
                  class="bg-primary text-white px-4 py-2 rounded-button font-medium hover:bg-primary/90 transition whitespace-nowrap"
                  >Beli Tiket</a
                >
              </div>
            </div>
          </div>
          <div
            class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition"
          >
            <div
              class="h-48 bg-cover bg-center"
              style="background-image: url('https://readdy.ai/api/search-image?query=A%20vibrant%20art%20exhibition%20with%20modern%20installations%2C%20visitors%20viewing%20artwork%20in%20a%20gallery%20space%2C%20elegant%20setting%2C%20high-quality%20professional%20photograph%20with%20clean%20minimalist%20background&width=600&height=400&seq=8&orientation=landscape');"
            ></div>
            <div class="p-6">
              <div class="flex justify-between items-start mb-4">
                <div>
                  <span
                    class="inline-block px-3 py-1 bg-amber-100 text-amber-600 text-xs font-medium rounded-full mb-2"
                    >Pameran</span
                  >
                  <h3 class="font-bold text-xl text-gray-800">
                    ArtJakarta Contemporary 2025
                  </h3>
                </div>
                <span
                  class="bg-green-100 text-green-600 px-2 py-1 rounded text-xs font-medium"
                  >Tersedia</span
                >
              </div>
              <div class="flex items-center text-gray-600 mb-4">
                <div class="w-4 h-4 flex items-center justify-center mr-2">
                  <i class="ri-calendar-line"></i>
                </div>
                <span>18 - 21 Agustus 2025</span>
              </div>
              <div class="flex items-center text-gray-600 mb-6">
                <div class="w-4 h-4 flex items-center justify-center mr-2">
                  <i class="ri-map-pin-line"></i>
                </div>
                <span>ICE BSD City, Tangerang</span>
              </div>
              <div class="flex justify-between items-center">
                <div>
                  <p class="text-sm text-gray-500">Mulai dari</p>
                  <p class="text-lg font-bold text-gray-800">Rp 150.000</p>
                </div>
                <a
                  href="pembayaran/pembayaran.php"
                  class="bg-primary text-white px-4 py-2 rounded-button font-medium hover:bg-primary/90 transition whitespace-nowrap"
                  >Beli Tiket</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Upcoming Events -->
    <section class="py-12 bg-white">
      <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
          <div>
            <h2 class="text-3xl font-bold text-gray-800">Event Mendatang</h2>
            <p class="text-gray-600 mt-2">
              Jangan lewatkan event menarik berikutnya
            </p>
          </div>
          <a
            href="#"
            class="text-primary font-medium hover:underline flex items-center"
          >
            Lihat Semua
            <div class="w-5 h-5 ml-1 flex items-center justify-center">
              <i class="ri-arrow-right-line"></i>
            </div>
          </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
          <div
            class="bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition"
          >
            <div
              class="h-40 bg-cover bg-center"
              style="background-image: url('https://readdy.ai/api/search-image?query=A%20professional%20theater%20performance%20with%20actors%20on%20stage%2C%20dramatic%20lighting%2C%20elegant%20theater%20setting%2C%20high-quality%20professional%20photograph%20with%20clean%20minimalist%20background&width=400&height=300&seq=9&orientation=landscape');"
            ></div>
            <div class="p-4">
              <span
                class="inline-block px-2 py-1 bg-purple-100 text-purple-600 text-xs font-medium rounded-full mb-2"
                >Teater</span
              >
              <h3 class="font-bold text-gray-800 mb-2">
                Teater Koma: Mahakarya
              </h3>
              <div class="flex items-center text-gray-600 text-sm mb-2">
                <div class="w-4 h-4 flex items-center justify-center mr-1">
                  <i class="ri-calendar-line"></i>
                </div>
                <span>20 Juni 2025</span>
              </div>
              <div class="flex items-center text-gray-600 text-sm mb-3">
                <div class="w-4 h-4 flex items-center justify-center mr-1">
                  <i class="ri-map-pin-line"></i>
                </div>
                <span>Graha Bhakti Budaya, TIM</span>
              </div>
              <div class="flex justify-between items-center">
                <p class="text-sm font-bold text-gray-800">Rp 350.000</p>
                <a
                  href="#"
                  class="text-primary text-sm font-medium hover:underline"
                  >Detail</a
                >
              </div>
            </div>
          </div>
          <div
            class="bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition"
          >
            <div
              class="h-40 bg-cover bg-center"
              style="background-image: url('https://readdy.ai/api/search-image?query=A%20professional%20workshop%20or%20masterclass%20with%20instructor%20teaching%20participants%20in%20a%20modern%20studio%20space%2C%20engaged%20learners%2C%20high-quality%20professional%20photograph%20with%20clean%20minimalist%20background&width=400&height=300&seq=10&orientation=landscape');"
            ></div>
            <div class="p-4">
              <span
                class="inline-block px-2 py-1 bg-blue-100 text-blue-600 text-xs font-medium rounded-full mb-2"
                >Workshop</span
              >
              <h3 class="font-bold text-gray-800 mb-2">
                UX Design Masterclass
              </h3>
              <div class="flex items-center text-gray-600 text-sm mb-2">
                <div class="w-4 h-4 flex items-center justify-center mr-1">
                  <i class="ri-calendar-line"></i>
                </div>
                <span>28 Juni 2025</span>
              </div>
              <div class="flex items-center text-gray-600 text-sm mb-3">
                <div class="w-4 h-4 flex items-center justify-center mr-1">
                  <i class="ri-map-pin-line"></i>
                </div>
                <span>CoHive Plaza Indonesia</span>
              </div>
              <div class="flex justify-between items-center">
                <p class="text-sm font-bold text-gray-800">Rp 750.000</p>
                <a
                  href="#"
                  class="text-primary text-sm font-medium hover:underline"
                  >Detail</a
                >
              </div>
            </div>
          </div>
          <div
            class="bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition"
          >
            <div
              class="h-40 bg-cover bg-center"
              style="background-image: url('https://readdy.ai/api/search-image?query=A%20professional%20food%20festival%20with%20various%20food%20stalls%2C%20chefs%20preparing%20dishes%2C%20visitors%20enjoying%20culinary%20delights%2C%20vibrant%20atmosphere%2C%20high-quality%20professional%20photograph%20with%20clean%20minimalist%20background&width=400&height=300&seq=11&orientation=landscape');"
            ></div>
            <div class="p-4">
              <span
                class="inline-block px-2 py-1 bg-red-100 text-red-600 text-xs font-medium rounded-full mb-2"
                >Kuliner</span
              >
              <h3 class="font-bold text-gray-800 mb-2">
                Jakarta Culinary Festival
              </h3>
              <div class="flex items-center text-gray-600 text-sm mb-2">
                <div class="w-4 h-4 flex items-center justify-center mr-1">
                  <i class="ri-calendar-line"></i>
                </div>
                <span>5-7 Juli 2025</span>
              </div>
              <div class="flex items-center text-gray-600 text-sm mb-3">
                <div class="w-4 h-4 flex items-center justify-center mr-1">
                  <i class="ri-map-pin-line"></i>
                </div>
                <span>Senayan City, Jakarta</span>
              </div>
              <div class="flex justify-between items-center">
                <p class="text-sm font-bold text-gray-800">Rp 125.000</p>
                <a
                  href="#"
                  class="text-primary text-sm font-medium hover:underline"
                  >Detail</a
                >
              </div>
            </div>
          </div>
          <div
            class="bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition"
          >
            <div
              class="h-40 bg-cover bg-center"
              style="background-image: url('https://readdy.ai/api/search-image?query=A%20professional%20sporting%20event%20with%20athletes%20competing%20in%20a%20stadium%2C%20spectators%20cheering%2C%20dynamic%20action%2C%20high-quality%20professional%20photograph%20with%20clean%20minimalist%20background&width=400&height=300&seq=12&orientation=landscape');"
            ></div>
            <div class="p-4">
              <span
                class="inline-block px-2 py-1 bg-green-100 text-green-600 text-xs font-medium rounded-full mb-2"
                >Olahraga</span
              >
              <h3 class="font-bold text-gray-800 mb-2">
                Jakarta Marathon 2025
              </h3>
              <div class="flex items-center text-gray-600 text-sm mb-2">
                <div class="w-4 h-4 flex items-center justify-center mr-1">
                  <i class="ri-calendar-line"></i>
                </div>
                <span>15 Juli 2025</span>
              </div>
              <div class="flex items-center text-gray-600 text-sm mb-3">
                <div class="w-4 h-4 flex items-center justify-center mr-1">
                  <i class="ri-map-pin-line"></i>
                </div>
                <span>Monas, Jakarta Pusat</span>
              </div>
              <div class="flex justify-between items-center">
                <p class="text-sm font-bold text-gray-800">Rp 450.000</p>
                <a
                  href="#"
                  class="text-primary text-sm font-medium hover:underline"
                  >Detail</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-12 pb-6 text-center">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8 justify-items-center">
      <!-- Kolom 1 -->
      <div>
        <a href="#" class="text-2xl font-['Pacifico'] text-white mb-4 inline-block">Eventify</a>
        <p class="text-gray-400 mb-4 max-w-xs">
          Platform pemesanan tiket event terpercaya di Indonesia. Temukan dan beli tiket event dengan mudah dan aman.
        </p>
        <div class="flex justify-center space-x-4">
          <a href="#" class="w-8 h-8 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary">
            <i class="ri-facebook-fill"></i>
          </a>
          <a href="#" class="w-8 h-8 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary">
            <i class="ri-twitter-x-fill"></i>
          </a>
          <a href="#" class="w-8 h-8 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary">
            <i class="ri-instagram-fill"></i>
          </a>
          <a href="#" class="w-8 h-8 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary">
            <i class="ri-linkedin-fill"></i>
          </a>
        </div>
      </div>

      <!-- Kolom 2 -->
      <div>
        <h4 class="text-lg font-semibold mb-4">Kontak</h4>
        <ul class="space-y-3 text-gray-400">
          <li><i class="ri-map-pin-line mr-2"></i>Jl. Jendral Sudirman No.123</li>
          <li><i class="ri-phone-line mr-2"></i>+62 21 1234 5678</li>
          <li><i class="ri-mail-line mr-2"></i>info@eventify.id</li>
        </ul>
      </div>

      <!-- Kolom 3 -->
      <div>
        <h4 class="text-lg font-semibold mb-4">Metode Pembayaran</h4>
        <span class="text-gray-400">QRIS</span>
      </div>
    </div>

    <!-- Bottom Footer -->
    <div class="border-t border-gray-800 pt-6">
      <p class="text-gray-500 text-sm mb-2">© 2025 Eventify. Hak Cipta Dilindungi.</p>
      <div class="flex justify-center space-x-4 text-sm">
        <a href="#" class="text-gray-500 hover:text-white">Syarat & Ketentuan</a>
        <a href="#" class="text-gray-500 hover:text-white">Kebijakan Privasi</a>
      </div>
    </div>
  </div>
</footer>



    <script id="searchFunctionality">
      document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.querySelector(
          'input[placeholder="Cari event..."]',
        );
        const searchButton = searchInput.nextElementSibling;
        searchButton.addEventListener("click", function () {
          const searchTerm = searchInput.value.trim();
          if (searchTerm) {
            alert(`Mencari event: ${searchTerm}`);
            searchInput.value = "";
          }
        });
        searchInput.addEventListener("keypress", function (e) {
          if (e.key === "Enter") {
            const searchTerm = searchInput.value.trim();
            if (searchTerm) {
              alert(`Mencari event: ${searchTerm}`);
              searchInput.value = "";
            }
          }
        });
      });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
    <script id="bookingSystem">
      document.addEventListener("DOMContentLoaded", function () {
        const buyButtons = document.querySelectorAll('a[href="#"].bg-primary');
        buyButtons.forEach((button) => {
          button.addEventListener("click", function (e) {
            e.preventDefault();
            const eventTitle =
              this.closest(".bg-white").querySelector("h3").textContent;
            const eventPrice = this.closest(".bg-white").querySelector(
              ".text-lg.font-bold, .text-sm.font-bold",
            ).textContent;
            localStorage.setItem(
              "selectedEvent",
              JSON.stringify({
                title: eventTitle,
                price: eventPrice,
              }),
            );
            window.location.href = "booking.html";
          });
        });
      });
    </script>
  </body>
</html>
