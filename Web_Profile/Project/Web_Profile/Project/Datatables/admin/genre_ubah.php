<?php

$id_genre = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM genre WHERE id_genre='$id_genre'");
$genre = $ambil->fetch_assoc();

if (isset($_POST['submit'])) {
    $nama_kategori = $_POST['nama_genre'];

    $koneksi->query("UPDATE genre SET nama_genre='$nama_genre' WHERE id_genre='$id_genre'");

    echo "<script>alert('Genre berhasil diubah');</script>";
    echo "<script>location='index.php?halaman=genre';</script>";
}
?>

<h2>Ubah Genre</h2>
<form method="POST">
    <div class="form-group">
        <label>Nama Genre</label>
        <input type="text" class="form-control" name="nama_genre" value="<?php echo $genre['nama_genre']; ?>"
            required>
    </div>
    <button class="btn btn-primary" name="submit">Simpan</button>
</form>