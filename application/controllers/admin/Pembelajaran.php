<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelajaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissble fade show" role="alert">Silahkan Login! <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Pembelajaran';
		$data['active_link'] = $this->uri->segment(2);
        $data['user'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $data['item'] = $this->model_pembelajaran->tampil_all_data();
		$data['relasi'] = $this->db->get_where('guru', 'role = 3')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pembelajaran', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $pembelajaran_id    = $this->input->post('pembelajaran_id');
        $mapel              = $this->input->post('mapel');
        $jam_pelajaran      = $this->input->post('jam_pelajaran');
        $deskripsi          = $this->input->post('deskripsi');
        $guru_id          	= $this->input->post('guru_id');
       
        $data = array(
            'pembelajaran_id'   => $pembelajaran_id,
            'mapel'         	=> $mapel,
            'jam_pelajaran'     => $jam_pelajaran,
            'deskripsi'         => $deskripsi,
            'guru_id'         	=> $guru_id,
           
        );
        $this->model_pembelajaran->tambah_data($data, 'pembelajaran');
        redirect('admin/pembelajaran/index');
    }

    public function update()
    {
        $pembelajaran_id    = $this->input->post('pembelajaran_id');
        $mapel              = $this->input->post('mapel');
        $jam_pelajaran      = $this->input->post('jam_pelajaran');
        $deskripsi          = $this->input->post('deskripsi');
		$guru_id          	= $this->input->post('guru_id');
		$id_pembelajaran    = $this->input->post('id_pembelajaran');
        

        $data = array(
            'pembelajaran_id'   => $pembelajaran_id,
            'mapel'         	=> $mapel,
            'jam_pelajaran'     => $jam_pelajaran,
            'deskripsi'         => $deskripsi,
			'guru_id'         	=> $guru_id,
           
        );

        $where = array('id_pembelajaran'   => $id_pembelajaran);
        $this->model_pembelajaran->update_data($where, $data, 'pembelajaran');
        redirect('admin/pembelajaran/index');
    }

    public function hapus($id_pembelajaran)
    {
        $where = array('id_pembelajaran' => $id_pembelajaran);
        $this->model_pembelajaran->hapus_data($where, 'pembelajaran');
        redirect('admin/pembelajaran/index');
    }

	public function print()
    {
		$data['item'] = $this->model_pembelajaran->tampil_all_data();

        $this->load->view('admin/pembelajaranPrint', $data);
    }
}
