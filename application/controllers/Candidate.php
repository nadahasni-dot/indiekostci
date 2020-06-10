<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends CI_Controller {

    // constructor untuk class auth
    function __construct()
    {
        parent::__construct();        
        $this->load->library('form_validation');        
        $this->load->model('User_model');
        $this->load->helper('auth_helper');
        verifyAccess('candidate');
    }




    // method untuk dashboard
    public function index(){
        verifyAccess('candidate');

        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_akses = $this->session->userdata('id_akses');

        $data['tittle'] = "Dashboard";
        $data['menu'] = 'dashboard';        
        $data['user'] = $this->User_model->getUserById($id_pengguna);
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

        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_akses = $this->session->userdata('id_akses');

        $this->load->model('Booking_model');

        $data['tittle'] = "Booking Kamar";
        $data['menu'] = 'booking';        
        $data['user'] = $this->User_model->getUserById($id_pengguna);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);
        $data['booking'] = $this->Booking_model->getBookingByIdUser($data['user']['id_pengguna']);
        $data['pembayaran_booking'] = $this->Booking_model->getPembayaranBookingByUser($data['user']['id_pengguna']);
        $data['kamar_tersedia'] = $this->Booking_model->getKamarTersedia();

        $this->load->view('partial/candidate_partial/header_candidate.php', $data);
        $this->load->view('partial/candidate_partial/sidebar_candidate.php', $data);
        $this->load->view('partial/candidate_partial/topbar_candidate.php', $data);
        $this->load->view('candidate/booking_view', $data);
        $this->load->view('partial/candidate_partial/footer_candidate.php', $data);  
    }





    public function createBooking(){
        verifyAccess('candidate');

        $id_pengguna = $this->session->userdata('id_pengguna');        
        $user = $this->User_model->getUserById($id_pengguna);

        $id_pengguna = $user['id_pengguna'];
        $id_kamar = $this->input->post('id_kamar', true);
        $nominal = $this->input->post('nominal', true);
        $buktiBooking = $this->_uploadImage('bukti_booking');

        if(!$buktiBooking){
            //flash data jika bukti booking tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal melakukan booking. Harap upload bukti booking yang valid<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('candidate/booking');
        }

        $query = "INSERT INTO booking (id_booking, id_kamar, id_pengguna, tanggal_booking ,nilai_booking, bukti_booking, status_booking) VALUES ('','$id_kamar','$id_pengguna',CURRENT_DATE(),'$nominal','$buktiBooking','belum dikonfirmasi')";

        if ($this->db->query($query)) {
            //flash data jika berhasil booking
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil melakukan booking. Harap menunggu konfirmasi dari admin.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('candidate/booking');
        } else {
            //flash data jika gagal booking
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal melakukan booking. Harap hubungi admin.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('candidate/booking');
        }
    }



    // method untuk setting profil
    public function settingsProfil(){
        verifyAccess('candidate');

        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_akses = $this->session->userdata('id_akses');

        $data['tittle'] = "Profil";
        $data['menu'] = 'settings_profil';        
        $data['user'] = $this->User_model->getUserById($id_pengguna);
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
            
        $data['tittle'] = "Rubah Password";
        $data['menu'] = 'settings_password';        
        $data['user'] = $this->User_model->getUserById($id_pengguna);
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


    // untuk fungsi ajax
    public function ajax(){
        verifyAccess('candidate');

        $ajax_menu = $this->input->post('ajax_menu');

        if ($ajax_menu == 'settings_profil') {
            $id_pengguna = $this->input->post('id_pengguna');            
            
            $data['user'] = $this->User_model->getUserById($id_pengguna);
            
            $this->load->view('user/ajax/update_profil_settings', $data);
        } else if ($ajax_menu == 'get_kamar') {
            $id_kamar = $this->input->post('id_kamar');    
            
            $this->load->model('Kamar_model');

            $data['kamar'] = $this->Kamar_model->getKamarById($id_kamar);
                        
            $this->load->view('candidate/ajax/get_kamar', $data);
        } else if ($ajax_menu == 'booking_kamar') {
            $id_kamar = $this->input->post('id_kamar');
            $id_pengguna = $this->session->userdata('id_pengguna');

            $this->load->model('Kamar_model');

            $data['user'] = $this->User_model->getUserById($id_pengguna);
            $data['kamar'] = $this->Kamar_model->getKamarById($id_kamar);

            $this->load->view('candidate/ajax/booking_kamar', $data);
        }
    }
}