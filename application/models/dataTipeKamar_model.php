<?php defined('BASEPATH') or exit('No direct script access allowed');

class dataTipeKamar_model extends CI_Model
{


    //READ
    function get_view()
    {
        $this->db->select('tipe_kamar.id_tipe, tipe_kamar.nama_tipe');
        $this->db->from('tipe_kamar');

        $query = $this->db->get();
        return $query;
    }


    function getTipeKamarById($id)
    {
        $this->db->select('tipe_kamar.id_tipe, tipe_kamar.nama_tipe');

        return $this->db->get_where('tipe_kamar', ['id_tipe' => $id])->row_array();
    }


    //Tambah Tipe & edit Tipe 


    function saveTipeKamar($data)
    {
        $id = $data['id_tipe'];
        if (empty($id)) {
            $query = $this->db->insert('tipe_kamar', $data);
        } else {
            $query = $this->db->where('id_tipe', $id);
            $query = $this->db->update('tipe_kamar', $data);
        }

        return $query;
    }

    // DELETE
    function delete_TipeKamar($id)
    {
        return $this->db->delete('tipe_kamar', array('id_tipe' => $id));
    }
}
