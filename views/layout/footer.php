<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Footer Eventify</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"/>

  <style>
    /* Flexbox agar footer sticky */
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      display: flex;
      flex-direction: column;
      font-family: 'Inter', sans-serif;
      background: #f9fafb;
    }

    main {
      flex: 1; /* Biar main mengambil sisa tinggi layar */
      padding: 20px;
    }

    footer {
      background-color: #111827;
      color: #fff;
      padding: 40px 20px 30px;
      text-align: center;
    }

    .footer-container {
      max-width: 1000px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 40px;
      margin-bottom: 30px;
    }

    .footer-logo {
      font-family: 'Pacifico', cursive;
      font-size: 24px;
      margin-bottom: 10px;
      display: inline-block;
    }

    .footer-text {
      color: #9ca3af;
      font-size: 14px;
      line-height: 1.6;
      margin-bottom: 15px;
    }

    .social-icons {
      display: flex;
      justify-content: center;
      gap: 12px;
    }

    .social-icons a {
      width: 32px;
      height: 32px;
      background-color: #1f2937;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      font-size: 14px;
      transition: background-color 0.3s;
    }

    .social-icons a:hover {
      background-color: #2563eb;
    }

    .footer-section h4 {
      font-size: 16px;
      margin-bottom: 10px;
    }

    .footer-section ul {
      list-style: none;
      padding: 0;
      margin: 0;
      color: #9ca3af;
      font-size: 14px;
    }

    .footer-section ul li {
      margin-bottom: 10px;
    }

    .footer-bottom {
      border-top: 1px solid #1f2937;
      padding-top: 20px;
      font-size: 13px;
      color: #6b7280;
    }

    .footer-bottom a {
      margin: 0 10px;
      color: #9ca3af;
      text-decoration: none;
    }

    .footer-bottom a:hover {
      color: #fff;
    }
  </style>
</head>
<body>



<footer>
  <div class="footer-container">
    <!-- Kolom 1 -->
    <div>
      <span class="footer-logo">Eventify</span>
      <p class="footer-text">Platform pemesanan tiket event terpercaya di Indonesia. Temukan dan beli tiket event dengan mudah dan aman.</p>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-x-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
      </div>
    </div>

    <!-- Kolom 2 -->
    <div class="footer-section">
      <h4>Kontak</h4>
      <ul>
        <li><i class="fas fa-map-marker-alt"></i> Jl. Jendral Sudirman No.123</li>
        <li><i class="fas fa-phone"></i> +62 21 1234 5678</li>
        <li><i class="fas fa-envelope"></i> info@eventify.id</li>
      </ul>
    </div>

    <!-- Kolom 3 -->
    <div class="footer-section">
      <h4>Metode Pembayaran</h4>
      <p class="footer-text">QRIS</p>
    </div>
  </div>

  <div class="footer-bottom">
    <p>© 2025 Eventify. Hak Cipta Dilindungi.</p>
    <div>
      <a href="#">Syarat & Ketentuan</a> |
      <a href="#">Kebijakan Privasi</a>
    </div>
  </div>
</footer>

</body>
</html>
