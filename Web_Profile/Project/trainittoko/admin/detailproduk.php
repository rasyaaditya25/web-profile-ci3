<h2>Detail Produk</h2>

<?php
$id_produk = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON 
    produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");

$detailproduk = $ambil->fetch_assoc();

?>

<table class="table">
    <tr>
        <th>Kategori</th>
        <td><?php echo $detailproduk["nama_kategori"]; ?></td>
    </tr>
    <tr>
        <th>Produk</th>
        <td><?php echo $detailproduk["nama_produk"]; ?></td>
    </tr>
    <tr>
        <th>Harga</th>
        <td>Rp. <?php echo number_format($detailproduk["harga_produk"]); ?></td>
    </tr>
    <tr>
        <th>Berat</th>
        <td><?php echo $detailproduk["berat_produk"]; ?></td>
    </tr>
    <tr>
        <th>Deskripsi</th>
        <td><?php echo $detailproduk["deskripsi_produk"]; ?></td>
    </tr>
    <tr>
        <th>Stok</th>
        <td><?php echo $detailproduk["stok_produk"]; ?></td>
    </tr>
</table>

<div class="row">
        <div class="col-md-3 text-center">
            <img src="../foto_produk/<?php echo $detailproduk["foto_produk"] ?>" alt="" class="img-responsive"><br>
        </div>
</div>
