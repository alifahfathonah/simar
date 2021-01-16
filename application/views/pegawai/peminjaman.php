<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman</h6>
        </div>
        <div class="card-body">
        <div class="text-danger font-weight-bold mb-4"><a class="text-decoration-none" href="<?= base_url('pegawai/entripeminjaman'); ?>"><button type="button" id="editbtn" name="editbtn" class="btn btn-danger btn-lg btn editbtn mb-2"?> <i class="fa fa-plus-square fa-1x"></i> </button> </a>Tambah Data </div>
            <?= $this->session->flashdata('message'); ?>
            <?= $this->session->flashdata('error'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Kegiatan</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($peminjaman as $admin) : ?>
                            <tr>
                                <td> <?php echo $no++; ?> </td>
                                <td> <?= $admin['nama']; ?> </td>
                                <td> <?= $admin['tanggal_kegiatan']; ?> </td>
                                <td> <?= $admin['jam_mulai']; ?> </td>
                                <td> <?= $admin['jam_selesai']; ?> </td>
                                <td> <?= $admin['keperluan']; ?> </td>
                                <td> <?= $admin['status']; ?> </td>
                                <td>
                                    <button type="button" type="button" class="btn btn-info btn-sm btn-circle" data-toggle="modal" data-target="#detail<?= $admin['id']; ?>"> <i class="fas fa-folder-open"></i> </button> <!-- Button trigger modal -->
                                    <div class="modal fade" id="detail<?= $admin['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Data Peminjaman</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <table class="table table-borderless ">
                                                        <tr>
                                                            <th scope="row">Nama Peminjam</th>
                                                            <td><?= $admin['nama']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Nomor Identitas</th>
                                                            <td><?= $admin['no_identitas']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Fakultas</th>
                                                            <td><?= $admin['fakultas']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Prodi</th>
                                                            <td><?= $admin['prodi']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Nomor WhatsApp</th>
                                                            <td><?= $admin['nomor_wa']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Tanggal Kegiatan</th>
                                                            <td><?= $admin['tanggal_kegiatan']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Waktu Mulai</th>
                                                            <td><?= $admin['jam_mulai']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Waktu Selesai</th>
                                                            <td><?= $admin['jam_selesai']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Keperluan</th>
                                                            <td><?= $admin['keperluan']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Jumlah Peserta</th>
                                                            <td><?= $admin['jumlah_peserta']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Status Peminjaman</th>
                                                            <td><?= $admin['status']; ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" type="button" class="btn btn-success btn-sm btn-circle" data-toggle="modal" data-target="#terima<?= $admin['id']; ?>"> <i class="fas fa-check"> </i></button> <!-- Button trigger modal -->
                                    <div class="modal fade" id="terima<?= $admin['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Terima Peminjaman</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="<?= base_url('pegawai/terimaPeminjaman') ?>">
                                                        <label for="delete">Apakah yakin menerima peminjaman ruangan oleh <?= $admin['nama']; ?>?</label>
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control invisible" id="id" name="id" placeholder="Masukkan ID" value="<?= $admin['id']; ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Kirim</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" type="button" class="btn btn-warning btn-sm btn-circle" data-toggle="modal" data-target="#tolak<?= $admin['id']; ?>"> <i class="fas fa-times"> </i></button> <!-- Button trigger modal -->
                                    <div class="modal fade" id="tolak<?= $admin['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tolak Peminjaman</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="<?= base_url('pegawai/tolakPeminjaman') ?>">
                                                        <label for="delete">Apakah yakin menolak peminjaman ruangan oleh <?= $admin['nama']; ?>?</label>
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control invisible" id="id" name="id" placeholder="Masukkan ID" value="<?= $admin['id']; ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-warning">Kirim</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" type="button" class="btn btn-danger btn-sm btn-circle" data-toggle="modal" data-target="#delete<?= $admin['id']; ?>"> <i class="fas fa-trash-alt"> </i></button> <!-- Button trigger modal -->
                                    <div class="modal fade" id="delete<?= $admin['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Peminjaman</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="<?= base_url('pegawai/deletePeminjaman') ?>">
                                                        <label for="delete">Apakah yakin menghapus data peminjaman oleh <?= $admin['nama']; ?>?</label>
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control invisible" id="id" name="id" placeholder="Masukkan ID" value="<?= $admin['id']; ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Kirim</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
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