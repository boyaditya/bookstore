<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['title_page'] = 'Home';
        $data['books'] = $this->Book_model->getBooksHome();
        $data['user'] = $this->User_model->getUserBySession();
        // var_dump($data['user']);

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');

    }
}
