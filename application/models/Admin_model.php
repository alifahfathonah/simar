<?php

class Admin_model extends CI_Model
{

    public function isiSuratMasuk()
    {
        $tahun = date("Y");
        return $this->db->query("SELECT month(tanggal_diterima) AS bulan, COUNT(*) AS jumlah FROM surat_masuk where year(tanggal_diterima)=$tahun group by month(tanggal_diterima)")->result_array();
    
    }
    public function isiSuratKeluar()
    {
        $tahun = date("Y");
        return $this->db->query("SELECT month(tanggal_surat) AS bulan, COUNT(*) AS jumlah FROM surat_keluar where year(tanggal_surat)=$tahun group by month(tanggal_surat)")->result_array();
    
    }
    public function isiSertifikat()
    {
        $tahun = date("Y");
        return $this->db->query("SELECT pemilik, COUNT(*) AS jumlah FROM sertifikat WHERE year(tanggal_diterima)=$tahun GROUP BY pemilik;")->result_array();
    
    }
    public function namaSertifikat()
    {
        $tahun = date("Y");
        return $this->db->query("SELECT pemilik, name FROM sertifikat JOIN user ON sertifikat.pemilik=user.id WHERE role_id=2 GROUP BY pemilik")->result_array();
    
    }

    
    // public function statistikSuratMasuk()
    // {
    //     $bulan = date("m");
    //     $tahun = date("Y");
    //     // $this->db->from('surat_masuk');
    //     // $x = $this->db->where('month(tanggal_diterima)',$bulan);
    //     // $this->db->where('year(tanggal_diterima)',$tahun);
    //     // $this->db->order_by("id", "asc");
    //     // $query = $this->db->get(); 
    //     // return $query->result();

    //     $query = $this->db->query("SELECT tanggal_diterima FROM surat_masuk GROUP BY year(tanggal_diterima)=$tahun");
    //     if($query->num_rows() > 0){
    //         foreach($query->result() as $data){
    //             $hasil[] = $data;
    //         }
    //         return $hasil;
    //     }
    // }
    
    function rekapBulanSuratMasuk(){
        $bulan = date("m");
        $tahun = date("Y");
        $this->db->from('surat_masuk');
        $this->db->where('month(tanggal_diterima)',$bulan);
        $this->db->where('year(tanggal_diterima)',$tahun);
        $query = $this->db->count_all_results();
        return $query;
    }  
    function rekapBulanSuratKeluar(){
        $bulan = date("m");
        $tahun = date("Y");
        $this->db->from('surat_keluar');
        $this->db->where('month(tanggal_surat)',$bulan);
        $this->db->where('year(tanggal_surat)',$tahun);
        $query = $this->db->count_all_results();
        return $query;
    }  
    function rekapBulanSertifikat(){
        $bulan = date("m");
        $tahun = date("Y");
        $this->db->from('sertifikat');
        $this->db->where('month(tanggal_diterima)',$bulan);
        $this->db->where('year(tanggal_diterima)',$tahun);
        $query = $this->db->count_all_results();
        return $query;
    }  
    function rekapBulanPeminjamanRuang(){
        $bulan = date("m");
        $tahun = date("Y");
        $this->db->from('peminjaman_ruang');
        $this->db->where('month(tanggal_kegiatan)',$bulan);
        $this->db->where('year(tanggal_kegiatan)',$tahun);
        $query = $this->db->count_all_results();
        return $query;
    }  
    public function readUserRoleName()
    {
        return $this->db->query("SELECT user.name as nama, user.id as userid, user_role.role_id, user_role.role_name FROM user, user_role WHERE user.role_id=user_role.role_id AND (user_role.role_id=1 OR user_role.role_id=2)")->result_array();
    }
    public function readUser()
    {
        return $this->db->query("SELECT * FROM user, user_role WHERE user.role_id=user_role.role_id")->result_array();
    }
    public function updateUser($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
    public function readSuratmasuk()
    {
        return $this->db->get('surat_masuk')->result_array();
    }
    public function laporanSuratmasuk($awal, $akhir)
    {
        return $this->db->query("SELECT * FROM surat_masuk WHERE tanggal_diterima BETWEEN '$awal' AND '$akhir'")->result_array();
    }
    public function cetakSuratmasuk($id)
    {
        return $this->db->get_where('surat_masuk', array('id' => $id))->result_array();
    }
    public function createSuratmasuk($data)
    {
        $this->db->insert('surat_masuk', $data);
    }
    public function updateSuratmasuk($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('surat_masuk', $data);
    }
    public function deleteSuratmasuk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('surat_masuk');
    }
    public function readSuratkeluar()
    {
        return $this->db->get('surat_keluar')->result_array();
    }
    public function laporanSuratkeluar($awal, $akhir)
    {
        return $this->db->query("SELECT * FROM surat_keluar WHERE tanggal_surat BETWEEN '$awal' AND '$akhir'")->result_array();
    }
    public function cetakSuratkeluar($id)
    {
        return $this->db->get_where('surat_keluar', array('id' => $id))->result_array();
    }
    public function createSuratkeluar($data)
    {
        $this->db->insert('surat_keluar', $data);
    }
    public function updateSuratkeluar($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('surat_keluar', $data);
    }
    public function deleteSuratkeluar($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('surat_keluar');
    }
    public function readSertifikat()
    {
        return $this->db->query("SELECT user.name, sertifikat.`id`,sertifikat.`pemilik`,sertifikat.`tanggal_diterima`,sertifikat.`tanggal_kegiatan`,sertifikat.`nama_kegiatan`,sertifikat.`asal_sertifikat`,sertifikat.`sebagai`,sertifikat.`jumlah_jam`,sertifikat.`file` FROM user, sertifikat WHERE sertifikat.pemilik=user.id")->result_array();
    }
    public function laporanSertifikat($awal, $akhir)
    {
        return $this->db->query("SELECT user.name, sertifikat.`tanggal_diterima`,sertifikat.`tanggal_kegiatan`,sertifikat.`nama_kegiatan`,sertifikat.`asal_sertifikat`,sertifikat.`sebagai`,sertifikat.`jumlah_jam`,sertifikat.`file` FROM user, sertifikat WHERE sertifikat.pemilik=user.id AND sertifikat.`tanggal_diterima` BETWEEN '$awal' AND '$akhir'")->result_array();
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
