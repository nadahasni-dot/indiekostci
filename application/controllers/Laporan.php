<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    // constructor untuk class auth
    function __construct()
    {
        parent::__construct();        
        $this->load->library('form_validation');
        $this->load->model('Laporan_model');
    }

    // fungsi mencetak laporan laba rugi
    public function labaRugi(){
        $id_pengguna = $this->session->userdata('id_pengguna');

        if($this->input->post('cetakBulan') == "true"){

            $tahun = $this->input->post('tahun');
            $bulan = $this->input->post('bulan');
            $namaBulan = $bulan;
            $namaBulan = date('F', mktime(0, 0, 0, $namaBulan, 10));

            $data['tahun'] = $tahun;
            $data['nama_bulan'] = $namaBulan;
            $data['info_kost'] = $this->Laporan_model->getInfoKost();
            $data['pemilik'] = $this->Laporan_model->getPengguna($id_pengguna);
            $data['pembayaran'] = $this->Laporan_model->getDataPembayaranBulanan($tahun, $bulan);
            $data['pengeluaran'] = $this->Laporan_model->getDataPengeluaranBulanan($tahun, $bulan);
            
            $this->load->view('admin/laporan/print_labarugi_bulanan_view', $data);
        } else if($this->input->post('cetakTahun') == "true"){
            $tahun = $this->input->post('tahun');

            $data['tahun'] = $tahun;            
            $data['info_kost'] = $this->Laporan_model->getInfoKost();
            $data['pemilik'] = $this->Laporan_model->getPengguna($id_pengguna);
            $data['pembayaran'] = $this->Laporan_model->getDataPembayaranTahunan($tahun);
            $data['pengeluaran'] = $this->Laporan_model->getDataPengeluaranTahunan($tahun);
            
            $this->load->view('admin/laporan/print_labarugi_tahunan_view', $data);
        }
    }





    // fungsi mencetak laporan pengeluaran
    public function pengeluaran(){
        $id_pengguna = $this->session->userdata('id_pengguna');

        if($this->input->post('cetakBulan') == "true"){

            $tahun = $this->input->post('tahun');
            $bulan = $this->input->post('bulan');
            $namaBulan = $bulan;
            $namaBulan = date('F', mktime(0, 0, 0, $namaBulan, 10));

            $data['tahun'] = $tahun;
            $data['nama_bulan'] = $namaBulan;
            $data['info_kost'] = $this->Laporan_model->getInfoKost();
            $data['pemilik'] = $this->Laporan_model->getPengguna($id_pengguna);            
            $data['pengeluaran'] = $this->Laporan_model->getPengeluaranJenisBulanan($tahun, $bulan);
            
            $this->load->view('admin/laporan/print_pengeluaran_bulanan_view', $data);
        } else if($this->input->post('cetakTahun') == "true"){
            $tahun = $this->input->post('tahun');

            $data['tahun'] = $tahun;            
            $data['info_kost'] = $this->Laporan_model->getInfoKost();
            $data['pemilik'] = $this->Laporan_model->getPengguna($id_pengguna);            
            $data['pengeluaran'] = $this->Laporan_model->getPengeluaranJenisTahunan($tahun);
            
            $this->load->view('admin/laporan/print_pengeluaran_tahunan_view', $data);
        }
    }

}