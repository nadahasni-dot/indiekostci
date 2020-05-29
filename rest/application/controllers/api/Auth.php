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
class Auth extends CI_Controller {
    use REST_Controller 
    {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->__resTraitConstruct();

        $this->load->model('Auth_model');

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function index_post()
    {
        $email = $this->post('email');
        $password = $this->post('password');

        $userData = $this->db->get_where('pengguna', ['email_pengguna' => $email])->row_array();

        // apabila email ada
        if($userData){
            // apabila belum aktifasi
            if($userData['is_active'] == 1){
                // cek password
                if(password_verify($password, $userData['password'])){      
                    $data = [     
                        'id_pengguna' => $userData['id_pengguna'],
                        'nama_pengguna' => $userData['nama_pengguna'],
                        'alamat_pengguna' => $userData['alamat_pengguna'],
                        'provinsi_pengguna' => $userData['provinsi_pengguna'],
                        'kota_pengguna' => $userData['kota_pengguna'],
                        'telepon_pengguna' => $userData['telepon_pengguna'],
                        'email_pengguna' => $userData['email_pengguna'],                                         
                        'kelamin_pengguna' => $userData['kelamin_pengguna'],                                         
                        'tanggal_lahir_pengguna' => $userData['tanggal_lahir_pengguna'],                                         
                        'no_ktp_pengguna' => $userData['no_ktp_pengguna'],                                         
                        'foto_pengguna' => 'http://localhost/indiekostci/assets/img/'.$userData['foto_pengguna'],                                                                                           
                        'id_akses' => $userData['id_akses']
                    ];          
                    
                    $this->response([
                        'status' => true,
                        'message' => 'Login Berhasil',
                        'data' => $data
                    ], 200);                    
                } else {
                    $this->response([
                        'status' => false,
                        'message' => 'Password Tidak Sesuai'
                    ], 401);
                }
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Akun belum diaktivasi'
                ], 401);
            }
        } else {
            $this->response([
                'status' => false,
                'message' => 'Email tidak ditemukan'
            ], 401);
        }
    }
}