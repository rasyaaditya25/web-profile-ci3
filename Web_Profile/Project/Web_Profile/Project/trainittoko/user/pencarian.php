<?php
// koneksi ke database
session_start();
include 'koneksi.php';

$keyword = $_GET["keyword"];
$semuadata = array();

// Properly join the tables and use LIKE for searching
$ambil = $koneksi->query("SELECT produk.*, kategori.nama_kategori 
                          FROM produk 
                          JOIN kategori ON produk.id_kategori = kategori.id_kategori 
                          WHERE produk.nama_produk LIKE '%$keyword%'
                          OR produk.deskripsi_produk LIKE '%$keyword%'
                          OR kategori.nama_kategori LIKE '%$keyword%'");

while ($pecah = $ambil->fetch_assoc()) {
    $semuadata[] = $pecah;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Trainit</title>
    <link rel="stylesheet" href="../admin/assets/css/bootstrap.css">
</head>

<body>

    <?php include 'menu.php'; ?>
    <div class="container">
        <h3>Hasil Pencarian : <?php echo htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8'); ?></h3>

        <?php
        if (empty($semuadata)): ?>
            <div class="alert alert-danger">Produk
                <strong><?php echo htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8'); ?></strong> tidak ditemukan</div>
        <?php endif ?>

        <div class="row">

            <?php foreach ($semuadata as $key => $value): ?>
                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="foto_produk/<?php echo htmlspecialchars($value['foto_produk'], ENT_QUOTES, 'UTF-8'); ?>"
                            alt="" class="img-responsive">
                        <div class="caption">
                            <h3><?php echo htmlspecialchars($value['nama_produk'], ENT_QUOTES, 'UTF-8'); ?></h3>
                            <h5>Rp. <?php echo number_format($value['harga_produk']); ?></h5>
                            <a href="beli.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-primary">Beli</a>
                            <a href="detail.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-default">Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>


        </div>
    </div>

</body>

</html>