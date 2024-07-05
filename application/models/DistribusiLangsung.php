<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DistribusiLangsung extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getPermintaan()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('konsumen', 'konsumen.kode_konsumen = pemesanan.kode_konsumen');
        $this->db->join('barang', 'barang.kode_brng = pemesanan.kode_brng');
		$this->db->order_by('no_pemesanan', 'asc');
        return $this->db->get()->result_array();
    }
    
    function create($data)
    {
        return $this->db->insert('distribusi',$data);
    }

    function update($id,$data){
        $this->db->where('no_kendaraan', $id);
        return $this->db->update('distribusi', $data);
    }

    function delete($id){
        $this->db->where('no_kendaraan',$id);
        return $this->db->delete('distribusi');
    }

}


