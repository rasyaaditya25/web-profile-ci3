<h2>Detail Pembelian</h2>

<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
         ON pembelian.id_pelanggan=pelanggan.id_pelanggan
         WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<div class="row">
    <div class="col-md-4">
        <h3><b>Pembelian</b></h3>
        <p>
            Status Barang : <?php echo $detail['status_pembelian']; ?> <br>
            No. Resi : <?php echo $detail['resi_pengiriman']; ?> <br>
            Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
            Total : Rp. <?php echo number_format($detail['total_pembelian']); ?>,00
        </p>
    </div>
    <div class="col-md-4">
        <h3><b>Pelanggan</b></h3>
        <p>
        <strong>Nama : <?php echo $detail['nama_pelanggan']; ?> </strong> <br>
            No. TLP : <?php echo $detail['telepon_pelanggan']; ?> <br>
            Email : <?php echo $detail['email_pelanggan']; ?> <br>
        </p>
    </div>
    <div class="col-md-4">
        <h3><b>Pengiriman</b></h3>
        <p>
            <strong><?php echo $detail['tipe']; ?> <?php echo $detail['kota']; ?> <?php echo $detail['provinsi']; ?></strong><br>
            Ongkos Kirim : Rp. <?php echo number_format($detail['ongkir']); ?>,00 <br>
            Ekspedisi : <?php echo $detail['ekspedisi']; ?> <?php echo $detail['paket']; ?><br>
            Estimasi : <?php echo $detail['estimasi']; ?> Hari<br>
            Alamat : <?php echo $detail['alamat_pengiriman']; ?>
        </p>

    </div>
</div>
<br>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumblah</th>
            <th>SubTotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <tr>
            <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON
                 pembelian_produk.id_produk=produk.id_produk
                 WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
            <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                <td><?php echo $nomor ?></td>
                <td><?php echo $pecah['nama_produk']; ?></td>
                <td>Rp. <?php echo number_format($pecah['harga_produk']); ?>,00 </td>
                <td><?php echo $pecah['jumblah']; ?></td>
                <td>
                    Rp. <?php echo number_format($pecah['harga_produk'] * $pecah['jumblah']); ?>,00
                </td>
            </tr>
            <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>