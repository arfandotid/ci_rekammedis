<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-success">
            <div class="card-header bg-info">
                <h3 class="card-title">Form <?= $title; ?></h3>

                <div class="card-tools">
                    <a href="<?= base_url('dokter') ?>" class="btn btn-tool">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?= form_open(); ?>
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input readonly value="<?= set_value('nip', $dokter->nip); ?>" type="text" id="nip" class="form-control" placeholder="Nama Pasien">
                    <?= form_error('nip'); ?>
                </div>
                <div class="form-group">
                    <label for="namaDokter">Nama Dokter</label>
                    <input value="<?= set_value('namaDokter', $dokter->namaDokter); ?>" type="text" name="namaDokter" id="namaDokter" class="form-control" placeholder="Nama Pasien">
                    <?= form_error('namaDokter'); ?>
                </div>
                <div class="form-group">
                    <label for="spesialis">Spesialis</label>
                    <input value="<?= set_value('spesialis', $dokter->spesialis); ?>" type="text" name="spesialis" id="spesialis" class="form-control" placeholder="Spesialis">
                    <?= form_error('spesialis'); ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="<?= set_value('email', $dokter->email); ?>" type="text" name="email" id="email" class="form-control" placeholder="Email">
                    <?= form_error('email'); ?>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="4" class="form-control" placeholder="Alamat"><?= set_value('alamat', $dokter->alamat); ?></textarea>
                    <?= form_error('alamat'); ?>
                </div>
                <div class="form-group">
                    <label for="noTelp">Nomor Telepon</label>
                    <input value="<?= set_value('noTelp', $dokter->noTelp); ?>" type="text" name="noTelp" id="noTelp" class="form-control" placeholder="Nomor Telepon">
                    <?= form_error('noTelp'); ?>
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