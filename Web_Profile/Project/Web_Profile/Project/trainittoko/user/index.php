<?php
// koneksi ke database
session_start();
include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Trainit</title>
    <link rel="stylesheet" href="../admin/assets/css/bootstrap.css">
        <style>
        .thumbnail {
            height: 500px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .thumbnail img {
            max-height: 300px; 
            object-fit: cover; 
            width: 100%; 
        }

        .caption {
            flex-grow: 1;
            text-align: center;
        }

        .caption h3 {
            font-size: 16px;
            min-height: 40px;
        }

        .caption h5 {
            margin-bottom: 15px;
        }

        .thumbnail .btn {
            margin-bottom: 10px;
        }

        .thumbnail .caption .btn {
            width: 100%; 
        }
    </style>


</head>

<body>

    <?php include 'menu.php'; ?>

    <!--Content-->
    <section class="konten">
        <div class="container">
            <h1><b>Koleksi Produk</b></h1> <br>

            <div class="row">
                <?php

                $ambil = $koneksi->query("SELECT * FROM produk");
                ?>
                <?php while ($perproduk = $ambil->fetch_assoc()) { ?>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <img src="../foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="" class="img-responsive">
                            <div class="caption">
                                <h3><?php echo $perproduk['nama_produk']; ?></h3>
                                <h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
                                <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>"
                                    class="btn btn-primary">Beli</a>
                                <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>"
                                    class="btn btn-default">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </section>

</body>

</html>