<h2>Data Pembayaran</h2>

<?php
//mendapatkan id pembelian dari url
$id_pembelian = $_GET['id'];

//mengambil data pembayaran berdasarkan id pembelian
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();
?>


<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <th><?php echo $detail['nama'] ?></th>
            </tr>
            <tr>
                <th>Bank</th>
                <th><?php echo $detail['bank'] ?></th>
            </tr>
            <tr>
                <th>Jumblah</th>
                <th>Rp. <?php echo number_format($detail['total_pembelian']) ?></th>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th><?php echo $detail['tanggal'] ?></th>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <img src="../bukti_pembayaran/<?php echo $detail['bukti'] ?>" alt="" class="img-responsive">
    </div>
</div>


<form method="POST">
    <div class="form-group">
        <label>No resi Pengiriman</label>
        <input type="text" class="form-control" name="resi">
    </div>
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
            <option value="">Pilih Status</option>
            <option value="lunas">Lunas</option>
            <option value="barang dikirim">Barang Dikirim</option>
            <option value="batal">Batal</option>
        </select>
    </div>
    <button class="btn btn-primary" name="proses">Proses</button>
</form>

<?php
if(isset($_POST["proses"]))
{
    $resi = $_POST["resi"];
    $status = $_POST["status"];
    $koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status'
            WHERE id_pembelian='$id_pembelian'");

    echo "<script>alert('Data Pembelian Terupdate');</script>";
    echo "<script>location='index.php?halaman=pembelian';</script>";
}