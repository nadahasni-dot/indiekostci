<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    // constructor untuk class auth
    function __construct()
    {
        parent::__construct();        
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->helper('auth_helper');
    }





    // main function untuk dasbor
    public function index(){
        $this->_verifyAccess();

        $this->load->model('Pembayaran_model');        

        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_akses = $this->session->userdata('id_akses');
        
        $data['tittle'] = "Dashboard";
        $data['menu'] = 'dashboard';
        $data['subMenu'] = '';
        $data['user'] = $this->User_model->getUserById($id_pengguna);
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

        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_akses = $this->session->userdata('id_akses');
        
        $data['tittle'] = "Penghuni";
        $data['menu'] = 'penghuni';
        $data['subMenu'] = '';
        $data['user'] = $this->User_model->getUserById($id_pengguna);
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

       $id_pengguna = $this->session->userdata('id_pengguna');
       $id_akses = $this->session->userdata('id_akses');
       $this->load->model("booking_model");
       $data['tittle'] = "Booking Kamar";
       $data['menu'] = 'kamar';
       $data['subMenu'] = 'booking_kamar';
       $data['user'] = $this->User_model->getUserById($id_pengguna);
       $data['level'] = $this->User_model->getHakAksesById($id_akses);
       $data['booking'] = $this->booking_model->get_view()->result_array();
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

       $id_pengguna = $this->session->userdata('id_pengguna');
       $id_akses = $this->session->userdata('id_akses');
       $this->load->model("dataKamar_model");
       $data['tittle'] = "Data Kamar";
       $data['menu'] = 'kamar';
       $data['subMenu'] = 'data_kamar';
       $data['user'] = $this->User_model->getUserById($id_pengguna);
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



   public function menghuni()
   {
       verifyAccess('admin');

       $id_pengguna = $this->session->userdata('id_pengguna');
       $id_akses = $this->session->userdata('id_akses');
       $this->load->model("Menghuni_model");
       $data['tittle'] = "Data Menghuni";
       $data['menu'] = 'kamar';
       $data['subMenu'] = 'menghuni';
       $data['user'] = $this->User_model->getUserById($id_pengguna);
       $data['level'] = $this->User_model->getHakAksesById($id_akses);
       $data['menghuni'] = $this->Menghuni_model->getAllMenghuni();
       $data['belum_menghuni'] = $this->Menghuni_model->getBelumMenghuni();
       $data['kamar_tersedia'] = $this->Menghuni_model->getKamarTersedia();
       $this->load->view('partial/admin_partial/header_admin.php', $data);
       $this->load->view('partial/admin_partial/sidebar_admin.php', $data);
       $this->load->view('partial/admin_partial/topbar_admin.php', $data);
       $this->load->view('admin/menghuni_view.php', $data);
       $this->load->view('partial/admin_partial/footer_admin.php', $data);
   }




   // input data layanan baru
   public function createMenghuni(){
    verifyAccess('admin');

    $this->load->model('Menghuni_model');
    $this->load->model('Pembayaran_model');

    $kamar = $this->input->post('kamar');
    $penghuni = $this->input->post('penghuni');
    $tanggal = $this->input->post('tanggal');
    $nominal = $this->input->post('nominal');
    $keterangan = $this->input->post('keterangan');
    $bukti = $this->_uploadImage('bukti_bayar');

    $data_menghuni = array(
        'id_kamar' => $kamar,
        'id_pengguna' => $penghuni,
        'id_pengguna' => $penghuni,
        'tanggal_masuk' => $tanggal
    );

    if($this->Menghuni_model->insertMenghuni($data_menghuni)){
        $data = $this->Menghuni_model->getMenghuniByIdPengguna($penghuni);
        $id_menghuni = $data['id_menghuni'];

        $data_update_status = array(
            'id_akses' => 2
        );
        // update hak akses ke penghuni
        $this->db->where('id_pengguna', $penghuni);
        $this->db->update('pengguna', $data_update_status);

        $data_pembayaran = array(
            'id_menghuni' => $id_menghuni,
            'tanggal_pembayaran' => $tanggal,
            'nilai_pembayaran' => $nominal,
            'bukti_pembayaran' => $bukti,
            'keterangan' => $keterangan,
            'id_status' => 1,
        );

        if($this->Pembayaran_model->inputPembayaran($data_pembayaran)){
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mendaftarkan Penghuni ke Kamar dan input pembayaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    
            redirect('admin/menghuni');
        }else{
            //flash data jika gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambah Data Menghuni<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect('admin/menghuni');
        }
    } else {
        //flash data jika gagal
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambah Data Menghuni<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        
        redirect('admin/menghuni');
    }
}




  // fungsi untuk laba rugi 
     public function labaRugi(){
        $this->_verifyAccess();

        $this->load->model('Laporan_model');
        
        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_akses = $this->session->userdata('id_akses');
        
        $data['tittle'] = "Laporan | Laba Rugi";
        $data['menu'] = 'laporan';
        $data['subMenu'] = 'laba_rugi';
        $data['user'] = $this->User_model->getUserById($id_pengguna);
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
        
        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_akses = $this->session->userdata('id_akses');
        
        $data['tittle'] = "Laporan | Pengeluaran";
        $data['menu'] = 'laporan';
        $data['subMenu'] = 'laporan_pengeluaran';
        $data['user'] = $this->User_model->getUserById($id_pengguna);
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

        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_akses = $this->session->userdata('id_akses');
        
        $data['tittle'] = "Master | Data Layanan";
        $data['menu'] = 'masterdata';
        $data['subMenu'] = 'data_layanan';
        $data['user'] = $this->User_model->getUserById($id_pengguna);
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
    
        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_akses = $this->session->userdata('id_akses');
        
        $data['tittle'] = "Master | Data jenis pengeluaran";
        $data['menu'] = 'masterdata';
        $data['subMenu'] = 'data_jenis_pengeluaran';
        $data['user'] = $this->User_model->getUserById($id_pengguna);
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
    
            $id_pengguna = $this->session->userdata('id_pengguna');
            $id_akses = $this->session->userdata('id_akses');
            $this->load->model("dataTipeKamar_model");
            $data['tittle'] = "Data Tipe Kamar";
            $data['menu'] = 'masterdata';
            $data['subMenu'] = 'data_tipe_kamar';
            $data['user'] = $this->User_model->getUserById($id_pengguna);
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

            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambah Data Tipe Kamar <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');            
            redirect('Admin/dataTipeKamar');
        }
    
        public function deleteTipeKamar($id = null)
        {
    
            $this->load->model('dataTipeKamar_model');
            if (!isset($id)) show_404();
    
    
            if ($this->dataTipeKamar_model->delete_TipeKamar($id)) {
                //flash data jika berhasil
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus Data Tipe Kamar <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Admin/dataTipeKamar');
            } else {
                //flash data jika gagal
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Tipe Kamar sedang digunakan. Tidak dapat menghapus data<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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




        // fungsi untuk menu pemasukan
        public function pemasukan(){
            $this->_verifyAccess();
    
            $this->load->model('Pembayaran_model');
    
            $id_pengguna = $this->session->userdata('id_pengguna');
            $id_akses = $this->session->userdata('id_akses');
            
            $data['tittle'] = "Pemasukan";
            $data['menu'] = 'pembayaran';
            $data['subMenu'] = 'pemasukan';
            $data['user'] = $this->User_model->getUserById($id_pengguna);
            $data['level'] = $this->User_model->getHakAksesById($id_akses);
            $data['pembayaran'] = $this->Pembayaran_model->getAllIncome();
            $data['menghuni'] = $this->Pembayaran_model->getAllMenghuni();
            $data['jenis_status'] = $this->Pembayaran_model->getAllJenisStatusPembayaran();
    
            $this->load->view('partial/admin_partial/header_admin.php', $data);
            $this->load->view('partial/admin_partial/sidebar_admin.php', $data);
            $this->load->view('partial/admin_partial/topbar_admin.php', $data);
            $this->load->view('admin/pemasukan_view', $data);
            $this->load->view('partial/admin_partial/footer_admin.php', $data);    
        }



        // fungsi untuk menambah pemasukan/pembayaran baru
    public function createPembayaran(){
        $this->_verifyAccess();

        $this->load->model('Pembayaran_model');

        $data = array(
            'id_menghuni'           => $this->input->post('menghuni'),
            'tanggal_pembayaran'    => $this->input->post('tanggal'),
            'nilai_pembayaran'      => $this->input->post('nominal'),
            'bukti_pembayaran'      => $this->_uploadImage('bukti_pembayaran'),
            'keterangan'            => $this->input->post('keterangan'),
            'id_status'             => $this->input->post('status')
        );
        

        if($this->Pembayaran_model->inputPembayaran($data)){
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Data Pembayaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/pemasukan');
        }else{
            //flash data jika gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambah Data Pembayaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/pemasukan');
        }
    }






    // fungsi untuk menu pengeluaran
    public function pengeluaran(){
        $this->_verifyAccess();

        $this->load->model('Pengeluaran_model');

        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_akses = $this->session->userdata('id_akses');
        
        $data['tittle'] = "Pengeluaran";
        $data['menu'] = 'pembayaran';
        $data['subMenu'] = 'pengeluaran';
        $data['user'] = $this->User_model->getUserById($id_pengguna);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);
        $data['pengeluaran'] = $this->Pengeluaran_model->getAllPengeluaran();
        $data['jenis_pengeluaran'] = $this->Pengeluaran_model->getAllJenisPengeluaran();

        $this->load->view('partial/admin_partial/header_admin.php', $data);
        $this->load->view('partial/admin_partial/sidebar_admin.php', $data);
        $this->load->view('partial/admin_partial/topbar_admin.php', $data);
        $this->load->view('admin/pengeluaran_view.php', $data);
        $this->load->view('partial/admin_partial/footer_admin.php', $data);    
    }






    // fungsi untuk menambah pengeluaran baru
    public function createPengeluaran(){
        $this->_verifyAccess();

        $this->load->model('Pengeluaran_model');

        $data = array(
            'id_jenis_pengeluaran'  => $this->input->post('jenis'),
            'tanggal_pengeluaran'   => $this->input->post('tanggal'),
            'nilai_pengeluaran'     => $this->input->post('nominal'),
            'keterangan'            => $this->input->post('keterangan'),
            'bukti_pengeluaran'     => $this->_uploadImage('bukti_pembayaran'),
            'id_pengguna'           => $this->session->userdata('id_pengguna')
        );

        if($this->Pengeluaran_model->inputPengeluaran($data)){
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Data Pengeluaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/pengeluaran');
        }else{
            //flash data jika gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambah Data Pengeluaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/pengeluaran');
        }
    }



        // menu settings profil
        public function settingsProfil(){
            $this->_verifyAccess();
    
            $id_pengguna = $this->session->userdata('id_pengguna');
            $id_akses = $this->session->userdata('id_akses');
    
            $this->load->model('Settings_model');
    
            $data['title'] = "Pengeluaran";
            $data['menu'] = 'profil';        
            $data['user'] = $this->User_model->getUserById($id_pengguna);
            $data['level'] = $this->User_model->getHakAksesById($id_akses);        
            
            $this->load->view('partial/admin_partial/admin_settings/header_settings_admin', $data);
            $this->load->view('partial/admin_partial/admin_settings/sidebar_settings_admin', $data);
            $this->load->view('partial/admin_partial/admin_settings/topbar_settings_admin', $data);
            $this->load->view('admin/settings_profil_view', $data);
            $this->load->view('partial/admin_partial/admin_settings/footer_settings_admin', $data);   
        }
    
    
    
        // menu settings informasi kost
        public function settingsInfoKost(){
            $this->_verifyAccess();
    
            $id_pengguna = $this->session->userdata('id_pengguna');
            $id_akses = $this->session->userdata('id_akses');
    
            $this->load->model('Welcome_model');
    
            $data['title'] = "Informasi Kost";
            $data['menu'] = 'info_kost';        
            $data['user'] = $this->User_model->getUserById($id_pengguna);
            $data['level'] = $this->User_model->getHakAksesById($id_akses);
            $data['info_kost'] = $this->Welcome_model->getInfoKost();        
            
            $this->load->view('partial/admin_partial/admin_settings/header_settings_admin', $data);
            $this->load->view('partial/admin_partial/admin_settings/sidebar_settings_admin', $data);
            $this->load->view('partial/admin_partial/admin_settings/topbar_settings_admin', $data);
            $this->load->view('admin/settings_infokost_view', $data);
            $this->load->view('partial/admin_partial/admin_settings/footer_settings_admin', $data);   
        }
    
    
    
    
        // menu settings informasi kost
        public function settingsPassword(){
            $this->_verifyAccess();            
    
            $id_pengguna = $this->session->userdata('id_pengguna');
            $id_akses = $this->session->userdata('id_akses');
    
            $this->load->model('Settings_model');
    
            $this->form_validation->set_rules('id', 'id', 'required|trim');  
            $this->form_validation->set_rules('pass_lama', 'pass_lama', 'required|trim');  
            $this->form_validation->set_rules('pass_baru', 'pass_baru', 'required|trim|min_length[8]|matches[pass_baru_verifikasi]', [
                'matches' => 'Password tidak sama!',
                'min_length' => 'Password minimal 8 karakter!'
            ]);
            $this->form_validation->set_rules('pass_baru_verifikasi', 'pass_baru_verifikasi', 'required|trim|matches[pass_baru]');  
                
            $data['title'] = "Rubah Password";
            $data['menu'] = 'rubah_pass';        
            $data['user'] = $this->User_model->getUserById($id_pengguna);
            $data['level'] = $this->User_model->getHakAksesById($id_akses);

            if($this->form_validation->run() == false){

                $this->load->view('partial/admin_partial/admin_settings/header_settings_admin', $data);
                $this->load->view('partial/admin_partial/admin_settings/sidebar_settings_admin', $data);
                $this->load->view('partial/admin_partial/admin_settings/topbar_settings_admin', $data);
                $this->load->view('admin/settings_password_view', $data);
                $this->load->view('partial/admin_partial/admin_settings/footer_settings_admin', $data);   
            } else {                
                $password_lama = $this->input->post('pass_lama', true);
                $password_baru = $this->input->post('pass_baru', true);

                // cek apakah password lama telah sesuai
                if(password_verify($password_lama, $data['user']['password'])){
                    $password = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password);
                    $this->db->where('id_pengguna', $data['user']['id_pengguna']);
                    // jika berhasil update
                    if($this->db->update('pengguna')){
                        //flash data berhasil
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil merubah password. Silahkan login kembali<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                        redirect('admin/settingspassword');
                    } else {
                        //flash data jika gagal
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal merubah password<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                        redirect('admin/settingspassword');
                    }
                } else {
                    //flash data jika gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama anda salah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    redirect('admin/settingspassword');
                }
            }
            
        }


    private function _uploadImage($name){
        // konfigurasi
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']         = TRUE; //Enkripsi nama yang terupload
        $config['overwrite']			= TRUE;
        $config['max_size']             = 2048; // 1MB
        $config['file_ext_tolower']     = TRUE;
        
        $this->load->library('upload', $config);        
        
        // bila berhasil
        if ($this->upload->do_upload($name)) {            
            // ambil nama file foto
            return $this->upload->data("file_name");
        }else{
            return "";
        }
    }

    



    // fungsi untuk menjalankan ajax
    public function ajax(){
        verifyAccess('admin');

        $this->load->model('Masterdata_model');
        $this->load->model('Pembayaran_model');
        $this->load->model('Pengeluaran_model');
        $this->load->model('Menghuni_model');

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
        } else if($ajax_menu == 'edit_datatipekamar'){
            $id_tipe_kamar = $this->input->post('id_tipe', true);
            
            $data['tipe_kamar'] = $this->Masterdata_model->getTipeKamarById($id_tipe_kamar);
                        
            $this->load->view('admin/ajax/update_data_tipekamar_view', $data);
        } else if ($ajax_menu == 'edit_profil'){
            $id_pengguna = $this->input->post('id_pengguna');
            
            $data['penghuni'] = $this->User_model->getUserById($id_pengguna);
            $this->load->view('admin/ajax/update_data_profil_view', $data);    
        } else if ($ajax_menu == 'edit_info_kost'){
            $id_kost = $this->input->post('id_kost');
            $id_pengguna = $this->session->userdata('id_pengguna');

            $this->load->model('Settings_model');

            $data['user'] = $this->User_model->getUserById($id_pengguna);

            $data['info_kost'] = $this->Settings_model->getInfoKostById($id_kost);
            $this->load->view('admin/ajax/update_data_infokost_view', $data);    
        } else if ($ajax_menu == 'get_pembayaran'){         
            // ajax pada menu pemasukan   
            $id_pembayaran = $this->input->post('id_pembayaran');            
                
            $data['pembayaran'] = $this->Pembayaran_model->getIncomeById($id_pembayaran);            
            
            $this->load->view('admin/ajax/get_data_pembayaran_view', $data);
        } else if ($ajax_menu == 'edit_pembayaran') {
            $id_pembayaran = $this->input->post('id_pembayaran');            
            
            $data['pembayaran'] = $this->Pembayaran_model->getIncomeById($id_pembayaran);
            $data['menghuni'] = $this->Pembayaran_model->getAllMenghuni();
            $data['jenis_status'] = $this->Pembayaran_model->getAllJenisStatusPembayaran();
            
            $this->load->view('admin/ajax/update_data_pembayaran_view', $data);        
        } else if($ajax_menu == 'get_pengeluaran'){            
            // ajax pada menu pengeluaran
            $id_pengeluaran = $this->input->post('id_pengeluaran');

            $data['pengeluaran'] = $this->Pengeluaran_model->getPengeluaranById($id_pengeluaran);

            $this->load->view('admin/ajax/get_data_pengeluaran_view', $data);
        } else if ($ajax_menu == 'edit_pengeluaran') {
            $id_pengeluaran = $this->input->post('id_pengeluaran');
            
            $data['pengeluaran'] = $this->Pengeluaran_model->getPengeluaranById($id_pengeluaran);
            $data['jenis_pengeluaran'] = $this->Pengeluaran_model->getAllJenisPengeluaran();
            
            $this->load->view('admin/ajax/update_data_pengeluaran_view', $data);        
        } else if ($ajax_menu == 'get_menghuni') {
            // ajax menu menghuni
            $id_menghuni = $this->input->post('id_menghuni');

            $data['menghuni'] = $this->Menghuni_model->getMenghuniById($id_menghuni);

            $this->load->view('admin/ajax/get_data_menghuni_view', $data);
        } else if ($ajax_menu == 'edit_menghuni') {
            $id_menghuni = $this->input->post('id_menghuni');            

            $data['menghuni'] = $this->Menghuni_model->getMenghuniById($id_menghuni);
            $data['kamar_tersedia'] = $this->Menghuni_model->getKamarTersedia();
            $data['belum_menghuni'] = $this->Menghuni_model->getBelumMenghuni();

            $this->load->view('admin/ajax/update_data_menghuni_view', $data);
        } else if ($ajax_menu == 'get_booking') {
            $id_booking = $this->input->post('id_booking');

            $this->load->model('Booking_model');

            $data['booking'] = $this->Booking_model->get_booking_by_id($id_booking)->row_array();
            
            $this->load->view('admin/ajax/get_booking_view', $data);
        } else if ($ajax_menu == 'update_booking') {
            $id_booking = $this->input->post('id_booking');

            $this->load->model('Booking_model');

            $data['booking'] = $this->Booking_model->get_booking_by_id($id_booking)->row_array();
            
            $this->load->view('admin/ajax/update_booking_view', $data);
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