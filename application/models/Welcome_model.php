<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model {
    
    public function getInfoKost()
    {
        $data_info_kost = $this->db->query("SELECT * FROM `info_kost` WHERE id_kost = 1")->row_array();

        return $data_info_kost;
    }

    public function getKamarTersedia(){
        $query = "SELECT kamar.id_kamar, kamar.nomor_kamar, kamar.foto_kamar, tipe_kamar.nama_tipe, layanan.nama_layanan, layanan.harga_bulanan AS harga_layanan, kamar.harga_bulanan, (kamar.harga_bulanan + layanan.harga_bulanan) AS total_harga, kamar.deskripsi_kamar, kamar.kapasitas_kamar, kamar.luas_kamar, kamar.lantai_kamar FROM kamar
            LEFT JOIN menghuni ON menghuni.id_kamar = kamar.id_kamar
            LEFT JOIN booking ON kamar.id_kamar = booking.id_kamar
            INNER JOIN tipe_kamar ON kamar.id_tipe = tipe_kamar.id_tipe
            INNER JOIN layanan ON kamar.id_layanan = layanan.id_layanan

            WHERE menghuni.id_kamar IS NULL AND booking.id_kamar IS NULL
            ORDER BY kamar.nomor_kamar ASC";

        return $this->db->query($query)->result_array();
    }
}