<?php
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Web Profile User</title>
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

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2 class="text-primary">Portfolio</h2>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-web">Web</li>
                        <li data-filter=".filter-games">Games</li>
                    </ul>
                    <!-- End Portfolio Filters -->


                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">


                        <!-- Portfolio Item - web -->
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM portfolio WHERE category = 'Website'")
                            ?>
                        <?php while ($web = $ambil->fetch_assoc()) { ?>
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-web">
                                <img src="../portfolio_photo/<?php echo $web['portfolio_foto']; ?>" class="img-fluid"
                                    alt="Web Project 1">
                                <div class="portfolio-info">
                                    <h4><?php echo $web['judul_portfolio']; ?></h4>
                                    <p><?php echo $web['tentang']; ?></p>
                                    <a href="../portfolio_photo/<?php echo $web['portfolio_foto']; ?>"
                                        title="<?php echo $web['judul_portfolio']; ?>" data-gallery="portfolio-gallery-web"
                                        class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.php?id=<?php echo $web['id_portfolio'] ?>" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- End Portfolio Item -->


                        <!-- Portfolio Item - games -->
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM portfolio WHERE category = 'Games'")
                            ?>
                        <?php while ($game = $ambil->fetch_assoc()) { ?>
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-games">
                                <img src="../portfolio_photo/<?php echo $game['portfolio_foto']; ?>" class="img-fluid"
                                    alt="Web Project 1">
                                <div class="portfolio-info">
                                    <h4><?php echo $game['judul_portfolio']; ?></h4>
                                    <p><?php echo $game['tentang']; ?></p>
                                    <a href="../portfolio_photo/<?php echo $game['portfolio_foto']; ?>"
                                        title="<?php echo $game['judul_portfolio']; ?>" data-gallery="portfolio-gallery-web"
                                        class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.php?id=<?php echo $game['id_portfolio'] ?>" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- End Portfolio Item -->


                    </div><!-- End Portfolio Container -->

                </div>
            </div>

        </section><!-- /Portfolio Section -->

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