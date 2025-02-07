<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">


    <h2>Koleksi Film</h2><br>

    <!-- DataTales Example -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <a href="?halaman=film_tambah" class="mb-2 btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                    Tambah Film</a><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto Film</th>
                            <th>Genre</th>
                            <th>Judul Film</th>
                            <th>Tahun Rilis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        $semuadata = array();
                        $ambil = $koneksi->query("SELECT * FROM film LEFT JOIN genre ON film.id_genre=genre.id_genre");
                        while ($tiap = $ambil->fetch_assoc()) {
                            $semuadata[] = $tiap;
                        }
                        ?>

                        <?php foreach ($semuadata as $key => $value): ?>
                            <tr>
                                <td><?php echo $nomor++; ?></td>
                                <td>
                                    <img src="foto_film/<?php echo $value["foto_film"] ?>" class="img-responsive" width="100"><br>
                                </td>
                                <td><?php echo $value['nama_genre'] ?></td>
                                <td><?php echo $value['judul_film'] ?></td>
                                <td><?php echo date('j F Y', strtotime($value['tahun_rilis'])); ?></td>
                                <td>
                                    <a onclick="return confirm('Apakah anda yakin menghapus ini?')"
                                        href="?halaman=film_hapus&id=<?php echo $value['id_film'] ?>"
                                        class="btn btn-danger btn-sm">Hapus</a>
                                    <a href="?halaman=film_ubah&id=<?php echo $value['id_film'] ?>"
                                        class="btn btn-warning btn-sm">Ubah</a>
                                    <a href="?halaman=film_detail&id=<?php echo $value['id_film'] ?>"
                                        class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>