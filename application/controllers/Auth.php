<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Login';
            $this->load->view('login', $data);
        } else {
            $this->_login();
        }
    }

    public function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('guru', ['username' => $username, 'password'=> ($password)])->row_array();

        if ($user) {
            if ($password['password']) {
                $data = [
                    'username'  => $user['username'],
					'role'  	=> $user['role'],
                ];
                $this->session->set_userdata($data);
                if ($user['role'] == 1) {redirect('admin/Dashboard');
                } elseif ($user['role'] == 2) {redirect('kepsek/Dashboard');
                } elseif ($user['role'] == 3) {redirect('guru/Dashboard');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password salah</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Username atau Password salah</div>');
            redirect('Auth');
        }
    }

    public function regis()
    {

        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Registration';
            $this->load->view('login', $data);
        } else {
            $data = [
                'username'  => htmlspecialchars($this->input->post('nip', true)),
                'username'  => htmlspecialchars($this->input->post('username', true)),
                'password'  => $this->input->post('password'),
                'role'      => 3
            ];

            $this->model_user->tambah_data($data, 'guru');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Membuat Akun! Silahkan Login</div>');
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Anda Keluar</div>');
        redirect('Auth');
    }

	public function afterRegis()
	{
		$data['title'] = 'Registration Process';
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
		Menunggu persetujuan</div>');
		redirect('Auth');
	}
}
