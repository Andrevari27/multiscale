<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BarangController extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $model = array('Barang');
		$this->load->model($model);
    }

    public function index(){
        $data = array(
            'judul' => 'Data Barang',
			'barang' => $this->Barang->getBarang()
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/barang/index',$data);
        $this->load->view('backend/templates/footer');
    }

    public function create(){
		if (isset($_POST['simpan'])){

				$data = array(
					'kode_brng' => $this->input->post('kode_brng'),
					'nama_brng' => $this->input->post('nama_brng'),
					// 'kode_sat' => $this->input->post('kode_sat'),
					// 'jenis' => $this->input->post('jenis'),
					// 'harga' => str_replace(',', '', $this->input->post('harga')),
				);

			if (count($_POST)>0) {
            	$this->Barang->create($data);
            	$this->session->set_flashdata('alert', 'success_post');
            	redirect(site_url('barang'));
        	}else{
            	$this->session->set_flashdata('alert', 'fail_post');
            	redirect(site_url('barang'));
            }
		}else{
			$data = array(
            'judul' => 'Tambah Data Barang',
            'barang' => $this->Barang->getBarang()
        	);
			$this->load->view('backend/templates/header',$data);
        	$this->load->view('backend/barang/create',$data);
        	$this->load->view('backend/templates/footer');
        }
	}
	public function update($id){
		if (isset($_POST['simpan'])) {

            $data = array(
                    'kode_brng' => $this->input->post('kode_brng'),
					'nama_brng' => $this->input->post('nama_brng'),
					// 'kode_sat' => $this->input->post('kode_sat'),
					// 'jenis' => $this->input->post('jenis'),
					// 'harga' => str_replace(',', '', $this->input->post('harga')),
            );
				if (count($_POST) > 0) {
					$this->Barang->update($id,$data);
					$this->session->set_flashdata('alert', 'success_post');
					redirect(site_url('barang'));
				} else {
					$this->session->set_flashdata('alert', 'fail_post');
					redirect(site_url('barang'));
				}
		} else {
			$data = array(
				'judul' => 'Edit Data Barang',
				'barang' => $this->Barang->getBarangById($id),
			);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/barang/update', $data);
			$this->load->view('backend/templates/footer');
		}
	}

	public function delete($id){
        $this->Barang->delete($id);
        $this->session->set_flashdata('alert', 'success_delete');
		redirect(site_url('barang'));
		}

		public function getHargaByBarang()
		{
			$kode_brng = $this->input->get('kode_brng');
			
			// Pastikan validasi dan penanganan kesalahan di sini
			$harga = $this->Barang->getHargaByBarang($kode_brng);
			
			// Pastikan mengembalikan data dengan format yang benar
			echo json_encode($harga);
		}
}