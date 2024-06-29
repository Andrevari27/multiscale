<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DistribusiKosong extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getDistribusiKosong()
    {
        $this->db->select('*');
        $this->db->from('distribusikosong');
        // $this->db->join('jenisbarang', 'jenisbarang.kd_jenis = barang.jenis');
        // $this->db->join('pegawai', 'pegawai.id = distribusikosong.nip_penginputan');
		$this->db->order_by('no_distribusi', 'asc');
        return $this->db->get()->result_array();
    }
    
    function getDistribusiKosongById($id)
    {
        $this->db->select('*');
        $this->db->where('no_distribusi', $id);
        $this->db->from('distribusikosong');
        return $this->db->get()->row_array();
    }

    function create($data)
    {
        return $this->db->insert('distribusikosong',$data);
    }

    function update($id,$data){
        $this->db->where('no_distribusi', $id);
        return $this->db->update('distribusikosong', $data);
    }

    function delete($id){
        $this->db->where('no_distribusi',$id);
        return $this->db->delete('distribusikosong');
    }

}


