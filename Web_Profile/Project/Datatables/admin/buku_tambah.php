<?php
$datakategori = array();

$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {
    $datakategori[] = $tiap;
}
?>

<h2>Tambah Buku</h2>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <select class="form-control" name="id_kategori" required>
            <option value="">Pilih Kategori</option>
            <?php foreach ($datakategori as $key => $value): ?>
                <option value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Judul Buku</label>
        <input type="text" class="form-control" name="judul" required>
    </div>
    <div class="form-group">
        <label>Penulis Buku</label>
        <input type="text" class="form-control" name="penulis" required>
    </div>
    <div class="form-group">
        <label>Penerbit Buku</label>
        <input type="text" class="form-control" name="penerbit" required>
    </div>
    <div class="form-group">
        <label>Tahun Terbit</label>
        <input type="number" class="form-control" name="tahun" required>
    </div>
    <div class="form-group">
        <label>Deskripsi Buku</label>
        <textarea class="form-control" name="deskripsi" rows="10" required></textarea>
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

    if (!empty($_POST['id_kategori'])) {
        // Simpan foto pertama
        move_uploaded_file($lokasifoto[0], "foto_buku/" . $namafoto[0]);

        // Masukkan data ke dalam tabel buku
        $koneksi->query("INSERT INTO buku
                 (judul, penulis, penerbit, tahun_terbit, deskripsi_buku, foto_buku, id_kategori)
                 VALUES ('{$_POST['judul']}', '{$_POST['penulis']}', '{$_POST['penerbit']}', '{$_POST['tahun']}', '{$_POST['deskripsi']}', '{$namafoto[0]}', '{$_POST['id_kategori']}')");

        echo "<div class='alert alert-info'>Data Tersimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=buku'>";
    } else {
        echo "<div class='alert alert-warning'>Kategori belum dipilih!</div>";
    }
}
?>