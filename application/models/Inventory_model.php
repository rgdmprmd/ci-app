<?php

// Model untuk mengelola inventory, dipanggil di controller inventory
class Inventory_model extends CI_Model
{
    // Method mengambil semua data product
    public function getAllProduct()
    {
        // Query builder SELECT * FROM products
        // $query = $this->db->get('products');

        // Query builder untuk fetch all array
        // $query->result_array();

        // Method chaining, quert select dan resultnya
        return $this->db->order_by('idProduk', 'DESC')->get('products')->result_array();
    }

    // Method mengambil data product berdasarkan config pagination yang dikirimkan
    public function getProduct($limit, $start, $keyword)
    {
        if ($keyword) {
            // Query builder SELECT * FROM products LIKE namaProduk = %$keyword% OR labelProduk = %$keyword%
            $this->db->like('namaProduk', $keyword);
            $this->db->or_like('labelProduk', $keyword);
        }
        // Tampilkan produk berdasarkan limitnya berapa pergae, dan mulai dari urutan keberapa.
        return $this->db->order_by('idProduk', 'DESC')->get('products', $limit, $start)->result_array();
    }

    public function countProduct()
    {
        return $this->db->get('products')->num_rows();
    }

    // Method tambah data product
    public function tambahDataProduct()
    {
        // Tangkap data dari form
        $data = [
            "namaProduk" => $this->input->post('namaProduk', true),
            "labelProduk" => $this->input->post('labelProduk', true),
            "stokProduk" => $this->input->post('stokProduk', true),
            "terjualProduk" => $this->input->post('terjualProduk', true),
            "hargaBeli" => $this->input->post('hargaBeli', true),
            "hargaJual" => $this->input->post('hargaJual', true),
            "profitProduk" => $this->input->post('hargaJual') - $this->input->post('hargaBeli')
        ];

        // Query builder SQL INSERT INTO products VALUES ($data);
        $this->db->insert('products', $data);
    }

    // Method hapus data product by id
    public function hapusDataProduct($id)
    {
        // Query DELETE FROM products WHERE idProduct = $id
        // $this->db->where('idProduk', $id);
        $this->db->delete('products', ['idProduk' => $id]);
    }

    // Method memanggil product by id
    public function getProductById($id)
    {
        // Query SELECT * FROM products WHERE idProduk = $id
        // $this->db->where('idProduk', $id);
        return $this->db->get_where('products', ['idProduk' => $id])->row_array();
    }

    // Method memanggil product by id
    public function getOrderById($id)
    {
        // Query SELECT * FROM products WHERE idProduk = $id
        // $this->db->where('idProduk', $id);
        return $this->db->get_where('orders', ['idProduk' => $id, 'status' => 0])->num_rows();
    }

    // Method ubah data product
    public function ubahDataProduct()
    {
        // Tangkap data dari form
        $data = [
            "namaProduk" => $this->input->post('namaProduk', true),
            "labelProduk" => $this->input->post('labelProduk', true),
            "stokProduk" => $this->input->post('stokProduk', true),
            "terjualProduk" => $this->input->post('terjualProduk', true),
            "hargaBeli" => $this->input->post('hargaBeli', true),
            "hargaJual" => $this->input->post('hargaJual', true),
            "profitProduk" => $this->input->post('hargaJual') - $this->input->post('hargaBeli')
        ];

        // Query builder SQL UPDATE products SET ($data) WHERE idProduk = idProduk;
        $this->db->where('idProduk', $this->input->post('idProduk'));
        $this->db->update('products', $data);
    }

    // Method cari data product
    public function cariDataProduct()
    {
        // Tangkap keyword yang dikirimkan
        $keyword = $this->input->post('keyword', true);

        // Query builder SELECT * FROM products LIKE namaProduk = %$keyword% OR labelProduk = %$keyword%
        $this->db->like('namaProduk', $keyword);
        $this->db->or_like('labelProduk', $keyword);
        return $this->db->get('products')->result_array();
    }

    public function setOrder($data)
    {
        $this->db->insert('orders', $data);
    }
}
