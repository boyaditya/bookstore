<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form
            $data = [
                'email'    => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
            ];

            // Simpan ke database
            if ($this->User_model->register($data)) {
                redirect('auth/login'); // Arahkan ke halaman login jika sukses
            } else {
                $this->session->set_flashdata('error', 'Email sudah terdaftar!');
                redirect('auth/register');
            }
        }

        $this->load->view('auth/register');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Cek kredensial login
            $user = $this->User_model->login($email, $password);

            if ($user) {
                $this->session->set_userdata('user', $user);
                redirect('dashboard'); // Redirect ke halaman dashboard jika berhasil login
            } else {
                $this->session->set_flashdata('error', 'Login gagal! Cek email dan password Anda.');
                redirect('auth/login');
            }
        }

        $this->load->view('auth/login');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
