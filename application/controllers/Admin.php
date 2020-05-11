<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    // constructor untuk class auth
    function __construct()
    {
        parent::__construct();        
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }





    // main function untuk dasbor
    public function index(){
        $this->_verifyAccess();

        $this->load->model('Pembayaran_model');

        $email = $this->session->userdata('email');
        $id_akses = $this->session->userdata('id_akses');
        
        $data['tittle'] = "Dashboard";
        $data['menu'] = 'dashboard';
        $data['subMenu'] = '';
        $data['user'] = $this->User_model->getUserByEmail($email);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);
        $data['pendapatanByBulan'] = $this->Pembayaran_model->getIncomeMonthly();        
        $data['pendapatanThisMonth'] = $this->Pembayaran_model->getIncomeThisMonth();        
        $data['pendapatanThisYear'] = $this->Pembayaran_model->getIncomeThisYear(); 
        $data['sumPenghuni'] = $this->Pembayaran_model->getSumPenghuni(); 
        $data['pendingIncome'] = $this->Pembayaran_model->getPendingIncome(); 
        $data['newestIncome'] = $this->Pembayaran_model->getNewestIncome(); 

        $this->load->view('partial/admin_partial/header_admin.php', $data);
        $this->load->view('partial/admin_partial/sidebar_admin.php', $data);
        $this->load->view('partial/admin_partial/topbar_admin.php', $data);
        $this->load->view('admin/dashboard_view.php', $data);
        $this->load->view('partial/admin_partial/footer_admin.php', $data);        
    }






    // fungsi untuk menu penghuni
    public function penghuni(){
        $this->_verifyAccess();

        $email = $this->session->userdata('email');
        $id_akses = $this->session->userdata('id_akses');
        
        $data['tittle'] = "Penghuni";
        $data['menu'] = 'penghuni';
        $data['subMenu'] = '';
        $data['user'] = $this->User_model->getUserByEmail($email);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);
        $data['penghuni'] = $this->User_model->getAllPenghuni();

        $this->load->view('partial/admin_partial/header_admin.php', $data);
        $this->load->view('partial/admin_partial/sidebar_admin.php', $data);
        $this->load->view('partial/admin_partial/topbar_admin.php', $data);
        $this->load->view('admin/penghuni_view.php', $data);
        $this->load->view('partial/admin_partial/footer_admin.php', $data);    
    }






   // fungsi untuk booking kamar
   function updateBooking()
   {
       $id = $this->input->post('edit_id', TRUE);
       $package = $this->input->post('package_edit', TRUE);
       $product = $this->input->post('product_edit', TRUE);
       $this->package_model->update_package($id, $package, $product);
       redirect('package');
   }



   function get_booking_by_id()
   {
       $this->load->model('booking_model');
       $id = $this->input->post('id_booking');
       $data = $this->package_model->get_booking_by_id($id)->result();
       foreach ($data as $result) {
           $value[] = (float) $result->id_booking;
       }
       echo json_encode($value);
   }




   public function deleteBooking($id = null)
   {
       $this->load->model('booking_model');
       if (!isset($id)) show_404();

       if ($this->booking_model->delete_booking($id)) {
           redirect('Admin/bookingKamar');
       }
   }




   public function bookingKamar()
   {
       $this->_verifyAccess();

       $email = $this->session->userdata('email');
       $id_akses = $this->session->userdata('id_akses');
       $this->load->model("booking_model");
       $data['tittle'] = "Booking Kamar";
       $data['menu'] = 'kamar';
       $data['subMenu'] = 'booking_kamar';
       $data['user'] = $this->User_model->getUserByEmail($email);
       $data['level'] = $this->User_model->getHakAksesById($id_akses);
       $data['booking'] = $this->booking_model->get_view();
       $this->load->view('partial/admin_partial/header_admin.php', $data);
       $this->load->view('partial/admin_partial/sidebar_admin.php', $data);
       $this->load->view('partial/admin_partial/topbar_admin.php', $data);
       $this->load->view('admin/booking_view.php', $data);
       $this->load->view('partial/admin_partial/footer_admin.php', $data);
   }
   

   public function deleteKamar($id = null)
   {
       $this->load->model('dataKamar_model');
       if (!isset($id)) show_404();

       if ($this->dataKamar_model->delete_kamar($id)) {
           redirect('Admin/dataKamar');
       }
   }

   public function dataKamar()
   {
       $this->_verifyAccess();

       $email = $this->session->userdata('email');
       $id_akses = $this->session->userdata('id_akses');
       $this->load->model("dataKamar_model");
       $data['tittle'] = "Data Kamar";
       $data['menu'] = 'kamar';
       $data['subMenu'] = 'data_kamar';
       $data['user'] = $this->User_model->getUserByEmail($email);
       $data['level'] = $this->User_model->getHakAksesById($id_akses);
       $data['dataKamar'] = $this->dataKamar_model->get_view();
       $data['dataTipe'] = $this->dataKamar_model->getTipeKamar()->result_array();
       $data['dataLayanan'] = $this->dataKamar_model->getLayanan()->result_array();
       $this->load->view('partial/admin_partial/header_admin.php', $data);
       $this->load->view('partial/admin_partial/sidebar_admin.php', $data);
       $this->load->view('partial/admin_partial/topbar_admin.php', $data);
       $this->load->view('admin/datakamar_view.php', $data);
       $this->load->view('partial/admin_partial/footer_admin.php', $data);
   }

   public function dataKamarById($id)
   {
       $this->load->model("dataKamar_model");
       echo json_encode($this->dataKamar_model->getKamarById($id));
   }

   public function saveKamar()
   {
       $this->load->model('dataKamar_model');

       if (empty($_POST['idKamar'])) {
           // echo "<pre>";
           // print_r($_FILES);
           // die();

           $config['upload_path'] = './assets/img/';
           $config['allowed_types'] = 'png|jpg';
           $config['max_size'] = '1024';
           $config['encrypt_name'] = TRUE;

           $this->load->library('upload', $config);

           if ($this->upload->do_upload('profil')) {
               $file = $this->upload->data();
               $namagambar = $file['file_name'];
           } else {
               $namagambar = 'none.png';
           }


           $data = [
               'nomor_kamar'       => $_POST['nomorKamar'],
               'id_tipe'           => $_POST['tipe'],
               'luas_kamar'        => $_POST['luas'],
               'lantai_kamar'      => $_POST['lantai'],
               'harga_bulanan'     => $_POST['hargaBulanan'],
               'kapasitas_kamar'   => $_POST['kapasitas'],
               'deskripsi_kamar'   => $_POST['deskripsi'],
               'id_layanan'        => $_POST['layanan'],
               'denda'             => $_POST['denda'],
               'foto_kamar'        => $namagambar
           ];

           $this->dataKamar_model->saveKamar($data);
       } else {
           if (!empty($_FILES['profil']['name'])) {
               $config['upload_path'] = './assets/img/';
               $config['allowed_types'] = 'png|jpg';
               $config['max_size'] = '1024';
               $config['encrypt_name'] = TRUE;

               $this->load->library('upload', $config);

               if ($this->upload->do_upload('profil')) {
                   $file = $this->upload->data();
                   $namagambar = $file['file_name'];
               } else {
                   $namagambar = 'none.png';
               }
           } else {
               $namagambar = $_POST['fotoKamar'];
           }

           $data = [
               'id_kamar'          => $_POST['idKamar'],
               'nomor_kamar'       => $_POST['nomorKamar'],
               'id_tipe'           => $_POST['tipe'],
               'luas_kamar'        => $_POST['luas'],
               'lantai_kamar'      => $_POST['lantai'],
               'harga_bulanan'     => $_POST['hargaBulanan'],
               'kapasitas_kamar'   => $_POST['kapasitas'],
               'deskripsi_kamar'   => $_POST['deskripsi'],
               'id_layanan'        => $_POST['layanan'],
               'denda'             => $_POST['denda'],
               'foto_kamar'        => $namagambar
           ];

           $this->dataKamar_model->saveKamar($data);
       }
       redirect('Admin/dataKamar');
   }

//    public function deleteMenghuni($id = null)
//    {
//        $this->load->model('menghuni_model');
//        if (!isset($id)) show_404();

//        if ($this->menghuni_model->delete_menghuni($id)) {
//            redirect('Admin/menghuni');
//        }
//    }




//    public function menghuni()
//    {
//        $this->_verifyAccess();

//        $email = $this->session->userdata('email');
//        $id_akses = $this->session->userdata('id_akses');
//        $this->load->model("menghuni_model");
//        $data['tittle'] = "Data Menghuni";
//        $data['menu'] = 'kamar';
//        $data['subMenu'] = 'menghuni';
//        $data['user'] = $this->User_model->getUserByEmail($email);
//        $data['level'] = $this->User_model->getHakAksesById($id_akses);
//        $data['menghuni'] = $this->menghuni_model->get_view();
//        $this->load->view('partial/admin_partial/header_admin.php', $data);
//        $this->load->view('partial/admin_partial/sidebar_admin.php', $data);
//        $this->load->view('partial/admin_partial/topbar_admin.php', $data);
//        $this->load->view('admin/menghuni_view.php', $data);
//        $this->load->view('partial/admin_partial/footer_admin.php', $data);
//    }




  // fungsi untuk laba rugi 
     public function labaRugi(){
        $this->_verifyAccess();

        $this->load->model('Laporan_model');
        
        $email = $this->session->userdata('email');
        $id_akses = $this->session->userdata('id_akses');
        
        $data['tittle'] = "Laporan | Laba Rugi";
        $data['menu'] = 'laporan';
        $data['subMenu'] = 'laba_rugi';
        $data['user'] = $this->User_model->getUserByEmail($email);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);
        $data['tahun_pembayaran'] = $this->Laporan_model->getTahunPembayaran();
        
        $this->load->view('partial/admin_partial/header_admin', $data);
        $this->load->view('partial/admin_partial/sidebar_admin', $data);
        $this->load->view('partial/admin_partial/topbar_admin', $data);
        $this->load->view('admin/labarugi_view', $data);
        $this->load->view('partial/admin_partial/footer_admin', $data);
    }
    
    // tagihan/pengeluaran 
    public function laporanpengeluaran(){
        $this->_verifyAccess();
        
        $this->load->model('Laporan_model');
        
        $email = $this->session->userdata('email');
        $id_akses = $this->session->userdata('id_akses');
        
        $data['tittle'] = "Laporan | Pengeluaran";
        $data['menu'] = 'laporan';
        $data['subMenu'] = 'laporan_pengeluaran';
        $data['user'] = $this->User_model->getUserByEmail($email);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);
        $data['tahun_pembayaran'] = $this->Laporan_model->getTahunPembayaran();

        $this->load->view('partial/admin_partial/header_admin', $data);
        $this->load->view('partial/admin_partial/sidebar_admin', $data);
        $this->load->view('partial/admin_partial/topbar_admin', $data);
        $this->load->view('admin/laporan_pengeluaran_view', $data);
        $this->load->view('partial/admin_partial/footer_admin', $data);
    }






    // fungsi untuk menu data layanan
    public function dataLayanan(){
        $this->_verifyAccess();

        $this->load->model('Masterdata_model');

        $email = $this->session->userdata('email');
        $id_akses = $this->session->userdata('id_akses');
        
        $data['tittle'] = "Master | Data Layanan";
        $data['menu'] = 'masterdata';
        $data['subMenu'] = 'data_layanan';
        $data['user'] = $this->User_model->getUserByEmail($email);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);        
        $data['data_layanan'] = $this->Masterdata_model->getAllLayanan();

        $this->load->view('partial/admin_partial/header_admin', $data);
        $this->load->view('partial/admin_partial/sidebar_admin', $data);
        $this->load->view('partial/admin_partial/topbar_admin', $data);
        $this->load->view('admin/datalayanan_view', $data);
        $this->load->view('partial/admin_partial/footer_admin', $data);
    }





    // input data layanan baru
    public function createDataLayanan(){
        $this->_verifyAccess();

        $this->load->model('Masterdata_model');

        $nama_layanan = $this->input->post('inputLayanan');
        $harga_layanan = $this->input->post('inputHarga');

        $data = array(
            'nama_layanan' => $nama_layanan,
            'harga_bulanan' => $harga_layanan
        );

        if($this->Masterdata_model->insertLayanan($data)){
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Data Layanan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/datalayanan');
        } else {
            //flash data jika gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambah Data Layanan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect('admin/datalayanan');
        }
    }



    
    // fungsi untuk menu data jenis pengeluaran
    public function datajenispengeluaran(){
        $this->_verifyAccess();
    
        $this->load->model('Masterdata_model');
    
        $email = $this->session->userdata('email');
        $id_akses = $this->session->userdata('id_akses');
        
        $data['tittle'] = "Master | Data jenis pengeluaran";
        $data['menu'] = 'masterdata';
        $data['subMenu'] = 'data_jenis_pengeluaran';
        $data['user'] = $this->User_model->getUserByEmail($email);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);        
        $data['data_jenis_pengeluaran'] = $this->Masterdata_model->getAllJenisPengeluaran();
    
        $this->load->view('partial/admin_partial/header_admin', $data);
        $this->load->view('partial/admin_partial/sidebar_admin', $data);
        $this->load->view('partial/admin_partial/topbar_admin', $data);
        $this->load->view('admin/datajenispengeluaran_view', $data);
        $this->load->view('partial/admin_partial/footer_admin', $data);
    }

        //Start Data Tipe Kamar

        public function dataTipeKamar()
        {
            $this->_verifyAccess();
    
            $email = $this->session->userdata('email');
            $id_akses = $this->session->userdata('id_akses');
            $this->load->model("dataTipeKamar_model");
            $data['tittle'] = "Data Tipe Kamar";
            $data['menu'] = 'masterdata';
            $data['subMenu'] = 'data_tipe_kamar';
            $data['user'] = $this->User_model->getUserByEmail($email);
            $data['level'] = $this->User_model->getHakAksesById($id_akses);
            $data['tipe'] = $this->dataTipeKamar_model->get_view()->result_array();
    
            $this->load->view('partial/admin_partial/header_admin.php', $data);
            $this->load->view('partial/admin_partial/sidebar_admin.php', $data);
            $this->load->view('partial/admin_partial/topbar_admin.php', $data);
            $this->load->view('admin/datatipekamar_view.php', $data);
            $this->load->view('partial/admin_partial/footer_admin.php', $data);
        }
    
        public function dataTipeKamarById($id)
        {
            $this->load->model("dataTipeKamar_model");
            echo json_encode($this->dataTipeKamar_model->getTipeKamarById($id));
        }
    
        public function saveTipeKamar()
        {
            $this->load->model('dataTipeKamar_model');
    
            if (empty($_POST['idTipe'])) {
                $data = [
                    'nama_tipe'       => $_POST['namaTipe'],
                ];
    
                $this->dataTipeKamar_model->saveTipeKamar($data);
            } else {
    
                $data = [
                    'id_tipe'         => $_POST['idTipe'],
                    'nama_tipe'       => $_POST['namaTipe'],
                ];
    
                $this->dataTipeKamar_model->saveTipeKamar($data);
            }
            redirect('Admin/dataTipeKamar');
        }
    
        public function deleteTipeKamar($id = null)
        {
    
            $this->load->model('dataTipeKamar_model');
            if (!isset($id)) show_404();
    
    
            if ($this->dataTipeKamar_model->delete_TipeKamar($id)) {
                redirect('Admin/dataTipeKamar');
            } else {
                $this->session->set_flashdata('flash', 'Gagal');
                redirect('Admin/dataTipeKamar');
            }
        }
    
        //End Tipe Kamar



    // input data jenis pengeluaran baru
    public function createDataJenisPengeluaran(){
        $this->_verifyAccess();
    
        $this->load->model('Masterdata_model');
    
        $kode_jenis_pengeluaran = $this->input->post('kode_pengeluaran', true);
        $kategori_jenis_pengeluaran = $this->input->post('kategori');
        $nama_jenis_pengeluaran = $this->input->post('nama');
    
        $data = array(
            'kode_pengeluaran' => $kode_jenis_pengeluaran,
            'kategori_pengeluaran' => $kategori_jenis_pengeluaran,
            'nama_pengeluaran' => $nama_jenis_pengeluaran
        );
    
        if($this->Masterdata_model->insertJenisPengeluaran($data)){
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambah Jenis Pengeluaran <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    
            redirect('admin/datajenispengeluaran');
        } else {
            //flash data jika gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambah Jenis Pengeluaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect('admin/datajenispengeluaran');
        }
    }







    // fungsi untuk menjalankan ajax
    public function ajax(){
        $this->_verifyAccess();

        $this->load->model('Masterdata_model');

        $ajax_menu = $this->input->post('ajax_menu');

        // ajax pada menu penghuni
        if($ajax_menu == 'get_penghuni'){
            $id_pengguna = $this->input->post('id_pengguna');
            $data['penghuni'] = $this->User_model->getUserById($id_pengguna);

            $this->load->view('admin/ajax/get_data_penghuni_view', $data);
        } else if ($ajax_menu == 'edit_penghuni') {
            $id_pengguna = $this->input->post('id_pengguna');
            
            $data['penghuni'] = $this->User_model->getUserById($id_pengguna);
            
            $this->load->view('admin/ajax/update_data_penghuni_view', $data);        
        } else if ($ajax_menu == 'edit_datalayanan'){
            $id_layanan = $this->input->post('id_layanan');

            $data['layanan'] = $this->Masterdata_model->getLayananById($id_layanan);
            
            $this->load->view('admin/ajax/update_data_layanan_view', $data);
        } else if ($ajax_menu == 'edit_datajenispengeluaran'){
            $id_jenis_pengeluaran = $this->input->post('id_jenis_pengeluaran', true);
            
            $data['jenis_pengeluaran'] = $this->Masterdata_model->getJenisPengeluaranById($id_jenis_pengeluaran);
                        
            $this->load->view('admin/ajax/update_data_jenispengeluaran_view', $data);
        }


        
        // ajax pada menu lainnya
    }







    // fungsi validasi hak akses
    private function _verifyAccess(){
        $level = $this->session->userdata('id_akses');

        if (!$level) {
            redirect(base_url());
        }

        if($level != 1){
            if($level == 2){
                redirect('user');
                return false;
            } else if ($level == 3){
                redirect('candidate');
                return false;
            }
        }
    }
}