<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {
    
    public function getIncomeMonthly()
    {
        $query = "SELECT SUM(pembayaran.nilai_pembayaran) AS pendapatan_bulanan, DATE_FORMAT(pembayaran.tanggal_pembayaran, '%M %Y') AS bulan
        FROM pembayaran
          WHERE
            pembayaran.id_status = 1
              
              GROUP BY MONTH(pembayaran.tanggal_pembayaran)
              HAVING SUM(pembayaran.nilai_pembayaran)
              ORDER BY pembayaran.tanggal_pembayaran ASC";

        $monthlyIncome = $this->db->query($query)->result_array();

        return $monthlyIncome;
    }

    public function getIncomeThisMonth(){
        $query = "SELECT pembayaran.id_pembayaran , SUM(pembayaran.nilai_pembayaran) as pendapatan_bulan, MONTH(pembayaran.tanggal_pembayaran) bulan, DATE_FORMAT(CURRENT_DATE, '%M %Y') bulan_sekarang
        FROM pembayaran
          WHERE
            pembayaran.id_status = 1 AND
              MONTH(pembayaran.tanggal_pembayaran) = MONTH(CURRENT_DATE)
              
              GROUP BY MONTH(pembayaran.tanggal_pembayaran)
              HAVING SUM(pembayaran.nilai_pembayaran) 
              LIMIT 12";

        $income = $this->db->query($query)->row_array();

        return $income;
    }
    
    public function getIncomeThisYear(){
        $query = "SELECT pembayaran.id_pembayaran , SUM(pembayaran.nilai_pembayaran) as pendapatan_tahun, YEAR(pembayaran.tanggal_pembayaran) bulan, DATE_FORMAT(CURRENT_DATE, '%Y') tahun_sekarang
        FROM pembayaran
          WHERE
            pembayaran.id_status = 1 AND
              YEAR(pembayaran.tanggal_pembayaran) = YEAR(CURRENT_DATE)
              
              GROUP BY YEAR(pembayaran.tanggal_pembayaran)
              HAVING SUM(pembayaran.nilai_pembayaran)
              LIMIT 12";

        // $this->db->select("pembayaran.id_pembayaran , SUM(pembayaran.nilai_pembayaran) AS pendapatan_tahun, YEAR(pembayaran.tanggal_pembayaran) AS bulan, DATE_FORMAT(CURRENT_DATE, '%Y') AS tahun_sekarang");
        // $this->db->from('pembayaran');

        // $array = array(
        //   'pembayaran.id_status' => 1
        //   'YEAR(pembayaran.tanggal_pembayaran)' => 'YEAR(CURRENT_DATE)'
        // );

        // $this->db->where($array);        
        // $this->db->group_by('tanggal_pembayaran');
        // $this->db->having('SUM(pembayaran.nilai_pembayaran)');
        // $this->db->limit(12);

        // $income = $this->db->get()->row_array();

        // var_dump($income); die;
        $income = $this->db->query($query)->row_array();

        return $income;
    }


    public function getSumPenghuni(){
        // $query = "SELECT COUNT(pengguna.nama_pengguna) total_penghuni FROM pengguna
        // WHERE pengguna.id_akses = 2";

        $this->db->select('COUNT(pengguna.email_pengguna) AS total_penghuni');
        $this->db->from('pengguna');
        $this->db->where('pengguna.id_akses', 2);

        $sum = $this->db->get()->row_array();
        // $sum = $this->db->query($query)->row_array();

        return $sum;
    }


    public function getPendingIncome(){
        // $query = "SELECT COUNT(pengguna.nama_pengguna) AS belum_dikonfirmasi
        // FROM pengguna
        //   INNER JOIN menghuni ON pengguna.id_pengguna = menghuni.id_pengguna
        //   INNER JOIN pembayaran ON pembayaran.id_menghuni = menghuni.id_menghuni
          
        //   WHERE
        //     pembayaran.id_status = 2";

        $this->db->select('COUNT(pengguna.nama_pengguna) AS belum_dikonfirmasi');
        $this->db->from('pengguna');
        $this->db->join('menghuni', 'pengguna.id_pengguna = menghuni.id_pengguna');
        $this->db->join('pembayaran', 'menghuni.id_menghuni = pembayaran.id_menghuni');
        $this->db->where('pembayaran.id_status', 2);

        $pending = $this->db->get()->row_array();
        // $pending = $this->db->query($query)->row_array();

        return $pending;
    }


    public function getNewestIncome(){
        // $query = "SELECT pengguna.nama_pengguna, pembayaran.nilai_pembayaran, pembayaran.tanggal_pembayaran, pengguna.foto_pengguna
        // FROM pengguna, pembayaran, menghuni
        //   WHERE 
        //     pengguna.id_pengguna = menghuni.id_pengguna AND
        //       menghuni.id_menghuni = pembayaran.id_menghuni AND
        //       pembayaran.id_status = 1 
        //       ORDER BY pembayaran.tanggal_pembayaran DESC
        //       LIMIT 5";
        
        $this->db->select('pengguna.nama_pengguna, pembayaran.nilai_pembayaran, pembayaran.tanggal_pembayaran, pengguna.foto_pengguna');
        $this->db->from('pengguna');
        $this->db->join('menghuni', 'pengguna.id_pengguna = menghuni.id_pengguna');
        $this->db->join('pembayaran', 'menghuni.id_menghuni = pembayaran.id_menghuni');
        $this->db->where('pembayaran.id_status', 1);
        $this->db->order_by('pembayaran.tanggal_pembayaran', 'desc');
        $this->db->limit(5);

        $income = $this->db->get()->result_array();
        // $income = $this->db->query($query)->result_array();

        return $income;
    }
}
