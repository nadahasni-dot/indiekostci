<?php defined('BASEPATH') or exit('No direct script access allowed');

class dataKamar_model extends CI_Model
{
    //GET PRODUCT BY PACKAGE ID
    function get_booking_by_id($id)
    {
        $this->db->select('booking.*, kamar.nomor_kamar,pengguna.nama_pengguna');
        $this->db->from('booking');
        $this->db->join('kamar', 'booking.id_kamar=kamar.id_kamar');
        $this->db->join('pengguna', 'booking.id_pengguna=pengguna.id_pengguna');
        $this->db->where('booking.id_booking', $id);
        $query = $this->db->get();
        return $query;
    }

    //READ
    function get_view()
    {
        $this->db->select('kamar.id_kamar, kamar.nomor_kamar, tipe_kamar.nama_tipe, kamar.luas_kamar, 
        kamar.lantai_kamar, kamar.kapasitas_kamar, kamar.harga_bulanan, kamar.deskripsi_kamar, kamar.foto_kamar, kamar.denda, layanan.nama_layanan, layanan.harga_bulanan layanan_bulanan');
        $this->db->from('kamar');
        $this->db->join('tipe_kamar', 'kamar.id_tipe=tipe_kamar.id_tipe');
        $this->db->join('layanan', 'kamar.id_layanan=layanan.id_layanan');

        $query = $this->db->get();
        return $query;
    }


    function getKamarById($id)
    {
        $this->db->select('kamar.id_kamar, kamar.nomor_kamar, tipe_kamar.nama_tipe, kamar.id_layanan, kamar.id_tipe, kamar.luas_kamar, 
        kamar.lantai_kamar, kamar.kapasitas_kamar, kamar.harga_bulanan, kamar.deskripsi_kamar, kamar.foto_kamar, kamar.denda, layanan.nama_layanan, layanan.harga_bulanan layanan_bulanan');
        $this->db->join('tipe_kamar', 'kamar.id_tipe=tipe_kamar.id_tipe');
        $this->db->join('layanan', 'kamar.id_layanan=layanan.id_layanan');

        return $this->db->get_where('kamar', ['id_kamar' => $id])->row_array();
    }

    /**CREATE
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

    //get TipeKamar

    function getTipeKamar()
    {
        $query = $this->db->query("SELECT * FROM tipe_kamar");
        return $query;
    }

    //get Layanan

    function getLayanan()
    {
        $query = $this->db->query("SELECT * FROM layanan");
        return $query;
    }

    //Tambah Kamar & edit Kamar


    function saveKamar($data)
    {
        $id = $data['id_kamar'];
        if (empty($id)) {
            $query = $this->db->insert('kamar', $data);
            //flash data jika berhasil
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menambah Data Kamar<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else {
            $query = $this->db->where('id_kamar', $id);
            $query = $this->db->update('kamar', $data);
            //flash data jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Update Data Kamar<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }

        return $query;
    }

    // DELETE
    function delete_kamar($id)
    {
        //flash data jika berhasil
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Data Penghuni<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return $this->db->delete('kamar', array('id_kamar' => $id));
    }
}
