<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['title_page'] = 'Home';
        $data['books'] = $this->Book_model->getBooks();
        var_dump($data);

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');

    }

    public function books()
    {   
        "test";
        // $data['book'] = $this->Book_model->getBookById($id);
        // var_dump($data);

        // $this->load->view('templates/header');
        // $this->load->view('home/books');
        // $this->load->view('templates/footer');
    }
}
