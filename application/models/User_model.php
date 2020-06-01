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

    public function getAllPenghuni(){
        // $query = "SELECT pengguna.id_pengguna, pengguna.nama_pengguna, menghuni.id_kamar, menghuni.tanggal_masuk, pengguna.telepon_pengguna, kamar.nomor_kamar
        //    FROM pengguna
        //      INNER JOIN menghuni ON pengguna.id_pengguna = menghuni.id_pengguna 
        //      INNER JOIN kamar ON kamar.id_kamar = menghuni.id_kamar
        //      ORDER BY kamar.nomor_kamar ASC";

        $this->db->select('pengguna.id_pengguna, pengguna.nama_pengguna, menghuni.id_kamar, menghuni.tanggal_masuk, pengguna.telepon_pengguna, kamar.nomor_kamar');
        $this->db->from('pengguna');
        $this->db->join('menghuni', 'pengguna.id_pengguna = menghuni.id_pengguna');
        $this->db->join('kamar', 'menghuni.id_kamar = kamar.id_kamar');
        $this->db->order_by('kamar.nomor_kamar', 'asc');

        $penghuni = $this->db->get()->result_array();

        return $penghuni;
    }

    public function getUserById($id){
        $user = $this->db->get_where('pengguna', ['id_pengguna' => $id])->row_array();

        return $user;
    }


    public function updateUser($id, $data){
        $this->db->where('id_pengguna', $id);
        $this->db->update('pengguna', $data);
    }    
}