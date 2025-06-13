<?php
include '../../views/layout/header.php';


$tiketData = [
    [
        'id_pesanan' => 'EVT12345',
        'nama_event' => 'Dewa 19 Reunion Concert',
        'tanggal' => '9 Juni 2025',
        'waktu' => '19:00 WIB',
        'lokasi' => 'Gelora Bung Karno, Jakarta',
        'gambar_url' => 'https://readdy.ai/api/search-image?query=A%20vibrant%20music%20concert%20with%20a%20popular%20band%20performing%20on%20stage%20with%20colorful%20lights%20and%20effects&width=600&height=400&seq=event1&orientation=landscape',
        'jumlah_tiket' => 2,
        'kategori' => 'VIP',
        'status' => 'aktif'
    ],
    [
        'id_pesanan' => 'EVT67890',
        'nama_event' => 'Digital Marketing Masterclass',
        'tanggal' => '15 Juni 2025',
        'waktu' => '09:00 WIB',
        'lokasi' => 'Hotel Mulia, Surabaya',
        'gambar_url' => 'https://readdy.ai/api/search-image?query=A%20professional%20business%20seminar%20or%20conference%20with%20speakers%20on%20stage&width=600&height=400&seq=event2&orientation=landscape',
        'jumlah_tiket' => 1,
        'kategori' => 'Reguler',
        'status' => 'aktif'
    ],
    [
        'id_pesanan' => 'EVT54321',
        'nama_event' => 'Pameran Seni Rupa Kontemporer',
        'tanggal' => '25 April 2025',
        'waktu' => '10:00 WIB',
        'lokasi' => 'Museum Nasional, Jakarta',
        'gambar_url' => 'https://readdy.ai/api/search-image?query=An%20art%20exhibition%20in%20a%20modern%20gallery%20space%20with%20paintings%20and%20sculptures&width=600&height=400&seq=event4&orientation=landscape',
        'jumlah_tiket' => 1,
        'kategori' => 'Umum',
        'status' => 'digunakan'
    ]
];


?>

<main class="pt-24 pb-16">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-8">Tiket Saya</h1>

        <div class="mb-8">
            <div class="flex border-b border-gray-200">
                <button data-tab="aktif" class="tab-button active py-3 px-6 -mb-px text-gray-600 hover:text-primary focus:outline-none">
                    Aktif
                </button>
                <button data-tab="digunakan" class="tab-button py-3 px-6 text-gray-600 hover:text-primary focus:outline-none">
                    Telah Digunakan
                </button>
                <button data-tab="dibatalkan" class="tab-button py-3 px-6 text-gray-600 hover:text-primary focus:outline-none">
                    Dibatalkan
                </button>
            </div>
        </div>

        <div>
            <div id="tab-content-aktif" class="space-y-6">
                <?php
                $adaTiketAktif = false;
                foreach ($tiketData as $tiket) {
                    if ($tiket['status'] == 'aktif') {
                        $adaTiketAktif = true;
                        echo '
                        <div class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:scale-[1.02]">
                            <div class="flex flex-col md:flex-row">
                                <!-- Gambar Event -->
                                <div class="md:w-1/4">
                                    <img class="h-full w-full object-cover" src="' . htmlspecialchars($tiket['gambar_url']) . '" alt="Gambar ' . htmlspecialchars($tiket['nama_event']) . '">
                                </div>
                                <!-- Detail Tiket -->
                                <div class="p-6 md:w-2/4 flex flex-col justify-between">
                                    <div>
                                        <span class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-1 rounded-full mb-2">TIKET AKTIF</span>
                                        <h2 class="text-2xl font-bold text-gray-900">' . htmlspecialchars($tiket['nama_event']) . '</h2>
                                        <p class="text-gray-500 mt-2 flex items-center"><i class="ri-calendar-line mr-2"></i>' . htmlspecialchars($tiket['tanggal']) . ' • ' . htmlspecialchars($tiket['waktu']) . '</p>
                                        <p class="text-gray-500 mt-1 flex items-center"><i class="ri-map-pin-line mr-2"></i>' . htmlspecialchars($tiket['lokasi']) . '</p>
                                        <p class="text-gray-700 mt-3 font-medium"><strong>' . htmlspecialchars($tiket['jumlah_tiket']) . ' Tiket</strong> - Kategori ' . htmlspecialchars($tiket['kategori']) . '</p>
                                    </div>
                                    <button class="mt-4 text-left text-primary font-semibold hover:underline">Lihat Detail Tiket</button>
                                </div>
                                <!-- QR Code -->
                                <div class="p-6 md:w-1/4 flex flex-col items-center justify-center bg-gray-50 border-l border-gray-200">
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=140x140&data=' . htmlspecialchars($tiket['id_pesanan']) . '" alt="QR Code Tiket" class="rounded-lg">
                                    <p class="text-sm text-gray-600 mt-3 font-medium">ID Pesanan: ' . htmlspecialchars($tiket['id_pesanan']) . '</p>
                                    <p class="text-xs text-gray-500 mt-1">Pindai di pintu masuk</p>
                                </div>
                            </div>
                        </div>';
                    }
                }
                if (!$adaTiketAktif) {
                    echo '
                    <div class="bg-white rounded-xl shadow-md p-8 text-center">
                        <i class="ri-ticket-line text-5xl text-gray-400 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-700">Tidak Ada Tiket Aktif</h3>
                        <p class="text-gray-500 mt-2">Anda tidak memiliki tiket untuk event yang akan datang.</p>
                    </div>';
                }
                ?>
            </div>

            <div id="tab-content-digunakan" class="hidden space-y-6">
                <?php
                $adaTiketDigunakan = false;
                foreach ($tiketData as $tiket) {
                    if ($tiket['status'] == 'digunakan') {
                        $adaTiketDigunakan = true;
                        echo '
                        <div class="bg-white rounded-xl shadow-md overflow-hidden opacity-70">
                            <div class="flex flex-col md:flex-row">
                                <!-- Gambar Event -->
                                <div class="md:w-1/4">
                                    <img class="h-full w-full object-cover" src="' . htmlspecialchars($tiket['gambar_url']) . '" alt="Gambar ' . htmlspecialchars($tiket['nama_event']) . '">
                                </div>
                                <!-- Detail Tiket -->
                                <div class="p-6 md:w-3/4 flex flex-col justify-between">
                                    <div>
                                        <span class="inline-block bg-gray-200 text-gray-800 text-xs font-semibold px-2.5 py-1 rounded-full mb-2">TELAH DIGUNAKAN</span>
                                        <h2 class="text-2xl font-bold text-gray-900">' . htmlspecialchars($tiket['nama_event']) . '</h2>
                                        <p class="text-gray-500 mt-2 flex items-center"><i class="ri-calendar-check-line mr-2"></i>Telah digunakan pada ' . htmlspecialchars($tiket['tanggal']) . '</p>
                                        <p class="text-gray-500 mt-1 flex items-center"><i class="ri-map-pin-line mr-2"></i>' . htmlspecialchars($tiket['lokasi']) . '</p>
                                    </div>
                                    <button class="mt-4 text-left text-gray-500 font-semibold cursor-not-allowed">Lihat Detail Tiket</button>
                                </div>
                            </div>
                        </div>';
                    }
                }
                if (!$adaTiketDigunakan) {
                    echo '
                    <div class="bg-white rounded-xl shadow-md p-8 text-center">
                        <i class="ri-history-line text-5xl text-gray-400 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-700">Tidak Ada Riwayat Tiket</h3>
                        <p class="text-gray-500 mt-2">Anda belum pernah menggunakan tiket dari event manapun.</p>
                    </div>';
                }
                ?>
            </div>
            
            <div id="tab-content-dibatalkan" class="hidden">
                 <div class="bg-white rounded-xl shadow-md p-8 text-center">
                    <i class="ri-close-circle-line text-5xl text-gray-400 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-700">Tidak Ada Tiket Dibatalkan</h3>
                    <p class="text-gray-500 mt-2">Semua tiket Anda aman dan tidak ada yang dibatalkan.</p>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    .tab-button.active {
        background-color: #6200EA;
        color: white;
        font-weight: 600;
        border-radius: 6px 6px 0 0;
    }
    .tab-button {
        transition: all 0.3s ease;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.tab-button');
        const tabContents = {
            aktif: document.getElementById('tab-content-aktif'),
            digunakan: document.getElementById('tab-content-digunakan'),
            dibatalkan: document.getElementById('tab-content-dibatalkan')
        };

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(item => item.classList.remove('active'));
                
                Object.values(tabContents).forEach(content => {
                    if(content) content.classList.add('hidden');
                });

                tab.classList.add('active');
                
                const activeTabContent = tabContents[tab.dataset.tab];
                if (activeTabContent) {
                    activeTabContent.classList.remove('hidden');
                }
            });
        });
    });
</script>

<?php
include '../../views/layout/footer.php';
?>