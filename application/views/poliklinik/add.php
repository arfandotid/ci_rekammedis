<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-success">
            <div class="card-header bg-info">
                <h3 class="card-title">Form <?= $title; ?></h3>

                <div class="card-tools">
                    <a href="<?= base_url('poliklinik') ?>" class="btn btn-tool">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?= form_open(); ?>
                <div class="form-group">
                    <label for="namaPoliklinik">Nama Poliklinik</label>
                    <input value="<?= set_value('namaPoliklinik'); ?>" type="text" name="namaPoliklinik" id="namaPoliklinik" class="form-control" placeholder="Nama Poliklinik">
                    <?= form_error('namaPoliklinik'); ?>
                </div>
                <div class="form-group">
                    <label for="gedung">Gedung</label>
                    <input value="<?= set_value('gedung'); ?>" type="text" name="gedung" id="gedung" class="form-control" placeholder="Gedung">
                    <?= form_error('gedung'); ?>
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