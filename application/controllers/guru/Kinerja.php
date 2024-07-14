<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kinerja extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('role') != '3') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissble fade show" 
			role="alert">Silahkan Login! <button type="button" class="close" data-dismiss="alert" aria-label="close"><span 
			aria-hidden="true">&times;</span></button></div>');
			redirect('Auth');
		}
	}

	public function index()
	{
		$data['title']  = 'Pelaporan';
		$data['active_link'] = $this->uri->segment(2);
		$data['user']   = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

		// $data['item'] = $this->db->get_where('pelaporan
		// JOIN guru ON pelaporan.guru_id = guru.id', ['pelaporan.guru_id' => $data['user']['id']])->row_array();

		$data['item'] = $this->db->get_where(
			'pelaporan',
			['guru_id' => $data['user']['id']]
		)->row_array();

		if ($data['item']) {
			$data['item']['descripsion'];
		} else {
			$data['item'] = [
				'descripsion' => 'Belum Ada Deskripsi',
			];
		}

		$this->load->view('templates/header', $data);
		$this->load->view('guru/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('guru/kinerja', $data);
		$this->load->view('templates/footer');
	}
}
