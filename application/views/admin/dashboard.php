<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-user-injured"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Pasien</span>
                <span class="info-box-number"><?= $jumlah['pasien'] ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa-user-md"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Dokter</span>
                <span class="info-box-number"><?= $jumlah['dokter'] ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-capsules"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Obat</span>
                <span class="info-box-number"><?= $jumlah['obat'] ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="fas fa-notes-medical"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Rekam Medis</span>
                <span class="info-box-number"><?= $jumlah['rekam_medis'] ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                    <div class="text-left">
                        <h3 class="card-title">Data Rekam Medis</h3>
                        <span class="text-muted small d-block">
                            <?= date('Y') ?>
                        </span>
                    </div>
                    <a class="btn btn-default btn-sm align-self-center" href="<?= base_url('laporan'); ?>"><i class="fas fa-print"></i> Cetak Laporan</a>
                </div>
            </div>
            <div class="card-body">
                <div class="position-relative mb-4">
                    <canvas id="rekammedis-chart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>