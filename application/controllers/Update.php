<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {

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
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Update Data Layanan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect('admin/datalayanan');
        }
    }



    public function updateDataJenisPengeluaran(){
        $this->_verifyAccess('admin');

        $id_jenis_pengeluaran = $this->input->post('id');

        $data = array(
            'kode_pengeluaran' => $this->input->post('kodePengeluaran', true),
            'kategori_pengeluaran' => $this->input->post('kategori', true),
            'nama_pengeluaran' => $this->input->post('namaPengeluaran', true)
        );

        $this->load->model('Masterdata_model');

        if($this->Masterdata_model->updateDataJenisPengeluaran($id_jenis_pengeluaran, $data)){
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Update Data Jenis Pengeluaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/datajenispengeluaran');
        } else {
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Update Data Jenis Pengeluaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect('admin/datajenispengeluaran');
        }
    }


    public function updateDataTipeKamar(){
        $this->_verifyAccess('admin');

        $id_tipe_kamar = $this->input->post('id');

        $data = array(
            'nama_tipe' => $this->input->post('namaTipe', true)
        );

        $this->load->model('Masterdata_model');

        if($this->Masterdata_model->updateDataTipeKamar($id_tipe_kamar, $data)){
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Update Data Tipe Kamar<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/datatipekamar');
        } else {
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Update Data Tipe Kamar<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect('admin/datatipekamar');
        }
    }


    // fungsi untuk update data pembayaran
    public function updatePembayaran(){
        $this->_verifyAccess('admin');

        $id_pembayaran = $this->input->post('id');
        $buktiPembayaran = $this->_uploadImage('bukti_baru');

        // apabila foto profil tidak terpilih maka digunakan foto lama
        if($buktiPembayaran == ""){
            $buktiPembayaran = $this->input->post('bukti_lama');
        }

        $data = array(
            'id_menghuni'           => $this->input->post('menghuni'),
            'tanggal_pembayaran'    => $this->input->post('tanggal'),
            'nilai_pembayaran'      => $this->input->post('nominal'),
            'keterangan'            => $this->input->post('keterangan'),
            'bukti_pembayaran'      => $buktiPembayaran,
            'id_status'             => $this->input->post('status')
        );                

        // update pengeluaran di database
        $this->load->model('Pembayaran_model');
        
        
        if($this->Pembayaran_model->updatePembayaran($id_pembayaran, $data)){            
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Update Data Pembayaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect(base_url('admin/pemasukan'));
            
        }else{
            //flash data jika gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Update Data Pembayaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect(base_url('admin/pemasukan'));
        }
    }



  // fungsi untukupload image
  private function _uploadImage($name){
    // konfigurasi
    $config['upload_path']          = './assets/img/';
    $config['allowed_types']        = 'gif|jpg|jpeg|png|JPG|JPEG|PNG';
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

    // fungsi untuk update data profil
    public function updateProfil(){        
        $id_pengguna = $this->input->post('id_pengguna');
        $fotoProfil = $this->_uploadImage('foto_baru');

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
        
        // mengarahkan kembali ke hak akses masing-masing user
        $user = $this->User_model->getUserById($id_pengguna);

        if ($user['id_akses'] == 1) {
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Memperbarui Data Profil<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    
            redirect('admin/settingsprofil');
        } else if ($user['id_akses'] == 2) {
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Memperbarui Data Profil<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    
            redirect('user/settingsprofil');
        } else if ($user['id_akses'] == 3) {
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Memperbarui Data Profil<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    
            redirect('candidate/settingsprofil');
        }
    }





    // fungsi untuk update infokost
    public function updateInfoKost()
    {
        $this->_verifyAccess('admin');

        $id_kost = $this->input->post('id');

        $fotoKost = $this->_uploadImage('foto_baru');
        // apabila foto tidak terpilih maka digunakan foto lama
        if($fotoKost == ""){
            $fotoKost = $this->input->post('foto_lama');
        }

        $data = array(
            'jenis_kost'        => $this->input->post('jKost'),
            'nama_kost'         => $this->input->post('nama'),
            'alamat_kost'       => $this->input->post('alamat'),
            'provinsi_kost'     => $this->input->post('provinsi'),
            'kota_kost'         => $this->input->post('kota'),
            'no_kost'           => $this->input->post('telepon'),
            'email_kost'        => $this->input->post('email'),
            'foto_kost'         => $fotoKost,
            'deskripsi_kost'    => $this->input->post('desc')
        );

        // update infokost
        $this->load->model('Settings_model');
        if($this->Settings_model->updateInfoKost($id_kost, $data)){
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Memperbarui Data Informasi Kost<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/settingsinfokost');
        } else {
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Memperbarui Data Informasi Kost<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/settingsinfokost');
        }
        
    }




    public function updateMenghuni(){
        verifyAccess('admin');

        $this->load->model('Menghuni_model');

        $id_menghuni = $this->input->post('id');
        $id_kamar = $this->input->post('kamar');
        $id_pengguna = $this->input->post('penghuni');
        $tanggal = $this->input->post('tanggal');

        $data = array(            
            'id_kamar'      => $id_kamar,
            'id_pengguna'   => $id_pengguna,
            'tanggal_masuk' => $tanggal
        );

        if($this->Menghuni_model->updateMenghuni($id_menghuni, $data)){
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Memperbarui Data Menghuni<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/menghuni');
        } else {
            // jika gagal            
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Memperbarui Data Menghuni<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/menghuni');
        }
    }


    

     // fungsi untuk update data pengeluaran
     public function updatePengeluaran(){
        $this->_verifyAccess('admin');

        $id_pengeluaran = $this->input->post('id');
        $buktiPengeluaran = $this->_uploadImage('bukti_baru');

        // apabila foto profil tidak terpilih maka digunakan foto lama
        if($buktiPengeluaran == ""){
            $buktiPengeluaran = $this->input->post('bukti_lama');
        }

        $data = array(
            'id_jenis_pengeluaran'  => $this->input->post('jenis'),
            'tanggal_pengeluaran'   => $this->input->post('tanggal'),
            'nilai_pengeluaran'     => $this->input->post('nominal'),
            'nilai_pengeluaran'     => $this->input->post('nominal'),
            'keterangan'            => $this->input->post('keterangan'),
            'bukti_pengeluaran'     => $buktiPengeluaran
        );                

        // update pengeluaran di database
        $this->load->model('Pengeluaran_model');
        
        
        if($this->Pengeluaran_model->updatePengeluaran($id_pengeluaran, $data)){            
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Update Data Pengeluaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect(base_url('admin/pengeluaran'));
            
        }else{
            //flash data jika gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Update Data Pengeluaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect('admin/pengeluaran');
        }
    }




    public function updateBooking() {
        $id_booking = $this->input->post('id_booking');
        $status = $this->input->post('status');

        $this->load->model('Booking_model');

        if ($status == 'belum dikonfirmasi') {
            //flash data jika tidak ada perubahan dalam status booking
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Tidak ada perubahan status konfirmasi booking<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect('admin/bookingkamar');
        }

        $data = array(
            'status_booking' => $status
        );

        if ( $this->db->update('booking', $data, ['id_booking' => $id_booking]) ) {

            $booking = $this->Booking_model->get_booking_by_id($id_booking)->row_array();

            $id_kamar = $booking['id_kamar'];
            $id_pengguna = $booking['id_pengguna'];
            $tanggal_booking = $booking['tanggal_booking'];

            $data = array(
                'id_kamar' => $id_kamar,
                'id_pengguna' => $id_pengguna,
                'tanggal_masuk' => $tanggal_booking
            );

            if ( $this->db->insert('menghuni', $data) ) {

                $this->db->select('*');
                $this->db->from('booking');
                $this->db->join('kamar', 'booking.id_kamar = kamar.id_kamar');
                $this->db->join('menghuni', 'menghuni.id_kamar = kamar.id_kamar');
                $this->db->where('id_booking', $id_booking);

                $menghuni = $this->db->get()->row_array();

                $data = array(
                    'id_menghuni' => $menghuni['id_menghuni'],
                    'tanggal_pembayaran' => $menghuni['tanggal_booking'],
                    'nilai_pembayaran' => $menghuni['nilai_booking'],
                    'bukti_pembayaran' => $menghuni['bukti_booking'],
                    'keterangan' => 'Pembayaran booking kamar no.'.$menghuni['nomor_kamar'].' tanggal: '.$menghuni['tanggal_booking'],
                    'id_status' => 1
                );

                if ( $this->db->insert('pembayaran', $data) ) {

                    $id_pengguna = $booking['id_pengguna'];

                    $data = array(
                        'id_akses' => 2
                    );

                    if ( $this->db->update('pengguna', $data, ['id_pengguna' => $id_pengguna]) ) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil update data booking, mendaftarkan penghuni ke kamar, dan menginput pembayaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect('admin/bookingkamar');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal update data booking, mendaftarkan penghuni ke kamar, dan menginput pembayaran<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect('admin/bookingkamar');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengupdate booking<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            
            redirect('admin/bookingkamar');
        }
    }
}