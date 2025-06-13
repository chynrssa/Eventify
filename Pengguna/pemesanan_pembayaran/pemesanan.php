<?php include '../../views/layout/header.php'; ?>

<?php
$eventHarga = [
    // Seminar
    "Seminar Teknologi AI 2025" => 250000,
    "Seminar Kesehatan Mental Mahasiswa" => 120000,
    "Seminar Kepemimpinan Muda" => 100000,
    "Seminar Nasional Pendidikan 2025" => 130000,
    "Seminar Bisnis dan Startup" => 170000,
    "Seminar Hukum Cyber" => 400000,
    "Seminar Hukum dan HAM" => 160000,
    "Seminar Kesehatan Keluarga" => 110000,
    "Seminar Digital Marketing" => 180000,
    "Seminar Kepemudaan" => 90000,

    // Konser
    "Live Concert K-Pop Stars 2025" => 750000,
    "Konser Musik Jazz Malam Minggu" => 350000,
    "Festival Musik Indie Nusantara" => 400000,
    "Konser Dangdut Malam Spektakuler" => 250000,
    "Festival Musik Rock & Metal" => 450000,
    "Konser Orchestra Nasional" => 500000,
    "Acara Musik Akustik Kampus" => 150000,
    "Konser Musik Religi & Sholawat" => 200000,
    "Festival Musik EDM Party" => 600000,
    "Konser Musik Oldies Nostalgia" => 300000,

    // Olahraga
    "Turnamen Futsal Antar Mahasiswa" => 120000,
    "Kejuaraan Basket Regional" => 140000,
    "Lomba Lari 10K Kota Metropolitan" => 90000,
    "Turnamen Bulu Tangkis Nasional" => 130000,
    "Liga Voli Mahasiswa" => 100000,
    "Turnamen Tenis Meja Se-Kota" => 110000,
    "Kejuaraan Karate & Bela Diri" => 125000,
    "Fun Run 5K" => 70000,
    "Kompetisi Panjat Tebing" => 95000,
    "Kejuaraan Renang Antar Kampus" => 105000,

    // Pameran
    "Pameran Seni Rupa Nusantara" => 80000,
    "Pameran Startup Digital" => 100000,
    "Pameran Fotografi Alam" => 90000,
    "Expo Kewirausahaan Mahasiswa" => 110000,
    "Pameran Teknologi & Robotik" => 150000,
    "Pameran Buku & Literasi" => 60000,
    "Pameran Fashion & Craft" => 85000,
    "Pameran Otomotif Nasional" => 160000,
    "Expo Budaya Nusantara" => 95000,
    "Pameran Kesehatan & Herbal" => 70000,

    // Workshop
    "Workshop UI/UX Design" => 200000,
    "Workshop Data Science" => 250000,
    "Pelatihan Public Speaking Profesional" => 180000,
    "Workshop Digital Marketing" => 220000,
    "Workshop Fotografi Profesional" => 210000,
    "Workshop Mobile App Development" => 300000,
    "Workshop Leadership Skill" => 190000,
    "Workshop Python Programming" => 280000,
    "Workshop Video Editing" => 230000,
    "Workshop Desain Grafis Kreatif" => 240000
];

$namaEvent = $_GET['event'] ?? '';
$hargaEvent = $eventHarga[$namaEvent] ?? 0;
?>

<main class="flex-grow container mx-auto px-4 py-6">
  <div class="mb-6">
    <h1 class="text-2xl mt-16 font-bold text-gray-800">Pemesanan Tiket</h1>
    <p class="text-gray-600">Isi data pemesanan dengan lengkap.</p>
  </div>

  <form action="pembayaran.php" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2">Nama Event</label>
      <input name="namaEvent" type="text" value="<?php echo htmlspecialchars($namaEvent); ?>" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2">Harga Tiket per Orang (Rp)</label>
      <input id="hargaTiket" type="text" value="<?php echo number_format($hargaEvent, 0, ',', '.'); ?>" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
    </div>

    <input type="hidden" name="harga_raw" id="hargaRaw" value="<?php echo $hargaEvent; ?>">

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2">Nama Pemesan</label>
      <input name="namaPemesan" type="text" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
      <input name="email" type="email" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2">Jumlah Tiket</label>
      <input name="jumlahTiket" id="jumlahTiket" type="number" value="1" min="1" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" oninput="hitungTotal()">
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2">Total Harga (Rp)</label>
      <input id="totalHarga" type="text" value="<?php echo number_format($hargaEvent, 0, ',', '.'); ?>" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
    </div>

    <input type="hidden" name="total_harga_raw" id="totalHargaRaw" value="<?php echo $hargaEvent; ?>">

    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
        Lanjut ke Pembayaran
      </button>
    </div>
  </form>
</main>

<script>
function hitungTotal() {
    const hargaPerTiket = parseInt(document.getElementById("hargaRaw").value);
    const jumlah = parseInt(document.getElementById("jumlahTiket").value);
    const total = hargaPerTiket * jumlah;

    // format ribuan
    document.getElementById("totalHarga").value = total.toLocaleString('id-ID');
    document.getElementById("totalHargaRaw").value = total;
}
</script>

<?php include '../../views/layout/footer.php'; ?>
