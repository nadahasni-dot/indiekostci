<?php defined('BASEPATH') OR exit('No direct script access allowed');

class menghuni_model extends CI_Model
{
    public function getAllMenghuni(){
        $query = "SELECT kamar.nomor_kamar, pengguna.nama_pengguna, menghuni.tanggal_masuk, menghuni.id_menghuni, pengguna.id_pengguna FROM menghuni, kamar, pengguna WHERE menghuni.id_kamar = kamar.id_kamar AND menghuni.id_pengguna = pengguna.id_pengguna";

        return $this->db->query($query)->result_array();
    }

    public function getKamarTersedia(){
        $query = "SELECT kamar.nomor_kamar, kamar.id_kamar, 
                    CASE
                        WHEN kamar.id_kamar = (SELECT menghuni.id_kamar FROM menghuni WHERE menghuni.id_kamar = kamar.id_kamar)
                    THEN
                        (SELECT pengguna.nama_pengguna FROM pengguna, menghuni WHERE pengguna.id_pengguna = menghuni.id_pengguna AND  menghuni.id_kamar = kamar.id_kamar)
                    ELSE
                        'Belum dihuni'
                    END AS penghuni
                    
                FROM kamar";

        return $this->db->query($query)->result_array();
    }


    public function getBelumMenghuni(){
        $query = "SELECT pengguna.id_pengguna, pengguna.nama_pengguna
                FROM pengguna
                LEFT JOIN menghuni ON pengguna.id_pengguna = menghuni.id_pengguna
                WHERE menghuni.id_pengguna IS NULL AND pengguna.id_akses = 3";
        
        return $this->db->query($query)->result_array();
    }
    
    public function getMenghuniById($id_menghuni){
        $query = "SELECT menghuni.id_menghuni, menghuni.tanggal_masuk, menghuni.tanggal_keluar, pengguna.nama_pengguna, kamar.id_kamar, kamar.nomor_kamar, tipe_kamar.nama_tipe, kamar.kapasitas_kamar, pengguna.id_pengguna, pengguna.nama_pengguna, pengguna.foto_pengguna, kamar.luas_kamar, kamar.lantai_kamar, layanan.nama_layanan, layanan.harga_bulanan AS harga_layanan, (kamar.harga_bulanan + layanan.harga_bulanan) AS harga_bulanan_total, kamar.denda, kamar.harga_bulanan, kamar.deskripsi_kamar FROM pengguna, kamar, menghuni, tipe_kamar, layanan WHERE pengguna.id_pengguna = menghuni.id_pengguna AND kamar.id_kamar = menghuni.id_kamar AND kamar.id_tipe = tipe_kamar.id_tipe AND kamar.id_layanan = layanan.id_layanan AND menghuni.id_menghuni = '$id_menghuni'";

        return $this->db->query($query)->row_array();
    }

    public function insertMenghuni($data){
        return $this->db->insert('menghuni', $data);
    }

    public function getMenghuniByIdPengguna($id){
        $this->db->where('id_pengguna', $id);
        return $this->db->get('menghuni')->row_array();
    }



    public function updateMenghuni($id_menghuni, $data){
        $this->db->where('id_menghuni', $id_menghuni);
        return $this->db->update('menghuni', $data);
    }
}