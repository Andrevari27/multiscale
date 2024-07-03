<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class LaporanController extends CI_Controller{

    
    public function __construct()
    {
    parent::__construct();
    $this->load->helper('number_helper'); // Muat helper
    $model = array('Permintaan','Barang','Konsumen','Pegawai','Kendaraan','Distribusi','DistribusiKosong');
    $this->load->model($model);
    }

    public function index(){

        $no_pemesanan = $this->input->get('no_pemesanan');
        $konsumen = $this->input->get('kode_konsumen');
        $tanggal_dari = $this->input->get('tanggal_dari');
        $tanggal_sampai = $this->input->get('tanggal_sampai');
        $no_kendaraan = $this->input->get('no_kendaraan');

        $filters = array();

        if (!empty($no_pemesanan)) {
            $filters['no_pemesanan'] = $no_pemesanan;
        }
        if (!empty($konsumen)) {
            $filters['nama_konsumen'] = $konsumen;
        }
        if (!empty($tanggal_dari)) {
            $filters['tanggal_dari'] = $tanggal_dari;
        }
        if (!empty($tanggal_sampai)) {
            $filters['tanggal_sampai'] = $tanggal_sampai;
        }
        if (!empty($no_kendaraan)) {
            $filters['no_kendaraan'] = $no_kendaraan;
        }

        $data = array(
            'judul' => 'Laporan',
            'distribusiSearch' => $this->Distribusi->getFilteredDistribusi($filters)
        );

        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/laporan/index',$data);
        $this->load->view('backend/templates/footer');
    }
}
















?>