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
        verifyAccess('user');
    }




    // method untuk dashboard
    public function index(){
        verifyAccess('user');

        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_akses = $this->session->userdata('id_akses');

        $data['tittle'] = "Dashboard";
        $data['menu'] = 'dashboard';
        $data['user'] = $this->User_model->getUserById($id_pengguna);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);

        $this->load->view('partial/user_partial/header_user.php', $data);
        $this->load->view('partial/user_partial/sidebar_user.php', $data);
        $this->load->view('partial/user_partial/topbar_user.php', $data);
        $this->load->view('user/dashboard_view.php', $data);
        $this->load->view('partial/user_partial/footer_user.php', $data);  
    }
    
    
    
    
    // method untuk kamar
    public function kamar(){
        verifyAccess('user');

        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_akses = $this->session->userdata('id_akses');

        $this->load->model('Kamar_model');

        $data['tittle'] = "Kamar Saya";
        $data['menu'] = 'kamar';        
        $data['user'] = $this->User_model->getUserById($id_pengguna);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);
        $data['kamar'] = $this->Kamar_model->getKamar($data['user']['id_pengguna']);

        $this->load->view('partial/user_partial/header_user.php', $data);
        $this->load->view('partial/user_partial/sidebar_user.php', $data);
        $this->load->view('partial/user_partial/topbar_user.php', $data);
        $this->load->view('user/kamar_view', $data);
        $this->load->view('partial/user_partial/footer_user.php', $data);  
    }
    
    
    
    

    // method untuk Pembayaran
    public function pembayaran(){
        verifyAccess('user');

        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_akses = $this->session->userdata('id_akses');

        $this->load->model('Pembayaran_model');

        $data['tittle'] = "Pembayaran";
        $data['menu'] = 'pembayaran';        
        $data['user'] = $this->User_model->getUserById($id_pengguna);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);
        $data['pembayaran'] = $this->Pembayaran_model->getPembayaranUser($data['user']['id_pengguna']);        
        $data['harga_kamar'] = $this->Pembayaran_model->getHargaKamarUser($data['user']['id_pengguna']);
        $data['waktu_pembayaran'] = $this->Pembayaran_model->getBulanTahunPembayaran();

        $waktu = $data['waktu_pembayaran'];
        $data['batas_pembayaran'] = $this->Pembayaran_model->getBatasPembayaran($waktu['tahun'], $waktu['bulan']);

        $this->load->view('partial/user_partial/header_user.php', $data);
        $this->load->view('partial/user_partial/sidebar_user.php', $data);
        $this->load->view('partial/user_partial/topbar_user.php', $data);
        $this->load->view('user/pembayaran_view', $data);
        $this->load->view('partial/user_partial/footer_user.php', $data);  
    }




    public function createPembayaran() {
        $bukti_pembayaran = $this->_uploadImage('bukti_pembayaran');

        if ($bukti_pembayaran == '' || $bukti_pembayaran == null) {
            //flash data gambar tidak sesuai
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal melakukan pembayaran. Pastikan ukuran bukti pembayaran tidak lebih dari 2MB. Format gambar yang didukung .gif .jpg .jpeg .png<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('user/pembayaran');
        }

        $data = array(
            'id_menghuni' => $this->input->post('id_menghuni'),
            'tanggal_pembayaran' => $this->input->post('tanggal'),
            'nilai_pembayaran' => $this->input->post('nominal'),
            'keterangan' => $this->input->post('keterangan'),
            'bukti_pembayaran' => $bukti_pembayaran,
            'id_status' => 2
        );

        if ($this->db->insert('pembayaran', $data)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil melakukan pembayaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('user/pembayaran');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal melakukan pembayaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('user/pembayaran');
        }
    }
    
    
    
    
    
    
    // method untuk settings profil
    public function settingsProfil(){
        verifyAccess('user');

        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_akses = $this->session->userdata('id_akses');

        $data['tittle'] = "Profil Saya";
        $data['menu'] = 'settings_profil';        
        $data['user'] = $this->User_model->getUserById($id_pengguna);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);

        $this->load->view('partial/user_partial/header_user.php', $data);
        $this->load->view('partial/user_partial/sidebar_settings_user', $data);
        $this->load->view('partial/user_partial/topbar_user.php', $data);
        $this->load->view('user/settings_profil_view.php', $data);
        $this->load->view('partial/user_partial/footer_user.php', $data);  
    }
    
    
    
    
    
    // method untuk rubah password
    public function settingsPassword(){
        verifyAccess('user');

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
            $this->load->view('partial/user_partial/header_user.php', $data);
            $this->load->view('partial/user_partial/sidebar_settings_user.php', $data);
            $this->load->view('partial/user_partial/topbar_user.php', $data);
            $this->load->view('user/settings_password_view', $data);            
            $this->load->view('partial/user_partial/footer_user.php', $data);  
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

                    redirect('user/settingspassword');
                } else {
                    //flash data jika gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal merubah password<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    redirect('user/settingspassword');
                }
            } else {
                //flash data jika gagal
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama anda salah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                redirect('user/settingspassword');
            }
        }
    }


    private function _uploadImage($name){
        // konfigurasi
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['encrypt_name']         = TRUE; //Enkripsi nama yang terupload
        $config['overwrite']			= TRUE;
        $config['max_size']             = 2048; // 2MB
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


    public function buktiPembayaran($id){
        verifyAccess('user');

        $id_pengguna = $this->session->userdata('id_pengguna');
        $id_akses = $this->session->userdata('id_akses');

        $this->load->model('Laporan_model');

        $data['tittle'] = "Profil Saya";        
        $data['user'] = $this->User_model->getUserById($id_pengguna);
        $data['level'] = $this->User_model->getHakAksesById($id_akses);
        $data['pembayaran'] = $this->Laporan_model->getPembayaranById($id);
        $data['kost'] = $this->Laporan_model->getInfoKost();
        $data['pemilik'] = $this->Laporan_model->getPemilikKost();

        $this->load->view('user/bukti_pembayaran_view', $data);
    }




    // untuk fungsi ajax
    public function ajax(){
        verifyAccess('user');

        $ajax_menu = $this->input->post('ajax_menu');

        if ($ajax_menu == 'settings_profil') {
            $id_pengguna = $this->input->post('id_pengguna');            

            $data['user'] = $this->User_model->getUserById($id_pengguna);

            $this->load->view('user/ajax/update_profil_settings', $data);
        }
    }
}