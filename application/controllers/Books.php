<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Books extends CI_Controller
{
    public function index()
    {   
        $data['title_page'] = 'Books';
        $data['books'] = $this->Book_model->getBooks();

        $this->load->view('templates/header', $data);
        $this->load->view('books/books', $data);
        $this->load->view('templates/footer');
    }

    public function details($id)
    {
        $data['title_page'] = 'Detail Book';
        $data['book'] = $this->Book_model->getBookById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('books/detail', $data);
        $this->load->view('templates/footer');
    }
}
