<?php
include 'koneksi.php';

$id = $_GET['id'];

$hapus = mysqli_query($koneksi, "DELETE FROM users WHERE id = $id");

if ($hapus) {
    echo "<script>alert('User berhasil dihapus'); window.location='daftarpengguna.php';</script>";
} else {
    echo "Gagal menghapus user.";
}
?>
