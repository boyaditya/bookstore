<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function index($id)
    {
        $data['title_page'] = 'Cart';
        $data['cart'] = $this->Cart_model->getCartsByUserId("672969deee284ad03e964034");

        // var_dump($data['cart'][0]['_id']->{'$id'});
        $data['cart_items'] = $this->Cart_model->getCartItems($data['cart'][0]['_id']->{'$id'});

        // $data['book'] = $data['cart_items'];
        // var_dump($data['book']);

        // var_dump($data['cart_items']);
        $data['book'] = $this->Book_model->getBookById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('cart/cart', $data);
        $this->load->view('templates/footer');
    }


    
}
