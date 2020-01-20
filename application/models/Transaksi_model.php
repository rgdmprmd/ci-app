<?php

class Transaksi_model extends CI_Model
{
    // Method untuk mengambil semua data transaksi yang berstatus 0 (Pendiing)
    public function getAllOrder()
    {
        return $this->db->order_by('idOrder', 'DESC')->get_where('orders', ['status' => 0])->result_array();
    }

    // Method untuk menghitung ada berapa banyak data yang berstatus 0 (Pending)
    public function getCountOrder()
    {
        return $this->db->get_where('orders', ['status' => 0])->num_rows();
    }

    // Method untuk menghitung ada berapa banyak data yang berstatus 0 (Pending)
    public function getCountTransaksi()
    {
        return $this->db->get_where('orders', ['status' => 1, 'dateCreated' => date('Y-m-d')])->num_rows();
    }

    // Method untuk menghitung berapa total transaksi pada data yang berstatus 0 (Pending)
    public function getTotalOrder()
    {
        $this->db->select_sum('totalHarga');
        $result = $this->db->get_where('orders', ['status' => 0])->row();

        return $result->totalHarga;
    }

    // Method untuk menampilkan seluruh data transaksi yang berstatus 1 (Finish)
    public function getAllTransaksi($limit, $start)
    {
        return $this->db->order_by('idOrder', 'DESC')->get_where('orders', ['status' => 1, 'dateCreated' => date('Y-m-d')], $limit, $start)->result_array();
    }

    // Method untuk menampilkan data transaksi berdasarkan id yang dikirimkan
    public function getTransaksiById($id)
    {
        return $this->db->get_where('orders', ['idOrder' => $id])->row_array();
    }

    // Method untuk mencari produk berdasarkan idOrder
    public function getProdukByOrderId($id)
    {
        $order = $this->db->get_where('orders', ['idOrder' => $id])->row_array();
        $idProduk = $order['idProduk'];

        return $this->db->get_where('products', ['idProduk' => $idProduk])->row_array();
    }

    // Method untuk menampilkan hari dan tanggal sekarang
    public function getDate()
    {
        return date('l, d M Y');
    }

    // Method untuk menjumlah seluruh total harga pada hari ini
    public function getTotalOmset()
    {
        $this->db->select_sum('totalHarga');
        $result = $this->db->get_where('orders', ['status' => 1, 'dateCreated' => date('Y-m-d')])->row();

        return $result->totalHarga;
    }

    // Method untuk menjumlah seluruh total profit pada hari ini
    public function getTotalProfit()
    {
        $this->db->select_sum('profitPertransaksi');
        $result = $this->db->get_where('orders', ['status' => 1, 'dateCreated' => date('Y-m-d')])->row();

        return $result->profitPertransaksi;
    }

    // Method untuk menghapus seluruh data order yang memiliki status 0
    public function deletePending($data)
    {
        $this->db->delete('orders', $data);
    }

    // Method untuk menghapus data order berdasarkan idOrder
    public function deleteOrder($data)
    {
        $this->db->delete('orders', $data);
    }

    // Method untuk menghapus data order berdasarkan idOrder
    public function deleteTransaksi($id)
    {
        $transaksi = $this->db->get_where('orders', ['idOrder' => $id])->row_array();
        $idProduk = $transaksi['idProduk'];
        $stokBarang = $transaksi['stokBarang'];
        $qtyOrder = $transaksi['qtyOrder'];

        $products = $this->db->get_where('products', ['idProduk' => $idProduk])->row_array();
        $terjualProduk = $products['terjualProduk'];

        $terjualbaru = $terjualProduk - $qtyOrder;
        $stokbaru = $stokBarang + $qtyOrder;

        $this->db->set('stokProduk', $stokbaru);
        $this->db->set('terjualProduk', $terjualbaru);
        $this->db->where('idProduk', $idProduk);
        $this->db->update('products');

        $this->db->delete('orders', ['idOrder' => $id]);
    }

    // Method untuk mengubah semua satatus order dari yang tadinya 0 menjadi 1
    public function setProses($data)
    {
        $this->db->set('status', 1);
        $this->db->where('status', $data);
        $this->db->update('orders');
    }

    // Method untuk mengupdate stok 
    public function updateStokTerjual($data)
    {
        $this->db->set('status', 1);
        $this->db->where('status', $data);
        $this->db->update('orders');
    }

    // Method untuk mengubah data order berdasarkan id order
    public function ubahOrder()
    {
        $produk = $this->db->get_where('products', ['idProduk' => $this->input->post('idProduk')])->row_array();

        $data = [
            'stokBarang' => $produk['stokProduk'] - $this->input->post('qtyOrder'),
            'terjualBarang' => $produk['terjualProduk'] + $this->input->post('qtyOrder'),
            'qtyOrder' => $this->input->post('qtyOrder'),
            'totalHarga' => $this->input->post('totalHarga'),
            'profitPertransaksi' => $produk['profitProduk'] * $this->input->post('qtyOrder'),
            'dateModified' => $this->input->post('dateModified')
        ];

        $this->db->where('idOrder', $this->input->post('idOrder'));
        $this->db->update('orders', $data);
    }


    public function getTransaksiByDate()
    {
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        $this->db->where('status', 1);
        $this->db->where("dateCreated BETWEEN '$startDate' AND '$endDate'");
        $this->db->order_by('idOrder', 'DESC');
        return $this->db->get('orders')->result_array();
    }

    public function countTransaksiByDate()
    {
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        $this->db->where('status', 1);
        $this->db->where("dateCreated BETWEEN '$startDate' AND '$endDate'");
        return $this->db->get('orders')->num_rows();
    }

    public function getTotalOmsetByDate()
    {
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        $this->db->select_sum('totalHarga');
        $this->db->where('status', 1);
        $this->db->where("dateCreated BETWEEN '$startDate' AND '$endDate'");
        $result = $this->db->get('orders')->row();

        return $result->totalHarga;
    }

    public function getTotalProfitByDate()
    {
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        $this->db->select_sum('profitPertransaksi');
        $this->db->where('status', 1);
        $this->db->where("dateCreated BETWEEN '$startDate' AND '$endDate'");
        $result = $this->db->get('orders')->row();

        return $result->profitPertransaksi;
    }
}
