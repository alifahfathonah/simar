<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
        $role_id = $this->session->userdata('role_id');
        if ($role_id != 3) {
            redirect('auth/blocked');
        }
    }


    public function index()
    {
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/dashboard_header', $data);
        //$this->load->view('templates/dashboard_sidebar', $data);
        $this->load->view('templates/user_header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/dashboard_footer');
    }
    public function entripeminjaman()
    {
        $data['tittle'] = 'SIMAR Perpustakaan Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/user_header', $data);
        $this->load->view('user/entripeminjaman', $data);
        $this->load->view('templates/dashboard_footer');
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
        $data['entripeminjaman'] = $this->User_model->createPeminjaman($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Peminjaman Telah Dikirim Mohon Menunggu Verivikasi Dari Admin. </div>');
        redirect('user/index');
    }
}
