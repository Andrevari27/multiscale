<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class JenisBarangController extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $model = array('JenisBarang');
		$this->load->model($model);
    }

    public function index(){
        $data = array(
            'judul' => 'Data Barang',
			'jenisbarang' => $this->JenisBarang->getJenisBarang()
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/jenisbarang/index',$data);
        $this->load->view('backend/templates/footer');
    }

    public function create(){
		if (isset($_POST['simpan'])){

				$data = array(
					'kd_jenis' => $this->input->post('kd_jenis'),
					'nm_jenis' => $this->input->post('nm_jenis'),
					);

			if (count($_POST)>0) {
            	$this->JenisBarang->create($data);
            	$this->session->set_flashdata('alert', 'success_post');
            	redirect(site_url('jenisbarang'));
        	}else{
            	$this->session->set_flashdata('alert', 'fail_post');
            	redirect(site_url('jenisbarang'));
            }
		}else{
			$data = array(
            'judul' => 'Tambah Data Jenis Barang',
            'jenisbarang' => $this->JenisBarang->getJenisBarang()
        	);
			$this->load->view('backend/templates/header',$data);
        	$this->load->view('backend/jenisbarang/create',$data);
        	$this->load->view('backend/templates/footer');
        }
	}
	public function update($id){
		if (isset($_POST['simpan'])) {

            $data = array(
				'kd_jenis' => $this->input->post('kd_jenis'),
				'nm_jenis' => $this->input->post('nm_jenis'),
            );
				if (count($_POST) > 0) {
					$this->JenisBarang->update($id,$data);
					$this->session->set_flashdata('alert', 'success_post');
					redirect(site_url('jenisbarang'));
				} else {
					$this->session->set_flashdata('alert', 'fail_post');
					redirect(site_url('jenisbarang'));
				}
		} else {
			$data = array(
				'judul' => 'Edit Data Jenis Barang',
				'jenisbarang' => $this->JenisBarang->getJenisBarangById($id),
			);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/jenisbarang/update', $data);
			$this->load->view('backend/templates/footer');
		}
	}

	public function delete($id){
        $this->JenisBarang->delete($id);
        $this->session->set_flashdata('alert', 'success_delete');
		redirect(site_url('jenisbarang'));
		}
}