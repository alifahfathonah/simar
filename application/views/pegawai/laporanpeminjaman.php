<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Peminjaman</h6><br>
            <form action="<?= base_url('pegawai/laporanPeminjaman') ?>" method="post">
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
                <a href="<?= base_url('pegawai/exportCSVpeminjaman') . '/' .  $this->input->post('awal') . '/' . $this->input->post('akhir') ?>" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Unduh Laporan</a>
            </form>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <?= $this->session->flashdata('error'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Peminjam</th>
                            <th>Nomor Identitas</th>
                            <th>Fakultas</th>
                            <th>Prodi</th>
                            <th>Nomor WhatsApp</th>
                            <th>Tanggal Kegiatan</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Keperluan</th>
                            <th>Jumlah Peserta</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($peminjaman as $admin) : ?>
                            <tr>
                                <td> <?= $admin['id']; ?> </td>
                                <td> <?= $admin['nama']; ?> </td>
                                <td> <?= $admin['no_identitas']; ?> </td>
                                <td> <?= $admin['fakultas']; ?> </td>
                                <td> <?= $admin['prodi']; ?> </td>
                                <td> <?= $admin['nomor_wa']; ?> </td>
                                <td> <?= $admin['tanggal_kegiatan']; ?> </td>
                                <td> <?= $admin['jam_mulai']; ?> </td>
                                <td> <?= $admin['jam_selesai']; ?> </td>
                                <td> <?= $admin['keperluan']; ?> </td>
                                <td> <?= $admin['jumlah_peserta']; ?> </td>
                                <td> <?= $admin['status']; ?> </td>
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