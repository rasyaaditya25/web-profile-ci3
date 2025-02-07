<?php
$id_genre = $_GET['id'];

$koneksi->query("DELETE FROM genre WHERE id_genre='$id_genre'");

echo "<script>alert('Genre berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=genre';</script>";
?>