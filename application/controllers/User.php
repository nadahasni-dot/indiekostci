<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    // constructor untuk class auth
    function __construct()
    {
        parent::__construct();        
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->helper('auth_helper');
    }




    // method untuk dashboard
    public function index(){
        verifyAccess('user');

        $email = $this->session->userdata('email');
        $id_akses = $this->session->userdata('id_akses');

        $data['tittle'] = "Dashboard";
        $data['menu'] = 'dashboard';        
        $data['user'] = $this->User_model->getUserByEmail($email);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);

        $this->load->view('partial/user_partial/header_user.php', $data);
        $this->load->view('partial/user_partial/sidebar_user.php', $data);
        $this->load->view('partial/user_partial/topbar_user.php', $data);
        
        $this->load->view('partial/user_partial/footer_user.php', $data);  
    }
    
    
    
    
    // method untuk kamar
    public function kamar(){
        verifyAccess('user');

        $email = $this->session->userdata('email');
        $id_akses = $this->session->userdata('id_akses');

        $data['tittle'] = "Kamar Saya";
        $data['menu'] = 'kamar';        
        $data['user'] = $this->User_model->getUserByEmail($email);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);

        $this->load->view('partial/user_partial/header_user.php', $data);
        $this->load->view('partial/user_partial/sidebar_user.php', $data);
        $this->load->view('partial/user_partial/topbar_user.php', $data);
        
        $this->load->view('partial/user_partial/footer_user.php', $data);  
    }
    
    
    
    

    // method untuk Pembayaran
    public function pembayaran(){
        verifyAccess('user');

        $email = $this->session->userdata('email');
        $id_akses = $this->session->userdata('id_akses');

        $data['tittle'] = "Pembayaran";
        $data['menu'] = 'pembayaran';        
        $data['user'] = $this->User_model->getUserByEmail($email);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);

        $this->load->view('partial/user_partial/header_user.php', $data);
        $this->load->view('partial/user_partial/sidebar_user.php', $data);
        $this->load->view('partial/user_partial/topbar_user.php', $data);
        
        $this->load->view('partial/user_partial/footer_user.php', $data);  
    }
    
    
    
    
    
    
    // method untuk settings profil
    public function settingsProfil(){
        verifyAccess('user');

        $email = $this->session->userdata('email');
        $id_akses = $this->session->userdata('id_akses');

        $data['tittle'] = "Profil Saya";
        $data['menu'] = 'settings_profil';        
        $data['user'] = $this->User_model->getUserByEmail($email);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);

        $this->load->view('partial/user_partial/header_user.php', $data);
        $this->load->view('partial/user_partial/sidebar_settings_user', $data);
        $this->load->view('partial/user_partial/topbar_user.php', $data);
        
        $this->load->view('partial/user_partial/footer_user.php', $data);  
    }
    
    
    
    
    
    // method untuk rubah password
    public function settingsPassword(){
        verifyAccess('user');

        $email = $this->session->userdata('email');
        $id_akses = $this->session->userdata('id_akses');

        $data['tittle'] = "Rubah Password";
        $data['menu'] = 'settings_password';        
        $data['user'] = $this->User_model->getUserByEmail($email);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);

        $this->load->view('partial/user_partial/header_user.php', $data);
        $this->load->view('partial/user_partial/sidebar_settings_user.php', $data);
        $this->load->view('partial/user_partial/topbar_user.php', $data);
        
        $this->load->view('partial/user_partial/footer_user.php', $data);  
    }
    
}