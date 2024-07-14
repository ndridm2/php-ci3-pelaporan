<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('role') != '3') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissble fade show" 
			role="alert">Silahkan Login! <button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Auth');
		}
	}

	public function index()
	{
		$data['title'] = 'Data Guru';
		$data['active_link'] = $this->uri->segment(2);
		$data['user'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();
		
		$data['item'] = $this->model_guru->tampil_dataguru();

		$this->load->view('templates/header', $data);
		$this->load->view('guru/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('guru/guru', $data);
		$this->load->view('templates/footer');
	}

	// public function tambah()
	// {
	// 	$id					= $this->input->post('id');
	// 	$nip       			= $this->input->post('nip');
	// 	$username       	= $this->input->post('username');
	// 	// $email       		= $this->input->post('email');
	// 	$alamat       		= $this->input->post('alamat');
	// 	$hp       			= $this->input->post('hp');
	// 	$tanggal_lahir      = $this->input->post('tanggal_lahir');
	// 	$pendidikan       	= $this->input->post('pendidikan');
	// 	$password       	= $this->input->post('password');
	// 	$role       		= $this->input->post('role');


	// 	$data = array(
	// 		'id'        		=> $id,
	// 		'nip'        		=> $nip,
	// 		'username'        	=> $username,
	// 		// 'email'        		=> $email,
	// 		'alamat'        	=> $alamat,
	// 		'hp'        	=> $hp,
	// 		'tanggal_lahir'     => $tanggal_lahir,
	// 		'pendidikan'        => $pendidikan,
	// 		'password'        	=> $password,
	// 		'role'        		=> $role,

	// 	);
	// 	$this->model_guru->tambah_data($data, 'data_guru');
	// 	redirect('guru/guru/index');
	// }

	public function update()
	{
		$id					= $this->input->post('id');
		$nip				= $this->input->post('nip');
		$username       	= $this->input->post('username');
		// $email       		= $this->input->post('email');
		$mapel       		= $this->input->post('mapel');
		$tanggal_lahir      = $this->input->post('tanggal_lahir');
		$jenis_kelamin      = $this->input->post('jenis_kelamin');
		$pendidikan       	= $this->input->post('pendidikan');
		$password       	= $this->input->post('password');
		$role       		= $this->input->post('role');

		$data = array(
			'id'        		=> $id,
			'nip'        		=> $nip,
			'username'        	=> $username,
			// 'email'        		=> $email,
			'mapel'        		=> $mapel,
			'tanggal_lahir'     => $tanggal_lahir,
			'jenis_kelamin'     => $jenis_kelamin,
			'pendidikan'        => $pendidikan,
			'password'        	=> $password,
			'role'        		=> $role,
		);

		$where = array(
			'id'   => $id
		);
		$this->model_guru->update_data($where, $data, 'guru');
		redirect('guru/guru/index');
	}
}
