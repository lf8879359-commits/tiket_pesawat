<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket Pesawat</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
height: 100vh;
background-image: url('kualanamu.jpg');
background-size: cover;
background-position: center;
background-repeat: no-repeat;
margin: 0;
padding: 20px;

        }
        .container {
            max-width: 400px;
            background: white;
            color: black;
            padding: 20px;
            border-radius: 10px;
            margin: auto;
            margin-top: 40px;
        }
        h2 {
            text-align: center;
            color: rgb(255, 145, 0);
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .button {
            margin-top: 15px;
            width: 100%;
            background: rgb(255, 98, 0);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
        }
        .button:hover {
            background: rgb(179, 78, 0);
            cursor: pointer;
        }
    </style>
</head>
<body>

    <!-- Form Pencarian Tiket -->
    <section style="padding: 40px 0; color: white; text-align: center;">
    <div style="text-align: center; margin-top: 50px;">
  <h2 style="
    font-size: 40px;
    font-weight: bold;
    color:rgb(51, 194, 255);
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
    margin: 0;">
    tiket pesawat
  </h2>
</div>



<form id="cariForm" method="get" action="hasil.php"
    style="background: url('.jpg') no-repeat center center; background-size: cover; padding: 20px; border-radius: 10px; width: 90%; max-width: 1000px; margin: auto; color: black; display: flex; flex-wrap: wrap; gap: 10px; align-items: center; justify-content: space-between; box-shadow: 0 4px 10px rgba(81, 85, 86, 0.88);">
    <div style="flex: 1 1 100%; display: flex; gap: 15px; margin-bottom: 10px;">
        <label style="font-weight: bold;"><input type="radio" name="trip" value="pp" checked> Pulang-Pergi</label>
        <label style="font-weight: bold;"><input type="radio" name="trip" value="sj"> Sekali Jalan</label>
        <label style="font-weight: bold;"><input type="radio" name="trip" value="multi"> Multi-Kota</label>
    </div>

    <div style="flex: 1 1 30%;">
        <label style="font-weight: bold;">Asal</label><br>
        <input list="daftarKota" id="asal" name="asal" required style="width: 100%; padding: 8px;">
    </div>

    <div style="flex: 1 1 30%;">
        <label style="font-weight: bold;">Tujuan</label><br>
        <input list="daftarKota" id="tujuan" name="tujuan" required style="width: 100%; padding: 8px;">
    </div>

    <datalist id="daftarKota">
        <option value="Jakarta">
        <option value="Surabaya">
        <option value="Yogyakarta">
        <option value="Medan">
        <option value="Bali">
            <option value="bandung">
    </datalist>

    <div style="flex: 1 1 20%;">
        <label style="font-weight: bold;">Tanggal</label><br>
        <input type="date" id="tanggal" name="tanggal" required style="width: 100%; padding: 8px;">
    </div>

    <div style="flex: 1 1 30%;">
    <label style="color: black;  font-weight: bold; ">Penumpang</label><br>

    <select id="penumpang" name="penumpang" style="width: 100%; padding: 8px; color: black;">
        <option value="7 Dewasa, Ekonomi" selected>7 Dewasa, Ekonomi</option>
        <option value="1 Dewasa, Ekonomi">1 Dewasa, Ekonomi</option>
        <option value="2 Dewasa, Bisnis">2 Dewasa, Bisnis</option>
    </select>
</div>


    <div style="flex: 1 1 60%; display: flex; align-items: center; justify-content: space-between; margin-top: 10px;">
        <label style="color: black; font-weight: bold;"><input type="checkbox" id="langsung" name="langsung"> Penerbangan langsung</label>
        <button type="submit" style="padding: 10px 20px; background-color: #0d6efd; color: white; border: none; border-radius: 5px;">🔍 Cari</button>
    </div>
</form>

    </section>

</body>
</html>
