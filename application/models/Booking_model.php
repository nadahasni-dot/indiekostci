<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model
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
 
    // DELETE
    function delete_booking($id){
       
        return $this->db->delete('booking', array('id_booking' => $id));
        
    }


    public function getBookingByIdUser($id_pengguna){
        $query = "SELECT * FROM kamar, booking, pengguna WHERE booking.id_kamar = kamar.id_kamar AND booking.id_pengguna = pengguna.id_pengguna AND pengguna.id_pengguna = '$id_pengguna'";

        return $this->db->query($query)->row_array();
    }


    public function getPembayaranBookingByUser($id_pengguna) {
        $query = "SELECT *, (kamar.harga_bulanan + layanan.harga_bulanan) AS total_bayar FROM kamar, booking, pengguna, layanan WHERE booking.id_kamar = kamar.id_kamar AND booking.id_pengguna = pengguna.id_pengguna AND kamar.id_layanan = layanan.id_layanan AND pengguna.id_pengguna = '$id_pengguna'";

        return $this->db->query($query)->row_array();
    }



    public function getKamarTersedia(){
        $query = "SELECT kamar.id_kamar, kamar.nomor_kamar, kamar.foto_kamar, tipe_kamar.nama_tipe, layanan.nama_layanan, layanan.harga_bulanan AS harga_layanan, kamar.harga_bulanan, (kamar.harga_bulanan + layanan.harga_bulanan) AS total_harga, kamar.deskripsi_kamar, kamar.kapasitas_kamar, kamar.luas_kamar, kamar.lantai_kamar FROM kamar
            LEFT JOIN menghuni ON menghuni.id_kamar = kamar.id_kamar
            LEFT JOIN booking ON kamar.id_kamar = booking.id_kamar
                INNER JOIN tipe_kamar ON kamar.id_tipe = tipe_kamar.id_tipe
                INNER JOIN layanan ON kamar.id_layanan = layanan.id_layanan

                WHERE menghuni.id_kamar IS NULL AND booking.id_kamar IS NULL
                ORDER BY kamar.nomor_kamar ASC";
        
        return $this->db->query($query)->result_array();
    }    
}