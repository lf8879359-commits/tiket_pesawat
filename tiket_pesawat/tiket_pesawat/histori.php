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
<?php
include 'koneksi.php'; // Pastikan file ini berisi koneksi mysqli
?>

<div class="section">
    <h2>📄 Data Penumpang</h2>
    <div style="overflow-x:auto;">
        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
            <thead style="background-color: #f2f2f2;">
                <tr>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Nomor Identitas</th>
                    <th>Nama Kontak</th>
                    <th>Email</th>
                    <th>Telepon</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM penumpang ORDER BY id DESC";
                $result = mysqli_query($koneksi, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['nama']) . "</td>
                                <td>" . htmlspecialchars($row['tgl_lahir']) . "</td>
                                <td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>
                                <td>" . htmlspecialchars($row['nomor_identitas']) . "</td>
                                <td>" . htmlspecialchars($row['nama_kontak']) . "</td>
                                <td>" . htmlspecialchars($row['email']) . "</td>
                                <td>" . htmlspecialchars($row['telepon']) . "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' style='text-align:center;'>Belum ada data penumpang.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>