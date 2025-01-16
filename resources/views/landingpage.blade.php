<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Website TaniSmart</title>
    <link rel="stylesheet" href="styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
    }

    /* Navbar Styles */
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 50px;
        background-color: white;
    }

    .logoatas {
        padding-left: 40px;
        font-size: 24px;
        font-weight: bold;
    }

    .logo-green {
        color: #8caf50;
    }

    .logo-black {
        color: #333;
    }

    .navbar-right {
        display: flex;
        align-items: center;
    }

    .navbar-right ul {
        list-style: none;
        display: flex;
        margin-right: 20px;
        gap: 30px;
        /* Menambahkan jarak antar item navbar */
    }

    .navbar-right ul li {
        margin-left: 30px;
    }

    .navbar-right ul li a {
        text-decoration: none;
        color: #333;
        font-size: 18px;
        transition: color 0.3s;
    }

    .navbar-right ul li a:hover {
        color: #666;
    }

    .auth-buttons a {
        text-decoration: none;
        margin-left: 20px;
        font-size: 18px;
    }

    .login-btn {
        color: #333;
        padding: 10px 15px;
        background-color: transparent;
        border: 1px solid #8caf50;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .login-btn:hover {
        background-color: #8caf50;
        color: white;
    }

    .signup-btn {
        color: white;
        padding: 10px 15px;
        background-color: #8caf50;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .signup-btn:hover {
        background-color: #7a9d45;
    }

    /* Content Styles */
    .content {
        display: flex;
        align-items: center;
        padding: 50px;
        background-color: #f9fafb;
        justify-content: space-between;
        gap: 20px;
    }

    .content-left {
        max-width: 70%;
    }

    .content-left h1 {
        font-size: 48px;
        margin-bottom: 20px;
        color: #333;
    }

    .content-left .green {
        color: #8caf50;
    }

    .content-left p {
        font-size: 18px;
        color: #666;
        margin-bottom: 30px;
    }

    .content-left button {
        padding: 12px 30px;
        background-color: #8caf50;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 18px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .content-left button:hover {
        background-color: #7a9d45;
    }

    /* Image Styles */
    img {
        max-width: 40%;
        height: auto;
        border-radius: 8px;
    }

    /* Features Section */
    .features-section {
        text-align: center;
        padding: 50px 20px;
        background-color: #fff;
    }

    .features-section h2 {
        font-size: 32px;
        margin-bottom: 10px;
        color: #333;
    }

    .subtitle {
        font-size: 18px;
        color: #666;
        margin-bottom: 40px;
    }

    .features-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .feature-box {
        background-color: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 300px;
        text-align: center;
    }

    .feature-box .icon {
        background-color: #e8f5e9;
        padding: 15px;
        border-radius: 10%;
        margin-bottom: 20px;
    }

    .feature-box h3 {
        font-size: 22px;
        color: #333;
        margin-bottom: 15px;
    }

    .feature-box p {
        font-size: 16px;
        color: #666;
        line-height: 1.5;
    }

    /* Section Styles */
    .section {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 50px;
        background-color: #f9fafb;
    }

    /* Reusing the img styles */
    .section img {
        max-width: 40%;
    }

    .text-content {
        max-width: 45%;
    }

    .text-content h2 {
        font-size: 32px;
        margin-bottom: 20px;
        color: #333;
    }

    .text-content p {
        font-size: 18px;
        color: #666;
        line-height: 1.6;
        text-align: justify;
    }

    /* Container Styles */
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 50px;
    }

    .text-content h2 {
        font-size: 28px;
        margin-bottom: 15px;
    }

    .text-content p {
        line-height: 1.6;
    }

    .footer {
        background-color: #2c3e3f;
        /* Dark background */
        color: #fff;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    .footer-left {
        padding-left: 50px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .footer-right {
        display: flex;
        align-items: center;
    }

    .footer .logo {
        color: #a2c18a;
        /* Green for 'Tani' */
        font-weight: bold;
        font-size: 1.5em;
    }

    .footer .logo span {
        color: #fff;
        /* White for 'Smart' */
    }

    .footer p {
        margin: 5px 0;
        font-size: 0.9em;
        color: #ccc;
    }

    .footer .social-icons {
        display: flex;
        gap: 10px;
    }

    .footer .social-icons a {
        color: #ccc;
        text-decoration: none;
        font-size: 1.2em;
    }

    .footer .social-icons a:hover {
        color: #fff;
    }

    .footer img {
        width: 100px;
    }
</style>

<body>
    <nav class="navbar">
        <div class="logoatas">
            <span class="logo-black">My</span>
            <span class="logo-green">Tani</span>
        </div>
        <div class="navbar-right">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#features">Fitur</a></li>
                <li><a href="#about">Tentang</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="{{ url('login') }}" class="login-btn">Login</a>
                <a href="{{ url('register') }}" class="signup-btn">Sign up</a>
            </div>
        </div>
    </nav>

    <div class="content" id="home">
        <!-- Menambahkan id="home" -->
        <div class="content-left">
            <h1>
                Pasar <span class="green">Pertanian</span> Digital di Genggaman Anda
            </h1>
            <p>
                Aplikasi yang memudahkan petani dan pembeli terhubung dalam satu
                platform digital. Kini hasil tani lebih mudah dijual dan dibeli kapan
                saja.
            </p>
            <button id="registerBtn" onclick="window.location.href='{{ 'home' }}'">Lihat Marketplace</button>
        </div>
        <img src="{{ asset('assets/img/petani1.png') }}" alt="Gambar Pertanian" id="image" />
    </div>

    <section class="features-section" id="features">
        <!-- Menambahkan id="features" -->
        <h2>Kelola Seluruh Hasil Tani Anda Dalam Satu Sistem</h2>
        <p class="subtitle">Apa saja fitur yang ada di dalamnya ?</p>

        <div class="features-container">
            <div class="feature-box">
                <div class="icon">
                    <img src="{{ asset('assets/img/paket.png') }}" alt="Melihat Proses Pertanian" />
                </div>
                <h3>Jual dan Beli Produk Pertanian dengan Mudah</h3>
                <p>
                    MyTani memungkinkan petani dan pembeli melakukan transaksi langsung
                    untuk hasil tani berkualitas. Semua terintegrasi dalam satu platform
                    yang praktis.
                </p>
            </div>

            <div class="feature-box">
                <div class="icon">
                    <img src="{{ asset('assets/img/pencarian.png') }}" alt="Memperkirakan Jadwal Panen" />
                </div>
                <h3>Pencarian Cerdas</h3>
                <p>
                    Temukan produk sesuai kebutuhan Anda dengan pencarian cerdas dan
                    filter lengkap. Belanja lebih cepat dan efisien!
                </p>
            </div>

            <div class="feature-box">
                <div class="icon">
                    <img src="{{ asset('assets/img/bayar.png') }}" alt="Rekomendasi Perawatan Tanaman" />
                </div>
                <h3>Pembayaran Yang Aman</h3>
                <p>
                    Pilih metode pembayaran yang fleksibel dan lacak pengiriman secara
                    real-time. Transaksi aman, pesanan tiba tepat waktu.
                </p>
            </div>
        </div>
    </section>

    <div class="section" id="about">
        <!-- Menambahkan id="about" -->
        <img src="{{ asset('assets/img/petani2.png') }}" alt="Petani bekerja di ladang" />
        <div class="text-content">
            <h2>Meningkatkan efisiensi pertanian</h2>
            <p>
                TaniSmart menyediakan solusi berbasis data yang membantu petani
                memantau setiap tahap proses pertanian secara real-time. Dengan
                analisis data yang akurat, petani dapat melihat perkembangan tanaman,
                mengidentifikasi masalah sejak dini, dan membuat keputusan yang lebih
                cepat dan tepat. Fitur ini memungkinkan petani untuk memperkirakan
                hasil panen, menghitung kebutuhan perawatan, dan mengoptimalkan
                penggunaan sumber daya, sehingga produktivitas meningkat dan risiko
                kerugian dapat diminimalkan.
            </p>
        </div>
    </div>

    <div class="container">
        <img src="{{ asset('assets/img/petani3.png') }}" alt="Petani" />
        <div class="text-content">
            <h2>Memberdayakan petani dengan teknologi cerdas</h2>
            <p>
                TaniSmart memberdayakan petani dengan teknologi cerdas yang memberikan
                data dan informasi secara real-time untuk mendukung pengambilan
                keputusan yang lebih baik. Melalui analisis otomatis dan rekomendasi
                yang dipersonalisasi, petani dapat mengoptimalkan proses pertanian,
                mulai dari perawatan tanaman hingga waktu panen yang tepat. Dengan
                dukungan teknologi ini, petani dapat meningkatkan hasil panen secara
                signifikan dan memaksimalkan keuntungan, sekaligus meminimalkan risiko
                kerugian akibat keputusan yang kurang akurat.
            </p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-left">
            <div class="logo">Tani<span>Smart</span></div>
            <p>Copyright &copy; 2024</p>
            <p>All rights reserved</p>
        </div>
        <div class="footer-right">
            <div class="social-icons">
                <a href="#" aria-label="Instagram"><img src="{{ asset('assets/img/icon-ig.png') }}"
                        alt="" /></a>
                <a href="#" aria-label="Twitter"><img src="{{ asset('assets/img/icon-twitter.png') }}"
                        alt="" /></a>
                <a href="#" aria-label="YouTube"><img src="{{ asset('assets/img/icon-youtube.png') }}"
                        alt="" /></a>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>
