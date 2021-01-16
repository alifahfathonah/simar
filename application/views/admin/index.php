<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h2 mb-0 font-weight-bold text-gray-800">Sistem Manajemen Arsip Perpustakaan UAD</h2>
    </div>



    <!-- Content Row -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2 mt-5">
        <h5 class="h5 mb-0 font-weight-light text-gray-800">Data Arsip Bulan <?php echo bulan() . date(" Y"); ?></h5>
    </div>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Surat Masuk <?php echo bulan(); ?></div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jml_suratmasuk ?></div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php
                                                                                                            if ($jml_suratmasuk >= 1 && $jml_suratmasuk <= 5) {
                                                                                                                echo 2;
                                                                                                            } else if ($jml_suratmasuk >= 6 && $jml_suratmasuk <= 10) {
                                                                                                                echo 5;
                                                                                                            } else if ($jml_suratmasuk >= 11 && $jml_suratmasuk <= 20) {
                                                                                                                echo 10;
                                                                                                            } else if ($jml_suratmasuk >= 21 && $jml_suratmasuk <= 30) {
                                                                                                                echo 20;
                                                                                                            } else if ($jml_suratmasuk >= 31 && $jml_suratmasuk <= 40) {
                                                                                                                echo 30;
                                                                                                            } else if ($jml_suratmasuk >= 41 && $jml_suratmasuk <= 50) {
                                                                                                                echo 40;
                                                                                                            } else if ($jml_suratmasuk >= 51 && $jml_suratmasuk <= 60) {
                                                                                                                echo 50;
                                                                                                            } else if ($jml_suratmasuk >= 61 && $jml_suratmasuk <= 70) {
                                                                                                                echo 60;
                                                                                                            } else if ($jml_suratmasuk >= 71 && $jml_suratmasuk <= 80) {
                                                                                                                echo 70;
                                                                                                            } else if ($jml_suratmasuk >= 81 && $jml_suratmasuk <= 90) {
                                                                                                                echo 80;
                                                                                                            } else if ($jml_suratmasuk >= 91 && $jml_suratmasuk <= 100) {
                                                                                                                echo 90;
                                                                                                            } else if ($jml_suratmasuk >= 101) {
                                                                                                                echo 99;
                                                                                                            }
                                                                                                            ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Surat Keluar <?php echo bulan(); ?></div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jml_suratkeluar ?></div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php
                                                                                                            if ($jml_suratkeluar >= 1 && $jml_suratkeluar <= 5) {
                                                                                                                echo 2;
                                                                                                            } else if ($jml_suratkeluar >= 6 && $jml_suratkeluar <= 10) {
                                                                                                                echo 5;
                                                                                                            } else if ($jml_suratkeluar >= 11 && $jml_suratkeluar <= 20) {
                                                                                                                echo 10;
                                                                                                            } else if ($jml_suratkeluar >= 21 && $jml_suratkeluar <= 30) {
                                                                                                                echo 20;
                                                                                                            } else if ($jml_suratkeluar >= 31 && $jml_suratkeluar <= 40) {
                                                                                                                echo 30;
                                                                                                            } else if ($jml_suratkeluar >= 41 && $jml_suratkeluar <= 50) {
                                                                                                                echo 40;
                                                                                                            } else if ($jml_suratkeluar >= 51 && $jml_suratkeluar <= 60) {
                                                                                                                echo 50;
                                                                                                            } else if ($jml_suratkeluar >= 61 && $jml_suratkeluar <= 70) {
                                                                                                                echo 60;
                                                                                                            } else if ($jml_suratkeluar >= 71 && $jml_suratkeluar <= 80) {
                                                                                                                echo 70;
                                                                                                            } else if ($jml_suratkeluar >= 81 && $jml_suratkeluar <= 90) {
                                                                                                                echo 80;
                                                                                                            } else if ($jml_suratkeluar >= 91 && $jml_suratkeluar <= 100) {
                                                                                                                echo 90;
                                                                                                            } else if ($jml_suratkeluar >= 101) {
                                                                                                                echo 99;
                                                                                                            }
                                                                                                            ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Sertifitkat <?php echo bulan(); ?></div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jml_sertifikat ?></div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php
                                                                                                            if ($jml_sertifikat >= 1 && $jml_sertifikat <= 5) {
                                                                                                                echo 2;
                                                                                                            } else if ($jml_sertifikat >= 6 && $jml_sertifikat <= 10) {
                                                                                                                echo 5;
                                                                                                            } else if ($jml_sertifikat >= 11 && $jml_sertifikat <= 20) {
                                                                                                                echo 10;
                                                                                                            } else if ($jml_sertifikat >= 21 && $jml_sertifikat <= 30) {
                                                                                                                echo 20;
                                                                                                            } else if ($jml_sertifikat >= 31 && $jml_sertifikat <= 40) {
                                                                                                                echo 30;
                                                                                                            } else if ($jml_sertifikat >= 41 && $jml_sertifikat <= 50) {
                                                                                                                echo 40;
                                                                                                            } else if ($jml_sertifikat >= 51 && $jml_sertifikat <= 60) {
                                                                                                                echo 50;
                                                                                                            } else if ($jml_sertifikat >= 61 && $jml_sertifikat <= 70) {
                                                                                                                echo 60;
                                                                                                            } else if ($jml_sertifikat >= 71 && $jml_sertifikat <= 80) {
                                                                                                                echo 70;
                                                                                                            } else if ($jml_sertifikat >= 81 && $jml_sertifikat <= 90) {
                                                                                                                echo 80;
                                                                                                            } else if ($jml_sertifikat >= 91 && $jml_sertifikat <= 100) {
                                                                                                                echo 90;
                                                                                                            } else if ($jml_sertifikat >= 101) {
                                                                                                                echo 99;
                                                                                                            }
                                                                                                            ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Peminjaman Ruangan <?php echo bulan(); ?></div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jml_peminjaman_ruangan ?></div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php
                                                                                                            if ($jml_peminjaman_ruangan >= 1 && $jml_peminjaman_ruangan <= 5) {
                                                                                                                echo 2;
                                                                                                            } else if ($jml_peminjaman_ruangan >= 6 && $jml_peminjaman_ruangan <= 10) {
                                                                                                                echo 5;
                                                                                                            } else if ($jml_peminjaman_ruangan >= 11 && $jml_peminjaman_ruangan <= 20) {
                                                                                                                echo 10;
                                                                                                            } else if ($jml_peminjaman_ruangan >= 21 && $jml_peminjaman_ruangan <= 30) {
                                                                                                                echo 20;
                                                                                                            } else if ($jml_peminjaman_ruangan >= 31 && $jml_peminjaman_ruangan <= 40) {
                                                                                                                echo 30;
                                                                                                            } else if ($jml_peminjaman_ruangan >= 41 && $jml_peminjaman_ruangan <= 50) {
                                                                                                                echo 40;
                                                                                                            } else if ($jml_peminjaman_ruangan >= 51 && $jml_peminjaman_ruangan <= 60) {
                                                                                                                echo 50;
                                                                                                            } else if ($jml_peminjaman_ruangan >= 61 && $jml_peminjaman_ruangan <= 70) {
                                                                                                                echo 60;
                                                                                                            } else if ($jml_peminjaman_ruangan >= 71 && $jml_peminjaman_ruangan <= 80) {
                                                                                                                echo 70;
                                                                                                            } else if ($jml_peminjaman_ruangan >= 81 && $jml_peminjaman_ruangan <= 90) {
                                                                                                                echo 80;
                                                                                                            } else if ($jml_peminjaman_ruangan >= 91 && $jml_peminjaman_ruangan <= 100) {
                                                                                                                echo 90;
                                                                                                            } else if ($jml_peminjaman_ruangan >= 101) {
                                                                                                                echo 99;
                                                                                                            }
                                                                                                            ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Grafik -->
    <!-- Content Row -->
    <?php
    $bulanStatistik = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'Desember');
    ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-2 mt-5">
        <h5 class="h5 mb-0 font-weight-light text-gray-800">Data Arsip Tahun <?= date("Y"); ?></h5>
    </div>
    <!-- Surat Masuk -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4 pb-5">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-info">Surat Masuk tahun <?= date("Y"); ?></h6>
                <div class="dropdown no-arrow">

                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body pb-5">
                <div class="chart-area">
                    <canvas id="myChart"></canvas>
                </div>
                <script>
                    Chart.defaults.global.defaultFontFamily = 'Roboto', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                    Chart.defaults.global.defaultFontColor = '#858796';
                    var ctx = document.getElementById("myChart");
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [<?php
                                        foreach ($bulanStatistik as $x) {
                                            echo "'" . $x . "',";
                                        } ?>],
                            datasets: [{
                                label: 'Jumlah surat masuk',
                                data: [<?php
                                        foreach ($isiSuratMasuk as $x) {
                                            echo "'" . $x['jumlah'] . "',";
                                        } ?>],
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
    <!-- Surat Keluar -->

    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4 pb-5">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-info">Surat Keluar tahun <?= date("Y"); ?></h6>
                <div class="dropdown no-arrow">

                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body pb-5">
                <div class="chart-area">
                    <canvas id="suratKeluar"></canvas>
                </div>
                <script>
                    Chart.defaults.global.defaultFontFamily = 'Roboto', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                    Chart.defaults.global.defaultFontColor = '#858796';
                    var ctx = document.getElementById("suratKeluar");
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [<?php
                                        foreach ($bulanStatistik as $x) {
                                            echo "'" . $x . "',";
                                        } ?>],
                            datasets: [{
                                label: 'Jumlah surat Keluar',
                                data: [<?php
                                        foreach ($isiSuratKeluar as $y) {
                                            echo "'" . $y['jumlah'] . "',";
                                        } ?>],
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',

                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>

    <!-- sertifikat -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4 pb-5">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-info">Sertifikat pustakawan tahun <?= date("Y"); ?></h6>
                <div class="dropdown no-arrow">

                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body pb-5">
                <div class="chart-area">
                    <canvas id="sertifikat"></canvas>
                </div>
                <script>
                    Chart.defaults.global.defaultFontFamily = 'Roboto', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                    Chart.defaults.global.defaultFontColor = '#858796';
                    var ctx = document.getElementById("sertifikat");
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [<?php
                                        foreach ($namaSertifikat as $x) {
                                            echo "'" . $x['name'] . "',";
                                        } ?>],
                            datasets: [{
                                label: 'Jumlah sertifikat',
                                data: [<?php
                                        foreach ($isiSertifikat as $y) {
                                            echo "'" . $y['jumlah'] . "',";
                                        } ?>],
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->