<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DistribusiLangsungController extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $model = array('Permintaan','Barang','Konsumen','Pegawai','Distribusi','Kendaraan','DistribusiKosong','DistribusiLangsung');
		$this->load->model($model);
    }

    public function index(){
        $data = array(
            'judul' => 'Data Distribusi Langsung',
            'permintaan' => $this->DistribusiLangsung->getPermintaan()
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/distribusilangsung/index',$data);
        $this->load->view('backend/templates/footer');
    }

    public function distribusiLangsung($id){
		if (isset($_POST['simpan'])){

				$data = array(
					'no_pemesanan' => $this->input->post('no_pemesanan'),
					'dep_asal' => $this->input->post('dep_asal'),
					'asal_distribusi' => $this->input->post('dep_asal'),
					'tujuan_distribusi' => $this->input->post('nama_konsumen'),
					'nama_konsumen' => $this->input->post('nama_konsumen'),
					'kode_brng' => $this->input->post('kode_brng'),
					'tim_muat' => $this->input->post('tim_muat'),
					'no_kendaraan' => $this->input->post('no_kendaraan'),
					'supir' => $this->input->post('supir'),
					'tgl_berangkat' => $this->input->post('tgl_berangkat'),
					'jam_berangkat' => $this->input->post('jam_berangkat'),
					'uang_JP' => str_replace(',', '', $this->input->post('uang_JP')),
					'Keterangan' => $this->input->post('Keterangan'),
					'satuan' => $this->input->post('satuan'),
					'nip_penginputan' => $this->input->post('nip_penginputan'),
				);

			if (count($_POST)>0) {
            	$this->DistribusiLangsung->create($data);
            	$this->session->set_flashdata('alert', 'success_post');
            	redirect(site_url('verf_distribusi'));
        	}else{
            	$this->session->set_flashdata('alert', 'fail_post');
            	redirect(site_url('verf_distribusi'));
            }
		}else{
			$data = array(
            'judul' => 'Tambah Data Distribusi Langsung',
			'barang' => $this->DistribusiLangsung->getBarangByNoPemesanan($id),
			'permintaan' => $this->DistribusiLangsung->getPermintaanById($id),
        	);
			$this->load->view('backend/templates/header',$data);
        	$this->load->view('backend/distribusilangsung/distribusi',$data);
        	$this->load->view('backend/templates/footer');
        }
	}

	public function kwitansi($id){
		$data = array(
			'judul' => 'Kwitansi Distribusi Langsung',
			'distribusi' => $this->DistribusiLangsung->getDistribusiById($id),
		);
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/distribusilangsung/kwitansi', $data);
		$this->load->view('backend/templates/footer');
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
					$this->DistribusiLangsung->update($id,$data);
					$this->session->set_flashdata('alert', 'success_post');
					redirect(site_url('distribusilangsung'));
				} else {
					$this->session->set_flashdata('alert', 'fail_post');
					redirect(site_url('distribusilangsung'));
				}
		} else {
			$data = array(
				'judul' => 'Distribusi Langsung',
				'distribusilangsung' => $this->DistribusiLangsung->getDistribusiLangsungById($id),
			);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/distribusilangsung/update', $data);
			$this->load->view('backend/templates/footer');
		}
	}

	public function delete($id){
        $this->DistribusiKosong->delete($id);
        $this->session->set_flashdata('alert', 'success_delete');
		redirect(site_url('distribusikosong'));
		}
}