<?php
$datagenre = array();

$ambil = $koneksi->query("SELECT * FROM genre");
while ($tiap = $ambil->fetch_assoc()) {
    $datagenre[] = $tiap;
}
?>

<h2>Tambah Film</h2>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <select class="form-control" name="id_genre" required>
            <option value="">Pilih Genre</option>
            <?php foreach ($datagenre as $key => $value): ?>
                    <option value="<?php echo $value["id_genre"] ?>"><?php echo $value["nama_genre"] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Judul Film</label>
        <input type="text" class="form-control" name="judul" required>
    </div>
    <div class="form-group">
        <label>Sutradara Film</label>
        <input type="text" class="form-control" name="sutradara" required>
    </div>
    <div class="form-group">
        <label>Distributor Film</label>
        <input type="text" class="form-control" name="distributor" required>
    </div>
    <div class="form-group">
        <label>Sinopsis Film</label>
        <textarea class="form-control" name="sinopsis" rows="10" required></textarea>
    </div>
    <div class="form-group">
        <label>Tahun Rilis</label>
        <input type="date" class="form-control" name="tahun" required>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <div class="letak-input" style="margin-bottom: 10px;">
            <input type="file" class="form-control" name="foto[]" required>
        </div>
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>
<br>

<?php
if (isset($_POST["save"])) {

    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];

    if (!empty($_POST['id_genre'])) {
        // Simpan foto pertama
        move_uploaded_file($lokasifoto[0], "foto_film/" . $namafoto[0]);

        // Masukkan data ke dalam tabel buku
        $koneksi->query("INSERT INTO film
                 (judul_film, sutradara, distributor, sinopsis, tahun_rilis, foto_film, id_genre)
                 VALUES ('{$_POST['judul']}', '{$_POST['sutradara']}', '{$_POST['distributor']}', '{$_POST['sinopsis']}', '{$_POST['tahun']}', '{$namafoto[0]}', '{$_POST['id_genre']}')");

        echo "<div class='alert alert-info'>Data Tersimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=film'>";
    } else {
        echo "<div class='alert alert-warning'>Ganre belum dipilih!</div>";
    }
}
?>