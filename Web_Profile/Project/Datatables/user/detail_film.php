<?php
include '../admin/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Set body to take full height */
        html,
        body {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .konten {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 30px;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        h2 {
            font-size: 30px;
            margin-bottom: 15px;
            color: #333;
            font-weight: 600;
            text-align: center;
        }

        .table th,
        .table td {
            padding: 12px 15px;
            vertical-align: middle;
        }

        .table th {
            background-color: #007bff;
            color: white;
            font-weight: 600;
        }

        .table td {
            width: 100%;
            background-color: #f1f1f1;
        }

        .img-responsive {
            border-radius: 8px;
            width: 100%;
            height: auto;
            margin: 0 auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        .col-md-6 {
            flex: 1;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .row {
                flex-direction: column;
            }

            .col-md-6 {
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>

    <section class="konten">
        <div class="container">
            <div class="card">
                <h2>Detail Film</h2>

                <?php
                $id_film = $_GET["id"];

                $ambil = $koneksi->query("SELECT * FROM film LEFT JOIN genre ON 
                film.id_genre=genre.id_genre WHERE id_film='$id_film'");

                $detailfilm = $ambil->fetch_assoc();
                ?>

                <div class="row">
                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <th>Genre</th>
                                <td><?php echo $detailfilm["nama_genre"]; ?></td>
                            </tr>
                            <tr>
                                <th>Judul Film</th>
                                <td><?php echo $detailfilm["judul_film"]; ?></td>
                            </tr>
                            <tr>
                                <th>Sutradara Film</th>
                                <td><?php echo $detailfilm["sutradara"]; ?></td>
                            </tr>
                            <tr>
                                <th>Distributor Film</th>
                                <td><?php echo $detailfilm["distributor"]; ?></td>
                            </tr>
                            <tr>
                                <th>Sinopsis Film</th>
                                <td><?php echo nl2br(htmlspecialchars($detailfilm["sinopsis"])); ?></td>
                            </tr>

                            <tr>
                                <th>Tahun Rilis Film</th>
                                <td><?php echo $detailfilm["tahun_rilis"]; ?></td>
                            </tr>
                        </table>
                        <div class="back-btn">
                            <a href="film.php" class="btn btn-warning btn-sm">Back</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="../admin/foto_film/<?php echo $detailfilm["foto_film"] ?>" alt="Foto Film"
                            class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>