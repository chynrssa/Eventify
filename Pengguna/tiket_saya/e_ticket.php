<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../Login/login.php");
    exit;
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: ID Transaksi tidak ditemukan.");
}

$id_transaksi = (int)$_GET['id'];
$user_id_session = $_SESSION['user_id'];

$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "eventify";
$koneksi = new mysqli($db_server, $db_username, $db_password, $db_name);
if ($koneksi->connect_error) {
    die("KONEKSI GAGAL: " . $koneksi->connect_error);
}

$ticket_data = null;
$sql = "SELECT 
            t.id AS id_transaksi,
            t.qty AS jumlah_tiket,
            t.total_harga,
            t.created_at AS tanggal_transaksi,
            e.nama_event,
            u.nama_lengkap AS nama_pemesan
        FROM transaksi t
        JOIN event e ON t.event_id = e.id
        JOIN user u ON t.user_id = u.id
        WHERE t.id = ? AND t.user_id = ? 
        LIMIT 1";

if ($stmt = $koneksi->prepare($sql)) {
    $stmt->bind_param("ii", $id_transaksi, $user_id_session);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $ticket_data = $result->fetch_assoc();
    }
    $stmt->close();
} else {
    die("Error preparing statement: " . $koneksi->error);
}

$koneksi->close();

if (!$ticket_data) {
    die("Error: Tiket tidak ditemukan atau Anda tidak memiliki akses.");
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ticket - <?php echo htmlspecialchars($ticket_data['nama_event']); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Code+Pro&display=swap" rel="stylesheet">
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            .ticket-container, .ticket-container * {
                visibility: visible;
            }
            .ticket-container {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            .no-print {
                display: none;
            }
        }
        .ticket-font {
            font-family: 'Source Code Pro', monospace;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md">
        <div class="ticket-container bg-white rounded-lg shadow-xl border-dashed border-2 border-gray-300 p-8 ticket-font">
            <div class="text-center mb-6 border-b-2 border-dashed pb-4">
                <h1 class="text-2xl font-bold text-gray-800">E-TICKET</h1>
                <p class="text-gray-500">Eventify</p>
            </div>
            
            <div class="mb-6">
                <h2 class="text-xl font-bold text-blue-600"><?php echo htmlspecialchars($ticket_data['nama_event']); ?></h2>
                <p class="text-sm text-gray-600">ID Transaksi: #<?php echo htmlspecialchars($ticket_data['id_transaksi']); ?></p>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <p class="text-xs text-gray-500">NAMA PEMESAN</p>
                    <p class="font-bold text-gray-800"><?php echo htmlspecialchars($ticket_data['nama_pemesan']); ?></p>
                </div>
                <div>
                    <p class="text-xs text-gray-500">TANGGAL TRANSAKSI</p>
                    <p class="font-bold text-gray-800"><?php echo date('d M Y', strtotime($ticket_data['tanggal_transaksi'])); ?></p>
                </div>
            </div>
            
            <div class="mb-6 text-center">
                <p class="text-xs text-gray-500">JUMLAH TIKET</p>
                <p class="text-4xl font-bold text-gray-900"><?php echo htmlspecialchars($ticket_data['jumlah_tiket']); ?></p>
            </div>
            
            <div class="flex items-center justify-center">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=TRX-<?php echo htmlspecialchars($ticket_data['id_transaksi']); ?>" alt="QR Code">
            </div>
            <p class="text-center text-xs text-gray-500 mt-2">Pindai QR code ini di pintu masuk</p>
        </div>

        <div class="text-center mt-6 no-print">
            <button onclick="window.print()" class="bg-blue-600 text-white font-bold py-2 px-6 rounded-lg hover:bg-blue-700 transition">
                Cetak Tiket
            </button>
            <a href="tiket_saya.php" class="ml-4 text-gray-600 hover:underline">Kembali</a>
        </div>
    </div>
</body>
</html>
