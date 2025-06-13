<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Eventify - Temukan & Beli Tiket Event</title>
<script src="https://cdn.tailwindcss.com/3.4.16"></script>
<script>tailwind.config={theme:{extend:{colors:{primary:'#6200EA',secondary:'#FF1744'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500&family=Montserrat:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
 <link rel="stylesheet" href="index.css" />

</head>
<body class="bg-gray-50">
<!-- Header & Navigation -->
<header class="fixed w-full z-50">
<nav class="gradient-bg text-white shadow-lg">
<div class="container mx-auto px-4 py-3 flex items-center justify-between">
<div class="flex items-center">
<a href="../../body/index.php" class="text-2xl font-['Pacifico'] text-white">Eventify</a>
<div class="hidden md:flex ml-10 space-x-6">
<a href="../../body/index.php" class="font-medium hover:text-gray-200 transition">Beranda</a>
<a href="../Pengguna/events/events.php" class="font-medium hover:text-gray-200 transition">Kategori Events</a>
<a href="#" class="font-medium hover:text-gray-200 transition">Tiket Saya</a>

</div>
</div>
<div class="hidden md:flex items-center space-x-4">
<div class="relative">

<div class="absolute right-3 top-2.5 w-5 h-5 flex items-center justify-center text-gray-500">
<i class="ri-search-line"></i>
</div>
</div>
<button class="bg-white text-primary font-semibold py-2 px-6 rounded-button whitespace-nowrap hover:bg-gray-100 transition">Masuk</button>
<button class="bg-secondary text-white font-semibold py-2 px-6 rounded-button whitespace-nowrap hover:bg-opacity-90 transition">Daftar</button>
</div>
<div class="md:hidden flex items-center">
<button id="mobile-menu-button" class="text-white">
<i class="ri-menu-line text-2xl"></i>
</button>
</div>
</div>
<!-- Mobile Menu -->
<div id="mobile-menu" class="md:hidden hidden bg-white text-gray-800 shadow-lg absolute w-full">
<div class="container mx-auto px-4 py-3 flex flex-col space-y-3">
<a href="index.html" class="font-medium py-2 hover:text-primary transition">Beranda</a>
<a href="../Pengguna/events/events.php" class="font-medium py-2 hover:text-primary transition">Events</a>
<a href="#" class="font-medium py-2 hover:text-primary transition">Tiket Saya</a>
<a href="#" class="font-medium py-2 hover:text-primary transition">Tentang Kami</a>
<div class="relative my-2">
<input type="text" placeholder="Cari event..." class="w-full py-2 px-4 pr-10 rounded-full text-gray-800 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary">
<div class="absolute right-3 top-2.5 w-5 h-5 flex items-center justify-center text-gray-500">
<i class="ri-search-line"></i>
</div>
</div>
<div class="flex space-x-3 py-2">
<button class="bg-primary text-white font-semibold py-2 px-6 rounded-button whitespace-nowrap flex-1 hover:bg-opacity-90 transition">Masuk</button>
<button class="bg-secondary text-white font-semibold py-2 px-6 rounded-button whitespace-nowrap flex-1 hover:bg-opacity-90 transition">Daftar</button>
</div>
</div>
</div>
</nav>
</header>
<!-- Hero Section -->
<section class="pt-24 relative">
<div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://readdy.ai/api/search-image?query=A%20vibrant%20music%20concert%20scene%20with%20colorful%20stage%20lights%2C%20a%20diverse%20crowd%20with%20raised%20hands%2C%20and%20performers%20on%20stage.%20The%20image%20has%20a%20dark%20overlay%20that%20allows%20text%20to%20be%20clearly%20visible%20on%20top.%20The%20scene%20captures%20the%20excitement%20and%20energy%20of%20live%20events%20with%20professional%20lighting%20and%20atmosphere.&width=1920&height=1080&seq=hero1&orientation=landscape');"></div>
<div class="absolute inset-0 bg-black bg-opacity-60"></div>
<div class="container mx-auto px-4 py-24 relative z-10">
<div class="max-w-3xl mx-auto text-center text-white">
<h1 class="text-4xl md:text-6xl font-bold mb-4">Temukan Event Luar Biasa</h1>
<p class="text-xl md:text-2xl mb-8">Pesan tiket untuk konser, seminar, workshop & banyak lagi</p>
<div class="bg-white p-4 rounded-lg shadow-lg">
<div class="flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-3">
<div class="flex-1">
<div class="relative">
<div class="absolute left-3 top-3 w-5 h-5 flex items-center justify-center text-gray-500">
<i class="ri-search-line"></i>
</div>
<input type="text" placeholder="Cari event..." class="w-full py-3 pl-10 pr-3 rounded text-gray-800 border-none focus:outline-none focus:ring-2 focus:ring-primary">
</div>
</div>
<div class="flex-1">
<div class="relative">
<div class="absolute left-3 top-3 w-5 h-5 flex items-center justify-center text-gray-500">
<i class="ri-map-pin-line"></i>
</div>
<input type="text" placeholder="Lokasi" class="w-full py-3 pl-10 pr-3 rounded text-gray-800 border-none focus:outline-none focus:ring-2 focus:ring-primary">
</div>
</div>
<div class="flex-1">
<div class="relative">
<div class="absolute left-3 top-3 w-5 h-5 flex items-center justify-center text-gray-500">
<i class="ri-calendar-line"></i>
</div>
<input type="text" placeholder="Tanggal" class="w-full py-3 pl-10 pr-3 rounded text-gray-800 border-none focus:outline-none focus:ring-2 focus:ring-primary">
</div>
</div>
<button class="bg-primary text-white font-semibold py-3 px-8 rounded-button whitespace-nowrap hover:bg-opacity-90 transition">Cari</button>
</div>
</div>
<button class="mt-8 bg-secondary text-white font-semibold py-3 px-8 rounded-button whitespace-nowrap hover:bg-opacity-90 transition text-lg">Jelajahi Events</button>
</div>
</div>
</section>
<!-- Popular Categories -->
<section class="py-16 bg-white">
<div class="container mx-auto px-4">
<h2 class="text-3xl font-bold text-center mb-12">Kategori Populer</h2>
<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-6">
<a href="#" class="category-item flex flex-col items-center transition duration-300">
<div class="w-20 h-20 rounded-full bg-purple-100 flex items-center justify-center mb-3">
<i class="ri-music-line text-3xl text-primary"></i>
</div>
<span class="font-medium">Konser</span>
</a>
<a href="#" class="category-item flex flex-col items-center transition duration-300">
<div class="w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center mb-3">
<i class="ri-presentation-line text-3xl text-blue-600"></i>
</div>
<span class="font-medium">Seminar</span>
</a>
<a href="#" class="category-item flex flex-col items-center transition duration-300">
<div class="w-20 h-20 rounded-full bg-green-100 flex items-center justify-center mb-3">
<i class="ri-tools-line text-3xl text-green-600"></i>
</div>
<span class="font-medium">Workshop</span>
</a>
<a href="#" class="category-item flex flex-col items-center transition duration-300">
<div class="w-20 h-20 rounded-full bg-yellow-100 flex items-center justify-center mb-3">
<i class="ri-gallery-line text-3xl text-yellow-600"></i>
</div>
<span class="font-medium">Pameran</span>
</a>
<a href="#" class="category-item flex flex-col items-center transition duration-300">
<div class="w-20 h-20 rounded-full bg-red-100 flex items-center justify-center mb-3">
<i class="ri-basketball-line text-3xl text-red-600"></i>
</div>
<span class="font-medium">Olahraga</span>
</a>
<a href="#" class="category-item flex flex-col items-center transition duration-300">
<div class="w-20 h-20 rounded-full bg-pink-100 flex items-center justify-center mb-3">
<i class="ri-palette-line text-3xl text-pink-600"></i>
</div>
<span class="font-medium">Seni</span>
</a>
</div>
</div>
</section>
<!-- Featured Events Section -->
<section id="events" class="py-16 bg-gray-50">
<div class="container mx-auto px-4">
<div class="flex flex-col md:flex-row md:items-center justify-between mb-10">
<h2 class="text-3xl font-bold mb-4 md:mb-0">Event Unggulan</h2>
<div class="flex space-x-2 bg-white p-1 rounded-full shadow-sm">
<button class="bg-primary text-white py-2 px-6 rounded-full whitespace-nowrap">Semua</button>
<button class="text-gray-700 py-2 px-6 rounded-full whitespace-nowrap hover:bg-gray-100">Konser</button>
<button class="text-gray-700 py-2 px-6 rounded-full whitespace-nowrap hover:bg-gray-100">Seminar</button>
<button class="text-gray-700 py-2 px-6 rounded-full whitespace-nowrap hover:bg-gray-100">Workshop</button>
<button class="text-gray-700 py-2 px-6 rounded-full whitespace-nowrap hover:bg-gray-100">Pameran</button>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
<!-- Event Card 1 -->
<div class="event-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
<div class="relative h-48">
<img src="https://readdy.ai/api/search-image?query=A%20vibrant%20music%20concert%20with%20a%20popular%20band%20performing%20on%20stage%20with%20colorful%20lights%20and%20effects.%20The%20image%20shows%20a%20professional%20stage%20setup%20with%20a%20large%20audience%20enjoying%20the%20show.%20The%20lighting%20creates%20a%20dramatic%20atmosphere%20with%20blues%20and%20purples%20dominating%20the%20scene.&width=600&height=400&seq=event1&orientation=landscape" alt="Konser Musik" class="w-full h-full object-cover object-top">
<div class="absolute top-4 right-4 bg-primary text-white text-sm font-semibold py-1 px-3 rounded-full">Konser</div>
</div>
<div class="p-5">
<div class="flex items-center text-gray-500 text-sm mb-2">
<i class="ri-calendar-line mr-2"></i>
<span>9 Juni 2025 • 19:00 WIB</span>
</div>
<h3 class="text-xl font-bold mb-2">Dewa 19 Reunion Concert</h3>
<div class="flex items-center text-gray-500 text-sm mb-3">
<i class="ri-map-pin-line mr-2"></i>
<span>Gelora Bung Karno, Jakarta</span>
</div>
<div class="flex justify-between items-center">
<div class="text-primary font-bold">Rp 750.000</div>
<button class="bg-primary text-white py-2 px-4 rounded-button whitespace-nowrap hover:bg-opacity-90 transition">Beli Tiket</button>
</div>
</div>
</div>
<!-- Event Card 2 -->
<div class="event-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
<div class="relative h-48">
<img src="https://readdy.ai/api/search-image?query=A%20professional%20business%20seminar%20or%20conference%20with%20speakers%20on%20stage%20and%20audience%20in%20a%20modern%20conference%20hall.%20The%20setting%20shows%20a%20well-organized%20event%20with%20professional%20lighting%2C%20presentation%20screens%2C%20and%20attendees%20seated%20in%20rows.%20The%20atmosphere%20appears%20professional%20and%20engaging.&width=600&height=400&seq=event2&orientation=landscape" alt="Seminar Bisnis" class="w-full h-full object-cover object-top">
<div class="absolute top-4 right-4 bg-blue-600 text-white text-sm font-semibold py-1 px-3 rounded-full">Seminar</div>
</div>
<div class="p-5">
<div class="flex items-center text-gray-500 text-sm mb-2">
<i class="ri-calendar-line mr-2"></i>
<span>15 Juni 2025 • 09:00 WIB</span>
</div>
<h3 class="text-xl font-bold mb-2">Digital Marketing Masterclass</h3>
<div class="flex items-center text-gray-500 text-sm mb-3">
<i class="ri-map-pin-line mr-2"></i>
<span>Hotel Mulia, Surabaya</span>
</div>
<div class="flex justify-between items-center">
<div class="text-primary font-bold">Rp 350.000</div>
<button class="bg-primary text-white py-2 px-4 rounded-button whitespace-nowrap hover:bg-opacity-90 transition">Beli Tiket</button>
</div>
</div>
</div>
<!-- Event Card 3 -->
<div class="event-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
<div class="relative h-48">
<img src="https://readdy.ai/api/search-image?query=A%20hands-on%20cooking%20workshop%20in%20a%20modern%20kitchen%20setting%20with%20participants%20learning%20from%20a%20professional%20chef.%20The%20image%20shows%20people%20actively%20engaged%20in%20food%20preparation%20with%20ingredients%20and%20cooking%20equipment%20visible.%20The%20atmosphere%20appears%20collaborative%20and%20educational%20with%20good%20lighting.&width=600&height=400&seq=event3&orientation=landscape" alt="Workshop Memasak" class="w-full h-full object-cover object-top">
<div class="absolute top-4 right-4 bg-green-600 text-white text-sm font-semibold py-1 px-3 rounded-full">Workshop</div>
</div>
<div class="p-5">
<div class="flex items-center text-gray-500 text-sm mb-2">
<i class="ri-calendar-line mr-2"></i>
<span>20 Juni 2025 • 13:00 WIB</span>
</div>
<h3 class="text-xl font-bold mb-2">Workshop Kuliner Nusantara</h3>
<div class="flex items-center text-gray-500 text-sm mb-3">
<i class="ri-map-pin-line mr-2"></i>
<span>Pakuwon Mall, Surabaya</span>
</div>
<div class="flex justify-between items-center">
<div class="text-primary font-bold">Rp 250.000</div>
<button class="bg-primary text-white py-2 px-4 rounded-button whitespace-nowrap hover:bg-opacity-90 transition">Beli Tiket</button>
</div>
</div>
</div>
<!-- Event Card 4 -->
<div class="event-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
<div class="relative h-48">
<img src="https://readdy.ai/api/search-image?query=An%20art%20exhibition%20in%20a%20modern%20gallery%20space%20with%20paintings%20and%20sculptures%20displayed%20professionally.%20Visitors%20are%20viewing%20the%20artwork%20in%20a%20well-lit%2C%20spacious%20environment.%20The%20setting%20appears%20sophisticated%20with%20white%20walls%20and%20strategic%20lighting%20highlighting%20the%20art%20pieces.&width=600&height=400&seq=event4&orientation=landscape" alt="Pameran Seni" class="w-full h-full object-cover object-top">
<div class="absolute top-4 right-4 bg-yellow-600 text-white text-sm font-semibold py-1 px-3 rounded-full">Pameran</div>
</div>
<div class="p-5">
<div class="flex items-center text-gray-500 text-sm mb-2">
<i class="ri-calendar-line mr-2"></i>
<span>25 Juni 2025 • 10:00 WIB</span>
</div>
<h3 class="text-xl font-bold mb-2">Pameran Seni Rupa Kontemporer</h3>
<div class="flex items-center text-gray-500 text-sm mb-3">
<i class="ri-map-pin-line mr-2"></i>
<span>Museum Nasional, Jakarta</span>
</div>
<div class="flex justify-between items-center">
<div class="text-primary font-bold">Rp 100.000</div>
<button class="bg-primary text-white py-2 px-4 rounded-button whitespace-nowrap hover:bg-opacity-90 transition">Beli Tiket</button>
</div>
</div>
</div>
<!-- Event Card 5 -->
<div class="event-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
<div class="relative h-48">
<img src="https://readdy.ai/api/search-image?query=A%20lively%20music%20festival%20with%20multiple%20stages%2C%20colorful%20decorations%2C%20and%20a%20diverse%20crowd%20enjoying%20performances.%20The%20image%20shows%20an%20outdoor%20festival%20setting%20with%20professional%20stage%20setups%2C%20food%20vendors%2C%20and%20festival-goers%20having%20fun.%20The%20atmosphere%20appears%20festive%20with%20vibrant%20colors%20and%20lighting.&width=600&height=400&seq=event5&orientation=landscape" alt="Festival Musik" class="w-full h-full object-cover object-top">
<div class="absolute top-4 right-4 bg-primary text-white text-sm font-semibold py-1 px-3 rounded-full">Konser</div>
</div>
<div class="p-5">
<div class="flex items-center text-gray-500 text-sm mb-2">
<i class="ri-calendar-line mr-2"></i>
<span>30 Juni 2025 • 16:00 WIB</span>
</div>
<h3 class="text-xl font-bold mb-2">Java Jazz Festival 2025</h3>
<div class="flex items-center text-gray-500 text-sm mb-3">
<i class="ri-map-pin-line mr-2"></i>
<span>JIExpo Kemayoran, Jakarta</span>
</div>
<div class="flex justify-between items-center">
<div class="text-primary font-bold">Rp 850.000</div>
<button class="bg-primary text-white py-2 px-4 rounded-button whitespace-nowrap hover:bg-opacity-90 transition">Beli Tiket</button>
</div>
</div>
</div>
<!-- Event Card 6 -->
<div class="event-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
<div class="relative h-48">
<img src="https://readdy.ai/api/search-image?query=A%20tech%20conference%20with%20a%20keynote%20speaker%20presenting%20on%20stage%20with%20large%20screens%20showing%20tech%20presentations.%20The%20audience%20is%20engaged%20and%20the%20venue%20appears%20modern%20with%20professional%20lighting%20and%20tech-focused%20atmosphere.%20The%20setting%20shows%20a%20well-organized%20tech%20event%20with%20digital%20displays%20and%20professional%20staging.&width=600&height=400&seq=event6&orientation=landscape" alt="Konferensi Teknologi" class="w-full h-full object-cover object-top">
<div class="absolute top-4 right-4 bg-blue-600 text-white text-sm font-semibold py-1 px-3 rounded-full">Seminar</div>
</div>
<div class="p-5">
<div class="flex items-center text-gray-500 text-sm mb-2">
<i class="ri-calendar-line mr-2"></i>
<span>5 Juli 2025 • 08:00 WIB</span>
</div>
<h3 class="text-xl font-bold mb-2">Indonesia Tech Conference</h3>
<div class="flex items-center text-gray-500 text-sm mb-3">
<i class="ri-map-pin-line mr-2"></i>
<span>ICE BSD City, Tangerang</span>
</div>
<div class="flex justify-between items-center">
<div class="text-primary font-bold">Rp 450.000</div>
<button class="bg-primary text-white py-2 px-4 rounded-button whitespace-nowrap hover:bg-opacity-90 transition">Beli Tiket</button>
</div>
</div>
</div>
</div>
<div class="text-center mt-10">
<button class="bg-white border border-primary text-primary font-semibold py-3 px-8 rounded-button whitespace-nowrap hover:bg-primary hover:text-white transition">Lihat Semua Event</button>
</div>
</div>
</section>
<!-- How It Works Section -->
<section class="py-16 bg-white">
<div class="container mx-auto px-4">
<h2 class="text-3xl font-bold text-center mb-12">Cara Kerjanya</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<div class="text-center">
<div class="w-20 h-20 rounded-full gradient-bg flex items-center justify-center mx-auto mb-6">
<i class="ri-search-line text-3xl text-white"></i>
</div>
<h3 class="text-xl font-bold mb-3">Pilih Event</h3>
<p class="text-gray-600">Temukan event menarik dari berbagai kategori yang sesuai dengan minat Anda</p>
</div>
<div class="text-center">
<div class="w-20 h-20 rounded-full gradient-bg flex items-center justify-center mx-auto mb-6">
<i class="ri-secure-payment-line text-3xl text-white"></i>
</div>
<h3 class="text-xl font-bold mb-3">Pesan & Bayar</h3>
<p class="text-gray-600">Lakukan pemesanan dan pembayaran dengan aman melalui berbagai metode pembayaran</p>
</div>
<div class="text-center">
<div class="w-20 h-20 rounded-full gradient-bg flex items-center justify-center mx-auto mb-6">
<i class="ri-ticket-line text-3xl text-white"></i>
</div>
<h3 class="text-xl font-bold mb-3">Dapatkan E-Ticket</h3>
<p class="text-gray-600">E-ticket akan dikirim ke email Anda dan dapat diakses di akun Eventify Anda</p>
</div>
</div>
</div>
</section>
<!-- Upcoming Events Map -->
<section class="py-16 bg-gray-50">
<div class="container mx-auto px-4">
<h2 class="text-3xl font-bold text-center mb-12">Event di Sekitar Anda</h2>
<div class="rounded-lg overflow-hidden shadow-lg h-96 relative">
<div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://public.readdy.ai/gen_page/map_placeholder_1280x720.png');"></div>
<div class="absolute inset-0 flex items-center justify-center">
<div class="bg-white p-4 rounded-lg shadow-lg">
<p class="text-gray-500 mb-2">Lokasi Anda saat ini</p>
<div class="flex items-center">
<i class="ri-map-pin-line text-primary mr-2"></i>
<span class="font-medium">Jakarta, Indonesia</span>
</div>
<button class="mt-3 bg-primary text-white py-2 px-4 rounded-button whitespace-nowrap w-full hover:bg-opacity-90 transition">Temukan Event Terdekat</button>
</div>
</div>
</div>
</div>
</section>
<!-- Event Statistics -->
<section class="py-16 bg-white">
<div class="container mx-auto px-4">
<h2 class="text-3xl font-bold text-center mb-12">Statistik Event</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
<div class="bg-gray-50 rounded-lg p-6 shadow-md">
<h3 class="text-xl font-bold mb-4">Kategori Event Terpopuler</h3>
<div id="categoryChart" class="w-full h-80"></div>
</div>
<div class="bg-gray-50 rounded-lg p-6 shadow-md">
<h3 class="text-xl font-bold mb-4">Penjualan Tiket Bulanan</h3>
<div id="salesChart" class="w-full h-80"></div>
</div>
</div>
</div>
</section>
<!-- Testimonials -->
<section class="py-16 bg-gray-50">
<div class="container mx-auto px-4">
<h2 class="text-3xl font-bold text-center mb-12">Apa Kata Mereka</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<div class="bg-white p-6 rounded-lg shadow-md">
<div class="flex items-center mb-4">
<div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center mr-4">
<i class="ri-user-line text-gray-500"></i>
</div>
<div>
<h4 class="font-bold">Budi Santoso</h4>
<div class="flex text-yellow-400">
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
</div>
</div>
</div>
<p class="text-gray-600">"Aplikasi yang sangat membantu! Saya bisa dengan mudah menemukan dan membeli tiket konser favorit saya. Proses pembelian sangat cepat dan e-ticket langsung terkirim ke email."</p>
</div>
<div class="bg-white p-6 rounded-lg shadow-md">
<div class="flex items-center mb-4">
<div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center mr-4">
<i class="ri-user-line text-gray-500"></i>
</div>
<div>
<h4 class="font-bold">Dewi Anggraini</h4>
<div class="flex text-yellow-400">
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-half-fill"></i>
</div>
</div>
</div>
<p class="text-gray-600">"Saya sering menggunakan Eventify untuk mencari workshop dan seminar. Fitur filternya sangat membantu untuk menemukan event yang sesuai dengan minat dan jadwal saya."</p>
</div>
<div class="bg-white p-6 rounded-lg shadow-md">
<div class="flex items-center mb-4">
<div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center mr-4">
<i class="ri-user-line text-gray-500"></i>
</div>
<div>
<h4 class="font-bold">Reza Mahendra</h4>
<div class="flex text-yellow-400">
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
</div>
</div>
</div>
<p class="text-gray-600">"Sebagai penyelenggara event, Eventify sangat membantu kami dalam menjual tiket secara online. Dashboard admin sangat lengkap dan laporan penjualan sangat detail."</p>
</div>
</div>
</div>
</section>
<!-- Newsletter Section -->
<section class="py-16 bg-white">
<div class="container mx-auto px-4">
<div class="max-w-3xl mx-auto bg-gradient-to-r from-primary to-secondary rounded-lg p-8 text-white text-center">
<h2 class="text-3xl font-bold mb-4">Dapatkan Info Event Terbaru</h2>
<p class="mb-6">Berlangganan newsletter kami dan dapatkan info tentang event terbaru dan penawaran spesial</p>
<div class="flex flex-col sm:flex-row gap-3">
<input type="email" placeholder="Alamat email Anda" class="flex-1 py-3 px-4 rounded-button text-gray-800 border-none focus:outline-none focus:ring-2 focus:ring-primary">
<button class="bg-white text-primary font-semibold py-3 px-6 rounded-button whitespace-nowrap hover:bg-gray-100 transition">Berlangganan</button>
</div>
</div>
</div>
</section>
<!-- Footer -->
<footer class="bg-gray-900 text-white pt-16 pb-8">
<div class="container mx-auto px-4">
<div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
<div>
<a href="#" class="text-2xl font-['Pacifico'] text-white mb-4 inline-block">Eventify</a>
<p class="text-gray-400 mb-4">Platform pemesanan tiket event terpercaya di Indonesia. Temukan dan beli tiket event dengan mudah dan aman.</p>
<div class="flex space-x-4">
<a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition">
<i class="ri-facebook-fill"></i>
</a>
<a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition">
<i class="ri-twitter-x-fill"></i>
</a>
<a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition">
<i class="ri-instagram-fill"></i>
</a>
<a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-primary transition">
<i class="ri-linkedin-fill"></i>
</a>
</div>
</div>
<div>
<h4 class="text-lg font-bold mb-4">Link Cepat</h4>
<ul class="space-y-2">
<li><a href="#" class="text-gray-400 hover:text-white transition">Beranda</a></li>
<li><a href="#" class="text-gray-400 hover:text-white transition">Event</a></li>
<li><a href="#" class="text-gray-400 hover:text-white transition">Tiket Saya</a></li>
<li><a href="#" class="text-gray-400 hover:text-white transition">Tentang Kami</a></li>
<li><a href="#" class="text-gray-400 hover:text-white transition">Bantuan</a></li>
</ul>
</div>
<div>
<h4 class="text-lg font-bold mb-4">Kontak</h4>
<ul class="space-y-2">
<li class="flex items-start">
<i class="ri-map-pin-line mt-1 mr-3"></i>
<span class="text-gray-400">Jl. Jendral Sudirman No.123, Jakarta Pusat, Indonesia</span>
</li>
<li class="flex items-center">
<i class="ri-phone-line mr-3"></i>
<span class="text-gray-400">+62 21 1234 5678</span>
</li>
<li class="flex items-center">
<i class="ri-mail-line mr-3"></i>
<span class="text-gray-400">info@eventify.id</span>
</li>
</ul>
</div>
<div>
<h4 class="text-lg font-bold mb-4">Metode Pembayaran</h4>
<div class="grid grid-cols-3 gap-3">
<div class="bg-white p-2 rounded flex items-center justify-center">
<i class="ri-visa-fill text-2xl text-blue-700"></i>
</div>
<div class="bg-white p-2 rounded flex items-center justify-center">
<i class="ri-mastercard-fill text-2xl text-red-600"></i>
</div>
<div class="bg-white p-2 rounded flex items-center justify-center">
<i class="ri-paypal-fill text-2xl text-blue-800"></i>
</div>
<div class="bg-white p-2 rounded flex items-center justify-center">
<i class="ri-bank-card-fill text-2xl text-gray-700"></i>
</div>
<div class="bg-white p-2 rounded flex items-center justify-center">
<i class="ri-alipay-fill text-2xl text-blue-500"></i>
</div>
<div class="bg-white p-2 rounded flex items-center justify-center">
<i class="ri-bank-fill text-2xl text-green-700"></i>
</div>
</div>
</div>
</div>
<div class="border-t border-gray-800 pt-8">
<div class="flex flex-col md:flex-row justify-between items-center">
<p class="text-gray-400 text-sm mb-4 md:mb-0">© 2025 Eventify. Hak Cipta Dilindungi.</p>
<div class="flex space-x-6">
<a href="#" class="text-gray-400 hover:text-white text-sm transition">Syarat & Ketentuan</a>
<a href="#" class="text-gray-400 hover:text-white text-sm transition">Kebijakan Privasi</a>
<a href="#" class="text-gray-400 hover:text-white text-sm transition">FAQ</a>
</div>
</div>
</div>
</div>
</footer>
<!-- Login Modal -->
<div id="loginModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
<div class="absolute inset-0 bg-black bg-opacity-50"></div>
<div class="bg-white rounded-lg w-full max-w-md mx-4 z-10 overflow-hidden">
<div class="relative">
<button id="closeLoginModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
<i class="ri-close-line text-2xl"></i>
</button>
<div class="p-6">
<h2 class="text-2xl font-bold mb-6 text-center">Masuk ke Akun Anda</h2>
<form>
<div class="mb-4">
<label for="email" class="block text-gray-700 mb-2">Email</label>
<input type="email" id="email" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Masukkan email Anda">
</div>
<div class="mb-6">
<label for="password" class="block text-gray-700 mb-2">Password</label>
<input type="password" id="password" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Masukkan password Anda">
</div>
<div class="flex items-center justify-between mb-6">
<label class="flex items-center">
<input type="checkbox" class="mr-2">
<span class="text-gray-700">Ingat saya</span>
</label>
<a href="#" class="text-primary hover:underline">Lupa password?</a>
</div>
<button type="submit" class="w-full bg-primary text-white font-semibold py-3 rounded-button whitespace-nowrap hover:bg-opacity-90 transition">Masuk</button>
</form>
<div class="mt-4 text-center">
<p class="text-gray-600">Atau masuk dengan</p>
<div class="flex justify-center space-x-4 mt-3">
<button class="flex items-center justify-center w-12 h-12 rounded-full border border-gray-300 hover:bg-gray-50 transition">
<i class="ri-google-fill text-xl text-red-500"></i>
</button>
<button class="flex items-center justify-center w-12 h-12 rounded-full border border-gray-300 hover:bg-gray-50 transition">
<i class="ri-facebook-fill text-xl text-blue-600"></i>
</button>
<button class="flex items-center justify-center w-12 h-12 rounded-full border border-gray-300 hover:bg-gray-50 transition">
<i class="ri-apple-fill text-xl"></i>
</button>
</div>
</div>
<div class="mt-6 text-center">
<p class="text-gray-600">Belum punya akun? <a href="../pengguna/login/login.php" class="text-primary hover:underline">Daftar sekarang</a></p>
</div>
</div>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
<script src="index.js"></script>

</body>
</html>
