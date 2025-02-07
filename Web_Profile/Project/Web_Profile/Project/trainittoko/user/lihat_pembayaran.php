<?php
// koneksi ke database
session_start();
include 'koneksi.php';

//mendapatkan id pembelian dari url
$id_pembelian = $_GET['id'];

//mengambil data pembayaran berdasarkan id pembelian
$ambil = $koneksi->query("SELECT * FROM pembayaran 
    LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian 
    WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

// jika belum ada data pembayaran
if(empty($detbay))
{
    echo "<script>alert('Belum ada Data Pembayaran');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}

//jika data pelanggan tidak sesuai dengan yang login
if ($_SESSION["pelanggan"]['id_pelanggan']!==$detbay["id_pelanggan"])
{
    echo "<script>alert('Anda tidak berhak melihat data pembelian orang');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}

echo "<pre>";
print_r($detbay);
echo "</pre>";

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
        <h3>Lihat Pembayaran</h3>
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <th><?php echo $detbay['nama'] ?></th>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <th><?php echo $detbay['bank'] ?></th>
                    </tr>
                    <tr>
                        <th>Jumblah</th>
                        <th>Rp. <?php echo number_format($detbay['total_pembelian']) ?></th>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <th><?php echo $detbay['tanggal'] ?></th>
                    </tr>
                </table>
            </div>
            <div class="col-md-6"><img src="bukti_pembayaran/<?php echo $detbay['bukti'] ?>" alt="" class="img-responsive"></div>
        </div>
    </div>

</body>

</html>