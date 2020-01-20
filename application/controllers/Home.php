<?php

// Controller default
class Home extends CI_Controller
{
    // Method default
    public function index($nama = 'users')
    {
        // Data yang dikirimkan ke view
        $data['title'] = 'Home';
        $data['nama'] = $nama;

        // Memanggil views
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}
