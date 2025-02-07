<h2>Ubah Data Film</h2>

<?php

$ambil = $koneksi->query("SELECT * FROM film WHERE id_film='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<?php
$datagenre = array();

$ambil = $koneksi->query("SELECT * FROM genre");
while ($tiap = $ambil->fetch_assoc()) {
    $datagenre[] = $tiap;
}
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Genre Film</label>
        <select name="id_genre" class="form-control">
            <?php foreach ($datagenre as $genre): ?>
                <option value="<?php echo $genre['id_genre']; ?>" <?php echo $genre['id_genre'] == $pecah['id_genre'] ? 'selected' : ''; ?>>
                    <?php echo $genre['nama_genre']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Judul Film</label>
        <input type="text" class="form-control" name="judul" value="<?php echo $pecah['judul_film']; ?>" required>
    </div>
    <div class="form-group">
        <label>Sutradara Film</label>
        <input type="text" class="form-control" name="sutradara" value="<?php echo $pecah['sutradara']; ?>" required>
    </div>
    <div class="form-group">
        <label>Distributor film</label>
        <input type="text" class="form-control" name="distributor" value="<?php echo $pecah['distributor']; ?>" required>
    </div>
    <div class="form-group">
        <label>Sinopsis Film</label>
        <textarea class="form-control" name="sinopsis" rows="10"
            required><?php echo $pecah['sinopsis']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Tahun Rilis Film</label>
        <input type="date" class="form-control" name="tahun" value="<?php echo $pecah['tahun_rilis']; ?>" required>
    </div>

    <div class="form-group">
        <label>Foto Film</label> <br>
        <img src="foto_film/<?php echo $pecah['foto_film']; ?>" width="200">

    </div>
    <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <br>
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah'])) {
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];

    // Jika foto diubah
    if (!empty($lokasifoto)) {
        move_uploaded_file($lokasifoto, "foto_film/$namafoto");

        $koneksi->query("UPDATE film SET 
            id_genre='$_POST[id_genre]',
            judul_film='$_POST[judul]',
            sutradara='$_POST[sutradara]',
            distributor='$_POST[distributor]',
            sinopsis='$_POST[sinopsis]',
            tahun_rilis='$_POST[tahun]',
            foto_film='$namafoto'
            WHERE id_film='$_GET[id]'");
    } else {
        $koneksi->query("UPDATE film SET 
            id_genre='$_POST[id_genre]',
            judul_film='$_POST[judul]',
            sutradara='$_POST[sutradara]',
            distributor='$_POST[distributor]',
            sinopsis='$_POST[sinopsis]',
            tahun_rilis='$_POST[tahun]'
            WHERE id_film='$_GET[id]'");
    }

    echo "<script>alert('Data Film telah diubah');</script>";
    echo "<script>location='index.php?halaman=film';</script>";
}
?>