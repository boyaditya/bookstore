<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('mongo_db');
    }

    public function register($data) {
        // Cek apakah email sudah terdaftar
        $result = $this->mongo_db->findOne('users', ['email' => $data['email']]);
        if (count($result) > 0) {
            return false; // Email sudah terdaftar
        }

        // Masukkan data ke MongoDB
        $this->mongo_db->insert('users', $data);
        return true;
    }

    public function login($email, $password) {
        // Cari user berdasarkan email
        $result = $this->mongo_db->findOne('users', ['email' => $email]);

        if (count($result) > 0) {
            // Periksa password
            if (password_verify($password, $result[0]->password)) {
                return $result[0]; // Login berhasil
            }
        }
        return false; // Login gagal
    }
}
