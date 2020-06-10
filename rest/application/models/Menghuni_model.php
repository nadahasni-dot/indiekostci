<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menghuni_model extends CI_Model {
    public function getMenghuniByUserId($id_pengguna) {
        return $this->db->get_where('menghuni', ['id_pengguna' => $id_pengguna])->row_array();
    }
}