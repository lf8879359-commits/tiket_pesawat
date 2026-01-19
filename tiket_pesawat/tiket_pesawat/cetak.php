<?php
$tripInfo = $_POST;
$penumpang = $_POST;
$kontak = $_POST;
$tarif = $_POST['tarif'] ?? 'tarif1';

$tarifOptions = [
    'tarif1' => ['deskripsi' => 'Bisa refund (biaya mulai dari Rp 316.000)', 'harga' => 1280900],
    'tarif2' => ['deskripsi' => 'Pembatalan Trip.com Air - Gratis', 'harga' => 1280900],
    'tarif3' => ['deskripsi' => 'Bisa refund (biaya mulai dari Rp 234.000)', 'harga' => 1280900],
];
$tarifDipilih = $tarifOptions[$tarif] ?? ['deskripsi' => 'Tidak diketahui', 'harga' => 0];
$namaFile = 'Tiket_' . preg_replace('/\s+/', '_', $penumpang['nama_penumpang'] ?? 'Penumpang');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($namaFile) ?></title>
    <style>
        body { font-family: sans-serif; padding: 20px; margin: 0; }
        h2 { text-align: center; }
        .section { margin-bottom: 20px; page-break-inside: avoid; }
        .row { display: flex; justify-content: space-between; margin-bottom: 8px; }
        .label { font-weight: bold; }

        @media print {
            @page { size: A4; margin: 20mm; }
            html, body { width: 210mm; height: 297mm; overflow: hidden; }
            .section { page-break-inside: avoid; }
        }
    </style>
    <script>window.onload = function () { window.print(); }</script>
</head>
<body>
    <h2>Tiket Penerbangan</h2>

    <div class="section">
        <h3>Detail Penerbangan</h3>
        <div class="row"><span class="label">Maskapai:</span><span><?= htmlspecialchars($tripInfo['maskapai']) ?></span></div>
        <div class="row"><span class="label">Kode:</span><span><?= htmlspecialchars($tripInfo['kode_penerbangan']) ?></span></div>
        <div class="row"><span class="label">Rute:</span><span><?= htmlspecialchars($tripInfo['bandara_asal']) ?> → <?= htmlspecialchars($tripInfo['bandara_tujuan']) ?></span></div>
        <div class="row"><span class="label">Tanggal:</span><span><?= htmlspecialchars($tripInfo['tanggal']) ?></span></div>
        <div class="row"><span class="label">Jam:</span><span><?= htmlspecialchars($tripInfo['berangkat_jam']) ?> - <?= htmlspecialchars($tripInfo['tiba_jam']) ?></span></div>
        <div class="row"><span class="label">Kelas:</span><span><?= htmlspecialchars($tripInfo['kelas']) ?></span></div>
    </div>

    <div class="section">
        <h3>Penumpang</h3>
        <div class="row"><span class="label">Nama:</span><span><?= htmlspecialchars($penumpang['nama_penumpang']) ?></span></div>
        <div class="row"><span class="label">Tanggal Lahir:</span><span><?= htmlspecialchars($penumpang['tanggal_lahir']) ?></span></div>
        <div class="row"><span class="label">Jenis Kelamin:</span><span><?= htmlspecialchars($penumpang['jenis_kelamin']) ?></span></div>
        <div class="row"><span class="label">Nomor ID:</span><span><?= htmlspecialchars($penumpang['nomor_id']) ?></span></div>
    </div>

    <div class="section">
        <h3>Kontak</h3>
        <div class="row"><span class="label">Nama:</span><span><?= htmlspecialchars($kontak['nama_kontak']) ?></span></div>
        <div class="row"><span class="label">Email:</span><span><?= htmlspecialchars($kontak['email']) ?></span></div>
        <div class="row"><span class="label">HP:</span><span><?= htmlspecialchars($kontak['no_hp']) ?></span></div>
    </div>

    <div class="section">
        <h3>Harga</h3>
        <div class="row"><span class="label">Tarif:</span><span><?= htmlspecialchars($tarifDipilih['deskripsi']) ?></span></div>
        <div class="row"><span class="label">Total:</span><span>Rp <?= number_format($tarifDipilih['harga'], 0, ',', '.') ?></span></div>
        <a href="index.php" class="done-btn">kembali ke Beranda</a>
    </div>
</body>
</html>
