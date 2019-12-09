<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-info elevation-1">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link bg-info text-center border-bottom-0">
        <span class="brand-text font-weight-light">Rekam Medis</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="false">
                <?php if (is_role(2)) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('dashboard') ?>" class="nav-link <?= active_menu('admin', 'dashboard'); ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-header text-uppercase">Master Data</li>
                    <li class="nav-item">
                        <a href="<?= base_url('pasien') ?>" class="nav-link <?= active_menu('pasien'); ?>">
                            <i class="fas fa-user-injured nav-icon"></i>
                            <p>Data Pasien</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('dokter') ?>" class="nav-link <?= active_menu('dokter'); ?>">
                            <i class="fas fa-user-md nav-icon"></i>
                            <p>Data Dokter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('obat') ?>" class="nav-link <?= active_menu('obat'); ?>">
                            <i class="fas fa-capsules nav-icon"></i>
                            <p>Data Obat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('poliklinik') ?>" class="nav-link <?= active_menu('poliklinik'); ?>">
                            <i class="fas fa-hospital nav-icon"></i>
                            <p>Data Poliklinik</p>
                        </a>
                    </li>
                    <li class="nav-header text-uppercase">Transaksi</li>
                    <li class="nav-item">
                        <a href="<?= base_url('rekammedis') ?>" class="nav-link <?= active_menu('rekammedis'); ?>">
                            <i class="nav-icon fas fa-notes-medical"></i>
                            <p>
                                Rekam Medis
                            </p>
                        </a>
                    </li>
                    <li class="nav-header text-uppercase">Lainnya</li>
                    <li class="nav-item">
                        <a href="<?= base_url('laporan') ?>" class="nav-link <?= active_menu('laporan'); ?>">
                            <i class="nav-icon fas fa-print"></i>
                            <p>
                                Laporan
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (is_role(1)) : ?>
                    <li class="nav-header text-uppercase">Settings</li>
                    <li class="nav-item">
                        <a href="<?= base_url('user') ?>" class="nav-link <?= active_menu('user'); ?>">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                User Management
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('dashboard') ?>">Dashboard</a>
                        </li>
                        <?php if ($this->uri->segment(1) != 'dashboard') : ?>
                            <li class="breadcrumb-item active text-capitalize">
                                <?= $this->uri->segment(1) ?>
                            </li>
                        <?php endif; ?>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">