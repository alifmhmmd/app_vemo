<?php
class Kendaraan_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }
    
    public function getDataKendaraan(){
        return $this->db->select('*')
                    ->from('kendaraan')
                    ->join('jenis_kendaraan', 'jenis_kendaraan.id_jenis_kendaraan = kendaraan.id_jenis_kendaraan', 'left')
                    ->join('tipe_kendaraan', 'tipe_kendaraan.id_tipe_kendaraan = kendaraan.id_tipe_kendaraan', 'left')
                    ->get()->result_array();
    }

    public function getJenisKendaraan(){
        return $this->db->select('*')
                    ->from('jenis_kendaraan')
                    ->get()->result_array();
    }

    public function getTipeKendaraan(){
        return $this->db->select('*')
                    ->from('tipe_kendaraan')
                    ->get()->result_array();
    }

    public function simpan($data)
    {
        return $this->db->insert("kendaraan", $data);
    }

    public function hapus($id)
    {
        return $this->db->delete("kendaraan", array('id' => $id));
    }


}