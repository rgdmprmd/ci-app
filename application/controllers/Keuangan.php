<?php

// Controller mengelola keuangan
class Keuangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Keuangan_model');

        $this->load->library('form_validation');
    }
    // Method menampilkan semua transaksi
    public function index()
    {
        $data['title'] = 'Keuangan';
        $data['transaksi'] = $this->Keuangan_model->getAllTransaksi();
        $data['profil'] = $this->Keuangan_model->getInfoMerchant();
        $data['saldo'] = $this->Keuangan_model->getSaldoMerchant();

        $this->load->view('templates/header', $data);
        $this->load->view('keuangan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // Set rule untuk validasi
        $this->form_validation->set_rules('jenisTransaksi', 'Jenis Transaksi', 'required');
        $this->form_validation->set_rules('tanggalTransaksi', 'Tanggal Transaksi', 'required');
        $this->form_validation->set_rules('pengeluaran', 'Pengeluaran', 'required');
        $this->form_validation->set_rules('pemasukan', 'Pemasukan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'ditambahkan');
            redirect('keuangan');
        } else {
            $this->Keuangan_model->tambahDataTransaksi();
            $this->session->set_flashdata('berhasil', 'ditambahkan');
            redirect('keuangan');
        }
    }

    // Method getUpdate
    public function getUbah()
    {
        echo json_encode($this->Keuangan_model->getTransaksiById($_POST['idJson']));
    }
}
