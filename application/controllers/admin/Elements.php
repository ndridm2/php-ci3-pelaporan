<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Elements extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('role') != '1') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissble fade show" 
			role="alert">Silahkan Login! <button type="button" class="close" data-dismiss="alert" 
			aria-label="close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Auth');
		}
	}

	public function index()
	{
		$data['title'] = 'Data Guru';
		$data['active_link'] = $this->uri->segment(2);
		$data['user'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

		$data['item'] = $this->model_guru->tampil_data()->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/elements', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$id					= $this->input->post('id');
		$nip				= $this->input->post('nip');
		$username       	= $this->input->post('username');
		// $alamat       		= $this->input->post('alamat');
		// $hp       			= $this->input->post('hp');
		// $tanggal_lahir      = $this->input->post('tanggal_lahir');
		// $pendidikan       	= $this->input->post('pendidikan');
		$password       	= $this->input->post('password');
		$role       		= $this->input->post('role');


		$data = array(
			'id'        		=> $id,
			'username'        	=> $username,
			'password'        	=> $password,
			'role'        		=> $role,

		);
		$this->model_guru->tambah_data($data, 'guru');
		redirect('admin/elements/index');
	}

	public function update()
	{
		$id					= $this->input->post('id');
		$username       	= $this->input->post('username');
		$password       	= $this->input->post('password');
		$role       		= $this->input->post('role');

		$data = array(
			'id'        		=> $id,
			'username'        	=> $username,
			'password'        	=> $password,
			'role'        		=> $role,
		);

		$where = array(
			'id'   => $id
		);
		$this->model_guru->update_data($where, $data, 'guru');
		redirect('admin/elements/index');
	}

	public function hapus($id)
	{
		$where = array('id' => $id);
		$this->model_guru->hapus_data($where, 'guru');
		redirect('admin/elements/index');
	}
}
