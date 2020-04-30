<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function getUserByEmail($email){
        $user = $this->db->get_where('pengguna', ['email_pengguna' => $email])->row_array();

        return $user;
    }

    public function getHakAksesById($id_akses){
        $hak_akses = $this->db->get_where('hak_akses', ['id_akses' => $id_akses])->row_array();
        
        return $hak_akses;
    }
}