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


  // fungsi untuk mendapat data pemasukan terbaru
  public function getAllIncome(){
    $this->db->select('pembayaran.*, kamar.nomor_kamar, pengguna.nama_pengguna, jenis_status_pembayaran.nama_status_pembayaran');
    $this->db->from('pembayaran');
    $this->db->join('menghuni', 'pembayaran.id_menghuni = menghuni.id_menghuni');
    $this->db->join('kamar', 'menghuni.id_kamar = kamar.id_kamar');
    $this->db->join('pengguna', 'menghuni.id_pengguna = pengguna.id_pengguna');
    $this->db->join('jenis_status_pembayaran', 'pembayaran.id_status = jenis_status_pembayaran.id_status');
    $this->db->order_by('pembayaran.id_status', 'desc');
    $this->db->order_by('pembayaran.tanggal_pembayaran', 'desc');

    return $this->db->get()->result_array();
  }



  // menginput pembayaran ke database
  public function inputPembayaran($data){
    return $this->db->insert('pembayaran', $data);
  }




  public function getAllMenghuni(){
    $this->db->select('*');
    $this->db->from('menghuni');
    $this->db->join('kamar', 'menghuni.id_kamar = kamar.id_kamar');
    $this->db->join('pengguna', 'menghuni.id_pengguna = pengguna.id_pengguna');

    return $this->db->get()->result_array();
  }





  // mengambil data jenis status pembayaran
  public function getAllJenisStatusPembayaran(){
    return $this->db->get('jenis_status_pembayaran')->result_array();
  }

  // fungsi untuk mendapat data pemasukan berdasarid
  public function getIncomeById($id){
    $this->db->select('pembayaran.*, kamar.nomor_kamar, pengguna.nama_pengguna, jenis_status_pembayaran.nama_status_pembayaran');
    $this->db->from('pembayaran');
    $this->db->join('menghuni', 'pembayaran.id_menghuni = menghuni.id_menghuni');
    $this->db->join('kamar', 'menghuni.id_kamar = kamar.id_kamar');
    $this->db->join('pengguna', 'menghuni.id_pengguna = pengguna.id_pengguna');
    $this->db->join('jenis_status_pembayaran', 'pembayaran.id_status = jenis_status_pembayaran.id_status');
    $this->db->where('pembayaran.id_pembayaran', $id);
    
    return $this->db->get()->row_array();
  }

  // fungsi untuk mengupdate pembayaran byId
  public function updatePembayaran($id, $data){
    $this->db->where('id_pembayaran', $id);
    return $this->db->update('pembayaran', $data);
  }




  public function getPembayaranUser($id_pengguna){
    $query = "SELECT *, DATE_FORMAT(CURRENT_DATE(), '%M %Y') AS bulan FROM pembayaran, kamar, pengguna, menghuni, jenis_status_pembayaran
    WHERE menghuni.id_kamar = kamar.id_kamar AND pembayaran.id_status = jenis_status_pembayaran.id_status AND
      menghuni.id_pengguna = pengguna.id_pengguna AND
      pembayaran.id_menghuni = menghuni.id_menghuni AND pengguna.id_pengguna = $id_pengguna AND
      MONTH(pembayaran.tanggal_pembayaran) = MONTH(CURRENT_DATE())";

    return $this->db->query($query)->row_array();
  }




  public function getHargaKamarUser($id_pengguna){
    $query = "SELECT *, DATE_FORMAT(CURRENT_DATE(), '%M %Y') AS bulan, (kamar.harga_bulanan + layanan.harga_bulanan) AS harga_total, CURRENT_DATE() AS tanggal_sekarang FROM kamar, pengguna, menghuni, layanan
            WHERE menghuni.id_kamar = kamar.id_kamar  AND kamar.id_layanan = layanan.id_layanan AND
              menghuni.id_pengguna = pengguna.id_pengguna AND pengguna.id_pengguna = $id_pengguna";

    return $this->db->query($query)->row_array();
  }



  public function getBulanTahunPembayaran(){
    $query = "SELECT DATE_FORMAT(CURRENT_DATE(), '%Y') as tahun, DATE_FORMAT(CURRENT_DATE(), '%m') as bulan";

    return $this->db->query($query)->row_array();
  }




  public function getBatasPembayaran($tahun, $bulan){
    $query = "SELECT DATEDIFF(CURRENT_DATE(),'$tahun-$bulan-10') AS selisih";

    return $this->db->query($query)->row_array();
  }
}
