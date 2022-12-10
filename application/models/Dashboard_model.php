<?php
class Dashboard_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function getJumlahKendaraan(){
        return $this->db->select('id')
                            ->from('kendaraan')
                            ->get()->num_rows();
    }
    public function getJumlahPemesanan(){
        return $this->db->select('id_pemesanan')
                            ->from('pemesanan')
                            ->get()->num_rows();
    }
}