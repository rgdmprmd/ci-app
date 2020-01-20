<?php

class Keuangan_model extends CI_Model
{
    public function getAllTransaksi()
    {
        // Query SELECT * FROM transaksi JOIN profil ON profil.idMerchant = transaksi.idMerchant
        return $this->db->order_by('idOrder', 'DESC')->get_where('orders', ['status' => 1])->result_array();
    }

    public function getTransaksiById($id)
    {
        return $this->db->get_where('transaksi', ['idTransaksi' => $id])->row_array();
    }

    public function getInfoMerchant()
    {
        return $this->db->get('profil')->row_array();
    }

    public function getSaldoMerchant()
    {
        $this->db->query('UPDATE profil p INNER JOIN ( SELECT SUM(totalHarga) AS total, idMerchant FROM orders ) t ON p.idMerchant = t.idMerchant SET p.saldoMerchant=t.total');

        return $this->db->get('profil')->row_array();
    }

    public function tambahDataTransaksi()
    {
        $dataTransaksi = [
            "idMerchant" => $this->input->post('idMerchant', true),
            "jenisTransaksi" => $this->input->post('jenisTransaksi', true),
            "tanggalTransaksi" => $this->input->post('tanggalTransaksi', true),
            "pengeluaran" => $this->input->post('pengeluaran', true),
            "pemasukan" => $this->input->post('pemasukan', true)
        ];

        $this->db->insert('transaksi', $dataTransaksi);
    }
}
