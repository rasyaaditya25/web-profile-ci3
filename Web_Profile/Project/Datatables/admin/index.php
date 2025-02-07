<?php
    include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PustakaKu</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Pustaka<sup>Ku</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Navigasi
            </div>
                <!-- Nav Item - Kategori -->
                <li class="nav-item">
                    <a class="nav-link" href="?halaman=kategori">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Kategori Buku</span></a>
                </li>
                <!-- Nav Item - Genre -->
                <li class="nav-item">
                    <a class="nav-link" href="?halaman=genre">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Genre Film</span></a>
                </li>

                <!-- Nav Item - Buku -->
                <li class="nav-item">
                    <a class="nav-link" href="?halaman=buku">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Koleksi Buku</span></a>
                </li>
                <!-- Nav Item - Film -->
                <li class="nav-item">
                    <a class="nav-link" href="?halaman=film">
                        <i class="fas fa-fw fa-film"></i>
                        <span>Koleksi Film</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                        <i class="fas fa-fw fa-power-off"></i>
                        <span>Logout</span></a>
                </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>
                <!-- End of Topbar -->

                 <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    if (isset($_GET['halaman'])) {
                        if ($_GET['halaman'] == "buku") {
                            include 'buku.php';
                        }
                        if ($_GET['halaman'] == "buku_tambah") {
                            include 'buku_tambah.php';
                        }
                        if ($_GET['halaman'] == "buku_ubah") {
                            include 'buku_ubah.php';
                        }
                        if ($_GET['halaman'] == "buku_hapus") {
                            include 'buku_hapus.php';
                        }
                        if ($_GET['halaman'] == "buku_detail") {
                            include 'buku_detail.php';
                        }
                        if ($_GET['halaman'] == "kategori") {
                            include 'kategori.php';
                        }
                        if ($_GET['halaman'] == "kategori_tambah") {
                            include 'kategori_tambah.php';
                        }
                        if ($_GET['halaman'] == "kategori_ubah") {
                            include 'kategori_ubah.php';
                        }
                        if ($_GET['halaman'] == "kategori_hapus") {
                            include 'kategori_hapus.php';
                        }
                        if ($_GET['halaman'] == "genre") {
                            include 'genre.php';
                        }
                        if ($_GET['halaman'] == "genre_tambah") {
                            include 'genre_tambah.php';
                        }
                        if ($_GET['halaman'] == "genre_ubah") {
                            include 'genre_ubah.php';
                        }
                        if ($_GET['halaman'] == "genre_hapus") {
                            include 'genre_hapus.php';
                        }
                        if ($_GET['halaman'] == "film") {
                            include 'film.php';
                        }
                        if ($_GET['halaman'] == "film_tambah") {
                            include 'film_tambah.php';
                        }
                        if ($_GET['halaman'] == "film_ubah") {
                            include 'film_ubah.php';
                        }
                        if ($_GET['halaman'] == "film_detail") {
                            include 'film_detail.php';
                        }
                        if ($_GET['halaman'] == "film_hapus") {
                            include 'film_hapus.php';
                        }
                    } else {
                        include 'home.php';
                    }
                    ?>


                </div>
                <!-- End of Content Wrapper -->
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
     <script src="js/sb-admin-2.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>