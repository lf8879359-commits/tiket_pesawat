<?php
// Tangkap data dari POST
$tripInfo = [
    'tujuan' => $_POST['tujuan'] ?? '',
    'tanggal' => $_POST['tanggal'] ?? '',
    'berangkat_jam' => $_POST['berangkat_jam'] ?? '',
    'tiba_jam' => $_POST['tiba_jam'] ?? '',
    'bandara_asal' => $_POST['bandara_asal'] ?? '',
    'bandara_tujuan' => $_POST['bandara_tujuan'] ?? '',
    'maskapai' => $_POST['maskapai'] ?? '',
    'kode_penerbangan' => $_POST['kode_penerbangan'] ?? '',
    'kelas' => $_POST['kelas'] ?? '',
    'durasi_detail' => $_POST['durasi_detail'] ?? '',
];

$tarif = $_POST['tarif'] ?? '';
$tarifOptions = [
    'tarif1' => ['deskripsi' => 'Bisa refund (biaya mulai dari Rp 316.000)', 'harga' => 1280900],
    'tarif2' => ['deskripsi' => 'Pembatalan Trip.com Air - Gratis', 'harga' => 1280900],
    'tarif3' => ['deskripsi' => 'Bisa refund (biaya mulai dari Rp 234.000)', 'harga' => 1280900],
];
$tarifDipilih = $tarifOptions[$tarif] ?? ['deskripsi' => 'Tidak diketahui', 'harga' => 0];

$penumpang = [
    'nama_penumpang' => $_POST['nama_penumpang'] ?? '',
    'tanggal_lahir' => $_POST['tanggal_lahir'] ?? '',
    'jenis_kelamin' => $_POST['jenis_kelamin'] ?? '',
    'nomor_id' => $_POST['nomor_id'] ?? '',
];

$kontak = [
    'nama_kontak' => $_POST['nama_kontak'] ?? '',
    'email' => $_POST['email'] ?? '',
    'no_hp' => $_POST['no_hp'] ?? '',
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi & Pembayaran</title>
    <style>
        body {
    font-family: 'Segoe UI', sans-serif;
    background-image: url('https://ik.imagekit.io/tvlk/blog/2024/12/shutterstock_2471000881.jpg?tr=q-70,c-at_max,w-500,h-250,dpr-2');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin: 0;
    padding: 20px;
}
        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 24px;
            border-radius: 12px;
        }
        h2 {
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 24px;
        }
        .section h3 {
            border-bottom: 1px solid #ccc;
            padding-bottom: 6px;
        }
        .detail {
            margin-top: 10px;
        }
        .row {
            display: flex;
            justify-content: space-between;
            padding: 6px 0;
        }
        .label {
            color: #555;
        }
        .value {
            font-weight: bold;
        }
        .total {
            font-size: 20px;
            font-weight: bold;
            text-align: right;
            color: #1a73e8;
            margin-top: 16px;
        }
        .pay-btn {
            background-color: #2b66f6;
            color: white;
            padding: 12px 24px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 20px;
            float: right;
        }
        .pay-btn:hover {
            background-color: #1a4fbe;
        }
        .metode-section {
            margin-top: 20px;
        }
        .metode-section label {
            display: block;
            margin: 6px 0;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Konfirmasi & Pembayaran</h2>

    <div class="section">
        <h3>Detail Penerbangan</h3>
        <div class="detail">
            <div class="row"><span class="label">Maskapai:</span><span class="value"><?= htmlspecialchars($tripInfo['maskapai']) ?></span></div>
            <div class="row"><span class="label">Kode Penerbangan:</span><span class="value"><?= htmlspecialchars($tripInfo['kode_penerbangan']) ?></span></div>
            <div class="row"><span class="label">Asal - Tujuan:</span><span class="value"><?= htmlspecialchars($tripInfo['bandara_asal']) ?> → <?= htmlspecialchars($tripInfo['bandara_tujuan']) ?></span></div>
            <div class="row"><span class="label">Tanggal:</span><span class="value"><?= htmlspecialchars($tripInfo['tanggal']) ?></span></div>
            <div class="row"><span class="label">Jam:</span><span class="value"><?= htmlspecialchars($tripInfo['berangkat_jam']) ?> - <?= htmlspecialchars($tripInfo['tiba_jam']) ?></span></div>
            <div class="row"><span class="label">Kelas:</span><span class="value"><?= htmlspecialchars($tripInfo['kelas']) ?></span></div>
        </div>
    </div>

    <div class="section">
        <h3>Data Penumpang</h3>
        <div class="detail">
            <div class="row"><span class="label">Nama:</span><span class="value"><?= htmlspecialchars($penumpang['nama_penumpang']) ?></span></div>
            <div class="row"><span class="label">Tanggal Lahir:</span><span class="value"><?= htmlspecialchars($penumpang['tanggal_lahir']) ?></span></div>
            <div class="row"><span class="label">Jenis Kelamin:</span><span class="value"><?= htmlspecialchars($penumpang['jenis_kelamin']) ?></span></div>
            <div class="row"><span class="label">Nomor ID:</span><span class="value"><?= htmlspecialchars($penumpang['nomor_id']) ?></span></div>
        </div>
    </div>

    <div class="section">
        <h3>Kontak</h3>
        <div class="detail">
            <div class="row"><span class="label">Nama Kontak:</span><span class="value"><?= htmlspecialchars($kontak['nama_kontak']) ?></span></div>
            <div class="row"><span class="label">Email:</span><span class="value"><?= htmlspecialchars($kontak['email']) ?></span></div>
            <div class="row"><span class="label">Nomor HP:</span><span class="value"><?= htmlspecialchars($kontak['no_hp']) ?></span></div>
        </div>
    </div>

    <div class="section">
        <h3>Rincian Harga</h3>
        <div class="row"><span class="label">Tarif Dipilih:</span><span class="value"><?= htmlspecialchars($tarifDipilih['deskripsi']) ?></span></div>
        <div class="total">Total: Rp <?= number_format($tarifDipilih['harga'], 0, ',', '.') ?></div>
    </div>

    <form action="proses_pembayaran.php" method="POST">
        <!-- Hidden inputs -->
        <?php
        foreach ($tripInfo as $key => $value) {
            echo '<input type="hidden" name="'.htmlspecialchars($key).'" value="'.htmlspecialchars($value).'">';
        }
        foreach ($penumpang as $key => $value) {
            echo '<input type="hidden" name="'.htmlspecialchars($key).'" value="'.htmlspecialchars($value).'">';
        }
        foreach ($kontak as $key => $value) {
            echo '<input type="hidden" name="'.htmlspecialchars($key).'" value="'.htmlspecialchars($value).'">';
        }
        echo '<input type="hidden" name="tarif" value="'.htmlspecialchars($tarif).'">';
        ?>

        <div class="metode-section">
            <h3>Metode Pembayaran</h3>
            <label><input type="radio" name="metode_pembayaran" value="transfer" required> Transfer Bank</label>
            <label><input type="radio" name="metode_pembayaran" value="qris"> QRIS</label>
        </div>

        <div class="metode-section">
            <label><input type="checkbox" name="setuju" required> Saya setuju dengan syarat dan ketentuan.</label>
        </div>


        <button type="submit" class="pay-btn">Bayar Sekarang</button>
        
    </form>
</div>
</body>
</html>
