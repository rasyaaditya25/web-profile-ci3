<h2>Detail Buku</h2>

<?php
$id_buku = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM buku LEFT JOIN kategori ON 
    buku.id_kategori=kategori.id_kategori WHERE id_buku='$id_buku'");

$detailbuku = $ambil->fetch_assoc();

?>

<table class="table">
    <tr>
        <th>Kategori</th>
        <td><?php echo $detailbuku["nama_kategori"]; ?></td>
    </tr>
    <tr>
        <th>Judul</th>
        <td><?php echo $detailbuku["judul"]; ?></td>
    </tr>
    <tr>
        <th>Penulis</th>
        <td><?php echo $detailbuku["penulis"]; ?></td>
    </tr>
    <tr>
        <th>Penerbit</th>
        <td><?php echo $detailbuku["penerbit"]; ?></td>
    </tr>
    <tr>
        <th>Tahun Terbit</th>
        <td><?php echo $detailbuku["tahun_terbit"]; ?></td>
    </tr>
    <tr>
        <th>Deskripsi</th>
        <td><?php echo $detailbuku["deskripsi_buku"]; ?></td>
    </tr>
    <tr>
        <th>Foto Buku</th>
        <td><img src="foto_buku/<?php echo $detailbuku["foto_buku"] ?>" alt="" class="img-responsive" width="200"><br></td>
    </tr>
</table>