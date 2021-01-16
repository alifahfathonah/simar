<?php

class Pegawai_model extends CI_Model
{
    public function isiSertifikat($pemilik)
    {
        $tahun = date("Y");
        $bulan = date("m");
        $this->db->from('sertifikat');
        $this->db->where('month(tanggal_diterima)',$bulan);
        $this->db->where('year(tanggal_diterima)',$tahun);
        $this->db->where('pemilik', $pemilik);
        $query = $this->db->count_all_results();
        return $query;
        // return $this->db->query("SELECT id FROM sertifikat WHERE month(tanggal_kegiatan)=$bulan AND year(tanggal_kegiatan)=$tahun AND pemilik=$pemilik")->count_all_results();
    }
    public function readSertifikat($id)
    {
        return $this->db->query("SELECT user.name, sertifikat.`id`,sertifikat.`pemilik`,sertifikat.`tanggal_diterima`,sertifikat.`tanggal_kegiatan`,sertifikat.`nama_kegiatan`,sertifikat.`asal_sertifikat`,sertifikat.`sebagai`,sertifikat.`jumlah_jam`,sertifikat.`file` FROM user, sertifikat WHERE sertifikat.pemilik=user.id AND user.id=$id")->result_array();
    }
    public function laporanSertifikat($awal, $akhir, $id)
    {
        return $this->db->query("SELECT user.name, sertifikat.`tanggal_diterima`,sertifikat.`tanggal_kegiatan`,sertifikat.`nama_kegiatan`,sertifikat.`asal_sertifikat`,sertifikat.`sebagai`,sertifikat.`jumlah_jam`,sertifikat.`file` FROM user, sertifikat WHERE sertifikat.pemilik=user.id AND sertifikat.`tanggal_diterima` BETWEEN '$awal' AND '$akhir' AND user.id=$id")->result_array();
    }
    public function cetakSertifikat($id)
    {
        return $this->db->query("SELECT user.name, sertifikat.`id`,sertifikat.`pemilik`,sertifikat.`tanggal_diterima`,sertifikat.`tanggal_kegiatan`,sertifikat.`nama_kegiatan`,sertifikat.`asal_sertifikat`,sertifikat.`sebagai`,sertifikat.`jumlah_jam`,sertifikat.`file` FROM user, sertifikat WHERE sertifikat.pemilik=user.id AND sertifikat.id='$id'")->result_array();
    }
    public function createSertifikat($data)
    {
        $this->db->insert('sertifikat', $data);
    }
    public function updateSertifikat($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('sertifikat', $data);
    }
    public function deleteSertifikat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sertifikat');
    }
    public function readPeminjaman()
    {
        return $this->db->get('peminjaman_ruang')->result_array();
    }
    public function laporanPeminjaman($awal, $akhir)
    {
        return $this->db->query("SELECT * FROM peminjaman_ruang WHERE tanggal_kegiatan BETWEEN '$awal' AND '$akhir'")->result_array();
    }
    public function createPeminjaman($data)
    {
        $this->db->insert('peminjaman_ruang', $data);
    }
    public function updatePeminjaman($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('peminjaman_ruang', $data);
    }
    public function terimaPeminjaman($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('peminjaman_ruang', $data);
    }
    public function tolakPeminjaman($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('peminjaman_ruang', $data);
    }
    public function deletePeminjaman($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('peminjaman_ruang');
    }
}
