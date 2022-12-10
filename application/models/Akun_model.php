<?php
class Akun_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function getDataAkun(){
        return $this->db->select('*')
                    ->from('user')
                    ->join('departemen', 'departemen.id_departemen = user.id_departemen', 'left')
                    ->join('user_role', 'user_role.id_role = user.id_role', 'left')
                    ->get()->result_array();
    }

    public function getDepartemen(){
        return $this->db->select('*')
                    ->from('departemen')
                    ->get()->result_array();
    }

    public function getRole(){
        return $this->db->select('*')
                    ->from('user_role')
                    ->get()->result_array();
    }

    public function simpan($data)
    {
        return $this->db->insert("user", $data);
    }

    public function hapus($id_user)
    {
        return $this->db->delete("user", array('id_user' => $id_user));
    }

    
    public function update($id_user, $data)
    {
        return $this->db->update('user', $data, array('id_user' => $id_user));
    }
}