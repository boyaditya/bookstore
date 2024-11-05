<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Books extends CI_Controller
{
    public function index()
    {   
        $data['title_page'] = 'Books';
        $this->load->view('templates/header', $data);
        $this->load->view('books/index');
        $this->load->view('templates/footer');
    }
}
