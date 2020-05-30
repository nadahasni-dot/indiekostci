<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends CI_Controller {

    // constructor untuk class auth
    function __construct()
    {
        parent::__construct();        
        $this->load->library('form_validation');
        $this->load->model('Candidate_model');
        $this->load->model('User_model');
        $this->load->helper('auth_helper');
        verifyAccess('candidate');
    }




    // method untuk dashboard
    public function index(){
        verifyAccess('candidate');

        $email = $this->session->userdata('email');
        $id_akses = $this->session->userdata('id_akses');

        $data['tittle'] = "Dashboard";
        $data['menu'] = 'dashboard';        
        $data['user'] = $this->User_model->getUserByEmail($email);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);

        $this->load->view('partial/candidate_partial/header_candidate.php', $data);
        $this->load->view('partial/candidate_partial/sidebar_candidate.php', $data);
        $this->load->view('partial/candidate_partial/topbar_candidate.php', $data);
        $this->load->view('candidate/dashboard_view.php', $data);
        $this->load->view('partial/candidate_partial/footer_candidate.php', $data);  
    }

    // method untuk booking
    public function booking(){
        verifyAccess('candidate');

        $email = $this->session->userdata('email');
        $id_akses = $this->session->userdata('id_akses');

        $data['tittle'] = "Booking Kamar";
        $data['menu'] = 'booking';        
        $data['user'] = $this->User_model->getUserByEmail($email);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);

        $this->load->view('partial/candidate_partial/header_candidate.php', $data);
        $this->load->view('partial/candidate_partial/sidebar_candidate.php', $data);
        $this->load->view('partial/candidate_partial/topbar_candidate.php', $data);
        
        $this->load->view('partial/candidate_partial/footer_candidate.php', $data);  
    }



    // method untuk setting profil
    public function settingsProfil(){
        verifyAccess('candidate');

        $email = $this->session->userdata('email');
        $id_akses = $this->session->userdata('id_akses');

        $data['tittle'] = "Profil";
        $data['menu'] = 'settings_profil';        
        $data['user'] = $this->User_model->getUserByEmail($email);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);

        $this->load->view('partial/candidate_partial/header_candidate.php', $data);
        $this->load->view('partial/candidate_partial/sidebar_settings_candidate.php', $data);
        $this->load->view('partial/candidate_partial/topbar_candidate.php', $data);
        $this->load->view('candidate/settings_profil_view', $data);
        $this->load->view('partial/candidate_partial/footer_candidate.php', $data);  
    }




    // method untuk setting profil
    public function settingsPassword(){
        verifyAccess('candidate');        

        $email = $this->session->userdata('email');
        $id_akses = $this->session->userdata('id_akses');

        $this->load->model('Settings_model');

        $this->form_validation->set_rules('id', 'id', 'required|trim');  
        $this->form_validation->set_rules('pass_lama', 'pass_lama', 'required|trim');  
        $this->form_validation->set_rules('pass_baru', 'pass_baru', 'required|trim|min_length[8]|matches[pass_baru_verifikasi]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password minimal 8 karakter!'
        ]);
        $this->form_validation->set_rules('pass_baru_verifikasi', 'pass_baru_verifikasi', 'required|trim|matches[pass_baru]');  
            
        $data['tittle'] = "Rubah Password";
        $data['menu'] = 'settings_password';        
        $data['user'] = $this->User_model->getUserByEmail($email);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);

        if($this->form_validation->run() == false){
            $this->load->view('partial/candidate_partial/header_candidate.php', $data);
            $this->load->view('partial/candidate_partial/sidebar_settings_candidate.php', $data);
            $this->load->view('partial/candidate_partial/topbar_candidate.php', $data);
            $this->load->view('candidate/settings_password_view', $data);  
            $this->load->view('partial/candidate_partial/footer_candidate.php', $data);  
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

                    redirect('candidate/settingspassword');
                } else {
                    //flash data jika gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal merubah password<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    redirect('candidate/settingspassword');
                }
            } else {
                //flash data jika gagal
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama anda salah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                redirect('candidate/settingspassword');
            }
        }
    }





    // untuk fungsi ajax
    public function ajax(){
        verifyAccess('candidate');

        $ajax_menu = $this->input->post('ajax_menu');

        if ($ajax_menu == 'settings_profil') {
            $id_pengguna = $this->input->post('id_pengguna');            

            $data['user'] = $this->User_model->getUserById($id_pengguna);

            $this->load->view('user/ajax/update_profil_settings', $data);
        }
    }
}