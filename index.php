<?php
    include 'views/layout/header.php';
?>

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

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Kategori Populer</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-6">
            <a href="Pengguna/events/events_konser.php" class="category-item flex flex-col items-center transition duration-300">
                <div class="w-20 h-20 rounded-full bg-purple-100 flex items-center justify-center mb-3">
                    <i class="ri-music-line text-3xl text-primary"></i>
                </div>
                <span class="font-medium">Konser</span>
            </a>
            <a href="Pengguna/events/events_Seminar.php" class="category-item flex flex-col items-center transition duration-300">
                <div class="w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center mb-3">
                    <i class="ri-presentation-line text-3xl text-blue-600"></i>
                </div>
                <span class="font-medium">Seminar</span>
            </a>
            <a href="Pengguna/events/events_workshop.php" class="category-item flex flex-col items-center transition duration-300">
                <div class="w-20 h-20 rounded-full bg-green-100 flex items-center justify-center mb-3">
                    <i class="ri-tools-line text-3xl text-green-600"></i>
                </div>
                <span class="font-medium">Workshop</span>
            </a>
            <a href="Pengguna/events/events_pameran.php" class="category-item flex flex-col items-center transition duration-300">
                <div class="w-20 h-20 rounded-full bg-yellow-100 flex items-center justify-center mb-3">
                    <i class="ri-gallery-line text-3xl text-yellow-600"></i>
                </div>
                <span class="font-medium">Pameran</span>
            </a>
            <a href="Pengguna/events/events_olahraga.php" class="category-item flex flex-col items-center transition duration-300">
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
            <div class="event-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                <div class="relative h-48">
                    <img src="https://www.mnctrijaya.com/uploads/news/Dewa%2001.png" alt="Konser Musik" class="w-full h-full object-cover object-top">
                    <div class="absolute top-4 right-4 bg-primary text-white text-sm font-semibold py-1 px-3 rounded-full">Konser</div>
                </div>
                <div class="p-5">
                    <div class="flex items-center text-gray-500 text-sm mb-2">
                        <i class="ri-calendar-line mr-2"></i><span>9 Juni 2025 • 19:00 WIB</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Dewa 19 Reunion Concert</h3>
                    <div class="flex items-center text-gray-500 text-sm mb-3">
                        <i class="ri-map-pin-line mr-2"></i><span>Gelora Bung Karno, Jakarta</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-primary font-bold">Rp 750.000</div>
                        <a href="Pengguna/pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Dewa 19 Reunion Concert'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
                    </div>
                </div>
            </div>
            <div class="event-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                <div class="relative h-48">
                    <img src="image/seminar_hukumcyber.png" alt="Seminar Bisnis" class="w-full h-full object-cover object-top">
                    <div class="absolute top-4 right-4 bg-blue-600 text-white text-sm font-semibold py-1 px-3 rounded-full">Seminar</div>
                </div>
                <div class="p-5">
                    <div class="flex items-center text-gray-500 text-sm mb-2">
                        <i class="ri-calendar-line mr-2"></i><span>15 Juni 2025 • 09:00 WIB</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Seminar Keamanan Siber</h3>
                    <div class="flex items-center text-gray-500 text-sm mb-3">
                        <i class="ri-map-pin-line mr-2"></i><span>Hotel Mulia, Surabaya</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-primary font-bold">Rp 400.000</div>
                        <a href="Pengguna/pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Seminar Hukum Cyber'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
                    </div>
                </div>
            </div>
            <div class="event-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                <div class="relative h-48">
                    <img src="image/workshop.png" alt="Workshop" class="w-full h-full object-cover object-top">
                    <div class="absolute top-4 right-4 bg-green-600 text-white text-sm font-semibold py-1 px-3 rounded-full">Workshop</div>
                </div>
                <div class="p-5">
                    <div class="flex items-center text-gray-500 text-sm mb-2">
                        <i class="ri-calendar-line mr-2"></i><span>20 Juni 2025 • 13:00 WIB</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Workshop Public Speaking</h3>
                    <div class="flex items-center text-gray-500 text-sm mb-3">
                        <i class="ri-map-pin-line mr-2"></i><span>Pakuwon Mall, Surabaya</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-primary font-bold">Rp 180.000</div>
                        <a href="Pengguna/pemesanan_pembayaran/pemesanan.php?event=<?php echo urlencode('Workshop Public Speaking Profesional'); ?>" class="mt-2 bg-blue-600 text-white py-1 px-3 rounded-md text-sm hover:bg-blue-700">Pesan Tiket</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-10">
           <a href="Pengguna/events/events.php" class="bg-white border border-primary text-primary font-semibold py-3 px-8 rounded-button whitespace-nowrap hover:bg-primary hover:text-white transition">
  Lihat Semua Event
</a>

        </div>
    </div>
</section>

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

<?php
    include 'views/layout/footer.php';
?>
