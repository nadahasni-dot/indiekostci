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
    public function bookingKamar(){
        $this->_verifyAccess();

        
    }








    // fungsi untuk menjalankan ajax
    public function ajax(){
        $this->_verifyAccess();

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