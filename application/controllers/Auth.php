<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    // constructor untuk class auth
    function __construct()
    {
        parent::__construct();
        $this->load->model('Welcome_model');
        $this->load->library('form_validation');
    }

    // main function
    public function index(){
        $this->_verifyAccess();

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if($this->form_validation->run() == false)
        {            
            // menambah data judul page dan mengambil data infokost dar model
            $data['page_tittle'] = "INDIEKOST | Masuk";
            $data['info_kost'] = $this->Welcome_model->getInfoKost();
            
            // load view login
            $this->load->view('partial/auth_partial/header_auth', $data);
            $this->load->view('auth/login_view', $data);
            $this->load->view('partial/auth_partial/footer_auth', $data);

        } else {
            $this->_login();
        }
    }





    // fungsi proses login
    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $userData = $this->db->get_where('pengguna', ['email_pengguna' => $email])->row_array();
        
        // apabila email ada
        if($userData){
            // apabila belum aktifasi
            if($userData['is_active'] == 1){
                // cek password
                if(password_verify($password, $userData['password'])){      
                    $data = [     
                        'id_pengguna' => $userData['id_pengguna'],
                        'email' => $userData['email_pengguna'],
                        'id_akses' => $userData['id_akses']
                    ];                    

                    $this->session->set_userdata($data);

                    $level = $this->session->userdata('id_akses');

                    if( $level == 1){
                        redirect('admin');
                    } else if ( $level == 2) {
                        redirect('user');
                    } else {
                        redirect('candidate');
                    }
                    
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email belum diaktivasi!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email tidak terdaftar!</div>');
            redirect('auth');
        }
    }





    // function register
    public function register(){
        $this->_verifyAccess();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengguna.email_pengguna]', [
            'is_unique' => 'email telah terdaftar'
        ]);

        $this->form_validation->set_rules('telp', 'Telepon', 'required|trim|numeric');

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password minimal 8 karakter!'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if($this->form_validation->run() == false){
            // menambah data judul page dan mengambil data infokost dar model
            $data['page_tittle'] = "INDIEKOST | Daftar";
            $data['info_kost'] = $this->Welcome_model->getInfoKost();
    
            // load view registration
            $this->load->view('partial/auth_partial/header_auth', $data);
            $this->load->view('auth/registration_view', $data);
            $this->load->view('partial/auth_partial/footer_auth', $data);     
        } else {
            $email = htmlspecialchars($this->input->post('email', true));

            $data = [
                'nama_pengguna' => htmlspecialchars($this->input->post('nama', true)),
                'telepon_pengguna' => htmlspecialchars($this->input->post('telp', true)),
                'email_pengguna' => $email,
                'password' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
                'id_akses' => 3,
                'is_active' => 0,
                'time_created' => time()
            ];

            $token = uniqid(true);
        
            $user_token = [
                'email'         => $email,
                'token'         => $token,
                'date_created'  => time()
            ];

            $this->db->insert('pengguna', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun berhasil dibuat. Silahkan <strong>verifikasi</strong> email anda</div>');
            redirect(base_url('login'));
        }
    }






    // fungsi proses send email
    private function _sendEmail($token, $type){
        $config = [
            'protocol'      => 'smtp',
            'smtp_host'     => 'smtp.gmail.com',
            'smtp_user'     => 'indiekostteknotirta@gmail.com',
            'smtp_pass'     => 'indieforever',
            'smtp_port'     => 465,
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'smtp_crypto'   => 'ssl',            
            'crlf'          => "\r\n",
            'newline'       => "\r\n"
        ];        

        $this->load->library('email', $config);
        $this->email->initialize($config); 
        
        $this->email->from('indiekostteknotirta@gmail.com', 'INDIEKOST');
        $this->email->to($this->input->post('email'));

        if($type == 'verify'){
            $message = 'Klik link berikut untuk melakukan aktivasi akun anda <a href="'.base_url("auth/verify").'?email='.$this->input->post('email').'&token='.$token.'">AKTIVASI AKUN</a>';            

            $this->email->subject('Verifikasi Akun INDIEKOST');
            $this->email->message($message);

        } else if ($type == 'forgot'){
            $message = 'Klik link berikut untuk mengatur ulang password akun anda <a href="'.base_url("auth/resetpassword").'?email='.$this->input->post('email').'&token='.$token.'">RESET PASSWORD</a>';            

            $this->email->subject('Reset Password Akun INDIEKOST');
            $this->email->message($message);
        }

        if($this->email->send()){
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }




    public function verify(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('pengguna', ['email_pengguna' => $email])->row_array();

        if($user){            
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if($user_token){
                if(time() - $user_token['date_created'] < 60*60*24){

                    $this->db->set('is_active', 1);
                    $this->db->where('email_pengguna', $email);
                    $this->db->update('pengguna');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'.$email.' telah diaktivasi. '.'<strong>Silahkan Login</strong></div>');
                    redirect('auth');

                } else {
                    $this->db->delete('pengguna', ['email_pengguna' => $email]);
                    
                    $this->db->delete('user_token', ['token' => $token]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Aktivasi akun gagal! <strong>Token kadaluarsa.</strong></div>');
                    redirect('auth');
                }

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Aktivasi akun gagal! <strong>Token tidak valid.</strong></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Aktivasi akun gagal! <strong>Email salah.</strong></div>');
            redirect('auth');
        }
    }



    
    // function forget password
    public function forgotPassword(){
        $this->_verifyAccess();

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');        

        if($this->form_validation->run() == false)
        {       
            // menambah data judul page dan mengambil data infokost dar model
            $data['page_tittle'] = 'INDIEKOST | Lupa Password';
            $data['info_kost'] = $this->Welcome_model->getInfoKost();
            
            // load view forgot password
            $this->load->view('partial/auth_partial/header_auth', $data);
            $this->load->view('auth/forgot_password_view', $data);
            $this->load->view('partial/auth_partial/footer_auth', $data);
        } else {
            $email = $this->input->post('email');

            $user = $this->db->get_where('pengguna', ['email_pengguna' => $email, 'is_active' => 1])->row_array();

            if($user){
                $token = uniqid(true);

                $user_token = [
                    'email'         => $email,
                    'token'         => $token,
                    'date_created'  => time()
                ];

                $this->db->insert('user_token', $user_token);

                $this->_sendEmail($token, 'forgot');

                redirect('password-alert');

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email tidak terdaftar atau belum aktif</div>');
                redirect('password');
            }
        }
    }
    
    // function forget password alert
    public function forgotPasswordAlert(){
        // menambah data judul page dan mengambil data infokost dar model
        $data['page_tittle'] = 'INDIEKOST | Lupa Password';
        $data['info_kost'] = $this->Welcome_model->getInfoKost();
        
        // load view forgot password
        $this->load->view('partial/auth_partial/header_auth', $data);
        $this->load->view('auth/forgot_password_alert_view', $data);
        $this->load->view('partial/auth_partial/footer_auth', $data);
    }
    
    // function new password
    public function changePassword(){
        if(!$this->session->userdata('reset_email')){
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password minimal 8 karakter!'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');    

        if($this->form_validation->run() == false){
            // menambah data judul page dan mengambil data infokost dar model
            $data['page_tittle'] = 'INDIEKOST | Rubah Password';
            $data['info_kost'] = $this->Welcome_model->getInfoKost();        
            
            // load view forgot password
            $this->load->view('partial/auth_partial/header_auth', $data);
            $this->load->view('auth/new_password_view', $data);
            $this->load->view('partial/auth_partial/footer_auth', $data);            
        } else {
            $password = password_hash($this->input->post('password1', true), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email_pengguna', $email);
            $this->db->update('pengguna');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->unset_userdata('reset_email');

                    // menambah data judul page dan mengambil data infokost dar model
            $data['page_tittle'] = 'INDIEKOST | Berhasil Rubah Password';
            $data['info_kost'] = $this->Welcome_model->getInfoKost();
                
            // load view forgot password
            $this->load->view('partial/auth_partial/header_auth', $data);
            $this->load->view('auth/password_success_view', $data);
            $this->load->view('partial/auth_partial/footer_auth', $data);
        }
        
    }
    
    // function reset password
    public function resetPassword(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('pengguna', ['email_pengguna' => $email])->row_array();

        if($user){
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if($user_token){
                $this->session->set_userdata('reset_email', $email);

                redirect('auth/changePassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Gagal mereset password. Token tidak terdaftar.</div>');
                redirect('auth');
            }

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal mereset password. Email tidak terdaftar.</div>');
            redirect('auth');
        }            
    }

    // function logoyut
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_akses');
        $this->session->unset_userdata('id_pengguna');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Anda berhasil logout</div>');
        redirect('auth');
    }

    private function _verifyAccess(){
        $level = $this->session->userdata('id_akses');

        if($level == 1){
            redirect('admin');
            return false;
        } else if ($level == 2){
            redirect('user');
            return false;
        } else if ($level == 3){
            redirect('user');
            return false;
        }
    }
}