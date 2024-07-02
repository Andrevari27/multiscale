<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DistribusiKosongController extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $model = array('Permintaan','Barang','Konsumen','Pegawai','Distribusi','Kendaraan','DistribusiKosong');
		$this->load->model($model);
    }

    public function index(){
        $data = array(
            'judul' => 'Data Distribusi Kosong',
			'distribusikosong' => $this->DistribusiKosong->getDistribusiKosong()
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/distribusikosong/index',$data);
        $this->load->view('backend/templates/footer');
    }

    public function create(){
		if (isset($_POST['simpan'])){

				$data = array(
					'dep_asal' => $this->input->post('dep_asal'),
					'no_kendaraan' => $this->input->post('no_kendaraan'),
					'supir' => $this->input->post('supir'),
					'tgl_berangkat' => $this->input->post('tgl_berangkat'),
					'uang_JP' => str_replace(',', '', $this->input->post('uang_JP')),
					'nip_penginputan' => $this->input->post('nip_penginputan'),
					'dep_tujuan' => $this->input->post('dep_tujuan'),
					'jam_berangkat' => $this->input->post('jam_berangkat'),
				);

			if (count($_POST)>0) {
            	$this->DistribusiKosong->create($data);
            	$this->session->set_flashdata('alert', 'success_post');
            	redirect(site_url('verf_distribusi'));
        	}else{
            	$this->session->set_flashdata('alert', 'fail_post');
            	redirect(site_url('verf_distribusi'));
            }
		}else{
			$data = array(
            'judul' => 'Tambah Data Distribusi Kosong',
            'distribusikosong' => $this->DistribusiKosong->getDistribusiKosong()
        	);
			$this->load->view('backend/templates/header',$data);
        	$this->load->view('backend/distribusikosong/create',$data);
        	$this->load->view('backend/templates/footer');
        }
	}
	public function update($id){
		if (isset($_POST['simpan'])) {

            $data = array(
                'no_pemesanan' => $this->input->post('no_pemesanan'),
                'dep_asal' => $this->input->post('dep_asal'),
                'kode_brng' => $this->input->post('kode_brng'),
                'tim_muat' => $this->input->post('tim_muat'),
                'no_kendaraan' => $this->input->post('no_kendaraan'),
                'supir' => $this->input->post('supir'),
                'tgl_berangkat' => $this->input->post('tgl_berangkat'),
                'uang_JP' => $this->input->post('uang_JP'),
                'uang_JT' => $this->input->post('uang_JT'),
                'Keterangan' => $this->input->post('Keterangan'),
                'nip_penginputan' => $this->input->post('nip_penginputan'),
                'tgl_sampai' => $this->input->post('tgl_sampai'),
                'tim_bongkar' => $this->input->post('tim_bongkar'),
                'volume' => $this->input->post('volume'),
                'selisih_mb' => $this->input->post('selisih_mb'),
                'harga' => $this->input->post('harga'),
                'total_harga' => $this->input->post('total_harga'),
                'nip_closing' => $this->input->post('nip_closing'),
                'status' => $this->input->post('status'),
                'jam_berangkat ' => $this->input->post('jam_berangkat'),
                'jam_sampai' => $this->input->post('jam_sampai'),
                'asal_tambahan' => $this->input->post('asal_tambahan'),
            );
				if (count($_POST) > 0) {
					$this->Distribusi->update($id,$data);
					$this->session->set_flashdata('alert', 'success_post');
					redirect(site_url('verf_distribusi'));
				} else {
					$this->session->set_flashdata('alert', 'fail_post');
					redirect(site_url('verf_distribusi'));
				}
		} else {
			$data = array(
				'judul' => 'Distribusi Kosong',
				'distribusikosong' => $this->DistribusiKosong->getDistribusiKosongById($id),
			);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/distribusikosong/update', $data);
			$this->load->view('backend/templates/footer');
		}
	}

	public function kwitansi($id){
		$data = array(
			'judul' => 'Kwitansi Distribusi Kosong',
			'distribusikosong' => $this->DistribusiKosong->getDistribusiKosongById($id),
		);
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/distribusikosong/kwitansi', $data);
		$this->load->view('backend/templates/footer');
	}

	public function delete($id){
        $this->DistribusiKosong->delete($id);
        $this->session->set_flashdata('alert', 'success_delete');
		redirect(site_url('distribusikosong'));
		}
}