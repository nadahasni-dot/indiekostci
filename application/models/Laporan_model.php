<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {


    public function getTahunPembayaran(){
        $query = "SELECT YEAR(pembayaran.tanggal_pembayaran) AS tahun FROM pembayaran
                                    GROUP BY YEAR(pembayaran.tanggal_pembayaran)";

        $this->db->select('YEAR(pembayaran.tanggal_pembayaran) AS tahun');
        $this->db->from('pembayaran');
        $this->db->group_by('YEAR(pembayaran.tanggal_pembayaran)');

        return $this->db->get()->result_array();
    }

    public function getDataPembayaranBulanan($tahun, $bulan){
        $query = "SELECT SUM(pembayaran.nilai_pembayaran) AS total_pembayaran, DATE_FORMAT(CURRENT_DATE(), '%d %M %Y') AS tanggal_cetak FROM pembayaran WHERE YEAR(pembayaran.tanggal_pembayaran) = '$tahun' AND MONTH(pembayaran.tanggal_pembayaran) = '$bulan'";

        return $this->db->query($query)->row_array();
    }
    

    public function getDataPembayaranTahunan($tahun){
        $query = "SELECT SUM(pembayaran.nilai_pembayaran) AS total_pembayaran, DATE_FORMAT(CURRENT_DATE(), '%d %M %Y') AS tanggal_cetak FROM pembayaran WHERE YEAR(pembayaran.tanggal_pembayaran) = '$tahun'";

        return $this->db->query($query)->row_array();
    }


    public function getDataPengeluaranBulanan($tahun, $bulan){
        $query = "SELECT SUM(pengeluaran.nilai_pengeluaran) AS total_pengeluaran, DATE_FORMAT(CURRENT_DATE(), '%d %M %Y') AS tanggal_cetak FROM pengeluaran WHERE YEAR(pengeluaran.tanggal_pengeluaran) = '$tahun' AND MONTH(pengeluaran.tanggal_pengeluaran) = '$bulan'";

        return $this->db->query($query)->row_array();
    }




    public function getDataPengeluaranTahunan($tahun){
        $query = "SELECT SUM(pengeluaran.nilai_pengeluaran) AS total_pengeluaran, DATE_FORMAT(CURRENT_DATE(), '%d %M %Y') AS tanggal_cetak FROM pengeluaran WHERE YEAR(pengeluaran.tanggal_pengeluaran) = '$tahun'";

        return $this->db->query($query)->row_array();
    }




    public function getInfoKost(){
        $this->db->select('*');
        $this->db->from('info_kost');
        $this->db->where('id_kost', '1');

        return $this->db->get()->row_array();
    }




    public function getPengguna($id){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('id_pengguna', $id);

        return $this->db->get()->row_array();
    }





    public function getPengeluaranJenisBulanan($tahun, $bulan){
        $query = "SELECT jenis_pengeluaran.nama_pengeluaran, SUM(pengeluaran.nilai_pengeluaran) AS total_pengeluaran, pengeluaran.tanggal_pengeluaran, DATE_FORMAT(CURRENT_DATE(), '%d %M %Y') AS tanggal_cetak FROM pengeluaran, jenis_pengeluaran WHERE pengeluaran.id_jenis_pengeluaran = jenis_pengeluaran.id_jenis_pengeluaran AND YEAR(pengeluaran.tanggal_pengeluaran) = '$tahun' AND MONTH(pengeluaran.tanggal_pengeluaran) = '$bulan'

        GROUP BY jenis_pengeluaran.nama_pengeluaran";

        return $this->db->query($query)->result_array();
    }



    public function getPengeluaranJenisTahunan($tahun){            
        $query = "SELECT jenis_pengeluaran.nama_pengeluaran, SUM(pengeluaran.nilai_pengeluaran) AS total_pengeluaran, pengeluaran.tanggal_pengeluaran, DATE_FORMAT(CURRENT_DATE(), '%d %M %Y') AS tanggal_cetak FROM pengeluaran, jenis_pengeluaran WHERE pengeluaran.id_jenis_pengeluaran = jenis_pengeluaran.id_jenis_pengeluaran AND YEAR(pengeluaran.tanggal_pengeluaran) = '$tahun' 

        GROUP BY jenis_pengeluaran.nama_pengeluaran";

        return $this->db->query($query)->result_array();
    }




    public function getPembayaranById($id_pembayaran){
        $query = "SELECT *, DATE_FORMAT(pembayaran.tanggal_pembayaran, '%d %M %Y') AS tanggal_bayar FROM pembayaran, menghuni, kamar, pengguna, jenis_status_pembayaran
            WHERE pembayaran.id_menghuni = menghuni.id_menghuni AND
            menghuni.id_kamar = kamar.id_kamar AND
            menghuni.id_pengguna = pengguna.id_pengguna AND
            pembayaran.id_status = jenis_status_pembayaran.id_status AND pembayaran.id_pembayaran = '$id_pembayaran'";

        return $this->db->query($query)->row_array();
    }



    public function getPemilikKost(){
        return $this->db->get_where('pengguna', ['id_akses' => 1])->row_array();
    }



    public function getBulanTahun(){
        $query = "SELECT DATE_FORMAT(CURRENT_DATE(), '%Y') as tahun, DATE_FORMAT(CURRENT_DATE(), '%m') as bulan";
    
        return $this->db->query($query)->row_array();
      }
}