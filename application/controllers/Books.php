<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Books extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Book_model');
    }

    public function index()
    {
        // Ambil parameter field dan keyword dari URL (GET request)
        $field = $this->input->get('field'); // Field pencarian: 'title', 'author', atau 'isbn'
        $keyword = $this->input->get('keyword'); // Keyword pencarian

        // Jika ada field dan keyword, lakukan pencarian
        if ($field && $keyword) {
            $data['books'] = $this->Book_model->searchBooks($field, $keyword);
            $data['is_search'] = true; // Tandai bahwa ini adalah hasil pencarian
            $data['search_keyword'] = $keyword; // Simpan kata kunci pencarian untuk ditampilkan
        } else {
            // Jika tidak ada parameter pencarian, tampilkan semua buku
            $data['books'] = $this->Book_model->getBooks();
            $data['is_search'] = false; // Tandai bahwa ini bukan hasil pencarian
        }

        $data['title_page'] = 'Books';

        // Load view utama index.php
        $this->load->view('templates/header', $data);
        $this->load->view('books/index', $data);
        $this->load->view('templates/footer');
    }

    public function details($id)
    {
        $data['title_page'] = 'Detail Book';
        $data['book'] = $this->Book_model->getBookById($id);

        // var_dump($data['book']);

        $this->load->view('templates/header', $data);
        $this->load->view('books/detail', $data);
        $this->load->view('templates/footer');
    }

    // Metode pencarian
    public function search()
    {
        $field = $this->input->get('field'); // Misalnya: 'title', 'author', atau 'isbn'
        $keyword = $this->input->get('keyword'); // Kata kunci pencarian

        $data['title_page'] = 'Search Results';
        $data['books'] = $this->Book_model->searchBooks($field, $keyword);

        $this->load->view('templates/header', $data);
        $this->load->view('books/search_results', $data);
        $this->load->view('templates/footer');
    }
}
