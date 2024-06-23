<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kehadiran extends CI_Controller
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
		$data['title'] = 'Data kehadiran';
		$data['active_link'] = $this->uri->segment(2);
		$data['user'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

		$data['item'] = $this->model_kehadiran->tampil_data();
		$data['relasi'] = $this->db->get('guru')->result();
		
		$date = date('Y-m-d');

		// query menampilkan data kehadiran dari guru_id => $data['user]['id] order tanggal
		$data['kehadiran'] = $this->db->query("SELECT * FROM kehadiran
		WHERE guru_id = '" . $data['user']['id'] . "' ORDER BY tanggal DESC")->
		row_array();
		if ($data['kehadiran']) {
			$data['kehadiran']['tanggal'];
			$data['kehadiran']['status'];
		} else {
			$data['kehadiran'] = [
				'tanggal'	=> $date,
				'status'	=> 'Segera Masukkan Kehadiran Anda!',
				// ... other default values
			];
		}

		$this->load->view('templates/header', $data);
		$this->load->view('guru/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('guru/kehadiran', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$kehadiran_id		= $this->input->post('kehadiran_id');
		$guru_id			= $this->input->post('guru_id');
		$tanggal       		= $this->input->post('tanggal');
		$status       		= $this->input->post('status');

		$data = array(
			'kehadiran_id'      => $kehadiran_id,
			'guru_id'        	=> $guru_id,
			'tanggal'        	=> $tanggal,
			'status'        	=> $status,

		);
		$this->model_kehadiran->tambah_data($data, 'kehadiran');
		redirect('guru/kehadiran/index');
	}

	public function update()
	{
		$kehadiran_id		= $this->input->post('kehadiran_id');
		$guru_id			= $this->input->post('guru_id');
		$tanggal       		= $this->input->post('tanggal');
		$status       		= $this->input->post('status');

		$data = array(
			'kehadiran_id'      => $kehadiran_id,
			'guru_id'        	=> $guru_id,
			'tanggal'        	=> $tanggal,
			'status'        	=> $status,
		);

		$where = array(
			'kehadiran_id'      => $kehadiran_id
		);
		$this->model_kehadiran->update_data($where, $data, 'kehadiran');
		redirect('guru/kehadiran/index');
	}
}
