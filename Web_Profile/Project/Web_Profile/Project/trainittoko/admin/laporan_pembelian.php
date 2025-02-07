<?php
$semuadata=array();
$tgl_mulai = "-";
$tgl_selesai = "-";
$status = "";
if (isset($_POST["kirim"]))
{
    $tgl_mulai = $_POST["tglm"];
    $tgl_selesai = $_POST["tgls"];
    $status = $_POST["status"];
    $ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON
            pm.id_pelanggan=pl.id_pelanggan WHERE status_pembelian='$status' AND tanggal_pembelian BETWEEN '$tgl_mulai' 
            AND '$tgl_selesai'");
    while($pecah = $ambil->fetch_assoc())
    {
        $semuadata[]=$pecah;
    }
}
?>


<h2>Laporan Pembelian dari <?php echo $tgl_mulai; ?> hingga <?php echo $tgl_selesai; ?></h2>
<hr>

<form method="POST">
    <div class="row">
        <div class="col-md-3">
            <label>Tanggal Mulai</label>
            <input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai; ?>">
        </div>
        <div class="col-md-3">
            <label>Tanggal Selesai</label>
            <input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai; ?>">
        </div>
        <div class="col-md-3">
            <label>Status</label>
            <select class="form-control" name="status">
                <option value="">Pilih Status</option>
                <option value="Dibatalkan" <?php echo $status=="Dibatalkan"?"selected":""; ?> >Dibatalkan</option>
                <option value="pending" <?php echo $status=="pending"?"selected":""; ?> >pending</option>
                <option value="Belum Dibayar" <?php echo $status == "Belum Dibayar" ? "selected" : ""; ?> >Belum Dibayar</option>
                <option value="Sudah Kirim Pembayaran" <?php echo $status == "Sudah Kirim Pembayaran" ? "selected" : ""; ?>>Sudah Kirim Pembayaran</option>
                <option value="barang dikirim" <?php echo $status == "barang dikirim" ? "selected" : ""; ?> >barang dikirim</option>
                <option value="Lunas" <?php echo $status == "Lunas" ? "selected" : ""; ?> >Lunas</option>
                
            </select>
        </div>
        <div class="col-md-2">
            <label>&nbsp;</label><br>
            <button class="btn btn-primary" name="kirim">Lihat</button>
            <a href="download_laporan.php">Print laporan</a>
        </div>
    </div>
</form>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Jumblah</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php echo $total=0; ?>
        <?php foreach ($semuadata as $key => $value): ?>
        <?php $total+=$value['total_pembelian'] ?>
        <tr>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $value["nama_pelanggan"] ?></td>
            <td><?php echo date(format: "d F Y",timestamp: strtotime(datetime: $value["tanggal_pembelian"])) ?></td>
            <td>Rp. <?php echo number_format(num: $value["total_pembelian"]) ?></td>
            <td><?php echo $value["status_pembelian"] ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total</th>
            <th>Rp. <?php echo number_format(num: $total); ?></th>
            <th></th>
        </tr>
    </tfoot>
</table>


<a href="download_laporan.php">Print laporan</a>