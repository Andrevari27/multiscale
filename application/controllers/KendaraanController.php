<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KendaraanController extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $model = array('Kendaraan');
		$this->load->model($model);
    }

    public function index(){
        $data = array(
            'judul' => 'Data Kendaraan',
			'kendaraan' => $this->Kendaraan->getKendaraan()
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/kendaraan/index',$data);
        $this->load->view('backend/templates/footer');
    }

    public function create(){
		if (isset($_POST['simpan'])){

				$data = array(
					'no_kendaraan' => $this->input->post('no_kendaraan'),
					'merk_kendaraan' => $this->input->post('merk_kendaraan'),
					'jenis' => $this->input->post('jenis'),
					'Berat' => $this->input->post('Berat'),
                    'status' => $this->input->post('status'),
					'supir' => $this->input->post('supir'),
				);

			if (count($_POST)>0) {
            	$this->Kendaraan->create($data);
            	$this->session->set_flashdata('alert', 'success_post');
            	redirect(site_url('kendaraan'));
        	}else{
            	$this->session->set_flashdata('alert', 'fail_post');
            	redirect(site_url('kendaraan'));
            }
		}else{
			$data = array(
            'judul' => 'Tambah Data Kendaraan',
            'Kendaraan' => $this->Kendaraan->getKendaraan()
        	);
			$this->load->view('backend/templates/header',$data);
        	$this->load->view('backend/kendaraan/create',$data);
        	$this->load->view('backend/templates/footer');
        }
	}
	public function update($id){
		if (isset($_POST['simpan'])) {

            $data = array(
				'no_kendaraan' => $this->input->post('no_kendaraan'),
				'merk_kendaraan' => $this->input->post('merk_kendaraan'),
				'jenis' => $this->input->post('jenis'),
				'Berat' => $this->input->post('Berat'),
				'status' => $this->input->post('status'),
				'supir' => $this->input->post('supir'),
            );
				if (count($_POST) > 0) {
					$this->Kendaraan->update($id,$data);
					$this->session->set_flashdata('alert', 'success_post');
					redirect(site_url('kendaraan'));
				} else {
					$this->session->set_flashdata('alert', 'fail_post');
					redirect(site_url('kendaraan'));
				}
		} else {
			$data = array(
				'judul' => 'Edit Data Kendaraan',
				'kendaraan' => $this->Kendaraan->getKendaraanById($id),
			);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/kendaraan/update', $data);
			$this->load->view('backend/templates/footer');
		}
	}

	public function delete($id){
        $this->Kendaraan->delete($id);
        $this->session->set_flashdata('alert', 'success_delete');
		redirect(site_url('kendaraan'));
		}
		public function getSupirByKendaraan()
    {
        $no_kendaraan = $this->input->get('no_kendaraan');
        
        // Pastikan validasi dan penanganan kesalahan di sini
        $supir = $this->Kendaraan->getSupirByKendaraan($no_kendaraan);
        
        // Pastikan mengembalikan data dengan format yang benar
        echo json_encode($supir);
    }
}