<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('verifyAccess')){
    function verifyAccess($hak_akses){
        $level = null;

        if (isset($_SESSION['id_akses'])) {
            $level = $_SESSION['id_akses'];            
        } else {
            $level = $_POST['id_akses'];
        }

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
        } else if ($hak_akses == 'user'){
            if($level != 2){
                if($level == 1){
                    redirect('admin');
                    return false;
                } else if ($level == 3){
                    redirect('candidate');
                    return false;
                }
            }
        } else if ($hak_akses == 'candidate'){
            if($level != 3){
                if($level == 1){
                    redirect('admin');
                    return false;
                } else if ($level == 2){
                    redirect('user');
                    return false;
                }
            }
        }
    }
}