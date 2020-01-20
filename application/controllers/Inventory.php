<?php

// Controllers pengelolaan barang
class Inventory extends CI_Controller
{
    // Method construct untuk memanggil database
    public function __construct()
    {
        // Memanggil construct milik parent *aturan dari CI
        parent::__construct();

        // Query koneksi ke database, untuk semua method dalam controller ini
        // $this->load->database();

        // load model, untuk semua method dalam controller ini
        $this->load->model('Inventory_model');

        // load library, untuk validasi form tambah data
        $this->load->library('form_validation');
    }

    // Method default menampilkan semua barang
    public function index()
    {
        // Query koneksi ke database. untuk method ini saja
        // $this->load->database(); pindah ke construct

        // Data yang dikirimkan ke views
        $data['title'] = 'Inventory';

        // Load library untunk mengaktifkan pagination
        $this->load->library('pagination');

        // Cek form searching, apakah ada keyword dikirimkan
        if ($this->input->post('submit')) {
            // jika ada, tangkap keyword yang dikirimkan, dan simpan keywordnya kedalam session
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
            redirect('inventory');
        } else {
            // jika tidak ada, set keywordnya sebagai session ??????
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // Query ke database untuk search berdasarkan keyword yang dikirimkan
        $this->db->like('namaProduk', $data['keyword']);
        $this->db->or_like('labelProduk', $data['keyword']);
        $this->db->from('products');

        // Config untuk pagination, mencari ada berapa banyak data yang tersedia, dan mau ditampilkan berapa perpage
        $config['total_rows'] = $this->db->count_all_results();
        // Config
        $config['base_url'] = 'http://localhost:8080/ci-app/inventory/index';
        $config['num_links'] = 3;
        $config['per_page'] = 5;

        // Tangkap total_rows kedalam data agar bisa ditampilkan diview sebagai result data tersedia
        $data['total_rows'] = $config['total_rows'];

        // Mengambil data melalui model *model harus di load terlebih dahulu (liat construct)
        // $data['inventory'] = $this->Inventory_model->getAllProduct(); // get data
        $data['start'] = $this->uri->segment(3); // Mendapatkan data yang ditampilkan mau dimulai dari data keberapa melalui URL segment 3
        $data['inventory'] = $this->Inventory_model->getProduct($config['per_page'], $data['start'], $data['keyword']); // get data melalui model, dan mengirimkan parameter paginationnya

        // Initialize paginationnya berdasarkan config yang dibuat, yaitu total_rows dan per_page
        $this->pagination->initialize($config);

        // Memanggil views
        $this->load->view('templates/header', $data);
        $this->load->view('inventory/index', $data);
        $this->load->view('templates/footer');
    }

    // Method tambah data produk
    public function tambah()
    {
        // Data yang dikirimkan ke views
        $data['title'] = 'Tambah Produk';

        // Set rule untuk validasi
        $this->form_validation->set_rules('namaProduk', 'Merk', 'required');
        $this->form_validation->set_rules('labelProduk', 'Varian', 'required');
        $this->form_validation->set_rules('stokProduk', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('terjualProduk', 'Barang terjual', 'required|numeric');
        $this->form_validation->set_rules('hargaBeli', 'Harga beli', 'required|numeric');
        $this->form_validation->set_rules('hargaJual', 'Harga jual', 'required|numeric');

        // Cek apakah form yang di input sesuai dgn rules
        if ($this->form_validation->run() == FALSE) {
            // Jika tidak, tampilkan views form + pesan kesalahan
            $this->load->view('templates/header', $data);
            $this->load->view('inventory/tambah');
            $this->load->view('templates/footer');
        } else {
            // Jika sesuai, tambah data ke database dan redirect ke tabel inventory
            $this->Inventory_model->tambahDataProduct();

            // Sebelum redirect, buat dulu session untuk flash message data berhasil ditambahkan
            $this->session->set_flashdata('sweetflash', 'Ditambahkan');

            // Lalu, redirect ke tabel inventory barang
            redirect('inventory');
        }
    }

    // Method hapus data
    public function hapus($id)
    {
        // Hapus data berdasarkan $id melalui model
        $this->Inventory_model->hapusDataProduct($id);

        // Tampilkan flash message dihapus
        $this->session->set_flashdata('sweetflash', 'Dihapus');

        // Redirect ke tabel inventory barang
        redirect('inventory');
    }

    // Method menampilkan data barang by id
    public function detail($id)
    {
        // Data yang akan dikirimkan ke view
        $data['title'] = 'Detail Barang';
        $data['inventory'] = $this->Inventory_model->getProductById($id);

        // Jika tidak, tampilkan views form + pesan kesalahan
        $this->load->view('templates/header', $data);
        $this->load->view('inventory/detail', $data);
        $this->load->view('templates/footer');
    }

    // Method mengubah data barang by id
    public function ubah($id)
    {
        // Data yang dikirimkan ke views
        $data['title'] = 'Ubah Produk';
        $data['inventory'] = $this->Inventory_model->getProductById($id);

        // Set rule untuk validasi
        $this->form_validation->set_rules('namaProduk', 'Merk', 'required');
        $this->form_validation->set_rules('labelProduk', 'Varian', 'required');
        $this->form_validation->set_rules('stokProduk', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('terjualProduk', 'Barang terjual', 'required|numeric');
        $this->form_validation->set_rules('hargaBeli', 'Harga beli', 'required|numeric');
        $this->form_validation->set_rules('hargaJual', 'Harga jual', 'required|numeric');

        // Cek apakah form yang di input sesuai dgn rules
        if ($this->form_validation->run() == FALSE) {
            // Jika tidak, tampilkan views form + pesan kesalahan
            $this->load->view('templates/header', $data);
            $this->load->view('inventory/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            // Jika sesuai, tambah data ke database dan redirect ke tabel inventory
            $this->Inventory_model->ubahDataProduct();

            // Sebelum redirect, buat dulu session untuk flash message data berhasil ditambahkan
            $this->session->set_flashdata('sweetflash', 'Diubah');

            // Lalu, redirect ke tabel inventory barang
            redirect('inventory');
        }
    }

    // Method untuk menampilkan data barang yang diorder melalui AJAX
    public function getOrder()
    {
        echo json_encode($this->Inventory_model->getProductById($_POST['idJson']));
    }

    public function order()
    {
        $id = $this->input->post('idProduk');
        $qty = $this->input->post('qty');
        $namaBarang = $this->input->post('produk');
        $dateOrder = $this->input->post('date');

        $product = $this->Inventory_model->getProductById($id);
        $order = $this->Inventory_model->getOrderById($id);

        if ($order < 1) {
            $totalOrder = $qty * $product['hargaJual'];
            $profit = $qty * $product['profitProduk'];

            $data = [
                'idProduk' => $product['idProduk'],
                'idMerchant' => 1,
                'namaBarang' => $namaBarang,
                'stokBarang' => $product['stokProduk'] - $qty,
                'terjualBarang' => $product['terjualProduk'] + $qty,
                'hargaJual' => $product['hargaJual'],
                'hargaBeli' => $product['hargaBeli'],
                'qtyOrder' => $qty,
                'totalHarga' => $totalOrder,
                'profitPertransaksi' => $profit,
                'status' => 0,
                'dateCreated' => $dateOrder,
                'dateModified' => $dateOrder
            ];

            $this->Inventory_model->setOrder($data);

            // Sebelum redirect, buat dulu session untuk flash message data berhasil ditambahkan
            $this->session->set_flashdata('flashorder', $namaBarang);

            // Lalu, redirect ke tabel inventory barang
            redirect('inventory');
        } else {
            // Sebelum redirect, buat dulu session untuk flash message data berhasil ditambahkan
            $this->session->set_flashdata('flashorderfail', $namaBarang);

            // Lalu, redirect ke tabel inventory barang
            redirect('inventory');
        }
    }
}
