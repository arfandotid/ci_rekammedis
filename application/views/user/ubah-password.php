<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-success">
            <div class="card-header bg-info">
                <h3 class="card-title">Form <?= $title; ?></h3>

                <div class="card-tools">
                    <a href="<?= base_url('dashboard') ?>" class="btn btn-tool">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?= $this->session->flashdata('msg'); ?>
                <?= form_open(); ?>
                <div class="form-group">
                    <label for="password_lama">Password Lama</label>
                    <input type="password" name="password_lama" id="password_lama" class="form-control" placeholder="Password Lama...">
                    <?= form_error('password_lama'); ?>
                </div>
                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password...">
                    <?= form_error('password'); ?>
                </div>
                <div class="form-group">
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" name="password2" id="password2" class="form-control" placeholder="Konfirmasi Password...">
                    <?= form_error('password2'); ?>
                </div>
                <div class="text-right">
                    <button type="reset" class="btn btn-default">Bersih</button>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>