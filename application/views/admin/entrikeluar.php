<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Entri Surat Keluar</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <?= $this->session->flashdata('error'); ?>
            <?= form_open_multipart('admin/createSuratkeluar'); ?>
            <div class="form-group">
                <div class="form-group">
                    <label for="tanggal_surat">Tanggal Surat</label>
                    <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" placeholder="Masukkan tanggal dibuatnya surat tersebut.">
                </div>
                <div class="form-group">
                    <label for="no_surat">Pengolah</label>
                    <input type="text" class="form-control" id="pengolah" name="pengolah" placeholder="Masukkan nama pengolah surat tersebut.">
                    <?= form_error('pengolah', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="no_surat">Nomor Surat</label>
                    <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Masukkan nomor surat tersebut.">
                    <?= form_error('nomor_surat', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="no_surat">Tujuan Surat</label>
                    <input type="text" class="form-control form-control-user" id="tujuan" name="tujuan" placeholder="Masukkan tujuan surat tersebut.">
                    <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="perihal">Perihal</label>
                    <textarea class="form-control" id="perihal" name="perihal" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="no_surat">Jenis</label>
                    <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukkan jenis surat tersebut.">
                </div>
                <div class="form-group">
                    <label for="filesurat_masuk">File Surat Keluar</label>
                    <input type="file" name="file" class="form-control-file" id="file">
                </div>
                <button type="submit" class="btn btn-primary" value="upload">Kirim</button>
            </div>
        </div>
        <? form_close(); ?>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- /.container-fluid -->



</div>
<!-- End of Main Content -->