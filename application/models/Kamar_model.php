<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar_model extends CI_Model {

    public function getKamar($id_pengguna){
        $query = "SELECT *, (kamar.harga_bulanan + layanan.harga_bulanan) AS total_harga, layanan.harga_bulanan AS harga_layanan, kamar.harga_bulanan AS harga_kamar_bulanan FROM pengguna, kamar, menghuni, layanan, tipe_kamar WHERE pengguna.id_pengguna = $id_pengguna AND menghuni.id_pengguna = pengguna.id_pengguna AND menghuni.id_kamar = kamar.id_kamar AND kamar.id_layanan = layanan.id_layanan AND kamar.id_tipe = tipe_kamar.id_tipe";

        return $this->db->query($query)->row_array();
    }

    public function getKamarById($id_kamar){
        $query = "SELECT kamar.id_kamar, kamar.foto_kamar ,kamar.nomor_kamar, tipe_kamar.nama_tipe, kamar.luas_kamar, kamar.lantai_kamar, kamar.kapasitas_kamar, kamar.deskripsi_kamar, layanan.nama_layanan, kamar.harga_bulanan, kamar.denda, layanan.harga_bulanan AS harga_layanan, (kamar.harga_bulanan + layanan.harga_bulanan) AS harga_bulanan_total FROM kamar, tipe_kamar, layanan
        WHERE
            kamar.id_tipe = tipe_kamar.id_tipe AND
            kamar.id_layanan = layanan.id_layanan AND
            kamar.id_kamar = '$id_kamar'";

        return $this->db->query($query)->row_array();
    }
}
