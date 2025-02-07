<?php
// koneksi ke database
session_start();
include 'koneksi.php';

// jika tidak ada session login atau belum login, maka dilarikan ke login php
if (!isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan Login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body>

    <?php include 'menu.php'; ?>

    <section class="konten">
        <div class="container">
            <h1>Keranjang Belanja</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumblah</th>
                        <th>Subharga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $totalberat = 0; ?>
                    <?php $totalbelanja = 0; ?>
                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumblah): ?>
                        <?php
                        // Mengambil data produk berdasarkan id produk
                        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah["harga_produk"] * $jumblah;
                        $subberat = $pecah["berat_produk"] * $jumblah;
                        $totalberat += $subberat;
                        ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah["nama_produk"]; ?></td>
                            <td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
                            <td><?php echo $jumblah; ?></td>
                            <td>Rp. <?php echo number_format($subharga); ?></td>
                        </tr>
                        <?php $nomor++; ?>
                        <?php $totalbelanja += $subharga; ?>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th>Rp. <?php echo number_format($totalbelanja) ?></th>
                    </tr>
                </tfoot>
            </table>

            <form method="POST">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly
                                value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap Pengiriman</label>
                    <textarea class="form-control" name="alamat_pengiriman"
                        placeholder="Masukan Alamat lengkap (Termasuk Kode Pos)"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Provinsi</label>
                            <select class="form-control" name="nama_provinsi">

                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Kota/Kabupaten</label>
                            <select class="form-control" name="nama_kota">

                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Ekspedisi</label>
                            <select class="form-control" name="nama_ekspedisi">
                                <option value="">--Pilih Ekspedisi--</option>
                                <option value="pos">Pos Indonesia</option>
                                <option value="tiki">TIKI</option>
                                <option value="jne">JNE</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Paket</label>
                            <select class="form-control" name="nama_paket">

                            </select>
                        </div>
                    </div>
                </div>
                <input type="text" name="total_berat" value="<?php echo $totalberat ?>">
                <input type="text" name="provinsi">
                <input type="text" name="kota">
                <input type="text" name="tipe">
                <input type="text" name="kodepos">
                <input type="text" name="ekspedisi">
                <input type="text" name="paket">
                <input type="text" name="ongkir">
                <input type="text" name="estimasi">

                <button class="btn btn-primary" name="checkout">Checkout</button>
            </form>

            <?php
            if (isset($_POST["checkout"])) {
                $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                $tanggal_pembelian = date("Y-m-d");
                $alamat_pengiriman = $_POST['alamat_pengiriman'];
                $totalberat = $_POST["total_berat"];
                $provinsi = $_POST["provinsi"];
                $kota = $_POST["kota"];
                $tipe = $_POST["tipe"];
                $kodepos = $_POST["kodepos"];
                $ekspedisi = $_POST["ekspedisi"];
                $paket = $_POST["paket"];
                $ongkir = $_POST["ongkir"];
                $estimasi = $_POST["estimasi"];

                $total_pembelian = $totalbelanja + $ongkir;

                // Menyimpan data ke tabel pembelian
                $koneksi->query("INSERT INTO pembelian 
                (id_pelanggan, tanggal_pembelian, total_pembelian, alamat_pengiriman, totalberat,
                provinsi, kota, tipe, kodepos, ekspedisi, paket, ongkir, estimasi) 
                VALUES ('$id_pelanggan','$tanggal_pembelian','$total_pembelian','$alamat_pengiriman',
                '$totalberat','$provinsi','$kota','$tipe','$kodepos','$ekspedisi','$paket',
                '$ongkir','$estimasi') ");

                // Mendapatkan id pembelian yang barusan terjadi
                $id_pembelian_barusan = $koneksi->insert_id;

                foreach ($_SESSION["keranjang"] as $id_produk => $jumblah) {
                    // Mendapatkan data produk berdasarkan id_produk
                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                    $perproduk = $ambil->fetch_assoc();

                    $nama = $perproduk['nama_produk'];
                    $harga = $perproduk['harga_produk'];
                    $berat = $perproduk['berat_produk'];

                    $subberat = $perproduk['berat_produk'] * $jumblah;
                    $subharga = $perproduk['harga_produk'] * $jumblah;
                    $koneksi->query("INSERT INTO pembelian_produk (
                    id_pembelian, id_produk, nama, harga, berat, subberat, subharga, jumblah)
                    VALUES ('$id_pembelian_barusan', '$id_produk', '$nama', '$harga', '$berat',
                    '$subberat', '$subharga', '$jumblah') ");

                    //script update stok produk
                    $koneksi->query("UPDATE produk SET stok_produk=stok_produk -$jumblah
                        WHERE id_produk='$id_produk'");
                }

                // Mengosongkan keranjang belanja
                unset($_SESSION["keranjang"]);

                // Tampilan dialihkan ke halaman nota, nota dari pembelian barusan
                echo "<script>alert('Pembelian Sukses');</script>";
                echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
            }
            ?>

        </div>
    </section>

</body>

</html>


<script src="admin/assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $.ajax({
            type: 'post',
            url: 'dataprovinsi.php',
            success: function (hasil_provinsi) {
                $("select[name=nama_provinsi]").html(hasil_provinsi);
            }
        });

        $("select[name=nama_provinsi]").on("change", function () {
            //ambil id provinsi yg dipilih dari atribut pribadi
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
            $.ajax({
                type: 'post',
                url: 'datakota.php',
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function (hasil_kota) {
                    $("select[name=nama_kota]").html(hasil_kota);
                }
            });
        });

        $("select[name=nama_ekspedisi]").on("change", function () {
            //mendapatkan data ongkos kirim

            //mendapatkan Ekspedisi yang dipilih
            var ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();

            //mendapatkan id kota yang dipilih pengguna
            var kota_terpilih = $("option:selected", "select[name=nama_kota]").attr("id_kota");

            //mendapatkan total berat dari inputan
            var total_berat = $("input[name=total_berat]").val();

            $.ajax({
                type: 'post',
                url: 'datapaket.php',
                data: 'ekspedisi=' + ekspedisi_terpilih + '&kota=' + kota_terpilih + '&berat=' + total_berat,
                success: function (hasil_paket) {
                    $("select[name=nama_paket]").html(hasil_paket);

                    //letakkan nama ekspedisi terpilihn diinput
                    $("input[name=ekspedisi]").val(ekspedisi_terpilih);
                }
            });
        });

        $("select[name=nama_kota]").on("change", function () {
            var prov = $("option:selected", this).attr("nama_provinsi");
            var kota = $("option:selected", this).attr("nama_kota");
            var tipe = $("option:selected", this).attr("tipe_kota");
            var kodepos = $("option:selected", this).attr("kodepos");

            $("input[name=provinsi]").val(prov);
            $("input[name=kota]").val(kota);
            $("input[name=tipe]").val(tipe);
            $("input[name=kodepos]").val(kodepos);

        });

        $("select[name=nama_paket]").on("change", function () {
            var paket = $("option:selected", this).attr("paket");
            var ongkir = $("option:selected", this).attr("ongkir");
            var etd = $("option:selected", this).attr("etd");

            $("input[name=paket]").val(paket);
            $("input[name=ongkir]").val(ongkir);
            $("input[name=estimasi]").val(etd);
        })

    });
</script>