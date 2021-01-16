<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('Pdf');
        $this->load->library('form_validation');
        is_logged_in();
        $role_id = $this->session->userdata('role_id');
        if ($role_id != 1) {
            redirect('auth/blocked');
        }
    }
    public function index()
    { 
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['isiSuratMasuk'] = $this->Admin_model->isiSuratMasuk();
        $data['isiSuratKeluar'] = $this->Admin_model->isiSuratKeluar();
        $data['isiSertifikat'] = $this->Admin_model->isiSertifikat();
        $data['namaSertifikat'] = $this->Admin_model->namaSertifikat();
        $data['jml_suratmasuk'] = $this->Admin_model->rekapBulanSuratMasuk();
        $data['jml_suratkeluar'] = $this->Admin_model->rekapBulanSuratKeluar();
        $data['jml_sertifikat'] = $this->Admin_model->rekapBulanSertifikat();
        $data['jml_peminjaman_ruangan'] = $this->Admin_model->rekapBulanPeminjamanRuang();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_admin_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function user()
    {
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['datauser'] = $this->Admin_model->readUser();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_admin_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function updateUser()
    {
        $id = $this->input->post('id');
        $data = [
            "role_id" => $this->input->post('role_id'),
        ];
        $this->Admin_model->updateUser($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data telah diubah. </div>');
        redirect('admin/user');
    }
    public function suratmasuk()
    {
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['suratmasuk'] = $this->Admin_model->readSuratmasuk();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_admin_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('admin/suratmasuk', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function entrimasuk()
    {
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_admin_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('admin/entrimasuk', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function cetakSuratmasuk($id)
    {
        $data['cetaksuratmasuk'] = $this->Admin_model->cetakSuratmasuk($id);
        $this->load->view('admin/cetaksuratmasuk', $data);
    }
    public function exportCSVmasuk($awal, $akhir)
    {
        $filename =  date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        $usersData = $this->Admin_model->laporanSuratmasuk($awal, $akhir);

        $file = fopen('php://output', 'w');

        $header = array("ID", "Jenis Surat", "Tanggal Diterima", "Tanggal Surat", "No Surat", "Perihal", "Asal Surat", "Disposisi", "Keterangan Disposisi", "File");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }
    public function uploadSuratmasuk()
    {
        $config['upload_path'] = './arsip/suratmasuk';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            return "default.jpg";
        } else {
            $result = $this->upload->data();
            return $result['file_name'];
        }
    }
    public function createSuratmasuk()
    {
        $data = [
            "id" => 'NULL',
            "jenis_surat" => $this->input->post('jenis_surat'),
            "tanggal_diterima" => $this->input->post('tanggal_diterima'),
            "tanggal_surat" => $this->input->post('tanggal_surat'),
            "no_surat" => $this->input->post('no_surat'),
            "perihal" => $this->input->post('perihal'),
            "asal_surat" => $this->input->post('asal_surat'),
            "disposisi" => $this->input->post('disposisi'),
            "keterangan_dis" => $this->input->post('keterangan_dis'),
            "file" => $this->uploadSuratmasuk()
        ];
        $data['entrimasuk'] = $this->Admin_model->createSuratmasuk($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data telah ditambahkan. </div>');
        redirect('admin/suratmasuk');
    }
    public function updateSuratmasuk()
    {
        $id = $this->input->post('id');
        if (!empty($_FILES["file"]["name"])) {
            $data = [
                "jenis_surat" => $this->input->post('jenis_surat'),
                "tanggal_diterima" => $this->input->post('tanggal_diterima'),
                "tanggal_surat" => $this->input->post('tanggal_surat'),
                "no_surat" => $this->input->post('no_surat'),
                "perihal" => $this->input->post('perihal'),
                "asal_surat" => $this->input->post('asal_surat'),
                "disposisi" => $this->input->post('disposisi'),
                "keterangan_dis" => $this->input->post('keterangan_dis'),
                "file" => $this->uploadSuratmasuk()
            ];
        } else {
            $data = [
                "jenis_surat" => $this->input->post('jenis_surat'),
                "tanggal_diterima" => $this->input->post('tanggal_diterima'),
                "tanggal_surat" => $this->input->post('tanggal_surat'),
                "no_surat" => $this->input->post('no_surat'),
                "perihal" => $this->input->post('perihal'),
                "asal_surat" => $this->input->post('asal_surat'),
                "disposisi" => $this->input->post('disposisi'),
                "keterangan_dis" => $this->input->post('keterangan_dis'),
                "file" => $this->input->post('old_file')
            ];
        }
        $this->Admin_model->updateSuratmasuk($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data telah diubah. </div>');
        redirect('admin/suratmasuk');
    }
    public function deleteSuratmasuk()
    {
        $id = $this->input->post('id');
        $this->Admin_model->deleteSuratmasuk($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data telah dihapus. </div>');
        redirect('admin/suratmasuk');
    }
    public function laporanmasuk()
    {
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['suratmasuk'] = $this->Admin_model->laporanSuratmasuk($awal, $akhir);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_admin_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('admin/laporanmasuk', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function suratkeluar()
    {
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['suratkeluar'] = $this->Admin_model->readSuratkeluar();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_admin_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('admin/suratkeluar', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function entrikeluar()
    {
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_admin_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('admin/entrikeluar', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function cetakSuratkeluar($id)
    {
        $data['cetaksuratkeluar'] = $this->Admin_model->cetakSuratkeluar($id);
        $this->load->view('admin/cetaksuratkeluar', $data);
    }
    public function exportCSVkeluar($awal, $akhir)
    {
        $filename =  date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        $usersData = $this->Admin_model->laporanSuratkeluar($awal, $akhir);

        $file = fopen('php://output', 'w');

        $header = array("ID", "Tanggal Surat", "Pengolah", "Nomor Surat", "Tujuan", "Perihal", "Jenis", "File");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }
    public function uploadSuratkeluar()
    {
        $config['upload_path'] = './arsip/suratkeluar';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            return "default.jpg";
        } else {
            $result = $this->upload->data();
            return $result['file_name'];
        }
    }
    public function createSuratkeluar()
    {
        $data = [
            "id" => 'NULL',
            "tanggal_surat" => $this->input->post('tanggal_surat'),
            "pengolah" => $this->input->post('pengolah'),
            "nomor_surat" => $this->input->post('nomor_surat'),
            "tujuan" => $this->input->post('tujuan'),
            "perihal" => $this->input->post('perihal'),
            "jenis" => $this->input->post('jenis'),
            "file" => $this->uploadSuratkeluar()
        ];
        $data['entrikeluar'] = $this->Admin_model->createSuratkeluar($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data telah ditambahkan. </div>');
        redirect('admin/suratkeluar');
    }
    public function updateSuratkeluar()
    {
        $id = $this->input->post('id');
        if (!empty($_FILES["file"]["name"])) {
            $data = [
                "tanggal_surat" => $this->input->post('tanggal_surat'),
                "pengolah" => $this->input->post('pengolah'),
                "nomor_surat" => $this->input->post('nomor_surat'),
                "tujuan" => $this->input->post('tujuan'),
                "perihal" => $this->input->post('perihal'),
                "jenis" => $this->input->post('jenis'),
                "file" => $this->uploadSuratkeluar()
            ];
        } else {
            $data = [
                "tanggal_surat" => $this->input->post('tanggal_surat'),
                "pengolah" => $this->input->post('pengolah'),
                "nomor_surat" => $this->input->post('nomor_surat'),
                "tujuan" => $this->input->post('tujuan'),
                "perihal" => $this->input->post('perihal'),
                "jenis" => $this->input->post('jenis'),
                "file" => $this->input->post('old_file')
            ];
        }
        $this->Admin_model->updateSuratkeluar($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data telah diubah. </div>');
        redirect('admin/suratkeluar');
    }
    public function deleteSuratkeluar()
    {
        $id = $this->input->post('id');
        $this->Admin_model->deleteSuratkeluar($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data telah dihapus. </div>');
        redirect('admin/suratkeluar');
    }
    public function laporankeluar()
    {
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['suratkeluar'] = $this->Admin_model->laporanSuratkeluar($awal, $akhir);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_admin_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('admin/laporankeluar', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function sertifikat()
    {
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['sertifikat'] = $this->Admin_model->readSertifikat();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_admin_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('admin/sertifikat', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function entrisertifikat()
    {
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['userrolename'] = $this->Admin_model->readUserRoleName();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_admin_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('admin/entrisertifikat', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function cetakSertifikat($id)
    {
        $data['cetaksertifikat'] = $this->Admin_model->cetakSertifikat($id);
        $this->load->view('admin/cetaksertifikat', $data);
    }
    public function exportCSVsertifikat($awal, $akhir)
    {
        if (!isset($awal) and !isset($akhir)) {
            print_r("test");
        }
        $filename =  date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        $usersData = $this->Admin_model->laporanSertifikat($awal, $akhir);

        $file = fopen('php://output', 'w');

        $header = array("Pemilik", "Tanggal Diterima", "Tanggal Kegiatan", "Nama Kegiatan", "Asal Sertifikat", "Sebagai", "Jumlah Jam", "File Sertifikat");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }
    public function uploadSertifikat()
    {
        $config['upload_path'] = './arsip/sertifikat';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            return "default.jpg";
        } else {
            $result = $this->upload->data();
            return $result['file_name'];
        }
    }
    public function createSertifikat()
    {
        $data = [
            "id" => 'NULL',
            "pemilik" => $this->input->post('pemilik'),
            "tanggal_diterima" => $this->input->post('tanggal_diterima'),
            "tanggal_kegiatan" => $this->input->post('tanggal_kegiatan'),
            "nama_kegiatan" => $this->input->post('nama_kegiatan'),
            "asal_sertifikat" => $this->input->post('asal_sertifikat'),
            "sebagai" => $this->input->post('sebagai'),
            "jumlah_jam" => $this->input->post('jumlah_jam'),
            "file" => $this->uploadSertifikat()
        ];
        $data['entrisertifikat'] = $this->Admin_model->createSertifikat($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data telah ditambahkan. </div>');
        redirect('admin/sertifikat');
    }
    public function updateSertifikat()
    {
        $id = $this->input->post('id');
        if (!empty($_FILES["file"]["name"])) {
            $data = [
                "pemilik" => $this->input->post('pemilik'),
                "tanggal_diterima" => $this->input->post('tanggal_diterima'),
                "tanggal_kegiatan" => $this->input->post('tanggal_kegiatan'),
                "nama_kegiatan" => $this->input->post('nama_kegiatan'),
                "asal_sertifikat" => $this->input->post('asal_sertifikat'),
                "sebagai" => $this->input->post('sebagai'),
                "jumlah_jam" => $this->input->post('jumlah_jam'),
                "file" => $this->uploadSertifikat()
            ];
        } else {
            $data = [
                "pemilik" => $this->input->post('pemilik'),
                "tanggal_diterima" => $this->input->post('tanggal_diterima'),
                "tanggal_kegiatan" => $this->input->post('tanggal_kegiatan'),
                "nama_kegiatan" => $this->input->post('nama_kegiatan'),
                "asal_sertifikat" => $this->input->post('asal_sertifikat'),
                "sebagai" => $this->input->post('sebagai'),
                "jumlah_jam" => $this->input->post('jumlah_jam'),
                "file" => $this->input->post('old_file')
            ];
        }
        $this->Admin_model->updateSertifikat($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data telah diubah. </div>');
        redirect('admin/sertifikat');
    }
    public function deleteSertifikat()
    {
        $id = $this->input->post('id');
        $this->Admin_model->deleteSertifikat($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data telah dihapus. </div>');
        redirect('admin/sertifikat');
    }
    public function laporanSertifikat()
    {
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sertifikat'] = $this->Admin_model->laporanSertifikat($awal, $akhir);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_admin_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('admin/laporansertifikat', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function peminjaman()
    {
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['peminjaman'] = $this->Admin_model->readPeminjaman();
        $data['userrolename'] = $this->Admin_model->readUserRoleName();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_admin_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('admin/peminjaman', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function entripeminjaman()
    {
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['userrolename'] = $this->Admin_model->readUserRoleName();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_admin_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('admin/entripeminjaman', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function cetakPeminjaman($id)
    {
        $data['cetakpeminjaman'] = $this->Admin_model->cetakPeminjaman($id);
        $this->load->view('admin/cetakpeminjaman', $data);
    }
    public function exportCSVpeminjaman($awal, $akhir)
    {
        if (!isset($awal) and !isset($akhir)) {
            print_r("test");
        }
        $filename =  date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        $usersData = $this->Admin_model->laporanPeminjaman($awal, $akhir);

        $file = fopen('php://output', 'w');
        $header = array("ID", "Nama", "Nomor Identitas", "Fakultas", "Prodi", "Nomor WhatsApp", "Tanggal Kegiatan", "Waktu Mulai", "Waktu Selesai", "Keperluan", "Jumlah Peserta", "Status");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }
    public function createPeminjaman()
    {
        $data = [
            "id" => 'NULL',
            "nama" => $this->input->post('nama'),
            "no_identitas" => $this->input->post('no_identitas'),
            "fakultas" => $this->input->post('fakultas'),
            "prodi" => $this->input->post('prodi'),
            "nomor_wa" => $this->input->post('nomor_wa'),
            "tanggal_kegiatan" => $this->input->post('tanggal_kegiatan'),
            "jam_mulai" => $this->input->post('jam_mulai'),
            "jam_selesai" => $this->input->post('jam_selesai'),
            "keperluan" => $this->input->post('keperluan'),
            "jumlah_peserta" => $this->input->post('jumlah_peserta'),
            "status" => 'Menunggu'
        ];
        $data['entripeminjaman'] = $this->Admin_model->createPeminjaman($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data telah ditambahkan. </div>');
        redirect('admin/peminjaman');
    }
    public function terimaPeminjaman()
    {
        $id = $this->input->post('id');
        $data = [
            "status" => 'Diterima'
        ];
        $this->Admin_model->terimaPeminjaman($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Peminjaman diterima. </div>');
        redirect('admin/peminjaman');
    }
    public function tolakPeminjaman()
    {
        $id = $this->input->post('id');
        $data = [
            "status" => 'Ditolak'
        ];
        $this->Admin_model->tolakPeminjaman($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Pemimnjaman ditolak. </div>');
        redirect('admin/peminjaman');
    }
    public function deletePeminjaman()
    {
        $id = $this->input->post('id');
        $this->Admin_model->deletePeminjaman($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data telah dihapus. </div>');
        redirect('admin/peminjaman');
    }
    public function laporanPeminjaman()
    {
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['peminjaman'] = $this->Admin_model->laporanPeminjaman($awal, $akhir);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_admin_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('admin/laporanpeminjaman', $data);
        $this->load->view('templates/dashboard_footer');
    }
}
