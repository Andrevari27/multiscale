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
        // $this->db->join('pemesanandetail', 'pemesanandetail.no_pemesanan = pemesanan.no_pemesanan');
		$this->db->order_by('no_pemesanan', 'asc');
        return $this->db->get()->result_array();
    }
    
    function getPermintaanById($id)
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('konsumen', 'konsumen.kode_konsumen = pemesanan.kode_konsumen');
        $this->db->where('pemesanan.no_pemesanan', $id); // pastikan kondisi ini sesuai dengan format data yang Anda kirimkan
        return $this->db->get()->row_array();
    }

    public function getPermintaanByKonsumen($kode_konsumen) {
        $this->db->where('kode_konsumen', $kode_konsumen);
        $query = $this->db->get('pemesanan');
        return $query->result_array();
    }   
    function getBarangByNoPemesanan($no_pemesanan) {
        $this->db->select('*');
        $this->db->from('pemesanandetail');
        $this->db->join('barang', 'barang.kode_brng = pemesanandetail.kode_brng');
        $this->db->where('no_pemesanan', $no_pemesanan);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataByNoPemesanan($no_pemesanan)
    {
    $this->db->select('*');
    $this->db->from('pemesanan'); 
    $this->db->join('barang', 'barang.kode_brng = pemesanan.kode_brng');
    $this->db->join('konsumen', 'konsumen.kode_konsumen = pemesanan.kode_konsumen');
    $this->db->where('no_pemesanan', $no_pemesanan);
    $query = $this->db->get();
    return $query->row_array();
    }

    public function getDistribusi($no_pemesanan, $kode_brng) {
        // $this->db->join('barang','barang.kode_brng = distribusi.kode_brng');
        $this->db->where('no_pemesanan', $no_pemesanan);
        $this->db->where('kode_brng', $kode_brng);
        $query = $this->db->get('distribusi');
        return $query->result_array();
    }
    
    function create($data)
    {
        return $this->db->insert('pemesanan',$data);
    }


    function update($id,$data){
        $this->db->where('no_pemesanan', $id);
        return $this->db->update('pemesanan', $data);
    }

    public function updateTotal($no_p, $total) {
        $this->db->where('no_pemesanan', $no_p);
        $this->db->update('pemesanan', array('total' => $total));
    }

    public function updateTagihan($no_p, $tagihan) {
        $this->db->where('no_pemesanan', $no_p);
        $this->db->update('pemesanan', $tagihan);
    }

    function delete($id){
        $this->db->where('no_pemesanan',$id);
        return $this->db->delete('pemesanan');
    }

}