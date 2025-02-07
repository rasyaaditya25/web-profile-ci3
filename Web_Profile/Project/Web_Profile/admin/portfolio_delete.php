<?php
include '../koneksi.php';

// Mendapatkan ID portfolio dari URL
$id_portfolio = $_GET['id'];

// Mengambil data portfolio berdasarkan ID
$query = $koneksi->query("SELECT * FROM portfolio WHERE id_portfolio='$id_portfolio'");
$data = $query->fetch_assoc();

// Hapus file foto jika ada
if (file_exists("../portfolio_photo/" . $data['portfolio_foto']) && $data['portfolio_foto'] != '') {
    unlink("../portfolio_photo/" . $data['portfolio_foto']);
}

// Hapus data portfolio dari database
$koneksi->query("DELETE FROM portfolio WHERE id_portfolio='$id_portfolio'");

// Redirect ke halaman portfolio dengan pesan sukses
echo "<div class='alert alert-info'>Portfolio Deleted</div>";
echo "<meta http-equiv='refresh' content='1;url=portfolio.php'>";
?>