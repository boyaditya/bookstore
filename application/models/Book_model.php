<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book_model extends CI_Model
{
    public function getBooks()
    {
        $this->load->library('mongo_db');
        $data = $this->mongo_db->get('books');
        return $data;
    }

    public function getBookById($id)
    {
        $this->load->library('mongo_db');
        $data = $this->mongo_db->where(['_id' => new MongoDB\BSON\ObjectId($id)])->get('books');
        return $data;

    }

    public function getBookByCartId($id)
    {
        $this->load->library('mongo_db');
        $data = $this->mongo_db->where(['_id' => new MongoDB\BSON\ObjectId($id)])->get('books');
        return $data[0];
    }

}
