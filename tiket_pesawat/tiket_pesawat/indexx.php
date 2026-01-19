<?php
session_start();

$isLoggedIn = isset($_SESSION['username']);
$username = $isLoggedIn ? $_SESSION['username'] : null;
$initial  = $isLoggedIn ? strtoupper($username[0]) : null;
$photo    = $isLoggedIn && !empty($_SESSION['photo']) ? $_SESSION['photo'] : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda - TiketPesawat.com</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            box-sizing: border-box;
        }

        body {
            background: #f0f4f8;
            color: #333;
        }

        nav {
            background: linear-gradient(to right, #007bff, #0056b3);
            color: white;
            padding: 15px 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .nav-content {
            display: flex;
            align-items: center;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .nav-menu li a {
            text-decoration: none;
            color: white;
            font-weight: 500;
            padding: 8px 12px;
            transition: 0.3s ease-in-out;
            border-radius: 5px;
        }

        .nav-menu li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .nav-auth {
            margin-left: 30px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .btn-login {
            background-color: #ffd700;
            color: #333;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: #e6c200;
            color: #000;
        }

        .profile-initial,
        .profile-photo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ffd700;
            color: #333;
            font-weight: bold;
            font-size: 18px;
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: default;
        }

        .profile-photo {
            object-fit: cover;
        }

        .hero {
            background: url('https://photos.idnfinancials.com/static/web/2025/GIAA%20%283%29.png') no-repeat center center;
            background-size: cover;
            padding: 100px 20px;
            text-align: center;
            color: white;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .section {
            padding: 40px 20px;
            text-align: center;
        }

        .section h2 {
            margin-bottom: 20px;
            color: #007bff;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            max-width: 1000px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        footer {
            background: #007bff;
            color: white;
            padding: 30px 20px;
            text-align: center;
            margin-top: 40px;
        }

        .newsletter input {
            padding: 10px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            width: 250px;
        }

        .newsletter button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background: #ffd700;
            color: #333;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <div class="nav-container">
            <div class="nav-brand">TiketPesawat.com</div>
            <div class="nav-content">
                <ul class="nav-menu">
                    <li><a href="indexx.php">Beranda</a></li>
                    <li><a href="jadwal.php">Jadwal</a></li>
                    <li><a href="daftarpengguna.php">Daftar Pengguna</a></li>
       
                    <li><a href="histori.php">Histori Transaksi</a></li>
                     <li><a href="profil.php">Profil</a></li>
                </ul>
                <div class="nav-auth">
                    <?php if ($isLoggedIn): ?>
                        <?php if ($photo): ?>
                            <img src="<?= htmlspecialchars($photo); ?>" alt="Profil" class="profile-photo">
                        <?php else: ?>
                            <div class="profile-initial"><?= htmlspecialchars($initial); ?></div>
                        <?php endif; ?>
                        <a href="logout.php" class="btn-login">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="btn-login">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <div class="hero">
        <h1>Selamat Datang<?= $isLoggedIn ? ', ' . htmlspecialchars($username) : '' ?> 👋</h1>
        <p>Cari tiket pesawat murah, pesan sekarang, dan nikmati perjalananmu bersama TiketPesawat.com!</p>
    </div>

    <!-- Form Pencarian Tiket -->
    

    <!-- Rekomendasi Kota Tujuan -->
    <div class="section">
        <h2>🏙 Rekomendasi Kota Tujuan</h2>
         <div class="cards">
            <div class="card">
                <img src="gambarkota_jakarta.jpg" alt="Jakarta" style="width:100%; height:auto; border-radius: 10px;">
                <h3>Jakarta</h3>
                <p>Kota sibuk pusat bisnis Indonesia.</p>
            </div>
            <div class="card">
                <img src="bali.jpg" alt="Bali" style="width:100%; height:auto; border-radius: 10px;">
                <h3>Bali</h3>
                <p>Surga wisata dengan keindahan alam & budaya.</p>
            </div>
            <div class="card">
                <img src="jogjakarta.jpg" alt="Jogjakarta" style="width:100%; height:auto; border-radius: 10px;">
                <h3>Yogyakarta</h3>
                <p>Kota pelajar & budaya Jawa yang kental.</p>
            </div>
            <div class="card">
                <img src="Medan.jpg" alt="Medan" style="width:100%; height:auto; border-radius: 10px;">
                <h3>Medan</h3>
                <p>Gerbang Danau Toba & kuliner khas Batak.</p>
            </div>
        </div>
    </div>
    
    <!-- Wisata Populer -->
    <div class="section">
        <h2>🗺 Wisata Populer</h2>
        <div class="cards">
            <div class="card">
                <img src="Candi.webp" alt="Borobudur" style="width:100%; height:auto; border-radius: 10px;">
                <h3>Borobudur</h3>
                <p>Candi Buddha terbesar dunia di Magelang.</p>
            </div>
            <div class="card">
                <img src="pantaikuta.jpg" alt="Kuta" style="width:100%; height:auto; border-radius: 10px;">
                <h3>Kuta</h3>
                <p>Pantai terkenal di Bali untuk surfing & sunset.</p>
            </div>
            <div class="card">
                <img src="danautoba.webp" alt="DanauToba" style="width:100%; height:auto; border-radius: 10px;">
                <h3>Danau Toba</h3>
                <p>Danau vulkanik dengan pulau Samosir.</p>
            </div>
            <div class="card">
                <img src="monas.jpg" alt="Monas" style="width:100%; height:auto; border-radius: 10px;">
                <h3>Monas</h3>
                <p>Ikon perjuangan kemerdekaan di Jakarta.</p>
            </div>
        </div>
    </div>

    
    

   <!-- Mitra Maskapai -->
<div class="section" style="background-color: #f3f7fb;">
    <h2 style="text-align: center;">✈ <span style="color: #007bff;">Mitra Maskapai</span></h2>
    <div class="airline-logos">
        <a href="https://www.garuda-indonesia.com/" target="_blank" class="airline-card">
        <img src="garudaind.png" alt="Garuda Indonesia" style="width:200px; height:200px; border-radius:50%;">


            <span>Garuda Indonesia</span>
        </a>
        <a href="https://www.citilink.co.id/" target="_blank" class="airline-card">
        
            <span>Citilink</span>
        </a>
        <a href="https://www.airasia.com/" target="_blank" class="airline-card">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/AirAsia_New_Logo.svg/50px-AirAsia_New_Logo.svg.png" alt="AirAsia">
            <span>AirAsia</span>
        </a>
        <a href="https://www.lionair.co.id/" target="_blank" class="airline-card">
       
            <span>Lion Air</span>
        </a>
    </div>
</div>


    <!-- Testimoni -->
   


    <!-- Artikel -->


    <!-- Newsletter -->

    <!-- Footer -->
     <!-- Hasil Pencarian -->
<div class="section" id="hasil-pencarian" style="display:none;">
    <h2>✈ Hasil Penerbangan</h2>
    <div class="cards">
        <div class="card">
            <h3>Garuda Indonesia</h3>
            <p>Rp 1.250.000</p>
            <p>Berangkat: 08:00 WIB</p>
            <p>Tiba: 10:30 WIB</p>
        </div>
        <div class="card">
            <h3>Citilink</h3>
            <p>Rp 980.000</p>
            <p>Berangkat: 09:15 WIB</p>
            <p>Tiba: 11:45 WIB</p>
        </div>
        <div class="card">
            <h3>Lion Air</h3>
            <p>Rp 870.000</p>
            <p>Berangkat: 12:00 WIB</p>
            <p>Tiba: 14:30 WIB</p>
        </div>
    </div>
</div>

    <footer>
        <p>&copy; <?= date('Y'); ?> TiketPesawat.com - Semua Hak Dilindungi</p>
    </footer>

    <script>
        document.getElementById('cariForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const asal = document.getElementById('asal').value;
            const tujuan = document.getElementById('tujuan').value;
            const tanggal = document.getElementById('tanggal').value;
            const penumpang = document.getElementById('penumpang').value;
            const langsung = document.getElementById('langsung').checked;

            const params = new URLSearchParams({
                asal,
                tujuan,
                tanggal,
                penumpang,
                langsung
            });

            window.location.href = hasil.php?${params.toString()};
        });
    </script>
</body>
</html>