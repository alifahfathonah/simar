<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Surat Masuk</h6>
        </div>
        <div class="card-body">
        <div class="text-danger font-weight-bold mb-4"><a class="text-decoration-none" href="<?= base_url('admin/entrimasuk'); ?>"><button type="button" id="editbtn" name="editbtn" class="btn btn-danger btn-lg btn editbtn mb-2"?> <i class="fa fa-plus-square fa-1x"></i> </button> </a>Tambah Data </div>
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
                            <th>Aksi</th>
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
                                <td>
                                    <button type="button" type="button" class="btn btn-info btn-sm btn-circle" data-toggle="modal" data-target="#detail<?= $admin['id']; ?>"> <i class="fas fa-folder-open"></i> </button> <!-- Button trigger modal -->
                                    <div class="modal fade" id="detail<?= $admin['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Surat Masuk</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-borderless ">
                                                        <tr>
                                                            <th scope="row">Jenis Surat</th>
                                                            <td><?= $admin['jenis_surat']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Tanggal Diterima</th>
                                                            <td><?= $admin['tanggal_diterima']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Tanggal Surat</th>
                                                            <td><?= $admin['tanggal_surat']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">No Surat</th>
                                                            <td><?= $admin['no_surat']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Perihal</th>
                                                            <td><?= $admin['perihal']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Asal Surat</th>
                                                            <td><?= $admin['asal_surat']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Disposisi</th>
                                                            <td><?= $admin['disposisi']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Keterangan Disposisi</th>
                                                            <td><?= $admin['keterangan_dis']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">File Surat Masuk</th>
                                                            <td><img class="img-fluid" src="<?= base_url('arsip/suratmasuk/') . $admin['file']; ?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Cetak Arsip</th>
                                                            <td><a href="<?= base_url('admin/cetakSuratmasuk/') . $admin['id']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Cetak</a></td>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Surat Masuk</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url('admin/updateSuratmasuk') ?>" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="jenis_surat">Jenis Surat</label>
                                                            <select class="form-control" id="jenis_surat" name="jenis_surat" value="<?= $admin['jenis_surat']; ?>">
                                                                <option>Umum</option>
                                                                <option>Edaran</option>
                                                                <option>Keputusan</option>
                                                                <option>Tugas</option>
                                                            </select>
                                                            <div class="form-group">
                                                                <label for="tanggal_diterima">Tanggal Diterima</label>
                                                                <input type="date" class="form-control" id="tanggal_diterima" name="tanggal_diterima" placeholder="Masukkan tanggal surat tersebut diterima." value="<?= $admin['tanggal_diterima']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tanggal_surat">Tanggal Surat</label>
                                                                <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" placeholder="Masukkan tanggal dibuatnya surat tersebut." value="<?= $admin['tanggal_surat']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="no_surat">Nomor Surat</label>
                                                                <input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="Masukkan nomor surat tersebut." value="<?= $admin['no_surat']; ?>">
                                                            </div>
                                                            <div class=" form-group">
                                                                <label for="perihalmasuk">Perihal</label>
                                                                <textarea class="form-control" id="perihal" name="perihal" rows="3"><?= $admin['perihal']; ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="no_surat">Asal Surat</label>
                                                                <input type="text" class="form-control" id="asal_surat" name="asal_surat" placeholder="Masukkan darimana surat tersebut berasal." value="<?= $admin['asal_surat']; ?>">
                                                            </div>
                                                            <div class=" form-group">
                                                                <label for="no_surat">Disposisi</label>
                                                                <input type="text" class="form-control" id="disposisi" name="disposisi" placeholder="Masukkan tujuan disposisi." value="<?= $admin['disposisi']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="keterangan_dis">Keterangan Disposisi</label>
                                                                <textarea class="form-control" id="keterangan_dis" name="keterangan_dis" rows="3"><?= $admin['keterangan_dis']; ?></textarea>
                                                            </div>
                                                            <table class="table table-borderless ">
                                                                <tr>
                                                                    <th>File Surat Masuk</th>
                                                                    <td><img class="img-fluid" src="<?= base_url('arsip/suratmasuk/') . $admin['file']; ?>"></td>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Surat Masuk</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="<?= base_url('admin/deleteSuratmasuk') ?>">
                                                        <label for="delete">Apakah yakin menghapus data nomor surat <?= $admin['no_surat']; ?>?</label>
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