<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Distribusi extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getPermintaan()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        // $this->db->join('jenisbarang', 'jenisbarang.kd_jenis = barang.jenis');
		$this->db->order_by('no_pemesanan', 'asc');
        return $this->db->get()->result_array();
    }
    function getDistribusi()
    {
        $this->db->select('*');
        $this->db->from('distribusi');
        // $this->db->join('barang', 'barang.kode_brng = distribusi.kode_brng');		
        $this->db->order_by('no_pemesanan', 'asc');
        return $this->db->get()->result_array();
    }
    function getDistribusiJumlah($id){
        $this->db->select('no_pemesanan, SUM(tim_muat) AS total');
        $this->db->where('no_pemesanan', $id);
        $this->db->from('distribusi');
        $this->db->group_by('no_pemesanan');
        return $this->db->get()->row_array();
    }
    function getPermintaanById($id)
    {
        $this->db->select('*');
        $this->db->where('no_pemesanan', $id);
        $this->db->from('pemesanan');
        return $this->db->get()->row_array();
    }
    function getDistribusiById($id)
    {
        $this->db->select('*');
        $this->db->join('kendaraan', 'kendaraan.no_kendaraan = distribusi.no_kendaraan');
        $this->db->join('konsumen', 'konsumen.kode_konsumen = distribusi.kode_konsumen');
        $this->db->join('distribusikosong', 'distribusikosong.no_distribusi = distribusi.no_distribusi');
        $this->db->where('no_kendaraan', $id);
        $this->db->from('distribusi');
        return $this->db->get()->row_array();
    }
    function getDistribusiAById($id)
    {
        $this->db->select('*');
        $this->db->where('no_pemesanan', $id);
        $this->db->from('distribusi');
        return $this->db->get()->row_array();
    }
    public function getDistribusiByPemesananId($id)
{
    $this->db->select('*');
    $this->db->where('distribusi.no_pemesanan', $id);
    $this->db->from('distribusi'); // Pastikan tabelnya benar
    // $this->db->join('pemesanan', 'pemesanan.no_pemesanan = distribusi.no_pemesanan');
    // $this->db->join('barang', 'barang.kode_brng = distribusi.kode_brng');
    return $this->db->get()->result_array(); // Menggunakan result_array untuk mendapatkan array
}

public function getPpnByNoPemesanan($no_pemesanan) {
    $this->db->select('ppn');
    $this->db->from('pemesanan');
    $this->db->where('no_pemesanan', $no_pemesanan);
    $query = $this->db->get();
    return $query->row()->ppn; // Mengembalikan nilai PPN
}
public function getPphByNoPemesanan($no_pemesanan) {
    $this->db->select('pph');
    $this->db->from('pemesanan');
    $this->db->where('no_pemesanan', $no_pemesanan);
    $query = $this->db->get();
    return $query->row()->pph; // Mengembalikan nilai PPN
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
        $this->db->where('no_pemesanan',$id);
        return $this->db->delete('distribusi');
    }

}