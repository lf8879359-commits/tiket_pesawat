<?php
include 'koneksi.php';
$asal_kota = $_GET['asal'] ?? 'Medan';
$tujuan_kota = $_GET['tujuan'] ?? 'Jogya';

// Ambil nama_bandara untuk kota asal
$query_asal = $koneksi->prepare("SELECT nama_bandara FROM bandara WHERE kota_bandara = ?");
$query_asal->bind_param("s", $asal_kota);
$query_asal->execute();
$result_asal = $query_asal->get_result();
$bandara_asal = $result_asal->fetch_assoc()['nama_bandara'] ?? 'Bandara asal tidak ditemukan';

// Ambil nama_bandara untuk kota tujuan
$query_tujuan = $koneksi->prepare("SELECT nama_bandara FROM bandara WHERE kota_bandara = ?");
$query_tujuan->bind_param("s", $tujuan_kota);
$query_tujuan->execute();
$result_tujuan = $query_tujuan->get_result();
$bandara_tujuan = $result_tujuan->fetch_assoc()['nama_bandara'] ?? 'Bandara tujuan tidak ditemukan';

$tripInfo = [
    'asal' => $asal_kota,
    'tujuan' => $tujuan_kota,
    'bandara_asal' => $bandara_asal,
    'bandara_tujuan' => $bandara_tujuan,
    'tanggal' => $_GET['tanggal'] ?? 'Jum, 13 Jun',
    'durasi' => $_GET['durasi'] ?? '2j25m',
    'berangkat_jam' => $_GET['jam_berangkat'] ?? '21:10',
    
    'maskapai' => $_GET['maskapai'] ?? 'Pelita Air',
    'kode_penerbangan' => $_GET['kode_penerbangan'] ?? 'IP303',
    'kelas' => $_GET['kelas'] ?? 'Ekonomi',
    'durasi_detail' => $_GET['durasi_detail'] ?? '2j25m',
    'tiba_jam' => $_GET['jam_tiba'] ?? '23:35',
 
];

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pilih Tarif</title>
    <style>
        body {
    font-family: 'Segoe UI', sans-serif;
    background-image: url('https://topcareer.id/wp-content/uploads/2020/04/plane-750x460.jpeg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin: 0;
    padding: 20px;
}

        .container {
  padding: 30px;
  background: transparent; /* atau bisa dihapus */
  border-radius: 10px;
}
        .badge {
            background-color: #2b66f6;
            color: white;
            padding: 4px 10px;
            border-radius: 8px;
            font-size: 12px;
            margin-right: 10px;
        }
        .card-container {
            display: flex;
            gap: 16px;
            margin-top: 24px;
            flex-wrap: wrap;
        }
        .tarif-card {
            flex: 1;
            border: 2px solid #ccc;
            border-radius: 12px;
            padding: 16px;
            cursor: pointer;
            position: relative;
            transition: border 0.3s;
            background: #fff;
        }
        .tarif-card:hover {
            border-color: #1a73e8;
        }
        .tarif-card input {
            position: absolute;
            top: 16px;
            right: 16px;
            transform: scale(1.5);
        }
        .tarif-card h3 {
            margin-top: 0;
            color: #1d3557;
        }
        .tarif-card ul {
            list-style: none;
            padding: 0;
            margin: 12px 0;
        }
        .tarif-card li {
            margin-bottom: 6px;
        }
        .tarif-card .highlight {
            background: #e7f9f7;
            padding: 10px;
            border-radius: 8px;
            color: #05676e;
            font-weight: 500;
        }
        .harga {
            font-size: 20px;
            font-weight: bold;
            color: #1a73e8;
            margin-top: 10px;
        }
        .footer-bar {
            background: white;
            position: sticky;
            bottom: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 24px;
            border-top: 1px solid #ddd;
            z-index: 100;
        }
        .lanjut-btn {
            background-color: #2b66f6;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }
        .lanjut-btn:hover {
            background-color: #1a4fbe;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Detail Trip -->
    <h2 style="margin-bottom: 16px;">Trip ke <?= htmlspecialchars($tripInfo['tujuan']); ?></h2>
    <div style="display: flex; align-items: center; margin-bottom: 12px;">
        <span class="badge">Berangkat</span>
        <span><?= $tripInfo['tanggal']; ?></span>
        <span style="margin: 0 8px;">|</span>
        <span>Durasi <?= $tripInfo['durasi']; ?></span>
    </div>
    <div style="display: flex; gap: 16px;">
        <div style="width: 70px; text-align: center;">
            <div style="font-size: 18px; font-weight: bold;"><?= $tripInfo['berangkat_jam']; ?></div>
            <div style="height: 40px; border-left: 2px solid #ccc; margin: 8px auto;"></div>
            <div style="font-size: 18px; font-weight: bold;"><?= $tripInfo['tiba_jam']; ?></div>
        </div>
        <div style="flex: 1;">
            <div style="font-weight: bold;"><?= $tripInfo['bandara_asal']; ?></div>
            <div style="font-size: 14px; color: gray; margin-top: 4px;">
                <?= $tripInfo['maskapai']; ?> <?= $tripInfo['kode_penerbangan']; ?> | <?= $tripInfo['kelas']; ?>
            </div>
            <div style="font-size: 14px; color: gray; margin-top: 4px;">
                ⏱ Durasi penerbangan: <?= $tripInfo['durasi']; ?>
            </div>
            <div style="font-weight: bold; margin-top: 16px;"><?= $tripInfo['bandara_tujuan']; ?></div>
        </div>
    </div>

    <!-- Form Pilihan Tarif -->
    <form method="POST" action="lanjut.php">
        <?php foreach ($tripInfo as $key => $value): ?>
            <input type="hidden" name="<?= htmlspecialchars($key); ?>" value="<?= htmlspecialchars($value); ?>">
        <?php endforeach; ?>
        <input type="hidden" name="harga" id="hargaInput" value="">

        <h2 style="margin-top: 32px;">Pilih Tarif</h2>

        <div class="card-container">
            <label class="tarif-card">
                <input type="radio" name="tarif" value="tarif1" data-harga="1280900" required>
                <h3>Ekonomi</h3>
                <ul>
                    <li>🛃 Bagasi kabin: <strong>1 item</strong></li>
                    <li>🛃 Bagasi terdaftar: <strong>1 × 20 kg</strong></li>
                </ul>
                <div><strong>Fleksibilitas</strong></div>
                <div>Bisa refund (biaya mulai dari Rp 316.000)</div>
                <div class="harga">Rp 1.280.900</div>
            </label>

            <label class="tarif-card">
                <input type="radio" name="tarif" value="tarif2" data-harga="1350900">
                <h3>Ekonomi</h3>
                <ul>
                    <li>🛃 Bagasi kabin: <strong>1 item</strong></li>
                    <li>🛃 Bagasi terdaftar: <strong>1 × 20 kg</strong></li>
                </ul>
                <div class="highlight">
                    Pembatalan Trip.com Air<br>
                    Biaya pembatalan: <strong>Gratis</strong>
                </div>
                <div class="harga">Rp 1.350.900</div>
            </label>

            <label class="tarif-card">
                <input type="radio" name="tarif" value="tarif3" data-harga="1170900">
                <h3>Ekonomi</h3>
                <ul>
                    <li>🛃 Bagasi kabin: <strong>1 item</strong></li>
                    <li>🛃 Bagasi terdaftar: <strong>1 × 20 kg</strong></li>
                </ul>
                <div><strong>Fleksibilitas</strong></div>
                <div>Bisa refund (biaya mulai dari Rp 234.000)</div>
                <div class="harga">Rp 1.170.900</div>
            </label>
        </div>

        <div class="footer-bar">
            <div class="harga" id="footerHarga">Rp -</div>
            <button type="submit" class="lanjut-btn">Lanjut</button>
        </div>
    </form>
</div>

<script>
    const radios = document.querySelectorAll('input[name="tarif"]');
    const footerHarga = document.getElementById('footerHarga');
    const hargaInput = document.getElementById('hargaInput');

    radios.forEach(radio => {
        radio.addEventListener('change', function() {
            const harga = this.getAttribute('data-harga');
            const formatted = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(harga);
            footerHarga.textContent = formatted;
            hargaInput.value = harga;
        });
    });
</script>

</body>
</html>
