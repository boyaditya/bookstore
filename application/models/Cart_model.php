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

        // Fetch book details for each item and include quantity
        $this->load->model('Book_model');
        foreach ($items as $key => $item) {
            $book_id = (string) $item->book_id;
            $book = $this->Book_model->getBookById($book_id);
            if (!empty($book)) {
                $items[$key] = (array) $item; // Convert stdClass to array
                $items[$key]['book'] = $book;
            }
        }

        return $items;
    }

    public function addToCart($user_id, $book_id, $quantity)
    {
        $this->load->library('mongo_db');
        $cart = $this->mongo_db->where(['user_id' => new MongoDB\BSON\ObjectId($user_id)])->get('carts');

        if (empty($cart)) {
            // Create a new cart if it doesn't exist
            $new_cart = [
                'user_id' => new MongoDB\BSON\ObjectId($user_id),
                'items' => [
                    [
                        'book_id' => new MongoDB\BSON\ObjectId($book_id),
                        'quantity' => $quantity
                    ]
                ],
                'updated_at' => new MongoDB\BSON\UTCDateTime()
            ];
            $this->mongo_db->insert('carts', $new_cart);
        } else {
            // Update existing cart
            $cart_id = $cart[0]['_id']->{'$id'};
            $items = $this->getCartItems($cart_id);
            $item_found = false;

            // Check if the book already exists in the cart
            foreach ($items as &$item) {
                if ((string) $item['book_id'] === $book_id) {
                    $item['quantity'] += $quantity;
                    $item_found = true;
                    break;
                }
            }

            if (!$item_found) {
                // Add new item to the cart
                $items[] = [
                    'book_id' => new MongoDB\BSON\ObjectId($book_id),
                    'quantity' => $quantity
                ];
            }

            // Update the cart in the database
            $this->mongo_db->where(['_id' => new MongoDB\BSON\ObjectId($cart_id)])
                ->set(['items' => $items, 'updated_at' => new MongoDB\BSON\UTCDateTime()])
                ->update('carts');
        }
    }

    
}