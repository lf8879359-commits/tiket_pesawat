<?php
  // Ambil input dari GET
  $asal = $_GET['asal'] ?? 'Jakarta';
  $tujuan = $_GET['tujuan'] ?? 'Medan';
  $tanggal = $_GET['tanggal'] ?? date('Y-m-d'); // default hari ini

  // Ubah ke format tanggal lokal
  setlocale(LC_TIME, 'id_ID.UTF-8'); // Untuk server yang support lokal ID
  $tanggal_obj = new DateTime($tanggal);

  // Buat array tanggal +/- 2 hari dari tanggal terpilih
  $dates = [];
  for ($i = -2; $i <= 2; $i++) {
    $date = clone $tanggal_obj;
    $date->modify("$i day");
    $dates[] = [
      'label' => strftime('%a, %e %b', $date->getTimestamp()),
      'active' => $i === 0,
      'harga' => rand(2200000, 2700000) // simulasi harga
    ];
  }
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Hasil Pencarian Tiket</title>
  <style>
    body {
    font-family: 'Segoe UI', sans-serif;
    background-image: url('soekarno.jpeg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin: 0;
    padding: 20px;
}

    .container {
      max-width: 1200px;
      margin: auto;
      padding: 20px;
    }

    .nav-date {
      display: flex;
      justify-content: space-around;
      background: #fff;
      border-radius: 10px;
      margin-bottom: 20px;
      overflow-x: auto;
      padding: 10px;
    }

    .nav-date div {
      text-align: center;
      padding: 10px;
      min-width: 120px;
      border-radius: 8px;
    }

    .nav-date .active {
      background: #e6f0ff;
      font-weight: bold;
      border: 1px solid #3498db;
    }

    .filters {
      width: 250px;
      float: left;
    }

    .filter-box {
      background: #fff;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 20px;
    }

    .results {
      margin-left: 270px;
    }

    .flight-card {
      background: #fff;
      border-radius: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      margin-bottom: 15px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .flight-info {
      display: flex;
      gap: 15px;
      align-items: center;
    }

    .flight-info img {
      height: 40px;
    }

    .flight-times {
      display: flex;
      flex-direction: column;
    }

    .price {
      font-size: 18px;
      font-weight: bold;
      color: #2c3e50;
    }

    .badge {
      background: #4CAF50;
      color: white;
      font-size: 12px;
      padding: 4px 8px;
      border-radius: 4px;
      margin-bottom: 5px;
      display: inline-block;
    }

    .btn-select {
      background: #007BFF;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 6px;
      cursor: pointer;
    }
    .container {
  padding: 30px;
  background: transparent; /* atau bisa dihapus */
  border-radius: 10px;
}


.nav-date {
  display: flex;
  gap: 15px;
  margin-bottom: 20px;
}

.nav-date > div {
  padding: 10px;
  background: white;
  border-radius: 8px;
  text-align: center;
  cursor: pointer;
}

.nav-date .active {
  background: #0d6efd;
  color: white;
  font-weight: bold;
}

.flight-card {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px;
  border: 1px solid #ddd;
  border-radius: 12px;
  margin-bottom: 15px;
  background: white;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.flight-info {
  display: flex;
  align-items: center;
  gap: 15px;
}

.flight-times {
  font-size: 14px;
}

.badge {
  background: #ffc107;
  padding: 5px 10px;
  border-radius: 5px;
  margin-bottom: 5px;
  display: inline-block;
}

.price {
  font-weight: bold;
  font-size: 16px;
  margin-bottom: 10px;
}

.btn-select {
  display: inline-block;
  padding: 10px 18px;
  background-color: #0d6efd;
  color: white;
  border: none;
  border-radius: 6px;
  text-decoration: none;
}
  </style>
</head>
<body>
<?php
// Tangkap parameter dari pencarian
$asal = $_GET['asal'] ?? 'Jakarta';
$tujuan = $_GET['tujuan'] ?? 'Medan';
$tanggal = $_GET['tanggal'] ?? date('Y-m-d');

// Data dummy maskapai
$maskapaiList = [
  [
    'nama' => 'Lion Air',
    'logo' => 'lionair.png',
    'berangkat' => '08:15',
    'tiba' => '11:30',
    'durasi' => '3j15m',
    'harga' => 1450000
  ],
  [
    'nama' => 'Citilink',
    'logo' => 'citilink.png',
    'berangkat' => '10:45',
    'tiba' => '14:00',
    'durasi' => '3j15m',
    'harga' => 1550000
  ],
  [
    'nama' => 'Garuda Indonesia',
    'logo' => 'garudaind.png',
    'berangkat' => '12:30',
    'tiba' => '16:15',
    'durasi' => '3j45m',
    'harga' => 1850000
  ],
  [
    'nama' => 'AirAsia',
    'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/52/AirAsia_Logo.svg/2560px-AirAsia_Logo.svg.png',
    'berangkat' => '12:30',
    'tiba' => '16:15',
    'durasi' => '3j45m',
    'harga' => 1750000
  ]
];
?>

<div class="container">
  <h2><?= htmlspecialchars($tujuan) ?><?= date('d M Y', strtotime($tanggal)) ?></h2>

  <div class="nav-date">
    <!-- Contoh tanggal navigasi dummy -->
    <?php
    $tanggalAwal = strtotime($tanggal) - (2 * 86400);
    for ($i = 0; $i < 5; $i++):
      $tgl = strtotime("+$i day", $tanggalAwal);
      $label = strftime('%a, %e %b', $tgl);
      $active = (date('Y-m-d', $tgl) == $tanggal);
    ?>
      <div class="<?= $active ? 'active' : '' ?>">
        <?= $label ?><br>
        <strong>Rp<?= number_format(1400000 + rand(0, 500000), 0, ',', '.') ?></strong>
      </div>
    <?php endfor; ?>
  </div>
  <div class="results">
    <?php foreach ($maskapaiList as $index => $maskapai): ?>
      <div class="flight-card">
        <div class="flight-info">
          <img src="<?= $maskapai['logo'] ?>" alt="<?= $maskapai['nama'] ?>" width="80">
          <div class="flight-times">
            <div><strong><?= $maskapai['berangkat'] ?></strong> - <strong><?= $maskapai['tiba'] ?></strong></div>
            <div>Durasi: <?= $maskapai['durasi'] ?> (Langsung)</div>
          </div>
        </div>
        <div>
          <?php if ($index == 0): ?>
            <div class="badge">Termurah</div>
          <?php endif; ?>
          <div class="price">Rp <?= number_format($maskapai['harga'], 0, ',', '.') ?></div>
          <a href="pesan.php?maskapai=<?= urlencode($maskapai['nama']) ?>&harga=<?= $maskapai['harga'] ?>&jam_berangkat=<?= $maskapai['berangkat'] ?>&jam_tiba=<?= $maskapai['tiba'] ?>&asal=<?= urlencode($asal) ?>&tujuan=<?= urlencode($tujuan) ?>&tanggal=<?= $tanggal ?>&durasi=<?= urlencode($maskapai['durasi']) ?>" class="btn-select">Pilih</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

</body>
</html>
