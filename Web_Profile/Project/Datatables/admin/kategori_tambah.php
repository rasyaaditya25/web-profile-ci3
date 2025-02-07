<?php

if (isset($_POST['submit'])) {
    $nama_kategori = $_POST['nama_kategori'];

    $koneksi->query("INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')");

    echo "<script>alert('Kategori berhasil ditambahkan');</script>";
    echo "<script>location='index.php?halaman=kategori';</script>";
}
?>

<h2>Tambah Kategori</h2>
<form method="POST">
    <div class="form-group">
        <label>Nama Kategori</label>
        <input type="text" class="form-control" name="nama_kategori" required>
    </div>
    <button class="btn btn-primary" name="submit">Simpan</button>
</form>