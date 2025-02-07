<?php
// koneksi ke database
session_start();
include 'koneksi.php';

//jika tidak ada session login
if (!isset($_SESSION["pelanggan"]) or empty($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan Login');</script>";
    echo "<script>location='login.php';</script>";
}

//mendapatkan id pembelian dari url
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

//mendapatkan id pelanggan yang beli
$id_pelanggan_beli = $detpem["id_pelanggan"];

//mendapatkan id pelanggan yang login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_beli !== $id_pelanggan_login) {
    echo "<script>alert('Jangan Nakal');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
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
        <h2>Konfirmasi Pembayaran</h2>
        <p>Kirim bukti pembayaran</p>
        <div class="alert alert-info">
            Total tagihan Anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong>
        </div>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Penyetor</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label>Bank</label>
                <select type="text" class="form-control" name="bank">
                <option value="">--Pilih Bank--</option>
                <option value="Mandiri">Mandiri</option>
                <option value="BCA">BCA</option>
                <option value="BRI">BRI</option>
                </select>
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" min="1">
            </div>
            <div class="form-group">
                <label>Foto bukti</label>
                <input type="file" class="form-control" name="bukti">
                <p class="text-danger">Foto bukti harus jpg maksimal 2 MB</p>
            </div>
            <button class="btn btn-primary" name="kirim">Kirim</button>
        </form>
    </div>

    <?php
    // jika tombol kirim di tekan
    if (isset($_POST["kirim"])) {
        // upload dulu file buktinya
        $namabukti = $_FILES["bukti"]["name"];
        $lokasibukti = $_FILES["bukti"]["tmp_name"];
        $namafiks = date("YmdHis") . $namabukti;
        move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

        $nama = $_POST["nama"];
        $bank = $_POST["bank"];
        $jumlah = $_POST["jumlah"]; // Jumlah yang dibayar
        $tanggal = date("Y-m-d");

        // Mendapatkan total tagihan dari database
        $total_pembelian = $detpem["total_pembelian"];

        // Validasi jumlah yang dibayar dengan total tagihan
        if ($jumlah < $total_pembelian) {
            echo "<script>alert('Jumlah pembayaran kurang. Silakan bayar sesuai tagihan.');</script>";
            echo "<script>location='pembayaran.php?id=$idpem';</script>";
            exit();
        } elseif ($jumlah > $total_pembelian) {
            echo "<script>alert('Jumlah pembayaran lebih dari yang seharusnya.');</script>";
            echo "<script>location='pembayaran.php?id=$idpem';</script>";
            exit();
        } else {
            //simpan pembayaran jika sesuai
            $koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
                VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");

            // update data pembelian dari pending menjadi sudah kirim pembayaran
            $koneksi->query("UPDATE pembelian SET status_pembelian='Sudah kirim Pembayaran'
                    WHERE id_pembelian='$idpem'");

            echo "<script>alert('Terima Kasih sudah mengirimkan Bukti Pembayaran');</script>";
            echo "<script>location='riwayat.php';</script>";
        }
    }
    ?>

</body>

</html>
