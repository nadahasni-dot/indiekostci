<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {

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


    // fungsi delete berdasar id
    public function penghuniById($id){
        
        $this->_verifyAccess('admin');

        $this->db->where('id_pengguna', $id);
        $this->db->delete('pengguna');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Data Penghuni<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

        redirect(base_url('admin/penghuni'));
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