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

}
