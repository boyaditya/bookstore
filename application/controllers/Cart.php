<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Book_model');
        $this->load->model('Cart_model');
    }

    public function index($id = null)
    {
        $data['title_page'] = 'Cart';
        $data['cart'] = $this->Cart_model->getCartsByUserId("672969deee284ad03e964034");

        // Ambil item dari keranjang
        $cartItems = $this->Cart_model->getCartItems($data['cart'][0]['_id']->{'$id'});

        // Tambahkan informasi gambar pada setiap item di keranjang
        foreach ($cartItems as &$item) {
            // Dapatkan data buku dari database menggunakan Book_model
            $bookData = $this->Book_model->getBookById($item['book_id']);
            $item['book']['cover_image'] = $bookData['cover_image']; // Menambahkan cover_image ke dalam setiap item
        }
        
        $data['cart_items'] = $cartItems;

        $this->load->view('templates/header', $data);
        $this->load->view('cart/cart', $data);
        $this->load->view('templates/footer');
    }


    public function add()
    {
        $user_id = "672969deee284ad03e964034";
        $book_id = $this->input->post('book_id');
        $quantity = $this->input->post('quantity');

        $this->Cart_model->addToCart($user_id, $book_id, $quantity);
        redirect('cart');
    }

    public function delete()
    {
        $user_id = "672969deee284ad03e964034";
        $book_id = $this->input->post('book_id');

        // var_dump($book_id);
        // die();

        $this->Cart_model->removeFromCart($user_id, $book_id);
        redirect('cart');
    }


    public function update_quantity()
    {
        $user_id = "672969deee284ad03e964034";
        $book_id = $this->input->post('book_id');
        $quantity = $this->input->post('quantity');

        $this->Cart_model->updateQuantity($user_id, $book_id, $quantity);
    }
}
