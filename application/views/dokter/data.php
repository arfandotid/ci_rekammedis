<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col d-flex">
                <h3 class="card-title align-self-center">
                    Tabel <?= $title; ?>
                </h3>
            </div>
            <div class="col text-right">
                <a href="<?= base_url('dokter/add'); ?>" class="btn btn-sm btn-info">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
                <!-- PDF Laporan -->
                <a href="<?= base_url('laporan/dokter'); ?>" target="_blank" class="btn btn-sm btn-default">
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
                    <th>Nama Dokter</th>
                    <th>Spesialis</th>
                    <th>Email</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if (count((array) $dokter) > 0) : ?>
                    <?php foreach ($dokter as $row) : ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $row->namaDokter ?></td>
                            <td><?= $row->spesialis ?></td>
                            <td><?= $row->email ?></td>
                            <td><?= $row->noTelp ?></td>
                            <td><?= $row->alamat ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?= base_url('dokter/edit/') . $row->nip; ?>" class="btn btn-default btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('dokter/delete/') . $row->nip; ?>" class="btn btn-default btn-sm" onclick="return confirm('Yakin ingin hapus?');">
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