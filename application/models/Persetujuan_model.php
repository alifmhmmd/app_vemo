<?php
class Persetujuan_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function getDataPersetujuan(){
        $departemen = $this->session->userdata('id_departemen');
        return $this->db->select('*')
                    ->from('pemesanan')
                    ->join('kendaraan', 'kendaraan.id = pemesanan.id', 'left')
                    ->join('status_pemesanan', 'status_pemesanan.id_status_pemesanan = pemesanan.id_status_pemesanan', 'left')
                    ->where('id_departemen', $departemen)
                    ->get()->result_array();
    }
    public function update($id_pemesanan, $data)
    {
        return $this->db->update('pemesanan', $data, array('id_pemesanan' => $id_pemesanan));
    }
}