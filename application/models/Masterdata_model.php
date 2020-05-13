<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Masterdata_model extends CI_Model {

    public function getAllLayanan(){
        return $this->db->get('layanan')->result_array();
    }

    public function getLayananByid($id){
        $this->db->where('id_layanan', $id);
        return $this->db->get('layanan')->row_array();
    }

    public function getTipeKamarByid($id){
        $this->db->where('id_tipe', $id);
        return $this->db->get('tipe_kamar')->row_array();
    }

    public function getJenisPengeluaranById($id){
        $this->db->where('id_jenis_pengeluaran', $id);
        return $this->db->get('jenis_pengeluaran')->row_array();
    }

    public function insertLayanan($data){
        return $this->db->insert('layanan', $data);
    }

    public function insertJenisPengeluaran($data){
        return $this->db->insert('jenis_pengeluaran', $data);
    }

    public function getKamarByLayanan($id){
        $this->db->select('*');
        $this->db->from('kamar');
        $this->db->where('id_layanan', $id);

        return $this->db->get()->result_array();
    }


    public function getPengeluaranByJenisPengeluaran($id_jenis_pengeluaran){
        $this->db->select('*');
        $this->db->from('pengeluaran');
        $this->db->where('id_jenis_pengeluaran', $id_jenis_pengeluaran);

        return $this->db->get()->result_array();
    }

    public function updateDataLayanan($id_layanan, $data){
        $this->db->where('id_layanan', $id_layanan);
        return $this->db->update('layanan', $data);
    }

    public function updateDataJenisPengeluaran($id_jenis_pengeluaran, $data){
        $this->db->where('id_jenis_pengeluaran', $id_jenis_pengeluaran);
        return $this->db->update('jenis_pengeluaran', $data);
    }

    public function updateDataTipeKamar($id_tipe_kamar, $data){
        $this->db->where('id_tipe', $id_tipe_kamar);
        return $this->db->update('tipe_kamar', $data);
    }


    public function getAllJenisPengeluaran(){
        return $this->db->get('jenis_pengeluaran')->result_array();
    }
}