<?php
include '../koneksi.php';

$id_kategori = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_kategori='$id_kategori'");
$kategori = $ambil->fetch_assoc();

if (isset($_POST['submit'])) {
    $nama_kategori = $_POST['nama_kategori'];

    $koneksi->query("UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'");

    echo "<script>alert('Kategori berhasil diubah');</script>";
    echo "<script>location='index.php?halaman=kategori';</script>";
}
?>

<h2>Ubah Kategori</h2>
<form method="POST">
    <div class="form-group">
        <label>Nama Kategori</label>
        <input type="text" class="form-control" name="nama_kategori" value="<?php echo $kategori['nama_kategori']; ?>"
            required>
    </div>
    <button class="btn btn-primary" name="submit">Simpan</button>
</form>