<div class="row">
    <div class="col-md-8">
        <div class="card card-outline">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm p-0">
                        <table class="w-100 table-sm table-hover">
                            <tr>
                                <th width="150">ID Rekam Medis</th>
                                <td><?= $detail->idRekamMedis; ?></td>
                            </tr>
                            <tr>
                                <th width="150">Pasien</th>
                                <td><?= $detail->namaPasien; ?></td>
                            </tr>
                            <tr>
                                <th width="150">Poliklinik</th>
                                <td><?= $detail->namaPoliklinik; ?> - <?= $detail->gedung ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm p-0">
                        <table class="w-100 table-sm table-hover">
                            <tr>
                                <th width="150">Tanggal Periksa</th>
                                <td><?= indo_date($detail->tglPeriksa); ?></td>
                            </tr>
                            <tr>
                                <th width="150">Dokter</th>
                                <td><?= $detail->namaDokter; ?></td>
                            </tr>
                            <tr>
                                <th width="150">Petugas</th>
                                <td><?= $detail->fullName; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <h5>Keluhan Pasien</h5>
                        <p>
                            <?= $detail->keluhan; ?>
                        </p>
                    </div>
                    <div class="col-sm">
                        <h5>Diagnosa</h5>
                        <p>
                            <?= $detail->diagnosa; ?>
                        </p>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-4">
        <div class="card card-outline">
            <div class="card-header">
                <h3 class="card-title"> Rincian Biaya</h3>
            </div>
            <div class="card-body">
                <table class="w-100 table-sm table-hover">
                    <tr>
                        <th>Biaya Dokter</th>
                        <td class="text-right">
                            Rp. <?= number_format($biaya_dokter, 2, ',', '.'); ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">Biaya Obat</th>
                    </tr>
                    <?php foreach ($obat as $o) : ?>
                        <tr>
                            <td>+ <?= $o->namaObat ?></td>
                            <td class="text-right">
                                Rp. <?= number_format($o->harga, 2, ',', '.'); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <th>Total Harga</th>
                        <td class="text-right">
                            Rp. <?= number_format($total_harga, 2, ',', '.'); ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>