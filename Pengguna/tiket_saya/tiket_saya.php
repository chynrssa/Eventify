<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../Login/login.php");
    exit;
}


$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "eventify";
$koneksi = new mysqli($db_server, $db_username, $db_password, $db_name);
if ($koneksi->connect_error) {
    die("KONEKSI GAGAL: " . $koneksi->connect_error);
}


$transaksi_list = [];
$user_id = $_SESSION['user_id']; 

$sql = "SELECT 
            t.id AS id_transaksi,
            e.nama_event,
            t.qty AS jumlah_tiket,
            t.total_harga,
            t.created_at AS tanggal_transaksi,
            p.status AS status_pembayaran
        FROM transaksi t
        JOIN event e ON t.event_id = e.id
        LEFT JOIN pembayaran p ON t.id = p.transaksi_id
        WHERE t.user_id = ?
        ORDER BY t.created_at DESC";

if ($stmt = $koneksi->prepare($sql)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $transaksi_list[] = $row;
        }
    }
    $stmt->close();
} else {
    die("Error preparing statement: " . $koneksi->error);
}

$koneksi->close();


include $_SERVER['DOCUMENT_ROOT'] . '/eventify/views/layout/header.php';
?>


<style>
    html {
        height: 100%;
    }
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    main.content-wrapper {
        flex-grow: 1;
    }
</style>

<main class="content-wrapper pt-24 pb-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-8">Tiket Saya</h1>

        <div class="mb-8">
            <div class="flex border-b border-gray-200">
                <button data-tab="aktif" class="tab-button active py-3 px-6 -mb-px text-gray-600 hover:text-primary focus:outline-none">
                    Aktif
                </button>
                <button data-tab="pending" class="tab-button py-3 px-6 text-gray-600 hover:text-primary focus:outline-none">
                    Menunggu Pembayaran
                </button>
            </div>
        </div>

        <div>
            <div id="tab-content-aktif" class="space-y-6">
                <?php
                $adaTiketAktif = false;
                foreach ($transaksi_list as $transaksi) {
                    if (isset($transaksi['status_pembayaran']) && $transaksi['status_pembayaran'] == 'berhasil') {
                        $adaTiketAktif = true;
                        echo '
                        <div class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:scale-[1.02]">
                            <div class="p-6">
                                <span class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-1 rounded-full mb-3">TIKET AKTIF</span>
                                <h2 class="text-2xl font-bold text-gray-900">' . htmlspecialchars($transaksi['nama_event']) . '</h2>
                                <p class="text-gray-500 mt-2">Tanggal Transaksi: ' . date('d F Y, H:i', strtotime($transaksi['tanggal_transaksi'])) . '</p>
                                <p class="text-gray-700 mt-3 font-medium"><strong>' . htmlspecialchars($transaksi['jumlah_tiket']) . ' Tiket</strong></p>
                                <hr class="my-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Total Pembayaran</span>
                                    <span class="text-xl font-bold text-primary">Rp ' . number_format($transaksi['total_harga'], 0, ',', '.') . '</span>
                                </div>
                                <!-- Tombol E-Ticket Diperbaiki dan Fungsional -->
                                <a href="e_ticket.php?id=' . $transaksi['id_transaksi'] . '" target="_blank" class="block mt-4 text-center text-white font-semibold bg-blue-600 hover:bg-blue-700 py-2 rounded-lg">Lihat E-Ticket</a>
                            </div>
                        </div>';
                    }
                }
                if (!$adaTiketAktif) {
                    echo '
                    <div class="bg-white rounded-xl shadow-md p-8 text-center">
                        <i class="ri-ticket-line text-5xl text-gray-400 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-700">Tidak Ada Tiket Aktif</h3>
                        <p class="text-gray-500 mt-2">Anda belum memiliki tiket yang pembayarannya berhasil.</p>
                    </div>';
                }
                ?>
            </div>

            <div id="tab-content-pending" class="hidden space-y-6">
                <?php
                $adaTiketPending = false;
                foreach ($transaksi_list as $transaksi) {
                    if (!isset($transaksi['status_pembayaran']) || $transaksi['status_pembayaran'] != 'berhasil') {
                        $adaTiketPending = true;
                        echo '
                        <div class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:scale-[1.02]">
                             <div class="p-6">
                                <span class="inline-block bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-1 rounded-full mb-3">MENUNGGU PEMBAYARAN</span>
                                <h2 class="text-2xl font-bold text-gray-900">' . htmlspecialchars($transaksi['nama_event']) . '</h2>
                                <p class="text-gray-500 mt-2">Tanggal Transaksi: ' . date('d F Y, H:i', strtotime($transaksi['tanggal_transaksi'])) . '</p>
                                <p class="text-gray-700 mt-3 font-medium"><strong>' . htmlspecialchars($transaksi['jumlah_tiket']) . ' Tiket</strong></p>
                                <hr class="my-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Total Tagihan</span>
                                    <span class="text-xl font-bold text-yellow-600">Rp ' . number_format($transaksi['total_harga'], 0, ',', '.') . '</span>
                                </div>
                                <!-- Tombol Pembayaran Diperbaiki -->
                                <a href="../pemesanan_pembayaran/pembayaran.php?transaksi_id=' . $transaksi['id_transaksi'] . '" class="block mt-4 text-center text-white font-semibold w-full bg-yellow-500 hover:bg-yellow-600 py-2 rounded-lg">Lanjutkan Pembayaran</a>
                            </div>
                        </div>';
                    }
                }
                if (!$adaTiketPending) {
                    echo '
                    <div class="bg-white rounded-xl shadow-md p-8 text-center">
                        <i class="ri-time-line text-5xl text-gray-400 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-700">Tidak Ada Transaksi Pending</h3>
                        <p class="text-gray-500 mt-2">Semua transaksi Anda sudah lunas atau Anda belum melakukan transaksi.</p>
                    </div>';
                }
                ?>
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
        border-color: #6200EA;
    }
    .tab-button {
        transition: all 0.3s ease;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.tab-button');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const tabTarget = tab.dataset.tab;
                
                tabs.forEach(item => item.classList.remove('active'));
                document.querySelectorAll('[id^="tab-content-"]').forEach(content => content.classList.add('hidden'));

                tab.classList.add('active');
                const activeContent = document.getElementById('tab-content-' + tabTarget);
                if(activeContent) {
                    activeContent.classList.remove('hidden');
                }
            });
        });
    });
</script>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/eventify/views/layout/footer.php';
?>
