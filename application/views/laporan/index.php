<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-success">
            <div class="card-header bg-info">
                <h3 class="card-title">Form <?= $title; ?></h3>

                <div class="card-tools">
                    <a href="<?= base_url('obat') ?>" class="btn btn-tool">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?= form_open(); ?>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <div class="input-group">
                        <input value="<?= set_value('tanggal', date('Y-m-d')); ?>" type="text" name="tanggal" id="tanggal" class="form-control" placeholder="Tanggal">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-fw fa-calendar"></i></span>
                        </div>
                    </div>
                    <?= form_error('tanggal'); ?>
                </div>
                <div class="text-right">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-info">Cetak</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>