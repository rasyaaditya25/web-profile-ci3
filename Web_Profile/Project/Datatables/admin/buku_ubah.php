<h2>Ubah Data Buku</h2>

<?php

$ambil = $koneksi->query("SELECT * FROM buku WHERE id_buku='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<?php
$datakategori = array();

$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {
    $datakategori[] = $tiap;
}
?>

<form method="post" enctype="multipart/form-data">
<div class="form-group">
        <label>Kategori Buku</label>
        <select name="id_kategori" class="form-control">
            <?php foreach ($datakategori as $kategori): ?>
                <option value="<?php echo $kategori['id_kategori']; ?>" <?php echo $kategori['id_kategori'] == $pecah['id_kategori'] ? 'selected' : ''; ?>>
                    <?php echo $kategori['nama_kategori']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Judul Buku</label>
        <input type="text" class="form-control" name="judul" value="<?php echo $pecah['judul']; ?>" required>
    </div>
    <div class="form-group">
        <label>Penulis Buku</label>
        <input type="text" class="form-control" name="penulis" value="<?php echo $pecah['penulis']; ?>" required>
    </div>
    <div class="form-group">
        <label>Penerbit Buku</label>
        <input type="text" class="form-control" name="penerbit" value="<?php echo $pecah['penerbit']; ?>" required>
    </div>
    <div class="form-group">
        <label>Tahun Terbit</label>
        <input type="number" class="form-control" name="tahun" value="<?php echo $pecah['tahun_terbit']; ?>" required>
    </div>
    <div class="form-group">
        <label>Deskripsi Buku</label>
        <textarea class="form-control" name="deskripsi" rows="10" required><?php echo $pecah['deskripsi_buku']; ?></textarea>
    </div>

    <div class="form-group">
        <label>Foto Buku</label> <br>
        <img src="foto_buku/<?php echo $pecah['foto_buku']; ?>" width="200"> 
        
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
        move_uploaded_file($lokasifoto, "foto_buku/$namafoto");

        $koneksi->query("UPDATE buku SET 
            id_kategori='$_POST[id_kategori]',
            judul='$_POST[judul]',
            penulis='$_POST[penulis]',
            penerbit='$_POST[penerbit]',
            tahun_terbit='$_POST[tahun]',
            deskripsi_buku='$_POST[deskripsi]',
            foto_buku='$namafoto'
            WHERE id_buku='$_GET[id]'");
    } else {
        $koneksi->query("UPDATE buku SET 
            id_kategori='$_POST[id_kategori]',
            judul='$_POST[judul]',
            penulis='$_POST[penulis]',
            penerbit='$_POST[penerbit]',
            tahun_terbit='$_POST[tahun]',
            deskripsi_buku='$_POST[deskripsi]'
            WHERE id_buku='$_GET[id]'");
    }

    echo "<script>alert('Data buku telah diubah');</script>";
    echo "<script>location='index.php?halaman=buku';</script>";
}
?>