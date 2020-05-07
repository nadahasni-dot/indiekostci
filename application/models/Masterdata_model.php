<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Masterdata_model extends CI_Model {

    public function getAllLayanan(){
        return $this->db->get('layanan')->result_array();
    }

    public function getLayananByid($id){
        $this->db->where('id_layanan', $id);
        return $this->db->get('layanan')->row_array();
    }

    public function insertLayanan($data){
        return $this->db->insert('layanan', $data);
    }

    public function getKamarByLayanan($id){
        $this->db->select('*');
        $this->db->from('kamar');
        $this->db->where('id_layanan', $id);

        return $this->db->get()->result_array();
    }

    public function updateDataLayanan($id_layanan, $data){
        $this->db->where('id_layanan', $id_layanan);
        return $this->db->update('layanan', $data);
    }

}