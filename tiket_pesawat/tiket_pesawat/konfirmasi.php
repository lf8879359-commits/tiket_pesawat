<?php
$koneksi = new mysqli("localhost", "root", "", "tiket_pesawat");

// Simpan data jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_penumpang'];
    $tgl_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $id = $_POST['nomor_id'];
    $nama_kontak = $_POST['nama_kontak'];
    $email = $_POST['email'];
    $telepon = $_POST['no_hp'];

    // Simpan ke database
    $koneksi->query("INSERT INTO penumpang (id, nama, tgl_lahir, jenis_kelamin, nama_kontak, email, telepon)
                     VALUES ('$id', '$nama', '$tgl_lahir', '$jenis_kelamin', '$nama_kontak', '$email', '$telepon')");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Penumpang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 24px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .aksi a {
            margin-right: 8px;
            text-decoration: none;
            color: blue;
        }
        .aksi a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Data Penumpang</h2>
    <table>
        <tr>
            <th>Nama Lengkap</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>No Identitas</th>
            <th>Nama Kontak</th>
            <th>Email</th>
            <th>Nomor Ponsel</th>
            <th>Aksi</th>
        </tr>
        <?php
        $data = $koneksi->query("SELECT * FROM penumpang");
        while ($row = $data->fetch_assoc()) {
        ?>
        <tr>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['tgl_lahir']) ?></td>
            <td><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['nama_kontak']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['telepon']) ?></td>
            <td class="aksi">
                <a href="edit.php?id=<?= urlencode($row['id']) ?>">Edit</a>
                <a href="hapus.php?id=<?= urlencode($row['id']) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
