<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan extends CI_Model{
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
    
    function getPermintaanById($id)
    {
        $this->db->select('*');
        $this->db->where('no_pemesanan', $id);
        $this->db->from('pemesanan');
        $this->db->join('barang', 'barang.kode_brng = pemesanan.kode_brng');
        return $this->db->get()->row_array();
    }

    function create($data)
    {
        return $this->db->insert('pemesanan',$data);
    }

    function update($id,$data){
        $this->db->where('no_pemesanan', $id);
        return $this->db->update('pemesanan', $data);
    }

    function delete($id){
        $this->db->where('no_pemesanan',$id);
        return $this->db->delete('pemesanan');
    }

}


