<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kehadiran extends CI_Controller
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
        $data['title'] = 'Data kehadiran';
		$data['active_link'] = $this->uri->segment(2);
        $data['user'] = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

		$data['item'] = $this->model_kehadiran->tampil_data();
		$data['relasi'] = $this->db->get('guru')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kehadiran', $data);
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
        redirect('admin/kehadiran/index');
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
        redirect('admin/kehadiran/index');
    }

    public function hapus($kehadiran_id)
    {
        $where = array('kehadiran_id' => $kehadiran_id);
        $this->model_kehadiran->hapus_data($where, 'kehadiran');
        redirect('admin/kehadiran/index');
    }

	public function print()
    {
        $data['item'] = $this->model_kehadiran->tampil_data();

        $this->load->view('admin/kehadiranPrint', $data);
    }
}
