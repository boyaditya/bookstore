<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function index($id = null)
    {
        $data['title_page'] = 'Cart';
        $data['cart'] = $this->Cart_model->getCartsByUserId("672969deee284ad03e964034");

        // var_dump($data['cart'][0]['_id']->{'$id'});
        $data['cart_items'] = $this->Cart_model->getCartItems($data['cart'][0]['_id']->{'$id'});

        // var_dump($data['cart_items']);

        // $data['book'] = $data['cart_items'];
        // var_dump($data['book']);

        // var_dump($data['cart_items']);
        // $data['book'] = $this->Book_model->getBookById($id);
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
