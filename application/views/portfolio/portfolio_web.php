<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Tentang</th>
                        <th>Judul Portfolio</th>
                        <th>Deskripsi Foto</th>
                        <th>Portfolio Foto</th>
                        <th>Linking</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($portfolios as $portfolio): ?>
                        <tr>
                            <td><?php echo $portfolio['category']; ?></td>
                            <td><?php echo $portfolio['tentang']; ?></td>
                            <td><?php echo $portfolio['judul_portfolio']; ?></td>
                            <td>
                                <?php echo strlen($portfolio['deskripsi_portfolio']) > 100 ? substr($portfolio['deskripsi_portfolio'], 0, 100) . '...' : $portfolio['deskripsi_portfolio']; ?>
                            </td>
                            <td><img src="<?php echo base_url('assets/img/portfolio_photo/' . $portfolio['portfolio_foto']); ?>"
                                    alt="Portfolio Image" width="100"></td>
                            <td><?php echo $portfolio['linking']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->