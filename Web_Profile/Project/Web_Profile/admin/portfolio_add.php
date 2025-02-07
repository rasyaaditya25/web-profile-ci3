<?php
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Web Profile Admin</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="../assets/img/logo.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="../assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: DevFolio
  * Template URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page overflow-x-hidden">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="../assets/img/logo.png" alt="" height="auto">
            </a>

            <?php
            include 'menu.php'
                ?>

        </div>
    </header>

    <main class="main">

            <div class="container mt-4">
        <h2 class="mb-4">Add Portfolio</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label>Choose Category</label>
                <select name="Kategori" class="form-control">
                    <option value="Website">Website</option>
                    <option value="Games">Games</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label>Portfolio About</label>
                <input type="text" class="form-control" name="tentang" required>
            </div>
            <div class="form-group mb-3">
                <label>Portfolio Title</label>
                <input type="text" class="form-control" name="judul" required>
            </div>
            <div class="form-group mb-3">
                <label>Portfolio Description</label>
                <textarea type="text" class="form-control" name="deskripsi" required></textarea>
            </div>
            <div class="form-group mb-3">
                <label>Photo Portfolio</label>
                <div class="letak-input" style="margin-bottom: 10px;">
                    <input type="file" class="form-control" name="foto[]" required>
                </div>
            </div>
            <div class="form-group mb-3">
                <label>Portfolio Linking</label>
                <input type="text" class="form-control" name="link" required>
            </div>
            <button class="btn btn-primary" name="save">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>
    <br>

    <?php
                if (isset($_POST["save"])) {

                    $namafoto = $_FILES['foto']['name'];
                    $lokasifoto = $_FILES['foto']['tmp_name'];

                    if (!empty($_POST['Kategori'])) {
                        // Simpan foto pertama
                        move_uploaded_file($lokasifoto[0], "../portfolio_photo/" . $namafoto[0]);

                        // Masukkan data ke dalam tabel portfolio
                        $koneksi->query("INSERT INTO portfolio
         (category, tentang, judul_portfolio, deskripsi_portfolio, portfolio_foto, linking)
         VALUES ('{$_POST['Kategori']}', '{$_POST['tentang']}', '{$_POST['judul']}', '{$_POST['deskripsi']}', '{$namafoto[0]}', '{$_POST['link']}')");

                        echo "<div class='alert alert-info'>Data Tersimpan</div>";
                        echo "<meta http-equiv='refresh' content='1;url=portfolio.php'>";
                    } else {
                        echo "<div class='alert alert-warning'>Category belum dipilih!</div>";
                    }

                }
                ?>
            </div>

    </main>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/typed.js/typed.umd.js"></script>
    <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>