<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class User extends CI_Controller {
    use REST_Controller 
    {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->__resTraitConstruct();

        $this->load->model('Pembayaran_model');
        $this->load->model('Kamar_model');

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function index_get() {
        // cek apakah ada parameter id
        if ($this->get('id')){        
            // mengambil id
            $id = $this->get('id');

            $user = $this->db->get_where('pengguna', ['id_pengguna' => $id])->row_array();
            $info_kost = $this->db->get_where('info_kost', ['id_kost' => 1])->row_array();

            $kamar = $this->Kamar_model->getKamar($id);

            $pembayaran = $this->Pembayaran_model->getPembayaranUser($id);
            if($pembayaran == null){
                $pembayaran = array(
                    'id_pembayaran' => null
                );
            }

            $harga_kamar = $this->Pembayaran_model->getHargaKamarUser($id);
            $waktu_pembayaran = $this->Pembayaran_model->getBulanTahunPembayaran();

            $waktu = $waktu_pembayaran;
            $batas_pembayaran = $this->Pembayaran_model->getBatasPembayaran($waktu['tahun'], $waktu['bulan']);

            // mengambil selisih dari tenggat waktu
            $selisih = $batas_pembayaran['selisih'];
            
            if($selisih <= 0){
                $selisih = 0;
            }          
            
            // menghitung nilai denda
            $denda = $selisih * $harga_kamar['denda'];
     
            // jika ada parameter id dan data user ada
            if ($user) {
                // memunculkan response
                $this->set_response([
                    'status' => true,
                    'info_kost' => $info_kost,
                    'user' => $user,
                    'kamar' => $kamar,
                    'pembayaran' => $pembayaran,
                    'harga_kamar' => $harga_kamar,
                    'denda' => $denda
                ], 200); // NOT_FOUND (404) being the HTTP response code
            } else {
                // jika id user tidak ditemukan
                $this->set_response([
                    'status' => false,
                    'message' => 'User could not be found'
                ], 404); // NOT_FOUND (404) being the HTTP response code
            }            
        } else {
            // jika tidak ada parameter id
            $this->set_response([
                'status' => false,
                'message' => 'User could not be found'
            ], 404);
        }
    }


    public function index_put() {
        if ($this->put('id_pengguna')) {
            $id_pengguna = $this->put('id_pengguna');

            $imgName = uniqid().'.jpeg';
            $path = '../assets/img/'.$imgName;  
                                    
            $pengguna = $this->db->get_where('pengguna', ['id_pengguna' => $id_pengguna])->row_array();
            
            if ($pengguna) {
                if($this->put('foto_pengguna')) {
                    $foto_pengguna = $this->put('foto_pengguna');                         
    
                    $data = array(
                        'nama_pengguna' => $this->put('nama_pengguna'),
                        'alamat_pengguna' => $this->put('alamat_pengguna'),
                        'provinsi_pengguna' => $this->put('provinsi_pengguna'),
                        'kota_pengguna' => $this->put('kota_pengguna'),
                        'telepon_pengguna' => $this->put('telepon_pengguna'),
                        'email_pengguna' => $this->put('email_pengguna'),
                        'kelamin_pengguna' => $this->put('kelamin_pengguna'),
                        'tanggal_lahir_pengguna' => $this->put('tanggal_lahir_pengguna'),
                        'no_ktp_pengguna' => $this->put('no_ktp_pengguna'),
                        'foto_pengguna' => $imgName
                    );

                    if ($this->db->update('pengguna', $data, ['id_pengguna' => $id_pengguna])) {
                        file_put_contents($path, base64_decode($foto_pengguna));

                        // jika berhasil
                        $this->set_response([
                            'status' => true,
                            'message' => 'Berhasil Mengupdate Profil'
                        ], 200);
                    } else {
                        // jika gagal
                        $this->set_response([
                            'status' => false,
                            'message' => 'Gagal Mengupdate Profil'
                        ], 401);
                    }
    
                } else {
                    $data = array(
                        'nama_pengguna' => $this->put('nama_pengguna'),
                        'alamat_pengguna' => $this->put('alamat_pengguna'),
                        'provinsi_pengguna' => $this->put('provinsi_pengguna'),
                        'kota_pengguna' => $this->put('kota_pengguna'),
                        'telepon_pengguna' => $this->put('telepon_pengguna'),
                        'email_pengguna' => $this->put('email_pengguna'),
                        'kelamin_pengguna' => $this->put('kelamin_pengguna'),
                        'tanggal_lahir_pengguna' => $this->put('tanggal_lahir_pengguna'),
                        'no_ktp_pengguna' => $this->put('no_ktp_pengguna')                
                    );
                    
                    if ($this->db->update('pengguna', $data, ['id_pengguna' => $id_pengguna])) {                        
                        // jika berhasil
                        $this->set_response([
                            'status' => true,
                            'message' => 'Berhasil Mengupdate Profil'
                        ], 200);
                    } else {
                        // jika gagal
                        $this->set_response([
                            'status' => false,
                            'message' => 'Gagal Mengupdate Profil'
                        ], 401);
                    }
                }
                
            } else {
                // jika data pengguna tidak ada
                $this->set_response([
                    'status' => false,
                    'message' => 'User could not be found'
                ], 404);
            }

        } else {
            // jika tidak ada parameter id
            $this->set_response([
                'status' => false,
                'message' => 'User could not be found'
            ], 404);
        }
    }

    // pembayaran api
    public function pembayaran_post(){        
        if($this->post('id_pengguna')) {
            $id_pengguna = $this->post('id_pengguna');
            $tanggal_pembayaran = $this->post('tanggal_pembayaran');
            $nilai_pembayaran = $this->post('nilai_pembayaran');
            $bukti_pembayaran = $this->post('bukti_pembayaran');
            $keterangan = $this->post('keterangan');

            $imgName = uniqid().'.jpeg';
            $path = '../assets/img/'.$imgName;            

            $this->load->model('Menghuni_model');

            $menghuni = $this->Menghuni_model->getMenghuniByUserId($id_pengguna);

            if ($menghuni != null) {
                $data = array(
                    'id_menghuni' => $menghuni['id_menghuni'],
                    'tanggal_pembayaran' => $tanggal_pembayaran,
                    'nilai_pembayaran' => $nilai_pembayaran,
                    'bukti_pembayaran' => $imgName,
                    'keterangan' => $keterangan,
                    'id_status' => 2
                );

                if($this->Pembayaran_model->inputPembayaran($data)) {
                    file_put_contents($path, base64_decode($bukti_pembayaran));

                    // jika tidak pembayaran berhasil
                    $this->set_response([
                        'status' => true,
                        'message' => 'Berhasil melakukan pembayaran'
                    ], 200);
                } else {
                    // jika tidak pembayaran gagal
                    $this->set_response([
                        'status' => false,
                        'message' => 'gagal melakukan pembayaran'
                    ], 401);
                }
            } else {
                // jika tidak ada parameter id
                $this->set_response([
                    'status' => false,
                    'message' => 'Menghuni could not be found'
                ], 404);
            }
        } else {
            // jika tidak ada parameter id
            $this->set_response([
                'status' => false,
                'message' => 'User could not be found'
            ], 404);
        }
    }


    // untuk password
    public function password_put() {
        if ($this->put('id_pengguna')) {
            $id_pengguna = $this->put('id_pengguna');
            $password_lama = $this->put('password_lama');
            $password_new = $this->put('password_new');
            $password_hash = password_hash($password_new, PASSWORD_DEFAULT);

            $pengguna = $this->db->get_where('pengguna', ['id_pengguna' => $id_pengguna])->row_array();

            if ($pengguna) {

                if (password_verify($password_lama, $pengguna['password'])) {

                    $this->db->set('password', $password_hash);
                    $this->db->where('id_pengguna', $id_pengguna);

                    if( $this->db->update('pengguna') ) {
                        // jika berhasil update
                        $this->set_response([
                            'status' => true,
                            'message' => 'Berhasil mengupdate password'
                        ], 200);
                    } else {
                        // jika gagal update
                        $this->set_response([
                            'status' => false,
                            'message' => 'Gagal mengupdate password'
                        ], 401);
                    }

                } else {
                    // jika password lama salah
                    $this->set_response([
                        'status' => false,
                        'message' => 'Password lama tidak sesuai'
                    ], 200);
                }

            } else {
                // jika tidak ada user dengan id 
                $this->set_response([
                    'status' => false,
                    'message' => 'User could not be found'
                ], 404);
            }
        } else {
            // jika tidak ada parameter id
            $this->set_response([
                'status' => false,
                'message' => 'User could not be found'
            ], 404);
        }
    }
}