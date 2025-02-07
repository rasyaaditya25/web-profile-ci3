<?php

if (isset($_POST['submit'])) {
    $nama_genre = $_POST['nama_genre'];

    $koneksi->query("INSERT INTO genre (nama_genre) VALUES ('$nama_genre')");

    echo "<script>alert('genre berhasil ditambahkan');</script>";
    echo "<script>location='index.php?halaman=genre';</script>";
}
?>

<h2>Tambah Genre</h2>
<form method="POST">
    <div class="form-group">
        <label>Nama Genre</label>
        <input type="text" class="form-control" name="nama_genre" required>
    </div>
    <button class="btn btn-primary" name="submit">Simpan</button>
</form>