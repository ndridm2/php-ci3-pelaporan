<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelaporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissble fade show" 
			role="alert">Silahkan Login! <button type="button" class="close" data-dismiss="alert" 
			aria-label="close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Auth');
        }
    }

    public function index()
    {
        $data['title']  = 'Pelaporan';
		$data['active_link'] = $this->uri->segment(2);
        $data['user']   = $this->db->get_where('guru', ['username' => $this->session->userdata('username')])->row_array();

        $data['item']   = $this->model_pelaporan->tampil_data();
		$data['relasi'] = $this->db->get_where('guru', ['role' => 3])->result();

        $this->load->view('templates/header', $data);
        $this->load->view('kepsek/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('kepsek/pelaporan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $pelaporan_id         		= $this->input->post('pelaporan_id');
        $guru_id      				= $this->input->post('guru_id');
        $periode_laporan         	= $this->input->post('periode_laporan');
        $penilaian      			= $this->input->post('penilaian');
        $deskripsi          		= $this->input->post('deskripsi');

        $data = array(
            'pelaporan_id'    		=> $pelaporan_id,
            'guru_id'   			=> $guru_id,
            'periode_laporan'      	=> $periode_laporan,
            'penilaian'   			=> $penilaian,
            'deskripsi'       		=> $deskripsi,
        );
        $this->model_pelaporan->tambah_data($data, 'pelaporan');
        redirect('kepsek/pelaporan/index');
    }

    public function update()
    {
        $pelaporan_id         		= $this->input->post('pelaporan_id');
        $guru_id      				= $this->input->post('guru_id');
        $periode_laporan         	= $this->input->post('periode_laporan');
        $penilaian      			= $this->input->post('penilaian');
        $deskripsi          		= $this->input->post('deskripsi');

        $data = array(
			'pelaporan_id'    		=> $pelaporan_id,
            'guru_id'   			=> $guru_id,
            'periode_laporan'      	=> $periode_laporan,
            'penilaian'   			=> $penilaian,
            'deskripsi'       		=> $deskripsi,
        );

        $where = array(
			'pelaporan_id '   => $pelaporan_id 
		);
        $this->model_pelaporan->update_data($where, $data, 'pelaporan');
        redirect('kepsek/pelaporan/index');
    }

    public function hapus($pelaporan_id)
    {
        $where = array('pelaporan_id' => $pelaporan_id);
        $this->model_pelaporan->hapus_data($where, 'pelaporan');
        redirect('kepsek/pelaporan/index');
    }

	public function print()
    {
        $data['item']  = $this->model_pelaporan->tampil_data();

        $this->load->view('kepsek/laporanPrint', $data);
    }

}
