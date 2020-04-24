<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    // constructor untuk class auth
    function __construct()
    {
        parent::__construct();        
        $this->load->library('form_validation');
    }

    // main function
    public function index(){
        echo "berhasil login";
    }
}