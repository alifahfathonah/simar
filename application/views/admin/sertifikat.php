<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Sertifikat</h6>
        </div>
        <div class="card-body">
        <div class="text-danger font-weight-bold mb-4"><a class="text-decoration-none" href="<?= base_url('admin/entrisertifikat'); ?>"><button type="button" id="editbtn" name="editbtn" class="btn btn-danger btn-lg btn editbtn mb-2"?> <i class="fa fa-plus-square fa-1x"></i> </button> </a>Tambah Data </div>
            <?= $this->session->flashdata('message'); ?>
            <?= $this->session->flashdata('error'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pemilik</th>
                            <th>Tanggal Diterima</th>
                            <th>Tanggal Kegiatan</th>
                            <th>Nama Kegiatan</th>
                            <th>Asal Sertifikat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($sertifikat as $admin) : ?>
                            <tr>
                                <td> <?php echo $no++; ?> </td>
                                <td> <?= $admin['name']; ?> </td>
                                <td> <?= $admin['tanggal_diterima']; ?> </td>
                                <td> <?= $admin['tanggal_kegiatan']; ?> </td>
                                <td> <?= $admin['nama_kegiatan']; ?> </td>
                                <td> <?= $admin['asal_sertifikat']; ?> </td>
                                <td>
                                    <button type="button" type="button" class="btn btn-info btn-sm btn-circle" data-toggle="modal" data-target="#detail<?= $admin['id']; ?>"> <i class="fas fa-folder-open"></i> </button> <!-- Button trigger modal -->
                                    <div class="modal fade" id="detail<?= $admin['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Sertifikat</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-borderless ">
                                                        <tr>
                                                            <th scope="row">Pemilik</th>
                                                            <td><?= $admin['name']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Tanggal Diterima</th>
                                                            <td><?= $admin['tanggal_diterima']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Tanggal Kegiatan</th>
                                                            <td><?= $admin['tanggal_kegiatan']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Nama Kegiatan</th>
                                                            <td><?= $admin['nama_kegiatan']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Asal Sertifikat</th>
                                                            <td><?= $admin['asal_sertifikat']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Sebagai</th>
                                                            <td><?= $admin['sebagai']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Jumlah Jam</th>
                                                            <td><?= $admin['jumlah_jam']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">File Sertifikat</th>
                                                            <td><img class="img-fluid" src="<?= base_url('arsip/sertifikat/') . $admin['file']; ?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Cetak Arsip</th>
                                                            <td><a href="<?= base_url('admin/cetakSertifikat/') . $admin['id']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Cetak</a></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" id="editbtn" name="editbtn" class="btn btn-primary btn-sm btn-circle editbtn mt-1 " data-toggle="modal" data-target="#editmodal<?= $admin['id']; ?>"> <i class="fas fa-edit"> </i> </button>
                                    <div class="modal fade" id="editmodal<?= $admin['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Sertifikat</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url('admin/updateSertifikat') ?>" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="pemilik">Pemilik</label>
                                                            <select class="form-control" id="pemilik" name="pemilik">
                                                                <option value="<?= $admin['pemilik']; ?>"><?= $admin['name']; ?></option>
                                                            </select>
                                                            <div class="form-group">
                                                                <label for="tanggal_diterima">Tanggal Diterima</label>
                                                                <input type="date" class="form-control" id="tanggal_diterima" name="tanggal_diterima" placeholder="masukkan tanggal sertifikat tersebut diterima." value="<?= $admin['tanggal_diterima']; ?>">
                                                                <?= form_error('tanggal_diterima'); ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                                                                <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" placeholder="masukkan tanggal kegiatan sertifikat tersebut." value="<?= $admin['tanggal_kegiatan']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama_kegiatan">Nama Kegiatan</label>
                                                                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="masukkan nama kegiatan sertifikat tersebut." value="<?= $admin['nama_kegiatan']; ?>">
                                                                <?= form_error('nama_kegiatan', '<small class="text-danger pl-3">', '</small>') ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="asal_sertifikat">Asal Sertifikat</label>
                                                                <input type="text" class="form-control" id="asal_sertifikat" name="asal_sertifikat" placeholder="masukkan asal sertifikat sertifikat tersebut." value="<?= $admin['asal_sertifikat']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="sebagai">Sebagai</label>
                                                                <input type="text" class="form-control form-control-user" id="sebagai" name="sebagai" placeholder="masukkan sebagai apa pada kegiatan tersebut berasal." value="<?= $admin['sebagai']; ?>">
                                                                <?= form_error('sebagai', '<small class="text-danger pl-3">', '</small>'); ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jumlah_jam">Jumlah Jam</label>
                                                                <input type="number" class="form-control" id="jumlah_jam" name="jumlah_jam" placeholder="masukkan jumlah jam kegiatan tersebut." value="<?= $admin['jumlah_jam']; ?>">
                                                            </div>
                                                            <table class="table table-borderless ">
                                                                <tr>
                                                                    <th>File Sertifikat</th>
                                                                    <td><img class="img-fluid" src="<?= base_url('arsip/sertifikat/') . $admin['file']; ?>"></td>
                                                                </tr>
                                                            </table>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control-file <?= form_error('file') ? 'is-invalid' : '' ?>" id="file" name="file">
                                                                <input type="hidden" class="form-control-file" id="old_file" name="old_file" value="<?= $admin['file']; ?>">
                                                                <div class="invalid-feedback">
                                                                    <?= form_error('file') ?>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control invisible" id="id" name="id" placeholder="Masukkan ID" value="<?= $admin['id']; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Kirim</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" type="button" class="btn btn-danger btn-sm btn-circle mt-1" data-toggle="modal" data-target="#delete<?= $admin['id']; ?>"> <i class="fas fa-trash-alt"> </i></button> <!-- Button trigger modal -->
                                    <div class="modal fade" id="delete<?= $admin['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Sertifikat</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="<?= base_url('admin/deleteSertifikat') ?>">
                                                        <label for="delete">Apakah yakin menghapus data sertifikat <?= $admin['name']; ?>?</label>
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