<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {

    // constructor untuk class auth
    function __construct()
    {
        parent::__construct();
        $this->load->helper('auth_helper');

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





    public function layananById($id){
        $this->_verifyAccess('admin');

        $this->load->model('Masterdata_model');

        if($this->Masterdata_model->getKamarByLayanan($id) != null){
            // jika layanan masih digunakan
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data Layanan. Layanan tersebut sedang digunakan pada kamar<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/datalayanan');
        }

        // jika data tidak digunakan maka boleh dihapus
        $this->db->where('id_layanan', $id);
        if($this->db->delete('layanan')){
            // jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Data Layanan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/datalayanan');
        } else {
            // jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data Layanan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/datalayanan');
        }
    }





    public function jenisPengeluaranById($id){
        $this->_verifyAccess('admin');

        $this->load->model('Masterdata_model');

        if($this->Masterdata_model->getPengeluaranByJenisPengeluaran($id) != null){
            // jika layanan masih digunakan
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data Jenis Pengeluaran. Layanan tersebut sedang digunakan pada data pengeluaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/datajenispengeluaran');
        }

        // jika data tidak digunakan maka boleh dihapus
        $this->db->where('id_jenis_pengeluaran', $id);
        if($this->db->delete('jenis_pengeluaran')){
            // jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Data Layanan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/datajenispengeluaran');
        } else {
            // jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data Layanan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/datalayanan');
        }
    }





        // fungsi delete pembayaran berdasar id
        public function delPembayaran($id){
            $this->_verifyAccess('admin');
            
            $this->db->where('id_pembayaran', $id);
            $this->db->delete('pembayaran');
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Data Pembayaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    
            redirect(base_url('admin/pemasukan'));
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





    // fungsi delete pengeluaran berdasar id
    public function delPengeluaran($id){
        $this->_verifyAccess('admin');
        
        $this->db->where('id_pengeluaran', $id);
        $this->db->delete('pengeluaran');
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Data Pengeluaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

        redirect(base_url('admin/pengeluaran'));
    }






    // fungsi delete menghuni
    public function deleteMenghuni($id_menghuni, $id_pengguna){
        verifyAccess('admin');

        $this->db->where('id_menghuni', $id_menghuni);
        // menghapus menghuni
        if($this->db->delete('menghuni')){
            $data = array(
                'id_akses' => 3
            );

            $this->db->where('id_pengguna', $id_pengguna);
            //update hak akses ke calon penghuni
            if($this->db->update('pengguna', $data)){

                $this->db->where('id_pengguna', $id_pengguna);
                // menghapus data booking
                if($this->db->delete('booking')){
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Menghuni dan mengeluarkan penghuni dari kamar<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    redirect('admin/menghuni');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus data<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                redirect('admin/menghuni');
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/menghuni');
        }
    }





    public function deleteBooking($id_booking) {
        verifyAccess('admin');

        if ( $this->db->delete('booking', ['id_booking' => $id_booking]) ) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Data Booking<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/bookingkamar');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Data Booking<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/bookingkamar');
        }
    }
}