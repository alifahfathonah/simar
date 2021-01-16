<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawai_model');
        $this->load->library('Pdf');
        $this->load->library('form_validation');
        is_logged_in();
        $role_id = $this->session->userdata('role_id');
        if ($role_id != 2) {
            redirect('auth/blocked');
        }
    }
    public function index()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $pemilik = $user['id'];
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['isiSertifpegawai'] = $this->Pegawai_model->isiSertifikat($pemilik);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_pegawai_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function sertifikat()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $user['id'];
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['sertifikat'] = $this->Pegawai_model->readSertifikat($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_pegawai_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('pegawai/sertifikat', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function entrisertifikat()
    {
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_pegawai_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('pegawai/entrisertifikat', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function cetakSertifikat($id)
    {
        $data['cetaksertifikat'] = $this->Pegawai_model->cetakSertifikat($id);
        $this->load->view('pegawai/cetaksertifikat', $data);
    }
    public function exportCSVsertifikat($awal, $akhir, $id)
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $user['id'];
        $filename =  date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        $usersData = $this->Pegawai_model->laporanSertifikat($awal, $akhir, $id);

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
        $data['entrisertifikat'] = $this->Pegawai_model->createSertifikat($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data telah ditambahkan. </div>');
        redirect('pegawai/sertifikat');
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
        $this->Pegawai_model->updateSertifikat($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data telah diubah. </div>');
        redirect('pegawai/sertifikat');
    }
    public function deleteSertifikat()
    {
        $id = $this->input->post('id');
        $this->Pegawai_model->deleteSertifikat($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data telah dihapus. </div>');
        redirect('pegawai/sertifikat');
    }
    public function laporanSertifikat()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $user['id'];
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sertifikat'] = $this->Pegawai_model->laporanSertifikat($awal, $akhir, $id);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_pegawai_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('pegawai/laporansertifikat', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function peminjaman()
    {
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['peminjaman'] = $this->Pegawai_model->readPeminjaman();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_pegawai_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('pegawai/peminjaman', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function entripeminjaman()
    {
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_pegawai_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('pegawai/entripeminjaman', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function cetakPeminjaman($id)
    {
        $data['cetakpeminjaman'] = $this->Pegawai_model->cetakPeminjaman($id);
        $this->load->view('pegawai/cetakpeminjaman', $data);
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

        $usersData = $this->Pegawai_model->laporanPeminjaman($awal, $akhir);

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
        $data['entripeminjaman'] = $this->Pegawai_model->createPeminjaman($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data telah ditambahkan. </div>');
        redirect('pegawai/peminjaman');
    }
    public function terimaPeminjaman()
    {
        $id = $this->input->post('id');
        $data = [
            "status" => 'Diterima'
        ];
        $this->Pegawai_model->terimaPeminjaman($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Peminjaman diterima. </div>');
        redirect('pegawai/peminjaman');
    }
    public function tolakPeminjaman()
    {
        $id = $this->input->post('id');
        $data = [
            "status" => 'Ditolak'
        ];
        $this->Pegawai_model->tolakPeminjaman($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Pemimnjaman ditolak. </div>');
        redirect('pegawai/peminjaman');
    }
    public function deletePeminjaman()
    {
        $id = $this->input->post('id');
        $this->Pegawai_model->deletePeminjaman($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data telah dihapus. </div>');
        redirect('pegawai/peminjaman');
    }
    public function laporanPeminjaman()
    {
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['peminjaman'] = $this->Pegawai_model->laporanPeminjaman($awal, $akhir);
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_pegawai_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('pegawai/laporanpeminjaman', $data);
        $this->load->view('templates/dashboard_footer');
    }
}
