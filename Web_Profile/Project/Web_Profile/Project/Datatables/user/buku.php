<?php
// koneksi ke database
include '../admin/koneksi.php';

if (!isset($_SESSION['user'])) {
    header('location:../index.php');

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library PustakaKU</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <style>
        .thumbnail {
            height: fit-content;
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

    <nav class="navbar navbar-default">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="index.php"><b>Home</b></a></li>
                <li><a href="buku.php"><b>Buku</b></a></li>
                <li><a href="film.php"><b>Film</b></a></li>
                <li><a href="logout.php"><b>Logout</b></a></li>
            </ul>
        </div>
    </nav>

    <!--Content-->
    <section class="konten">
        <div class="container">
            <h1><b>Library Pustaka<sup>Ku</sup></b></h1> <br>
            <div class="row">
                <?php

                $ambil = $koneksi->query("SELECT * FROM buku");
                ?>
                <?php while ($buku = $ambil->fetch_assoc()) { ?>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <img src="../admin/foto_buku/<?php echo $buku['foto_buku']; ?>" alt="" class="img-responsive">
                            <div class="caption">
                                <h3><?php echo $buku['judul']; ?></h3>
                                <a href="beli.php?id=<?php echo $buku['id_buku']; ?>" class="btn btn-primary">Beli</a>
                                <a href="detail_buku.php?id=<?php echo $buku['id_buku']; ?>" class="btn btn-default">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

</body>

</html>