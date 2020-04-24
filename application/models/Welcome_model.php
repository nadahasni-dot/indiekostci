<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model {
    
    public function getInfoKost()
    {
        $data_info_kost = $this->db->query("SELECT * FROM `info_kost` WHERE id_kost = 1")->row_array();

        return $data_info_kost;
    }
}