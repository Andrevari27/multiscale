<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class JenisBarang extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getJenisBarang()
    {
        $this->db->select('*');
        $this->db->from('jenisbarang');
		$this->db->order_by('kd_jenis', 'asc');
        return $this->db->get()->result_array();
    }
    function getJenisBarangById($id)
    {
        $this->db->select('*');
        $this->db->where('kd_jenis', $id);
        $this->db->from('jenisbarang');
        return $this->db->get()->row_array();
    }

    function create($data)
    {
        return $this->db->insert('jenisbarang',$data);
    }

    function update($id,$data){
        $this->db->where('kd_jenis', $id);
        return $this->db->update('jenisbarang', $data);
    }

    function delete($id){
        $this->db->where('kd_jenis',$id);
        return $this->db->delete('jenisbarang');
    }

}


