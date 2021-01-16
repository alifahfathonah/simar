<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Surat Masuk</h6><br>
            <form action="<?= base_url('admin/laporanmasuk') ?>" method="post">
                <div class="row">
                    <div class="col">
                        <label for="tanggal_diterima">Dari Tanggal</label>
                        <input type="date" class="form-control" id="awal" name="awal">
                        <?= form_error('awal', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="col">
                        <label for="tanggal_diterima">Sampai Tanggal</label>
                        <input type="date" class="form-control" id="akhir" name="akhir">
                        <?= form_error('akhir', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div><br>
                <button type="submit" class="btn btn-primary" value="upload">Kirim</button>
                <a href="<?= base_url('admin/exportCSVmasuk') . '/' .  $this->input->post('awal') . '/' . $this->input->post('akhir') ?>" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Unduh Laporan</a>
            </form>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <?= $this->session->flashdata('error'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Surat</th>
                            <th>Tanggal Diterima</th>
                            <th>Tanggal Surat</th>
                            <th>No Surat</th>
                            <th>Perihal</th>
                            <th>Asal Surat</th>
                            <th>Disposisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($suratmasuk as $admin) : ?>
                            <tr>
                                <td> <?php echo $no++; ?> </td>
                                <td> <?= $admin['jenis_surat']; ?> </td>
                                <td> <?= $admin['tanggal_diterima']; ?> </td>
                                <td> <?= $admin['tanggal_surat']; ?> </td>
                                <td> <?= $admin['no_surat']; ?> </td>
                                <td> <?= $admin['perihal']; ?> </td>
                                <td> <?= $admin['asal_surat']; ?> </td>
                                <td> <?= $admin['disposisi']; ?> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->