<h2>Detail Film</h2>

<?php
$id_film = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM film LEFT JOIN genre ON 
    film.id_genre=genre.id_genre WHERE id_film='$id_film'");

$detailfilm = $ambil->fetch_assoc();

?>

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
        <th>distributor Film</th>
        <td><?php echo $detailfilm["distributor"]; ?></td>
    </tr>
    <tr>
        <th>Sinopsis Film</th>
        <td><?php echo $detailfilm["sinopsis"]; ?></td>
    </tr>
    <tr>
        <th>Tahun Rilis Film</th>
        <td><?php echo $detailfilm["tahun_rilis"]; ?></td>
    </tr>
    <tr>
        <th>Foto Film</th>
        <td>
            <img src="foto_film/<?php echo $detailfilm["foto_film"] ?>" alt="" class="img-responsive" width="200"><br>
        </td>
    </tr>
</table>