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
                    <label for="namaObat">Nama Obat</label>
                    <input value="<?= set_value('namaObat', $obat->namaObat); ?>" type="text" name="namaObat" id="namaObat" class="form-control" placeholder="Nama Obat">
                    <?= form_error('namaObat'); ?>
                </div>
                <div class="form-group">
                    <label for="harga">Harga Obat</label>
                    <input value="<?= set_value('harga', $obat->harga); ?>" type="text" name="harga" id="harga" class="form-control" placeholder="Harga Obat">
                    <?= form_error('harga'); ?>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" rows="4" class="form-control" placeholder="Keterangan"><?= set_value('keterangan', $obat->keterangan); ?></textarea>
                    <?= form_error('keterangan'); ?>
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