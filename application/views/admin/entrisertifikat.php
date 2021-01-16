<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Entri Sertifikat</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <?= $this->session->flashdata('error'); ?>
            <?= form_open_multipart('admin/createSertifikat'); ?>
            <div class=" form-group">
                <label for="pemilik">Pemilik</label>
                <select class="form-control" id="pemilik" name="pemilik">
                    <?php foreach ($userrolename as $admin) : ?>
                        <option value="<?= $admin['userid']; ?>"><?= $admin['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="form-group">
                    <label for="tanggal_diterima">Tanggal Diterima</label>
                    <input type="date" class="form-control" id="tanggal_diterima" name="tanggal_diterima" placeholder="masukkan tanggal sertifikat tersebut diterima.">
                    <?= form_error('tanggal_diterima'); ?>
                </div>
                <div class="form-group">
                    <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                    <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" placeholder="masukkan tanggal kegiatan sertifikat tersebut.">
                </div>
                <div class="form-group">
                    <label for="nama_kegiatan">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="masukkan nama kegiatan sertifikat tersebut.">
                    <?= form_error('nama_kegiatan', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="asal_sertifikat">Asal Sertifikat</label>
                    <input type="text" class="form-control" id="asal_sertifikat" name="asal_sertifikat" placeholder="masukkan asal sertifikat tersebut."></input>
                </div>
                <div class="form-group">
                    <label for="sebagai">Sebagai</label>
                    <input type="text" class="form-control form-control-user" id="sebagai" name="sebagai" placeholder="masukkan sebagai apa pada kegiatan tersebut berasal.">
                    <?= form_error('sebagai', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="jumlah_jam">Jumlah Jam</label>
                    <input type="number" class="form-control" id="jumlah_jam" name="jumlah_jam" placeholder="masukkan jumlah jam kegiatan tersebut.">
                </div>
                <div class="form-group">
                    <label for="filesurat_sertifikat">File Sertifikat</label>
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