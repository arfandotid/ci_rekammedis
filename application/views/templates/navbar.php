<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-info navbar-dark border-0 shadow-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <ul class="nav-item dropdown">
            <a class="nav-link dropdown-toggle dropdown-icon" href="#" data-toggle="dropdown">
                <i class="fas fa-user-circle"></i>
                <?= userdata('fullName') ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="<?= base_url('user/ubahPassword') ?>" class="dropdown-item">
                    <i class="fas fa-fw fa-exchange-alt"></i>
                    Ubah Password
                </a>
                <a href="#logoutModal" class="dropdown-item" data-toggle="modal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </ul>
    </ul>
</nav>
<!-- /.navbar -->