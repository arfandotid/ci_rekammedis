<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-success">
            <div class="card-header bg-info">
                <h3 class="card-title">Form <?= $title; ?></h3>
                <div class="card-tools">
                    <a href="<?= base_url('user') ?>" class="btn btn-tool">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?= form_open(); ?>
                <div class="form-group">
                    <label for="fullName">Nama Lengkap</label>
                    <input value="<?= set_value('fullName'); ?>" type="text" name="fullName" id="fullName" class="form-control" placeholder="Nama Lengkap...">
                    <?= form_error('fullName'); ?>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <div class="row">
                        <div class="col">
                            <div class="custom-control custom-radio">
                                <input <?= set_radio('role', '2'); ?> value="2" class="custom-control-input" type="radio" id="admin" name="role">
                                <label for="admin" class="custom-control-label">Admin</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="custom-control custom-radio">
                                <input <?= set_radio('role', '1'); ?> value="1" class="custom-control-input" type="radio" id="superadmin" name="role">
                                <label for="superadmin" class="custom-control-label">Super Admin</label>
                            </div>
                        </div>
                    </div>
                    <?= form_error('role'); ?>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input value="<?= set_value('username'); ?>" type="text" name="username" id="username" class="form-control" placeholder="Username...">
                    <?= form_error('username'); ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password...">
                    <?= form_error('password'); ?>
                </div>
                <div class="form-group">
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" name="password2" id="password2" class="form-control" placeholder="Konfirmasi Password...">
                    <?= form_error('password2'); ?>
                </div>
                <div class="text-right">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>