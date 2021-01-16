<!-- Begin Page Content -->

    <h1 class="m-0 font-weight-gray text-primary text-center mt-4">Form Peminjaman Ruangan</h1>
    <h6 class="m-0 font-weight-light text-primary text-center mt-n1 mb-3">Perpustakaan Kampus 4 Universitas Ahmad Dahlan</h6>
<div class="container-fluid">
<div class="card col-lg-6 pt-3 mx-auto mb-4">
    <div class="card shadow mb-4">
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <?= $this->session->flashdata('error'); ?>
            <?= form_open_multipart('user/createPeminjaman'); ?>
            <div class=" form-group">
                <div class="form-group">
                    <label for="nama">Nama Peminjam</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="masukkan nama peminjam ruangan.">
                    <?= form_error('nama'); ?>
                </div>
                <div class="form-group">
                    <label for="no_identitas">Nomor Identitas</label>
                    <input type="number" class="form-control" id="no_identitas" name="no_identitas" placeholder="masukkan nomor identitas.">
                </div>
                <div class="form-group">
                    <label for="fakultas">Fakultas</label>
                    <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="masukkan fakultas.">
                    <?= form_error('fakultas', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="prodi">Prodi</label>
                    <input type="text" class="form-control" id="prodi" name="prodi" placeholder="masukkan prodi.">
                    <?= form_error('prodi'); ?>
                </div>
                <div class="form-group">
                    <label for="nomor_wa">Nomor WhatsApp</label>
                    <input type="number" class="form-control form-control-user" id="nomor_wa" name="nomor_wa" placeholder="masukkan nomor WhatsApp.">
                    <?= form_error('nomor_wa', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="tanggal_kegiatan">Tanggal Kegitan</label>
                    <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" placeholder="masukkan tanggal kegiatan.">
                </div>
                <div class="form-group">
                    <label for="jam_mulai">Waktu Mulai</label>
                    <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" placeholder="masukkan pukul berapa mulai kegiatan.">
                </div>
                <div class="form-group">
                    <label for="jam_selesai">Waktu Selesai</label>
                    <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" placeholder="masukkan pukul berapa selesai kegiatan.">
                </div>
                <div class="form-group">
                    <label for="keperluan">Keperluan</label>
                    <input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="masukkan keperluan kegiatan.">
                </div>
                <div class="form-group">
                    <label for="jumlah_peserta">Jumlah Peserta Kegiatan</label>
                    <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" placeholder="masukkan jumlah peserta kegiatan.">
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
</div>
<!-- /.container-fluid -->



</div>
<!-- End of Main Content -->