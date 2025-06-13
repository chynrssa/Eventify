<?php
session_start();
include '../pemesanan_pembayaran/db.php';

// Cek user login (opsional, sesuaikan kebutuhan)
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit;
}

// Ambil semua event yang stok > 0
$query = "SELECT id, nama_event, harga, stok, promo FROM event WHERE stok > 0 ORDER BY id DESC";
$result = $conn->query($query);

?>

<?php include '../../views/layout/header.php'; ?>

<main class="container mx-auto px-4 py-6">
  <h1 class="text-3xl font-bold mb-6">Daftar Event</h1>

  <?php if ($result->num_rows > 0): ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php while ($event = $result->fetch_assoc()): ?>
        <?php
          // Hitung harga diskon jika ada promo
          $hargaAsli = (int)$event['harga'];
          $promo = (float)$event['promo'];
          $hargaDiskon = ($promo > 0 && $promo < 1) ? round($hargaAsli * (1 - $promo)) : $hargaAsli;
        ?>
        <div class="border rounded shadow p-4 flex flex-col justify-between">
          <div>
            <h2 class="text-xl font-semibold mb-2"><?= htmlspecialchars($event['nama_event']) ?></h2>
            <p class="mb-2">Harga: 
              <?php if ($promo > 0 && $promo < 1): ?>
                <span class="line-through text-gray-500"><?= number_format($hargaAsli, 0, ',', '.') ?></span> 
                <span class="text-green-600 font-bold"><?= number_format($hargaDiskon, 0, ',', '.') ?></span>
                <small class="text-green-600">(Diskon <?= ($promo * 100) ?>%)</small>
              <?php else: ?>
                <span class="font-bold"><?= number_format($hargaAsli, 0, ',', '.') ?></span>
              <?php endif; ?>
            </p>
            <p class="mb-2">Stok tersedia: <?= $event['stok'] ?></p>
          </div>
          <a href="../pemesanan_pembayaran/pemesanan.php?event=<?= urlencode($event['nama_event']) ?>" 
             class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center mt-4">
             Pesan Tiket
          </a>
        </div>
      <?php endwhile; ?>
    </div>
  <?php else: ?>
    <p class="text-gray-600">Tidak ada event tersedia saat ini.</p>
  <?php endif; ?>
</main>

<?php include '../../views/layout/footer.php'; ?>
