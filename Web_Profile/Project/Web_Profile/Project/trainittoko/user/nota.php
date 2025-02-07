<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian</title>
    <link rel="stylesheet" href="../admin/assets/css/bootstrap.css">
</head>

<body>

<?php include 'menu.php'; ?>

    <section class="konten">
        <div class="container">

            <h2>Detail Pembelian</h2>

            <?php
            $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
            ON pembelian.id_pelanggan=pelanggan.id_pelanggan
            WHERE pembelian.id_pembelian='$_GET[id]'");
            $detail = $ambil->fetch_assoc();
            ?>

            <!--Pelanggan yang beli harus pelanggan yang login-->
            <?php
            //mendapatkan id pelanggan yang beli
            $idpelangganyangbeli = $detail["id_pelanggan"];

            //mendapatkan id pelanggan yang login
            $idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

            if($idpelangganyangbeli!==$idpelangganyanglogin)
            {
                echo "<script>alert('Jangan Nakal');</script>";
                echo "<script>location='riwayat.php';</script>";
                exit();
            }
            ?>

            <div class="row">
                <div class="col-md-4">
                    <h3>Pembelian</h3>
                    <strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
                    Tanggal : <?php echo date("d F Y",strtotime($detail['tanggal_pembelian'])); ?> <br>
                    Total : Rp. <?php echo number_format($detail['total_pembelian']); ?>,00
                </div>
                <div class="col-md-4">
                    <h3>Pelanggan</h3>
                    <strong><?php echo $detail['nama_pelanggan']; ?></strong>
                    <p>
                        <?php echo $detail['telepon_pelanggan']; ?> <br>
                        <?php echo $detail['email_pelanggan']; ?> <br>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pengiriman</h3>
                    <strong><?php echo $detail['tipe']; ?> <?php echo $detail['kota']; ?> <?php echo $detail['provinsi']; ?></strong><br>
                    Ongkos Kirim : Rp. <?php echo number_format($detail['ongkir']); ?> <br>
                    Ekspedisi : <?php echo $detail['ekspedisi']; ?> <?php echo $detail['paket']; ?><br>
                    Estimasi : <?php echo $detail['estimasi']; ?> Hari<br>
                    Alamat : <?php echo $detail['alamat_pengiriman']; ?>
                </div>
            </div>
            <br>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Jumblah</th>
                        <th>SubBerat</th>
                        <th>SubTotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <tr>
                        <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
                        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                            <td><?php echo $nomor ?></td>
                            <td><?php echo $pecah['nama']; ?></td>
                            <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                            <td><?php echo $pecah['berat']; ?> Gr</td>
                            <td><?php echo $pecah['jumblah']; ?></td>
                            <td><?php echo $pecah['subberat']; ?> Gr</td>
                            <td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>


            <div class="row">
                <div class="col-md-7">
                    <div class="alert alert-info">
                        <p>
                            Silahkan melakukan pembayar Rp. <?php echo number_format($detail['total_pembelian']); ?>
                             Ke <br>
                             <strong>BANK BRI 123-234425-1243 AN. Rasya Aditya</strong>
                        </p>
                    </div>
                </div>
            </div>




        </div>
    </section>


</body>

</html>