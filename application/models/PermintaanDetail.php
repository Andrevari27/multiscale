<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PermintaanDetail extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getPermintaanDetail()
    {
        $this->db->select('*');
        $this->db->from('pemesanandetail');
		$this->db->order_by('no_pemesanan', 'asc');
        return $this->db->get()->result_array();
    }
    
    function getPermintaanDetailById($id)
    {
        $this->db->select('*');
        $this->db->from('pemesanandetail');
        $this->db->where('no_pemesanan', $id);
        return $this->db->get()->result_array();
    }

    public function isDuplicate($no_pemesanan, $kode_brng) {
        $this->db->where('id', $no_pemesanan);
        $this->db->where('kode_brng', $kode_brng);
        $query = $this->db->get('pemesanandetail'); // Ganti 'nama_tabel_detail_permintaan' dengan nama tabel yang sesuai
        return $query->num_rows() > 0; // Mengembalikan true jika ada duplikasi, false jika tidak
    }

    function create($data)
    {
        return $this->db->insert('pemesanandetail',$data);
    }

    function update($id,$data){
        $this->db->where('no_pemesanan', $id);
        return $this->db->update('pemesanandetail', $data);
    }

    function delete($id){
        $this->db->where('no_pemesanan',$id);
        return $this->db->delete('pemesanan');
    }

}


