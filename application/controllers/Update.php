<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {

    // constructor untuk class auth
    function __construct()
    {
        parent::__construct();        

        // mengecek apakah ada session
        $level = $this->session->userdata('id_akses');

        if (!$level) {
            redirect(base_url());
        }                 
    }










    // fungsi untuk update data penghuni
    public function updatePenghuni(){
        $this->_verifyAccess('admin');

        $id_pengguna = $this->input->post('id_pengguna');
        $fotoProfil = $this->_uploadImage();

        // apabila foto profil tidak terpilih maka digunakan foto lama
        if($fotoProfil == ""){
            $fotoProfil = $this->input->post('foto_lama');
        }

        $data = array(
            'nama_pengguna' => $this->input->post('nama'),
            'alamat_pengguna' => $this->input->post('alamat'),
            'provinsi_pengguna' => $this->input->post('provinsi'),
            'kota_pengguna' => $this->input->post('kota'),
            'telepon_pengguna' => $this->input->post('telepon'),
            'email_pengguna' => $this->input->post('email'),
            'kelamin_pengguna' => $this->input->post('jKelamin'),
            'tanggal_lahir_pengguna' => $this->input->post('tgl'),
            'no_ktp_pengguna' => $this->input->post('nik'),
            'foto_pengguna' => $fotoProfil
        );

        // update user di database
        $this->load->model('User_model');
        $this->User_model->updateUser($id_pengguna, $data);       
        
        //flash data jika berhasil
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Update Data Penghuni<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

        redirect(base_url('admin/penghuni'));
    }






    public function updateDataLayanan(){
        $this->_verifyAccess('admin');

        $id_layanan = $this->input->post('id');

        $data = array(
            'nama_layanan' => $this->input->post('namaLayanan'),
            'harga_bulanan' => $this->input->post('hargaLayanan')
        );

        $this->load->model('Masterdata_model');

        if($this->Masterdata_model->updateDataLayanan($id_layanan, $data)){
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Update Data Layanan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/datalayanan');
        } else {
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gaga; Update Data Layanan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect('admin/datalayanan');
        }
    }






    // fungsi untukupload image
    private function _uploadImage(){
        // konfigurasi
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']         = TRUE; //Enkripsi nama yang terupload
        $config['overwrite']			= TRUE;
        $config['max_size']             = 2048; // 1MB
        $config['file_ext_tolower']     = TRUE;
        
        $this->load->library('upload', $config);        
        
        // bila berhasil
        if ($this->upload->do_upload('foto_baru')) {            
            // ambil nama file foto
            return $this->upload->data("file_name");
        }else{
            return "";
        }
    }






    // fungsi validasi hak akses
    private function _verifyAccess($hak_akses){
        $level = $this->session->userdata('id_akses');

        if (!$level) {
            redirect(base_url());
        }

        // bila hak akses admin
        if($hak_akses == 'admin'){
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
}