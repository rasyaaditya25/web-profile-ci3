<h2>Data Pembelian</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pembeli</th>
            <th>Tanggal</th>
            <th>Status Pembelian</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.
              id_pelanggan=pelanggan.id_pelanggan"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $nomor ?></td>
                <td><?php echo $pecah['nama_pelanggan']; ?></td>
                <td><?php echo date("d F Y",strtotime($pecah['tanggal_pembelian'])); ?></td>
                <td><?php echo $pecah['status_pembelian']; ?></td>
                <td>Rp. <?php echo number_format($pecah['total_pembelian']); ?>,00</td>
                <td>
                    <a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>"
                        class="btn-info btn">Detail</a>

                    <?php
                    if ($pecah['status_pembelian'] !== "Belum Dibayar"):
                        ?>

                        <a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian']; ?>"
                            class="btn btn-success">Lihat Pembayaran</a>

                    <?php endif ?>

                </td>
            </tr>
            <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>