<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

    public function getInfoKostById($id)
    {
        $this->db->where('id_kost', $id);
        return $this->db->get('info_kost')->row_array();
    }


    public function updateInfoKost($id_kost, $data){
        $this->db->where('id_kost', $id_kost);
        return $this->db->update('info_kost', $data);
    }
}