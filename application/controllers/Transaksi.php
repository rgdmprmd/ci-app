<?php


class Transaksi extends CI_Controller
{
    // Method construct meload form_validation dan models
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Transaksi_model', 'transaksi');
        $this->load->library('form_validation');
    }

    // Method untuk menampilkan seluruh data transaksi
    public function index()
    {
        $data['title'] = 'Transaksi';

        // Load library untunk mengaktifkan pagination
        $this->load->library('pagination');

        // Config untuk pagination, mencari ada berapa banyak data yang tersedia, dan mau ditampilkan berapa perpage
        $config['total_rows'] = $this->transaksi->getCountTransaksi();
        // Config
        $config['base_url'] = 'http://localhost:8080/ci-app/transaksi/index';
        $config['num_links'] = 3;
        $config['per_page'] = 5;

        // Tangkap total_rows kedalam data agar bisa ditampilkan diview sebagai result data tersedia
        $data['total_rows'] = $config['total_rows'];

        // Mengambil data melalui model *model harus di load terlebih dahulu (liat construct)
        // $data['inventory'] = $this->Inventory_model->getAllProduct(); // get data
        $data['start'] = $this->uri->segment(3); // Mendapatkan data yang ditampilkan mau dimulai dari data keberapa melalui URL segment 3
        $data['transaksi'] = $this->transaksi->getAllTransaksi($config['per_page'], $data['start']);
        $data['count'] = $this->transaksi->getCountTransaksi();
        $data['date'] = $this->transaksi->getDate();
        $data['omset'] = $this->transaksi->getTotalOmset();
        $data['profit'] = $this->transaksi->getTotalProfit();

        // Initialize paginationnya berdasarkan config yang dibuat, yaitu total_rows dan per_page
        $this->pagination->initialize($config);

        $this->load->view('templates/header', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/footer');
    }

    public function lihatTransaksi()
    {
        if ($this->input->post('startDate')) {
            $data['title'] = 'Lihat Transaksi';

            $data['transaksi'] = $this->transaksi->getTransaksiByDate();
            $data['count'] = $this->transaksi->countTransaksiByDate();
            $data['date'] = $this->input->post('startDate') . ' - ' . $this->input->post('endDate');
            $data['omset'] = $this->transaksi->getTotalOmsetByDate();
            $data['profit'] = $this->transaksi->getTotalProfitByDate();

            $this->load->view('templates/header', $data);
            $this->load->view('transaksi/lihatTransaksi', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('transaksi');
        }
    }

    // Method untuk menampilkan halaman orders
    public function order()
    {
        // Pada halaman ini berisi data transaksi yang statusnya masih pending
        $data['title'] = 'Transaksi';
        $data['order'] = $this->transaksi->getAllOrder();
        $data['count'] = $this->transaksi->getCountOrder();
        $data['sum'] = $this->transaksi->getTotalOrder();

        $this->load->view('templates/header', $data);
        $this->load->view('transaksi/order', $data);
        $this->load->view('templates/footer');
    }

    // Method untuk memproses seluruh order yang masuk
    public function proses()
    {
        // Menangkap semua data transaksi yang memiliki status 0
        $status = $this->input->post('status');
        $orders = $this->transaksi->getAllOrder();

        // Tampilkan semua data transaksi yang memiliki status 0 (Teknik update banyak value sekaligus)
        foreach ($orders as $order) {
            // Tangkap id, stok, dan qtyOrder
            $id = $order['idProduk'];
            $stok = $order['stokBarang'];
            $terjual = $order['terjualBarang'];

            // Update data products berdasarkan data transaksi yang sudah ditangkap diatas
            $this->db->set('stokProduk', $stok);
            $this->db->set('terjualProduk', $terjual);
            $this->db->where('idProduk', $id);
            $this->db->update('products');
        }

        // Setelah data products di update, selanjutnya proses status transaksinya menjadi 1 (Finish/Paid)
        $this->transaksi->setProses($status);

        // Jika berhasil, tampilkan pesan berhasil dan redirect ke halaman menu
        $this->session->set_flashdata('sweettrans', 'diproses');
        redirect('transaksi');
    }

    // Method untuk mengubah data order
    public function ubah($id)
    {
        $data['title'] = 'Edit Transaksi';
        $data['transaksi'] = $this->transaksi->getTransaksiById($id);
        $data['produk'] = $this->transaksi->getProdukByOrderId($id);

        $this->form_validation->set_rules('qtyOrder', 'Quantity', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('transaksi/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->transaksi->ubahOrder();

            // Jika berhasil, tampilkan pesan berhasil dan redirect ke halaman menu
            $this->session->set_flashdata('sweettrans', 'diubah');
            redirect('transaksi/order');
        }
    }

    // Method untuk menampilkan detail transaksi
    public function detail($id)
    {
        $data['title'] = 'Detail Transaksi';
        $data['transaksi'] = $this->transaksi->getTransaksiById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('transaksi/detail', $data);
        $this->load->view('templates/footer');
    }

    // Method untuk menghapus salah satu order
    public function delete($id)
    {
        $data = ['idOrder' => $id];

        $this->transaksi->deleteOrder($data);

        // Jika berhasil, tampilkan pesan berhasil dan redirect ke halaman menu
        $this->session->set_flashdata('sweettrans', 'dihapus');
        redirect('transaksi/order');
    }

    public function deleteTransaksi($id)
    {

        $this->transaksi->deleteTransaksi($id);

        // Jika berhasil, tampilkan pesan berhasil dan redirect ke halaman menu
        $this->session->set_flashdata('sweettrans', 'dihapus');
        redirect('transaksi');
    }

    // Method untk menghapus sekuruh order berdasarkan status 0
    public function deleteAll()
    {
        $data = ['status' => 0];

        $this->transaksi->deletePending($data);

        // Jika berhasil, tampilkan pesan berhasil dan redirect ke halaman menu
        $this->session->set_flashdata('sweettrans', 'dihapus');
        redirect('transaksi/order');
    }
}
