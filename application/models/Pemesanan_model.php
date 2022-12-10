<?php
class Pemesanan_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function getDataPemesanan(){
        return $this->db->select('*')
                    ->from('pemesanan')
                    ->join('departemen', 'departemen.id_departemen = pemesanan.id_departemen', 'left')
                    ->join('kendaraan', 'kendaraan.id = pemesanan.id', 'left')
                    ->join('status_pemesanan', 'status_pemesanan.id_status_pemesanan = pemesanan.id_status_pemesanan', 'left')
                    ->get()->result_array();
    }

    public function getDepartemen(){
        return $this->db->select('*')
                    ->from('departemen')
                    ->get()->result_array();
    }

    public function getKendaraan(){
        return $this->db->select('*')
                    ->from('kendaraan')
                    ->get()->result_array();
    }

    public function getStatusPemesanan(){
        return $this->db->select('*')
                    ->from('status_pemesanan')
                    ->get()->result_array();
    }

    public function simpan($data)
    {
        return $this->db->insert("pemesanan", $data);
    }

    public function hapus($id_pemesanan)
    {
        return $this->db->delete("pemesanan", array('id_pemesanan' => $id_pemesanan));
    }

    
    public function update($id_pemesanan, $data)
    {
        return $this->db->update('pemesanan', $data, array('id_pemesanan' => $id_pemesanan));
    }
}