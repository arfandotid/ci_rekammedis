<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col d-flex">
                <h3 class="card-title align-self-center">
                    Tabel <?= $title; ?>
                </h3>
            </div>
            <div class="col text-right">
                <a href="<?= base_url('user/add'); ?>" class="btn btn-sm btn-info">
                    <i class="fas fa-plus"></i> Tambah User
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
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Active</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                if (count((array) $dataUser) > 0) : ?>
                    <?php foreach ($dataUser as $row) : ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $row->fullName ?></td>
                            <td><?= $row->username ?></td>
                            <td>
                                <div class="badge badge-<?= $row->role == 1 ? 'primary' : 'secondary'; ?>">
                                    <?= $row->role == 1 ? "Super Admin" : "Admin"; ?>
                                </div>
                            </td>
                            <td>
                                <div class="badge badge-<?= $row->active == 1 ? 'success' : 'danger'; ?>">
                                    <?= $row->active == 1 ? "Aktif" : "Nonaktif"; ?>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?= base_url('user/toggle/' . $row->idUser); ?>" data-toggle="tooltip" data-placement="top" title="<?= !$row->active ? "Aktif" : "Nonaktif"; ?>kan User" class="btn btn-default btn-sm">
                                        <i class="fas fa-power-off"></i>
                                    </a>
                                    <a href="<?= base_url('user/edit/' . $row->idUser); ?>" class="btn btn-default btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('user/delete/' . $row->idUser); ?>" class="btn btn-default btn-sm" onclick="return confirm('Yakin ingin hapus?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>