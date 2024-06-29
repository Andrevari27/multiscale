<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getUser(){
        $this->db->order_by('user_date_created','DESC');
        $query = $this->db->get('user');
        return $query->result_array();
    }
    function getUsers($user){
        return $this->db->get_where('user',$user);
    }
	function getPegawai($pegawai){
        return $this->db->get_where('pegawai',$pegawai);
    }
	
    function getUserAccount($user){
        $query = $this->db->get_where('user',$user);
        return $query->row_array();
    }
	function getPegawaiAccount($pegawai){
        $query = $this->db->get_where('pegawai',$pegawai);
        return $query->row_array();
    }
    function getUserByUsername($username)
    {
        $this->db->from('user');
        $this->db->where('user_username',$username);
        $query = $this->db->get();
        return $query->row_array();
    }
    
}


