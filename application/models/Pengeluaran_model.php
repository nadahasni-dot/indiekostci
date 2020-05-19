<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran_model extends CI_Model {

    // fungsi untuk mendapatkan semua data pengeluaran
    public function getAllPengeluaran(){
        $this->db->select('pengeluaran.*, jenis_pengeluaran.kategori_pengeluaran, jenis_pengeluaran.nama_pengeluaran');
        $this->db->from('pengeluaran');
        $this->db->join('jenis_pengeluaran', 'pengeluaran.id_jenis_pengeluaran = jenis_pengeluaran.id_jenis_pengeluaran');
        $this->db->order_by('pengeluaran.tanggal_pengeluaran', 'desc');

        return $this->db->get()->result_array();
    }

    // fungsi untuk mendapat semua jenis pengeluaran
    public function getAllJenisPengeluaran(){
        return $this->db->get('jenis_pengeluaran')->result_array();
    }


    // fungsi untuk mendapat detail pengeluaran byId
    public function getPengeluaranById($id){
        // $query = "SELECT * FROM pengeluaran, jenis_pengeluaran WHERE id_pengeluaran = $id_pengeluaran AND pengeluaran.id_jenis_pengeluaran = jenis_pengeluaran.id_jenis_pengeluaran";

        $this->db->select('*');
        $this->db->from('pengeluaran');
        $this->db->join('jenis_pengeluaran', 'pengeluaran.id_jenis_pengeluaran = jenis_pengeluaran.id_jenis_pengeluaran');
        $this->db->where('id_pengeluaran', $id);
        
        return $this->db->get()->row_array();
    }



    // input pengeluaran ke DB
    public function inputPengeluaran($data){
        return $this->db->insert('pengeluaran', $data);
    }




    // update data pengeluara by id
    public function updatePengeluaran($id, $data){
        $this->db->where('id_pengeluaran', $id);
        return $this->db->update('pengeluaran', $data);
    }
}

