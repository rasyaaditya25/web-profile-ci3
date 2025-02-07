<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Portfolio</h1>

    <div class="row">
        <div class="col-lg">
            <?= form_open_multipart('portfolio/portfolio_edit/' . $portfolio['id_portfolio']); ?>
            <input type="hidden" name="id_portfolio" value="<?= $portfolio['id_portfolio']; ?>">

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">
                    <option value="Website" <?= ($portfolio['category'] == 'Website') ? 'selected' : ''; ?>>Website
                    </option>
                    <option value="Games" <?= ($portfolio['category'] == 'Games') ? 'selected' : ''; ?>>Games</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tentang">About Project</label>
                <input type="text" class="form-control" id="tentang" name="tentang"
                    value="<?= $portfolio['tentang']; ?>">
                <?= form_error('tentang', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="judul_portfolio">Title Project</label>
                <input type="text" class="form-control" id="judul_portfolio" name="judul_portfolio"
                    value="<?= $portfolio['judul_portfolio']; ?>">
                <?= form_error('judul_portfolio', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="deskripsi_portfolio">Description Project</label>
                <textarea name="deskripsi_portfolio" id="deskripsi_portfolio"
                    class="form-control"><?= $portfolio['deskripsi_portfolio']; ?></textarea>
                <?= form_error('deskripsi_portfolio', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="portfolio_foto">Portfolio Image</label>
                <br>
                <img src="<?= base_url('assets/img/portfolio_photo/' . $portfolio['portfolio_foto']); ?>" width="100">
                <input type="file" name="portfolio_foto" id="portfolio_foto" class="form-control mt-2">
                <small class="text-muted">Max size: 5MB, Allowed types: gif, jpg, jpeg, png.</small>
            </div>

            <div class="form-group">
                <label for="linking">Project URL</label>
                <input type="text" class="form-control" id="linking" name="linking"
                    value="<?= $portfolio['linking']; ?>">
                <?= form_error('linking', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= base_url('portfolio'); ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
