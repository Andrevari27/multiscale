<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getKonsumen()
    {
        $this->db->select('*');
        $this->db->from('konsumen');
		$this->db->order_by('kode_konsumen', 'asc');
        return $this->db->get()->result_array();
    }
   
    function getKonsumenById($id)
    {
        $this->db->select('*');
        $this->db->where('kode_konsumen', $id);
        $this->db->from('konsumen');
        return $this->db->get()->row_array();
    }

    function create($data)
    {
        return $this->db->insert('konsumen',$data);
    }

    function update($id,$data){
        $this->db->where('kode_konsumen', $id);
        return $this->db->update('konsumen', $data);
    }

    function delete($id){
        $this->db->where('kode_konsumen',$id);
        return $this->db->delete('konsumen');
    }

}


