<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getBarang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        // $this->db->join('jenisbarang', 'jenisbarang.kd_jenis = barang.jenis');
		$this->db->order_by('kode_brng', 'asc');
        return $this->db->get()->result_array();
    }
    function getJenisBarang()
    {
        $this->db->select('*');
        $this->db->from('jenisbarang');
		$this->db->order_by('kd_jenis', 'asc');
        return $this->db->get()->result_array();
    }
    function getBarangById($id)
    {
        $this->db->select('*');
        $this->db->where('kode_brng', $id);
        $this->db->from('barang');
        return $this->db->get()->row_array();
    }

    function create($data)
    {
        return $this->db->insert('barang',$data);
    }

    function update($id,$data){
        $this->db->where('kode_brng', $id);
        return $this->db->update('barang', $data);
    }

    function delete($id){
        $this->db->where('kode_brng',$id);
        return $this->db->delete('barang');
    }

    public function getHargaByBarang($kode_brng)
    {
        $this->db->select('harga');
        $this->db->from('barang');
        $this->db->where('kode_brng', $kode_brng);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Mengembalikan hasil query dalam bentuk array
        } else {
            return array('harga' => 'Data tidak ditemukan'); // Contoh penanganan jika data tidak ditemukan
        }
    }

}


