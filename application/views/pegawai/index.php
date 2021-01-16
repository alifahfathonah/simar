<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Sertifikat Yang Telah Didapatkan di bulan <?php echo bulan().date(" Y"); ?></div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $isiSertifpegawai; ?></div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php 
                                        if ($isiSertifpegawai >=1 && $isiSertifpegawai<= 5) {
                                            echo 2 ;
                                        } 
                                        else if ($isiSertifpegawai >=6 && $isiSertifpegawai<= 10) {
                                            echo 5;
                                        } 
                                        else if ($isiSertifpegawai >=11 && $isiSertifpegawai<= 20) {
                                            echo 10;
                                        } 
                                        else if ($isiSertifpegawai >=21 && $isiSertifpegawai<= 30) {
                                            echo 20;
                                        } 
                                        else if ($isiSertifpegawai >=31 && $isiSertifpegawai<= 40) {
                                            echo 30;
                                        } 
                                        else if ($isiSertifpegawai >=41 && $isiSertifpegawai<= 50) {
                                            echo 40;
                                        } 
                                        else if ($isiSertifpegawai >=51 && $isiSertifpegawai<= 60) {
                                            echo 50; 
                                        } 
                                        else if ($isiSertifpegawai >=61 && $isiSertifpegawai<= 70) {
                                            echo 60;
                                        } 
                                        else if ($isiSertifpegawai >=71 && $isiSertifpegawai<= 80) {
                                            echo 70;
                                        } 
                                        else if ($isiSertifpegawai >=81 && $isiSertifpegawai<= 90) {
                                            echo 80;
                                        } 
                                        else if ($isiSertifpegawai >=91 && $isiSertifpegawai<= 100) {
                                            echo 90;
                                        } 
                                        else if ($isiSertifpegawai >=101) {
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

    <!-- Content Row -->

</div>
<!-- /.container-fluid -->



</div>
<!-- End of Main Content -->