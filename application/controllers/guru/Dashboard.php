<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') != '3') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissble fade show" role="alert">Silahkan Login! <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Auth');
        }
    }

    public function index()
    {

        $data['title']      = 'Dashboard';
		$data['active_link'] = $this->uri->segment(2);
        $data['user']       = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $data['item']       = $this->model_pembelajaran->tampil_data()->result_array();
		$data['relasi'] 	= $this->db->get_where('guru', 'role = 3')->result();

		$data['item'] = $this->db->query("SELECT * FROM pembelajaran
		WHERE guru_id = '" . $data['user']['id'] . "' ORDER BY mapel DESC")->
		result_array();

		$data['itemKehadiran'] = $this->model_kehadiran->countKehadiran();
		$data['itemLaporan'] = $this->model_pelaporan->countLaporan();
        
        $this->load->view('templates/header', $data);
        $this->load->view('guru/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
