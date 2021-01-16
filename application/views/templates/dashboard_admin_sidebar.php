<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->

    <div class="container"><a class="navbar-brand mt-3 mb-3" href="<?= base_url('admin'); ?>"><img src="<?= base_url('assets/images/perpus-wh.png') ?>" width="170px" alt=""></a></div>
    <!-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-envelope-open-text"></i>
        </div>
        <div class="sidebar-brand-icon"></div>
        <div class="sidebar-brand-text mx-3">SIMAR</div>
    </a> -->

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Surat
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-download"></i>
            <span>Surat Masuk</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Surat Masuk:</h6>
                <!-- <a class="collapse-item" href="<?= base_url('admin/entrimasuk'); ?>">Entri Surat Masuk</a> -->
                <a class="collapse-item" href="<?= base_url('admin/suratmasuk'); ?>">Data Surat Masuk</a>
                <a class="collapse-item" href="<?= base_url('admin/laporanmasuk'); ?>">Laporan Surat Masuk</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-upload"></i>
            <span>Surat Keluar</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Surat Keluar:</h6>
                <!-- <a class="collapse-item" href="<?= base_url('admin/entrikeluar'); ?>">Entri Surat Keluar</a> -->
                <a class="collapse-item" href="<?= base_url('admin/suratkeluar'); ?>">Data Surat Keluar</a>
                <a class="collapse-item" href="<?= base_url('admin/laporankeluar'); ?>">Laporan Surat Keluar</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Arsip Lain
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Sertifikat</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Sertifikat:</h6>
                <!-- <a class="collapse-item" href="<?= base_url('admin/entrisertifikat'); ?>">Entri Sertifikat</a> -->
                <a class="collapse-item" href="<?= base_url('admin/sertifikat'); ?>">Data Sertifikat</a>
                <a class="collapse-item" href="<?= base_url('admin/laporansertifikat'); ?>">Laporan Sertifikat</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Menu Lain
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRuang" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-thumbtack"></i>
            <span>Peminjaman Ruang Perpustakaan</span>
        </a>
        <div id="collapseRuang" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Peminjaman Ruang:</h6>
                <!-- <a class="collapse-item" href="<?= base_url('admin/entripeminjaman'); ?>">Entri Peminjaman</a> -->
                <a class="collapse-item" href="<?= base_url('admin/peminjaman'); ?>">Data Peminjaman</a>
                <a class="collapse-item" href="<?= base_url('admin/laporanpeminjaman'); ?>">Laporan Peminjaman</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Heading -->
    <div class="sidebar-heading">
        Administrator
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/user'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->