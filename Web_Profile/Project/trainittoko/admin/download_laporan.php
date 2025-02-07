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
        <?php echo $total = 0; ?>
        <?php foreach ($semuadata as $key => $value): ?>
            <?php $total += $value['total_pembelian'] ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $value["nama_pelanggan"] ?></td>
                <td><?php echo date(format: "d F Y", timestamp: strtotime(datetime: $value["tanggal_pembelian"])) ?></td>
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


<a type="button" onclick="return window.print();"><b>Cetak</b></a>