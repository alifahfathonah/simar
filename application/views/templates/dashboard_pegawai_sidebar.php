<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

<div class="container"><a class="navbar-brand mt-3 mb-3" href="<?= base_url('admin'); ?>"><img src="<?= base_url('assets/images/perpus-wh.png')?>" width="170px" alt=""></a></div>
    <!-- Sidebar - Brand -->
    

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pegawai'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a>
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
                <!-- <a class="collapse-item" href="<?= base_url('pegawai/entrisertifikat'); ?>">Entri Sertifikat</a> -->
                <a class="collapse-item" href="<?= base_url('pegawai/sertifikat'); ?>">Data Sertifikat</a>
                <a class="collapse-item" href="<?= base_url('pegawai/laporansertifikat'); ?>">Laporan Sertifikat</a>
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
                <a class="collapse-item" href="<?= base_url('pegawai/entripeminjaman'); ?>">Entri Peminjaman</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->