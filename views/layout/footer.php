<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Footer Eventify</title>

  <!-- Font Awesome untuk ikon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Google Font Pacifico -->
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
    }

    .logo {
      font-family: 'Pacifico', cursive;
    }

    .footer {
      background-color: #0b101c;
      color: #fff;
      padding: 40px 20px;
    }

    .footer-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 30px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .footer-section {
      flex: 1 1 220px;
    }

    .footer .logo {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .footer p,
    .footer li,
    .footer a {
      font-size: 14px;
      line-height: 1.6;
      color: #fff;
    }

    .footer a {
      text-decoration: none;
    }

    .footer a:hover {
      text-decoration: underline;
    }

    .social-icons a {
      margin-right: 10px;
      font-size: 16px;
      color: #fff;
      background: #1f2937;
      padding: 10px;
      border-radius: 50%;
      display: inline-block;
    }

    .footer-section ul {
      list-style: none;
      padding: 0;
    }

    .qris-img {
      width: 100px;
      background-color: #fff;
      padding: 10px;
      border-radius: 8px;
      margin-top: 10px;
    }

    .footer-bottom {
      border-top: 1px solid #2c3e50;
      margin-top: 30px;
      padding-top: 20px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      font-size: 13px;
      max-width: 1200px;
      margin-left: auto;
      margin-right: auto;
    }

    .footer-links a {
      margin-left: 20px;
      color: #aaa;
    }

    .footer-links a:hover {
      color: #fff;
    }
  </style>
</head>
<body>

<footer class="footer">
  <div class="footer-container">
    <div class="footer-section">
      <h2 class="logo">Eventify</h2>
      <p>Platform pemesanan tiket event terpercaya di Indonesia. Temukan dan beli tiket event dengan mudah dan aman.</p>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-x-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
      </div>
    </div>

    <div class="footer-section">
      <h3>Link Cepat</h3>
      <ul>
        <li><a href="#">Beranda</a></li>
        <li><a href="#">Event</a></li>
        <li><a href="#">Tiket Saya</a></li>
        <li><a href="#">Bantuan</a></li>
      </ul>
    </div>

    <div class="footer-section">
      <h3>Kontak</h3>
      <p><i class="fas fa-map-marker-alt"></i> Jl. Jendral Sudirman No.123, Jakarta Pusat, Indonesia</p>
      <p><i class="fas fa-phone"></i> +62 21 1234 5678</p>
      <p><i class="fas fa-envelope"></i> info@eventify.id</p>
    </div>

    <div class="footer-section">
      <h3>Metode Pembayaran</h3>
      QRIS
    </div>
  </div>

  <div class="footer-bottom">
    <p>© 2025 Eventify. Hak Cipta Dilindungi.</p>
    <div class="footer-links">
      <a href="#">Syarat & Ketentuan</a>
      <a href="#">Kebijakan Privasi</a>
    </div>
  </div>
</footer>

</body>
</html>
