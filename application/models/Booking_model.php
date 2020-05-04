<?php defined('BASEPATH') OR exit('No direct script access allowed');

class booking_model extends CI_Model
{
    //GET PRODUCT BY PACKAGE ID
    function get_booking_by_id($id){
        $this->db->select('booking.*, kamar.nomor_kamar,pengguna.nama_pengguna');
        $this->db->from('booking');
        $this->db->join('kamar', 'booking.id_kamar=kamar.id_kamar');
        $this->db->join('pengguna', 'booking.id_pengguna=pengguna.id_pengguna');
        $this->db->where('booking.id_booking',$id);
        $query = $this->db->get();
        return $query;
    }
 
    //READ
    function get_view(){
        $confirm="belum dikonfirmasi";
        $this->db->select('booking.*, kamar.nomor_kamar,pengguna.nama_pengguna');
        $this->db->from('booking');
        $this->db->join('kamar', 'booking.id_kamar=kamar.id_kamar');
        $this->db->join('pengguna', 'booking.id_pengguna=pengguna.id_pengguna');
        $this->db->where('booking.status_booking', $confirm);
        
        $query = $this->db->get();
        return $query;
    }
 
    // CREATE
    function create_package($package,$product){
        $this->db->trans_start();
            //INSERT TO PACKAGE
            date_default_timezone_set("Asia/Bangkok");
            $data  = array(
                'package_name' => $package,
                'package_created_at' => date('Y-m-d H:i:s') 
            );
            $this->db->insert('package', $data);
            //GET ID PACKAGE
            $package_id = $this->db->insert_id();
            $result = array();
                foreach($product AS $key => $val){
                     $result[] = array(
                      'detail_package_id'   => $package_id,
                      'detail_product_id'   => $_POST['product'][$key]
                     );
                }      
            //MULTIPLE INSERT TO DETAIL TABLE
            $this->db->insert_batch('detail', $result);
        $this->db->trans_complete();
    }
 
     
    // UPDATE
    /**function update_booking($id,$package,$product){
        $this->db->trans_start();
            //UPDATE TO PACKAGE
            $data  = array(
                'package_name' => $package
            );
            $this->db->where('package_id',$id);
            $this->db->update('package', $data);
             
            //DELETE DETAIL PACKAGE
            $this->db->delete('detail', array('detail_package_id' => $id));
 
            $result = array();
                foreach($product AS $key => $val){
                     $result[] = array(
                      'detail_package_id'   => $id,
                      'detail_product_id'   => $_POST['product_edit'][$key]
                     );
                }      
            //MULTIPLE INSERT TO DETAIL TABLE
            $this->db->insert_batch('detail', $result);
        $this->db->trans_complete();
    }*/
 
    // DELETE
    function delete_booking($id){
       
        return $this->db->delete('booking', array('id_booking' => $id));
        
    }
}