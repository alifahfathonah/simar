<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Entri Surat Masuk</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <?= $this->session->flashdata('error'); ?>
            <?= form_open_multipart('admin/createSuratmasuk'); ?>
            <div class=" form-group">
                <label for="jenis_surat">Jenis Surat</label>
                <select class="form-control" id="jenis_surat" name="jenis_surat">
                    <option>Umum</option>
                    <option>Edaran</option>
                    <option>Keputusan</option>
                    <option>Tugas</option>
                </select>
                <div class="form-group">
                    <label for="tanggal_diterima">Tanggal Diterima</label>
                    <input type="date" class="form-control" id="tanggal_diterima" name="tanggal_diterima" placeholder="masukkan tanggal surat tersebut diterima.">
                    <?= form_error('tanggal_diterima'); ?>
                </div>
                <div class="form-group">
                    <label for="tanggal_surat">Tanggal Surat</label>
                    <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" placeholder="masukkan tanggal dibuatnya surat tersebut.">
                </div>
                <div class="form-group">
                    <label for="no_surat">Nomor Surat</label>
                    <input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="masukkan nomor surat tersebut.">
                    <?= form_error('no_surat', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="perihalmasuk">Perihal</label>
                    <textarea class="form-control" id="perihal" name="perihal" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="no_surat">Asal Surat</label>
                    <input type="text" class="form-control form-control-user" id="asal_surat" name="asal_surat" placeholder="masukkan darimana surat tersebut berasal.">
                    <?= form_error('asal_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="no_surat">Disposisi</label>
                    <input type="text" class="form-control" id="disposisi" name="disposisi" placeholder="masukkan tujuan disposisi.">
                </div>
                <div class="form-group">
                    <label for="keterangan_dis">Keterangan Disposisi</label>
                    <textarea class="form-control" id="keterangan_dis" name="keterangan_dis" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="filesurat_masuk">File Surat masuk</label>
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