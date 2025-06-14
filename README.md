# 🎟️ EVENTIFY (Event Organizer & Ticketing Web)
## KELOMPOK 7
Nama Anggota:
1. Ghaisan Wildan Bathsya 2317051054
2. Cahya Nerissa 2317051032
3. Fernando Ramadhani 2317051060

Proyek Eventify merupakan sistem penjualan tiket event online sederhana yang dibangun menggunakan PHP dan MySQL. Tujuannya adalah untuk mengelola transaksi penjualan tiket secara aman dan terstruktur, dengan memanfaatkan stored procedure, trigger, transaction, dan stored function untuk memastikan konsistensi data. Sistem ini juga dilengkapi mekanisme backup otomatis untuk menjaga keamanan data.

![Beranda](/image/eventify.png)

## 📌 Detail Konsep

### ⚠️ Disclaimer
Fungsi **stored procedure**, **trigger**, **transaction**, dan **stored function** dalam sistem ini dikembangkan secara khusus untuk memenuhi kebutuhan platform **Eventify**. Implementasi fitur-fitur database ini dapat bervariasi pada sistem berbeda, disesuaikan dengan arsitektur dan karakteristik unik setiap platform.

### 🧠 Stored Procedure
Stored procedure di eventify berfungsi sebagai “alur eksekusi utama” yang menangani proses pembelian tiket event, termasuk perhitungan harga, validasi promo, pengecekan stok, serta pencatatan transaksi. Dengan logika bisnis ditempatkan di database, sistem lebih konsisten, efisien, dan aman terhadap manipulasi dari sisi aplikasi.

![Procedure](/image/Stored_procedure.png)

Beberapa procedure penting yang digunakan:
'pemesanan_pembayaran/pembayaran.php
* 'sp_buat_transaksi_promo'
* Mengambil harga event, promo, dan stok event secara atomic (FOR UPDATE).
* Mengecek validitas kode promo dan mengambil nilai potongan jika ada.
* Memastikan stok cukup untuk permintaan pembelian.
* Menghitung total harga setelah potongan promo.
* Mengurangi stok event secara real-time.
* Mencatat transaksi pada tabel transaksi dengan detail promo.
* Mengembalikan status transaksi (OK, INVALID_PROMO, OUT_OF_STOCK, ERROR).

```php
$stmt3 = $conn->prepare("CALL sp_buat_transaksi_promo(?, ?, ?, ?, @p_total, @p_status)");
$stmt3->execute([$p_user_id, $p_event_id, $p_qty, $kode_promo]);
```
Dengan cara ini, seluruh proses pembelian tiket dapat dijalankan secara konsisten dan aman.

### 🚨 Trigger
Trigger 'pembayaran_status_notify' berfungsi sebagai sistem pengaman otomatis yang aktif setelah data pembayaran diperbarui. Trigger ini memberikan notifikasi ketika status pembayaran berubah, sehingga memudahkan dalam pengelolaan status transaksi.

![Trigger](/image/trigger.png)

* Trigger 'pembayaran_status_notify' otomatis aktif pada update berikut:  Memantau perubahan status pembayaran

```sql
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
```

Trigger ini memiliki fungsi:
1. Memberikan notifikasi real-time saat status pembayaran berubah
2. Berjalan otomatis pada operasi UPDATE
3. Memastikan feedback langsung ke sistem

Dengan adanya trigger di lapisan database, validasi tetap dijalankan secara otomatis, bahkan jika ada celah atau kelalaian dari sisi aplikasi.

### 🔄 Transaction (Transaksi)
Transaksi database sangat penting dalam sistem eventify, terutama pada proses pembelian tiket yang melibatkan banyak langkah (cek stok, validasi promo, update stok, insert transaksi). Pada stored procedure 'sp_buat_transaksi_promo', semua langkah dijalankan di dalam blok START TRANSACTION ... COMMIT. Jika terjadi error (misal stok tidak cukup), maka dilakukan ROLLBACK dan status transaksi dikembalikan sebagai gagal.

```php
if ($dataTransaksi) {
        $p_user_id = $dataTransaksi['user_id'];
        $p_event_id = $dataTransaksi['event_id'];
        $p_qty = $dataTransaksi['qty'];

        $stmt3 = $conn->prepare("CALL sp_buat_transaksi_promo(?, ?, ?, ?, @p_total, @p_status)");
        $stmt3->bind_param("iiis", $p_user_id, $p_event_id, $p_qty, $kode_promo);
        $stmt3->execute();
        $stmt3->close();

        $result3 = $conn->query("SELECT @p_total AS total, @p_status AS status");
        $row3 = $result3->fetch_assoc();

        if ($row3['status'] === 'OK') {
            $resId = $conn->query("SELECT id FROM transaksi WHERE user_id = $p_user_id AND event_id = $p_event_id ORDER BY id DESC LIMIT 1");
            if ($resId && $rowId = $resId->fetch_assoc()) {
                $_SESSION['transaksi_id'] = $rowId['id'];
                $transaksi_id = $rowId['id'];
            }
            $totalHarga = $row3['total'];
            $pesan_error = "Kode promo berhasil diterapkan.";
        } elseif ($row3['status'] === 'INVALID_PROMO') {
            $pesan_error = "Kode promo tidak valid.";
        } elseif ($row3['status'] === 'OUT_OF_STOCK') {
            $pesan_error = "Stok tidak cukup.";
        } else {
            $pesan_error = "Terjadi kesalahan pada proses.";
        }
    } else {
        $pesan_error = "Data transaksi tidak ditemukan.";
    }
```
Dengan pola ini, tidak ada data transaksi yang tercatat jika proses tidak berjalan sempurna. Ini mencegah kasus stok berkurang tanpa transaksi tercatat, atau transaksi tercatat tanpa stok berkurang


### 📺 Stored Function
Stored function di eventify digunakan untuk perhitungan sederhana yang sering dipakai, misalnya menghitung total harga berdasarkan harga satuan dan jumlah tiket. Memiliki fungsi mengembalikan hasil perkalian harga event dengan jumlah tiket.

![Function](/image/stored_function.png)

```sql
CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_total_harga` (`harga_event` DECIMAL(10,2), `qty` INT) RETURNS DECIMAL(10,2) DETERMINISTIC BEGIN
    RETURN harga_event * qty;
END$$

DELIMITER ;
```

'pemesanan_pembayaran/proses_pemesanan.php
```php
$stmt = $conn->prepare("SELECT hitung_total_harga(?, ?) AS total_harga");
$stmt->bind_param("di", $harga_event, $qty);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

$total_harga = $row['total_harga'] ?? 0;
```
Function ini bisa dipanggil dari aplikasi atau dari procedure lain, sehingga logika perhitungan tetap konsisten dan tidak perlu duplikasi kode.


### 🔄 Backup Otomatis
Skrip backup ini menjalankan proses pencadangan database Eventify secara otomatis menggunakan utilitas mysqldump dari direktori bin MySQL pada instalasi XAMPP (C:\xampp\mysql\bin), di mana skrip mengautentikasi ke server MySQL menggunakan akun root dengan password kosong sesuai konfigurasi default XAMPP, kemudian melakukan dump lengkap database eventify termasuk seluruh stored procedure, function, dan event scheduler melalui parameter --routines --events, menyimpan hasil backup sebagai file SQL bernama eventify_backup.sql di direktori khusus C:\Users\user\Downloads\backup_database, dan akhirnya mencatat status operasi (berhasil/gagal) beserta timestamp eksekusi dalam file log mysql_backup_log.txt yang berada di lokasi yang sama dengan file backup, sehingga membentuk sistem pencadangan sederhana yang mempertahankan seluruh struktur database beserta komponen programatiknya seperti prosedur 'sp_buat_transaksi_promo' dan function 'hitung_total_harga' dalam satu paket file yang siap direstore kapan pun diperlukan.

```bat
@echo off
rem path to mysql server bin folder
cd "C:\xampp\mysql\bin"

rem credentials to connect to mysql server
set mysql_user=root
set mysql_password=

rem database to backup
set db_name=eventify

rem backup file name generation
set backup_path=C:\Users\user\Downloads\backup_database
set backup_name=%db_name%_backup

rem backup creation
mysqldump --user=%mysql_user% --password=%mysql_password% --routines --events %db_name% > "%backup_path%\%backup_name%.sql"

if %ERRORLEVEL% neq 0 (
    echo Backup failed: error during dump creation >> "%backup_path%\mysql_backup_log.txt"
) else (
    echo Backup successful >> "%backup_path%\mysql_backup_log.txt"
)

```

### 🧩 Relevansi Proyek dengan Pemrosesan Data Terdistribusi
Sistem eventify dirancang dengan prinsip-prinsip pemrosesan data terdistribusi:

* Konsistensi: Semua proses kritikal (pembelian tiket, pengurangan stok, validasi promo) dijalankan di database dengan procedure dan transaction, sehingga tetap konsisten walau diakses banyak aplikasi.

* Reliabilitas: Transaksi database dan trigger menjaga sistem tetap aman dari error atau interupsi, serta mencegah data ganda/korup.

* Integritas: Logika bisnis utama tersentral di database, sehingga tetap valid walaupun diakses dari berbagai sumber.
