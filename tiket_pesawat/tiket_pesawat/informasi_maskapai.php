<?php
$maskapaiList = [
    "Garuda Indonesia" => [
        "tahunBerdiri" => 1949,
        "markas" => "Bandara Soekarno-Hatta, Tangerang",
        "visi" => "Menjadi maskapai pilihan utama dengan pelayanan kelas dunia.",
        "misi" => [
            "Memberikan pengalaman terbang yang aman dan nyaman.",
            "Menjaga ketepatan waktu dan profesionalitas.",
            "Mengutamakan kepuasan pelanggan.",
            "Mendukung kemajuan pariwisata Indonesia."
        ],
        "layanan" => [
            "GarudaMiles (loyalty program)",
            "In-flight entertainment",
            "Makanan & minuman gratis",
            "Bagasi gratis"
        ],
        "gambar" => "https://www.garuda-indonesia.com/static/content/dam/garuda/garuda-indonesia-experience/fleets/fleet-banner.jpg"

    ],
    "Lion Air" => [
        "tahunBerdiri" => 1999,
        "markas" => "Bandara Soekarno-Hatta, Tangerang",
        "visi" => "Menjadi maskapai penerbangan yang terjangkau dan dapat diandalkan.",
        "misi" => [
            "Menyediakan transportasi udara dengan tarif terjangkau.",
            "Menjaga keselamatan dan keamanan penumpang.",
            "Menjangkau wilayah-wilayah terpencil di Indonesia."
        ],
        "layanan" => [
            "Harga tiket murah",
            "Jangkauan rute domestik luas",
            "Layanan makanan di atas pesawat (berbayar)"
        ],
        "gambar" => "https://cdn.infobrand.id/images/img/posts/2018/08/16/lion-air-datangkan-pesawat-baru-boeing-737-max-8-ke-10.jpg"
    ],
    "Citilink" => [
        "tahunBerdiri" => 2001,
        "markas" => "Bandara Juanda, Surabaya",
        "visi" => "Menjadi maskapai berbiaya hemat terbaik di Asia.",
        "misi" => [
            "Memberikan layanan berkualitas dengan harga terjangkau.",
            "Menjadi pilihan utama generasi muda.",
            "Mendukung konektivitas antarwilayah di Indonesia."
        ],
        "layanan" => [
            "Harga terjangkau",
            "Online check-in",
            "Promo tiket rutin",
            "Koneksi dengan Garuda Group"
        ],
        "gambar" => "https://i0.wp.com/pointsgeek.id/wp-content/uploads/2020/01/CITILINK-Airbus-A330-900neo.jpg?fit=1200%2C601&ssl=1"
    ],
    "AirAsia" => [
        "tahunBerdiri" => 1993,
        "markas" => "Kuala Lumpur, Malaysia",
        "visi" => "Menjadi maskapai berbiaya rendah terbaik di dunia.",
        "misi" => [
            "Menyediakan penerbangan hemat bagi semua orang.",
            "Memanfaatkan teknologi untuk kemudahan penumpang.",
            "Menjadi pemimpin dalam inovasi layanan maskapai."
        ],
        "layanan" => [
            "Harga super murah",
            "Pembelian tiket & bagasi online",
            "Makanan khas Asia dalam pesawat (berbayar)",
            "Aplikasi mobile canggih"
        ],
        "gambar" => "https://www.reuters.com/resizer/v2/WOU3ZHTHS5ITVHFUJS5F5U52JU.jpg?auth=d4090c8b3cf9cd6c13c154ab8e426a90de432ee0ffa2e6e955ad6af7f3f203c1&width=5500&quality=80"
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Maskapai</title>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&family=Montserrat:wght@300;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Rubik', sans-serif;
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            padding: 50px 20px;
        }

        h1 {
            text-align: center;
            font-size: 40px;
            color: #1f2937;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 50px;
            font-family: 'Montserrat', sans-serif;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(330px, 1fr));
            gap: 30px;
            max-width: 1300px;
            margin: auto;
        }

        .card {
            background: rgba(255, 255, 255, 0.75);
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            transition: all 0.4s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.3);
            position: relative;
        }

        .card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 3px solid #60a5fa;
        }

        .card-content {
            padding: 20px 25px;
        }

        .card-content h2 {
            font-size: 22px;
            color: #0f172a;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .card-content p,
        .card-content ul {
            font-size: 14px;
            color: #334155;
            line-height: 1.5;
            margin-bottom: 8px;
        }

        .card-content h3 {
            font-size: 15px;
            margin-top: 15px;
            color: #1d4ed8;
        }

        .card-content ul {
            padding-left: 18px;
        }

        .tag {
            position: absolute;
            top: 18px;
            left: -35px;
            background: #3b82f6;
            color: white;
            padding: 5px 45px;
            transform: rotate(-45deg);
            font-weight: bold;
            font-size: 13px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        @media (max-width: 500px) {
            h1 {
                font-size: 28px;
            }

            .card-content h2 {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

<h1>✈️ Maskapai Penerbangan Populer di Indonesia</h1>

<div class="container">
    <?php foreach ($maskapaiList as $nama => $data): ?>
        <div class="card">
            <div class="tag"><?= strtoupper(explode(" ", $nama)[0]) ?></div>
            <img src="<?= $data['gambar'] ?>" alt="<?= $nama ?>">
            <div class="card-content">
                <h2><?= $nama ?></h2>
                <p><strong>Tahun Berdiri:</strong> <?= $data['tahunBerdiri'] ?></p>
                <p><strong>Markas:</strong> <?= $data['markas'] ?></p>
                <h3>Visi</h3>
                <p><?= $data['visi'] ?></p>
                <h3>Misi</h3>
                <ul>
                    <?php foreach ($data['misi'] as $misi): ?>
                        <li><?= $misi ?></li>
                    <?php endforeach; ?>
                </ul>
                <h3>Layanan</h3>
                <ul>
                    <?php foreach ($data['layanan'] as $layanan): ?>
                        <li><?= $layanan ?></li>
                    <?php endforeach; ?>
                </ul>
               
            </div>
        </div>
        
    <?php endforeach; ?>
</div>

<a href="index.php" style="
        background-color: #ffd700;
        color: #000;
        padding: 12px 25px;
        text-decoration: none;
        font-weight: bold;
        border-radius: 8px;
        display: inline-block;
        transition: background-color 0.3s ease;
    ">Kembali ke Beranda</a>
</body>
</html>
