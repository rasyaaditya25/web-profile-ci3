<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <a href="" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#newProjectModal">Tambah Project</a>
    
    <?php if ($this->session->flashdata('message')): ?>
        <?= $this->session->flashdata('message'); ?>
    <?php endif; ?>
    
    <div class="row">
        <div class="col-lg">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Judul Portfolio</th>
                        <th>Portfolio Foto</th>
                        <th>Linking</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($portfolios as $portfolio): ?>
                        <tr>
                            <td><?php echo $portfolio['category']; ?></td>
                            <td><?php echo $portfolio['judul_portfolio']; ?></td>
                            <td><img src="<?php echo base_url('assets/img/portfolio_photo/' . $portfolio['portfolio_foto']); ?>"
                                    alt="Portfolio Image" width="100"></td>
                            <td><?php echo $portfolio['linking']; ?></td>
                            <td>
                                <a href="<?= base_url('portfolio/portfolio_edit/' . $portfolio['id_portfolio']); ?>" class="badge badge-warning">Edit</a>
                                <a href="<?= base_url('portfolio/deletePortfolio/' . $portfolio['id_portfolio']); ?>"
                                    class="badge badge-danger"
                                    onclick="return confirm('Are you sure want to delete this project?');">Delete</a>
                            </td>

                            </td>

                            </td>
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



<!-- Modal new project-->
<div class="modal fade" id="newProjectModal" tabindex="-1" role="dialog" aria-labelledby="newProjectModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newProjectModalLabel">Add Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('portfolio/addPortfolio'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <select name="category" id="category" class="form-control">
                            <option value="">Select Category</option>
                            <option value="Website">Website</option>
                            <option value="Games">Games</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tentang" name="tentang" placeholder="About Project">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="judul_portfolio" name="judul_portfolio"
                            placeholder="Title Project">
                    </div>
                    <div class="form-group">
                        <textarea name="deskripsi_portfolio" id="deskripsi_portfolio"
                            class="form-control">Description Project</textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="portfolio_foto" id="portfolio_foto" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="linking" name="linking" placeholder="Url Project">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>