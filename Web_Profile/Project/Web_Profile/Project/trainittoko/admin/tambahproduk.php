<?php
$datakategori = array();

$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {
    $datakategori[] = $tiap;
}
?>

<h2>Tambah Produk</h2>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <select class="form-control" name="id_kategori">
            <option value="">Pilih Kategori</option>
            <?php foreach ($datakategori as $key => $value): ?>
                <option value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Harga (Rp)</label>
        <input type="number" class="form-control" name="harga">
    </div>
    <div class="form-group">
        <label>Berat (Gr)</label>
        <input type="number" class="form-control" name="berat">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <div class="letak-input" style="margin-bottom: 10px;">
            <input type="file" class="form-control" name="foto[]">
        </div>
        <span class="btn btn-primary btn-tambah">
            <i class="fa fa-plus"></i>
        </span>
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="number" class="form-control" name="stok">
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>
<br>

<?php
if (isset($_POST["save"])) {

    $namanamafoto = $_FILES['foto']['name'];
    $lokasilokasifoto = $_FILES['foto']['tmp_name'];

    if (!empty($_POST['id_kategori'])) {
        // Save the first image
        move_uploaded_file($lokasilokasifoto[0], "../foto_produk/" . $namanamafoto[0]);

        $koneksi->query("INSERT INTO produk
                 (nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,stok_produk,id_kategori)
                 VALUES('$_POST[nama]', '$_POST[harga]', '$_POST[berat]', '$namanamafoto[0]', '$_POST[deskripsi]', '$_POST[stok]', '$_POST[id_kategori]')");

        // Get the last inserted product ID
        $id_produk_barusan = $koneksi->insert_id;

        foreach ($namanamafoto as $key => $tiap_nama) {
            if ($_FILES['foto']['error'][$key] === UPLOAD_ERR_OK) {
                $tiap_lokasi = $lokasilokasifoto[$key];

                if (move_uploaded_file($tiap_lokasi, "../foto_produk/" . $tiap_nama)) {
                    // Save each image to the database
                    $koneksi->query("INSERT INTO produk_foto (id_produk,nama_produk_foto)
                        VALUES ('$id_produk_barusan','$tiap_nama')");
                } else {
                    echo "<div class='alert alert-danger'>Failed to upload $tiap_nama</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Error uploading $tiap_nama</div>";
            }
        }

        echo "<div class='alert alert-info'>Data Tersimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
    }
}
?>
 


<script>
    $(document).ready(function () {
        $(".btn-tambah").on("click", function () {
            $(".letak-input").append("<input type='file' class='form-control' name='foto[]'>");
        })
    })
</script>