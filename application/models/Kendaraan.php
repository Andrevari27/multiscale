<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getKendaraan()
    {
        $this->db->select('*');
        $this->db->from('kendaraan');
		$this->db->order_by('no_kendaraan', 'asc');
        return $this->db->get()->result_array();
    }
    function getKendaraanById($id)
    {
        $this->db->select('*');
        $this->db->where('no_kendaraan', $id);
        $this->db->from('kendaraan');
        return $this->db->get()->row_array();
    }

    function create($data)
    {
        return $this->db->insert('kendaraan',$data);
    }

    function update($id,$data){
        $this->db->where('no_kendaraan', $id);
        return $this->db->update('kendaraan', $data);
    }

    function delete($id){
        $this->db->where('no_kendaraan',$id);
        return $this->db->delete('kendaraan');
    }
    public function getSupirByKendaraan($no_kendaraan)
    {
        $this->db->select('supir');
        $this->db->from('kendaraan');
        $this->db->where('no_kendaraan', $no_kendaraan);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Mengembalikan hasil query dalam bentuk array
        } else {
            return array('supir' => 'Data tidak ditemukan'); // Contoh penanganan jika data tidak ditemukan
        }
    }

}


