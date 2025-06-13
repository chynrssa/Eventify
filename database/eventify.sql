-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2025 pada 18.18
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventify`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buat_transaksi_promo` (IN `p_user_id` INT, IN `p_event_id` INT, IN `p_qty` INT, IN `p_kode_promo` VARCHAR(20), OUT `p_total` INT, OUT `p_status` VARCHAR(20))   BEGIN
  DECLARE v_harga INT;
  DECLARE v_promo DECIMAL(5,2);
  DECLARE v_potongan DECIMAL(10,2) DEFAULT 0;
  DECLARE v_subtotal INT;
  DECLARE v_newstok INT;
  DECLARE v_valid_promo INT DEFAULT 0;

  DECLARE EXIT HANDLER FOR SQLEXCEPTION
  BEGIN
    ROLLBACK;
    SET p_status = 'ERROR';
  END;

  START TRANSACTION;

  -- Ambil harga event, promo persen, stok
  SELECT harga, promo, stok INTO v_harga, v_promo, v_newstok
  FROM event
  WHERE id = p_event_id
  FOR UPDATE;

  -- Cek promo di tabel promo
  SELECT potongan INTO v_potongan FROM promo WHERE kode = p_kode_promo LIMIT 1;

  IF v_potongan IS NOT NULL THEN
    SET v_valid_promo = 1;
  ELSE
    SET v_potongan = 0;
  END IF;

  IF v_newstok < p_qty THEN
    ROLLBACK;
    SET p_status = 'OUT_OF_STOCK';
  ELSE
    SET v_subtotal = v_harga * p_qty;

    -- Hitung total harga: subtotal - potongan promo (fixed)
    SET p_total = v_subtotal - v_potongan;
    IF p_total < 0 THEN
      SET p_total = 0;
    END IF;

    -- Update stok event
    UPDATE event SET stok = v_newstok - p_qty WHERE id = p_event_id;

    -- Insert transaksi dengan kolom promo diisi potongan promo
    INSERT INTO transaksi (user_id, event_id, qty, total_harga, promo)
    VALUES (p_user_id, p_event_id, p_qty, p_total, v_potongan);

    COMMIT;

    IF v_valid_promo = 1 THEN
      SET p_status = 'OK';
    ELSE
      SET p_status = 'INVALID_PROMO';
    END IF;

  END IF;
END$$

--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_total_harga` (`harga_event` DECIMAL(10,2), `qty` INT) RETURNS DECIMAL(10,2) DETERMINISTIC BEGIN
    RETURN harga_event * qty;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `nama_event` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `promo` decimal(5,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `nama_event`, `harga`, `stok`, `promo`) VALUES
(1, 'Seminar Teknologi AI 2025', 250000, 100, 0.00),
(2, 'Seminar Kesehatan Mental Mahasiswa', 120000, 100, 0.00),
(3, 'Seminar Kepemimpinan Muda', 100000, 100, 0.00),
(4, 'Seminar Nasional Pendidikan 2025', 130000, 100, 0.00),
(5, 'Seminar Bisnis dan Startup', 170000, 100, 0.00),
(6, 'Seminar Hukum Cyber', 400000, 100, 0.00),
(7, 'Seminar Hukum dan HAM', 160000, 100, 0.00),
(8, 'Seminar Kesehatan Keluarga', 110000, 100, 0.00),
(9, 'Seminar Digital Marketing', 180000, 100, 0.00),
(10, 'Seminar Kepemudaan', 90000, 100, 0.00),
(11, 'Live Concert K-Pop Stars 2025', 750000, 96, 0.00),
(12, 'Konser Musik Jazz Malam Minggu', 350000, 100, 0.00),
(13, 'Festival Musik Indie Nusantara', 400000, 69, 0.00),
(14, 'Konser Dangdut Malam Spektakuler', 250000, 84, 0.00),
(15, 'Festival Musik Rock & Metal', 450000, 100, 0.00),
(16, 'Konser Orchestra Nasional', 500000, 100, 0.00),
(17, 'Acara Musik Akustik Kampus', 150000, 100, 0.00),
(18, 'Konser Musik Religi & Sholawat', 200000, 100, 0.00),
(19, 'Festival Musik EDM Party', 600000, 100, 0.00),
(20, 'Konser Musik Oldies Nostalgia', 300000, 100, 0.00),
(21, 'Turnamen Futsal Antar Mahasiswa', 120000, 100, 0.00),
(22, 'Kejuaraan Basket Regional', 140000, 100, 0.00),
(23, 'Lomba Lari 10K Kota Metropolitan', 90000, 100, 0.00),
(24, 'Turnamen Bulu Tangkis Nasional', 130000, 100, 0.00),
(25, 'Liga Voli Mahasiswa', 100000, 100, 0.00),
(26, 'Turnamen Tenis Meja Se-Kota', 110000, 100, 0.00),
(27, 'Kejuaraan Karate & Bela Diri', 125000, 100, 0.00),
(28, 'Fun Run 5K', 70000, 100, 0.00),
(29, 'Kompetisi Panjat Tebing', 95000, 100, 0.00),
(30, 'Kejuaraan Renang Antar Kampus', 105000, 100, 0.00),
(31, 'Pameran Seni Rupa Nusantara', 80000, 100, 0.00),
(32, 'Pameran Startup Digital', 100000, 100, 0.00),
(33, 'Pameran Fotografi Alam', 90000, 100, 0.00),
(34, 'Expo Kewirausahaan Mahasiswa', 110000, 100, 0.00),
(35, 'Pameran Teknologi & Robotik', 150000, 100, 0.00),
(36, 'Pameran Buku & Literasi', 60000, 100, 0.00),
(37, 'Pameran Fashion & Craft', 85000, 100, 0.00),
(38, 'Pameran Otomotif Nasional', 160000, 100, 0.00),
(39, 'Expo Budaya Nusantara', 95000, 100, 0.00),
(40, 'Pameran Kesehatan & Herbal', 70000, 100, 0.00),
(41, 'Workshop UI/UX Design', 200000, 100, 0.00),
(42, 'Workshop Data Science', 250000, 100, 0.00),
(43, 'Pelatihan Public Speaking Profesional', 180000, 100, 0.00),
(44, 'Workshop Digital Marketing', 220000, 100, 0.00),
(45, 'Workshop Fotografi Profesional', 210000, 100, 0.00),
(46, 'Workshop Mobile App Development', 300000, 100, 0.00),
(47, 'Workshop Leadership Skill', 190000, 100, 0.00),
(48, 'Workshop Python Programming', 280000, 100, 0.00),
(49, 'Workshop Video Editing', 230000, 100, 0.00),
(50, 'Workshop Desain Grafis Kreatif', 240000, 100, 0.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `status` enum('pending','berhasil','gagal') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `transaksi_id`, `bukti`, `status`, `created_at`) VALUES
(1, 9, 'bukti_684c4dc2f2e8c.jpg', 'berhasil', '2025-06-13 16:11:46'),
(2, 11, 'bukti_684c4eea038b1.jpg', 'berhasil', '2025-06-13 16:16:42');

--
-- Trigger `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `pembayaran_status_notify` AFTER UPDATE ON `pembayaran` FOR EACH ROW BEGIN
    IF NEW.status = 'berhasil' AND OLD.status <> 'berhasil' THEN
        -- Notifikasi berhasil, contoh simulasikan lewat event MySQL
        SIGNAL SQLSTATE '01000' SET MESSAGE_TEXT = 'Pembayaran berhasil dikonfirmasi!';
    ELSEIF NEW.status = 'gagal' AND OLD.status <> 'gagal' THEN
        SIGNAL SQLSTATE '01000' SET MESSAGE_TEXT = 'Pembayaran gagal, silakan cek ulang!';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `potongan` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id`, `kode`, `potongan`) VALUES
(1, 'PROMO10', 10000.00),
(2, 'DISKON20', 20000.00),
(3, 'SALE5', 5000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `promo` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `user_id`, `event_id`, `qty`, `total_harga`, `promo`, `created_at`) VALUES
(1, 6, 11, 4, 3000000, 0.00, '2025-06-13 13:46:08'),
(2, 1, 14, 8, 2000000, 0.00, '2025-06-13 14:30:10'),
(3, 1, 14, 8, 2000000, 0.00, '2025-06-13 14:30:32'),
(4, 6, 13, 10, 4000000, 0.00, '2025-06-13 15:56:10'),
(5, 6, 13, 10, 3990000, 999.99, '2025-06-13 15:56:46'),
(6, 6, 13, 10, 400000, 0.00, '2025-06-13 16:11:14'),
(7, 6, 13, 10, 3990000, 999.99, '2025-06-13 16:11:19'),
(8, 6, 13, 10, 400000, 0.00, '2025-06-13 16:11:27'),
(9, 6, 13, 10, 3990000, 999.99, '2025-06-13 16:11:32'),
(10, 1, 13, 1, 400000, 0.00, '2025-06-13 16:16:19'),
(11, 1, 13, 1, 390000, 999.99, '2025-06-13 16:16:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kata_sandi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `email`, `kata_sandi`) VALUES
(1, 'wildan batshya', 'wildanbathsya25@gmail.com', 'wildan25'),
(2, 'jainudin', 'jainudin123@gmail.com', 'jainudin25'),
(3, 'amel', 'amel123@gmail.com', 'amel123'),
(4, 'amelia', 'amel1234@gmail.com', 'amel1234'),
(5, 'zaky', 'zaky25@gmail.com', 'zaky25'),
(6, 'bujang', 'budi.santoso@email.com', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_transaksi_id` (`transaksi_id`);

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
