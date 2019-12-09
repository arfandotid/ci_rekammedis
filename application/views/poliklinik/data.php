<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col d-flex">
                <h3 class="card-title align-self-center">
                    Tabel <?= $title; ?>
                </h3>
            </div>
            <div class="col text-right">
                <a href="<?= base_url('poliklinik/add'); ?>" class="btn btn-sm btn-info">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
                <!-- PDF Laporan -->
                <a href="<?= base_url('laporan/poliklinik'); ?>" target="_blank" class="btn btn-sm btn-default">
                    <i class="fas fa-print"></i> Laporan
                </a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0 table-responsive">
        <table class="table table-striped datatable">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Poliklinik</th>
                    <th>Gedung</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if (count((array) $poliklinik) > 0) : ?>
                    <?php foreach ($poliklinik as $row) : ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $row->namaPoliklinik ?></td>
                            <td><?= $row->gedung ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?= base_url('poliklinik/edit/') . $row->idPoliklinik; ?>" class="btn btn-default btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('poliklinik/delete/') . $row->idPoliklinik; ?>" class="btn btn-default btn-sm" onclick="return confirm('Yakin ingin hapus?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center">Data Kosong</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>