<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissble fade show" role="alert">Silahkan Login! <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Auth');
        }
    }

    public function index()
    {
        $data['title'] = 'dashboard';
		$data['active_link'] = $this->uri->segment(2);
        $data['user'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $data['item'] = $this->model_kehadiran->getKehadiranGuru();
        $data['itemGuru'] = $this->model_guru->countGuru();
        $data['itemKehadiran'] = $this->model_kehadiran->countKehadiran();
		$data['itemLaporan'] = $this->model_pelaporan->countLaporan();

        $this->load->view('templates/header', $data);
        $this->load->view('kepsek/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('kepsek/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
