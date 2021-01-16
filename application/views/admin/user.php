<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <?= $this->session->flashdata('error'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role ID</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($datauser as $admin) : ?>
                            <tr>
                                <td> <?php echo $no++; ?> </td>
                                <td> <?= $admin['name']; ?> </td>
                                <td> <?= $admin['email']; ?> </td>
                                <td> <?= $admin['role_name']; ?> </td>
                                <td>
                                    <button type="button" id="editbtn" name="editbtn" class="btn btn-primary btn-sm btn-circle editbtn" data-toggle="modal" data-target="#editmodal<?= $admin['id']; ?>"> <i class="fas fa-edit"> </i> </button>
                                    <div class="modal fade" id="editmodal<?= $admin['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url('admin/updateUser') ?>" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="jenis_surat">Role User</label>
                                                            <select class="form-control" id="role_id" name="role_id" value="<?= $admin['role_id']; ?>">
                                                                <option value="1">Admin</option>
                                                                <option value="2">Pegawai</option>
                                                                <option value="3">User</option>
                                                            </select>
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control invisible" id="id" name="id" placeholder="Masukkan ID" value="<?= $admin['id']; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Kirim</button>
                                                            </div>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="<?= base_url('admin/deleteUser') ?>">
                                                        <label for="delete">Apakah yakin user <?= $admin['name']; ?>?</label>
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