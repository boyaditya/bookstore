<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart_model extends CI_Model
{
    public function getCarts()
    {
        $this->load->library('mongo_db');
        $data = $this->mongo_db->get('carts');
        return $data;
    }

    public function getCartById($id)
    {
        $this->load->library('mongo_db');
        $data = $this->mongo_db->where(['_id' => new MongoDB\BSON\ObjectId($id)])->get('carts');
        return !empty($data) ? $data[0] : null;
    }

    public function getCartsByUserId($user_id)
    {
        $this->load->library('mongo_db');
        $data = $this->mongo_db->where(['user_id' => new MongoDB\BSON\ObjectId($user_id)])->get('carts');
        return $data;
    }

    public function getCartItems($cart_id)
    {
        $this->load->library('mongo_db');
        $cart = $this->mongo_db->where(['_id' => new MongoDB\BSON\ObjectId($cart_id)])->get('carts');
        $items = !empty($cart) ? $cart[0]['items'] : [];



        // foreach ($items as $key => $item) {
        //     $book = $this->Book_model->getBookById($item->book_id);
        //     $items[$key]->book = $book[0];


        //     // $items[$key]['book'] = $book;
        //     // var_dump($item->book_id);
        //     // var_dump($book);
        // }

        // Fetch book details for each item and include quantity
        $this->load->model('Book_model');
        foreach ($items as $key => $item) {
            $book_id = (string) $item->book_id;
            $book = $this->Book_model->getBookById($book_id);
            if (!empty($book)) {
                $items[$key] = (array) $item; // Convert stdClass to array
                $items[$key]['book'] = $book[0];
            }
        }


        // var_dump($items);
        return $items;
    }

    
}