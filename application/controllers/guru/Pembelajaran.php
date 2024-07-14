<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelajaran extends CI_Controller
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
	 	$this->db->get_where('guru', ['id' => $this->session->userdata('id')])->row_array();
		
		$data['item'] = $this->model_pembelajaran->tampil_data()->result_array();

		$data['relasi'] = $this->db->get_where('guru', 'role = 3')->result();

		$data['item'] = $this->db->query("SELECT * FROM pembelajaran
		WHERE guru_id = '" . $data['user']['id'] . "' ORDER BY mapel DESC")->
		result_array();


		$this->load->view('templates/header', $data);
		$this->load->view('guru/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('guru/pembelajaran', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
    {
        $pembelajaran_id    = $this->input->post('pembelajaran_id');
        $mapel              = $this->input->post('mapel');
        $jam_pelajaran      = $this->input->post('jam_pelajaran');
        $hari          		= $this->input->post('hari');
        $deskripsi          = $this->input->post('deskripsi');
        $guru_id          	= $this->input->post('guru_id');
       
        $data = array(
            'pembelajaran_id'   => $pembelajaran_id,
            'mapel'         	=> $mapel,
            'jam_pelajaran'     => $jam_pelajaran,
            'hari'         		=> $hari,
            'deskripsi'         => $deskripsi,
            'guru_id'         	=> $guru_id,
           
        );
        $this->model_pembelajaran->tambah_data($data, 'pembelajaran');
        redirect('guru/pembelajaran/index');
    }

    public function update()
    {
		$id_pembelajaran   	= $this->input->post('id_pembelajaran');
        $pembelajaran_id    = $this->input->post('pembelajaran_id');
        $mapel              = $this->input->post('mapel');
        $jam_pelajaran      = $this->input->post('jam_pelajaran');
		$hari          		= $this->input->post('hari');
        $deskripsi          = $this->input->post('deskripsi');
		$guru_id          	= $this->input->post('guru_id');
        

        $data = array(
            'pembelajaran_id'   => $pembelajaran_id,
            'mapel'         	=> $mapel,
            'jam_pelajaran'     => $jam_pelajaran,
			'hari'         		=> $hari,
            'deskripsi'         => $deskripsi,
			'guru_id'         	=> $guru_id,
        );

        $where = array('id_pembelajaran'   => $id_pembelajaran);
        $this->model_pembelajaran->update_data($where, $data, 'pembelajaran');
        redirect('guru/pembelajaran/index');
    }

    public function hapus($id_pembelajaran)
    {
        $where = array('id_pembelajaran' => $id_pembelajaran);
        $this->model_pembelajaran->hapus_data($where, 'pembelajaran');
        redirect('guru/pembelajaran/index');
    }
}
