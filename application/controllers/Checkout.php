<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{
    public function index()
    {
        $data['title_page'] = 'Checkout';

        $this->load->view('templates/header', $data);
        $this->load->view('checkout/checkout', $data);
        $this->load->view('templates/footer');
    }
}
