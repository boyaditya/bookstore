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
        // Ambil parameter sorting dan pencarian dari URL
        $field = $this->input->get('field'); // Field pencarian: 'title', 'author', atau 'isbn'
        $keyword = $this->input->get('keyword'); // Keyword pencarian
        $sort_by = $this->input->get('sort_by'); // Parameter sorting: 'title_asc', 'title_desc', 'price_asc', 'price_desc'

        // Jika ada field dan keyword, lakukan pencarian
        if ($field && $keyword) {
            $data['books'] = $this->Book_model->searchBooks($field, $keyword, $sort_by);
            $data['is_search'] = true; // Tandai bahwa ini adalah hasil pencarian
            $data['search_keyword'] = $keyword; // Simpan kata kunci pencarian untuk ditampilkan
        } else {
            // Jika tidak ada parameter pencarian, tampilkan semua buku dengan atau tanpa sorting
            $data['books'] = $this->Book_model->getBooks($sort_by);
            $data['is_search'] = false; // Tandai bahwa ini bukan hasil pencarian
        }

        $data['title_page'] = 'Books';
        $data['sort_by'] = $sort_by; // Untuk mengingat pilihan sorting di dropdown

        // Load view utama index.php
        $this->load->view('templates/header', $data);
        $this->load->view('books/books', $data);
        $this->load->view('templates/footer');
    }

    public function details($id)
    {
        $data['title_page'] = 'Detail Book';
        $data['book'] = $this->Book_model->getBookById($id);
        $data['booklist'] = $this->Book_model->getBooks();
        $this->load->view('templates/header', $data);
        $this->load->view('books/detail', $data);
        $this->load->view('templates/footer');
    }

    // Form Create
    public function create()
    {
        $data['title_page'] = 'Add New Book';
        $this->load->view('templates/header', $data);
        $this->load->view('books/create', $data);
        $this->load->view('templates/footer');
    }

    // Fungsi Simpan Data Baru
    public function store()
    {
        $data = [
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'description' => $this->input->post('description'),
            'price' => (int)$this->input->post('price'),
            'stock' => (int)$this->input->post('stock'),
            'category' => $this->input->post('category'),
            'publisher' => $this->input->post('publisher'),
            'published_date' => date('Y-m-d'),
            'ISBN' => $this->input->post('ISBN'),
            'pages' => (int)$this->input->post('pages'),
            'language' => $this->input->post('language'),
            'cover_image' => $this->input->post('cover_image')
        ];

        $this->Book_model->createBook($data);
        redirect('books');
    }

    // Fungsi Edit buku
    public function edit($id)
    {
        $data['title_page'] = 'Edit Book';
        $data['book'] = $this->Book_model->getBookById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('books/edit', $data);
        $this->load->view('templates/footer');
    }

    // Fungsi Update Buku
    public function update($id)
    {
        $this->load->model('Book_model');
        $data = [
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'description' => $this->input->post('description'),
            'price' => (float)$this->input->post('price'),
            'stock' => (int)$this->input->post('stock'),
            'category' => $this->input->post('category'),
            'publisher' => $this->input->post('publisher'),
            'published_date' => date('Y-m-d'),
            'ISBN' => $this->input->post('ISBN'),
            'pages' => (int)$this->input->post('pages'),
            'language' => $this->input->post('language')
        ];

        // Update the book in the database
        $this->Book_model->updateBook($id, $data);

        redirect('books');
    }

    // Fungsi Hapus Buku
    public function delete($id)
    {
        $this->Book_model->deleteBook($id);
        redirect('books');
    }

    // Metode pencarian
    public function search()
    {
        // Ambil parameter field dan keyword dari URL (GET request)
        $field = $this->input->get('field'); // Field pencarian: 'title', 'author', atau 'isbn'
        $keyword = $this->input->get('keyword'); // Keyword pencarian

        // Jika ada parameter pencarian
        if ($field && $keyword) {
            $data['books'] = $this->Book_model->searchBooks($field, $keyword);
            $data['is_search'] = true; // Tandai bahwa ini adalah hasil pencarian
            $data['search_keyword'] = $keyword; // Simpan kata kunci pencarian untuk ditampilkan
        } else {
            $data['books'] = [];
            $data['is_search'] = true;
            $data['search_keyword'] = '';
        }

        $data['title_page'] = 'Books';

        // Load view books/index hanya dengan hasil pencarian
        $this->load->view('templates/header', $data);
        $this->load->view('books/books', $data);
        $this->load->view('templates/footer');
    }
}
