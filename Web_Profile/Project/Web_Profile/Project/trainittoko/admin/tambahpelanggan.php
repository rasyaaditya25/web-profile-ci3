<h2>Tambah Produk</h2>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Telepon</label>
        <input type="text" class="form-control" name="telepon">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" class="form-control" name="alamat">
    </div>

    <button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
if (isset($_POST["save"])) {
    // Insert pelanggan data into the database
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    // Query to insert data into pelanggan table
    $koneksi->query("INSERT INTO pelanggan (email_pelanggan, password_pelanggan,
                 nama_pelanggan, telepon_pelanggan, alamat_pelanggan,) 
                 VALUES ('$email', '$password', '$nama', '$telepon', '$alamat')");

    echo "<div class='alert alert-info'>Data Pelanggan Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}
?>
