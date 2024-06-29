<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getPegawai()
    {
        $this->db->select('*');
        $this->db->from('pegawai');
		$this->db->order_by('id', 'asc');
        return $this->db->get()->result_array();
    }
   
    function getPegawaiById($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('pegawai');
        return $this->db->get()->row_array();
    }

    function create($data)
    {
        return $this->db->insert('pegawai',$data);
    }

    function update($id,$data){
        $this->db->where('id', $id);
        return $this->db->update('pegawai', $data);
    }

    function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('pegawai');
    }

}


