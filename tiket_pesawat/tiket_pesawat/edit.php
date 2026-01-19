<?php
// Tangkap data dari POST
$tarif = $_POST['tarif'] ?? '';
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

$tarifOptions = [
    'tarif1' => ['deskripsi' => 'Bisa refund (biaya mulai dari Rp 316.000)', 'harga' => 1280900],
    'tarif2' => ['deskripsi' => 'Pembatalan Trip.com Air - Gratis', 'harga' => 1280900],
    'tarif3' => ['deskripsi' => 'Bisa refund (biaya mulai dari Rp 234.000)', 'harga' => 1280900],
];
$tarifDipilih = $tarifOptions[$tarif] ?? ['deskripsi' => 'Tidak diketahui', 'harga' => 0];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Isi Data Penumpang</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f2f4f7;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 960px;
            margin: auto;
            background: #fff;
            padding: 24px;
            border-radius: 12px;
        }
        h2 {
            margin-bottom: 16px;
        }
        .detail-trip, .form-section {
            background-color: #f9fafc;
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 24px;
        }
        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        .label {
            color: #555;
        }
        .value {
            font-weight: bold;
        }
        .form-section label {
            display: block;
            margin-top: 10px;
            font-weight: 500;
        }
        .form-section input, .form-section select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        .section-title {
            margin-top: 32px;
            margin-bottom: 16px;
            font-size: 18px;
            font-weight: bold;
            border-bottom: 1px solid #ddd;
            padding-bottom: 4px;
        }
        .ringkasan {
            margin-top: 24px;
            padding: 16px;
            border-top: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .harga {
            font-size: 20px;
            font-weight: bold;
            color: #1a73e8;
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
    <h2>Data Penumpang</h2>
    <form action="lanjut2.php" method="POST">
        <!-- Data tersembunyi untuk dikirim ke halaman berikutnya -->
        <?php foreach ($tripInfo as $key => $value): ?>
            <input type="hidden" name="<?= $key ?>" value="<?= htmlspecialchars($value) ?>">
        <?php endforeach; ?>
        <input type="hidden" name="tarif" value="<?= htmlspecialchars($tarif) ?>">

        <div class="form-section">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_penumpang" required>

            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" required>

            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" required>
                <option value="">Pilih</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <label>Nomor Identitas (KTP/Paspor)</label>
            <input type="text" name="nomor_id" required>
        </div>

        <div class="section-title">Data Kontak</div>
        <div class="form-section">
            <label>Nama Kontak</label>
            <input type="text" name="nama_kontak" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Nomor Ponsel</label>
            <input type="tel" name="no_hp" required>
        </div>
            <button type="submit" class="lanjut-btn">lanjut</button>
        </div>
    </form>
</div>
</body>
</html>
