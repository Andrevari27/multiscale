<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KonsumenController extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $model = array('Konsumen');
		$this->load->model($model);
    }

    public function index(){
        $data = array(
            'judul' => 'Data Konsumen',
			'konsumen' => $this->Konsumen->getKonsumen()
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/konsumen/index',$data);
        $this->load->view('backend/templates/footer');
    }

    public function create(){
		if (isset($_POST['simpan'])){

				$data = array(
					'kode_konsumen ' => $this->input->post('kode_konsumen'),
					'nama_konsumen ' => $this->input->post('nama_konsumen'),
					'alamat ' => $this->input->post('alamat'),
					'lokasi_bongkar' => $this->input->post('lokasi_bongkar'),
					'no_telp ' => $this->input->post('no_telp'),
                    // 'nama_bank' => $this->input->post('nama_bank'),
					// 'rekening' => $this->input->post('rekening'),
					'penjab' => $this->input->post('penjab'),
				);

			if (count($_POST)>0) {
            	$this->Konsumen->create($data);
            	$this->session->set_flashdata('alert', 'success_post');
            	redirect(site_url('konsumen'));
        	}else{
            	$this->session->set_flashdata('alert', 'fail_post');
            	redirect(site_url('konsumen'));
            }
		}else{
			$data = array(
            'judul' => 'Tambah Data Konsumen',
            'konsumen' => $this->Konsumen->getKonsumen()
        	);
			$this->load->view('backend/templates/header',$data);
        	$this->load->view('backend/konsumen/create',$data);
        	$this->load->view('backend/templates/footer');
        }
	}
	public function update($id){
		if (isset($_POST['simpan'])) {

            $data = array(
				'kode_konsumen ' => $this->input->post('kode_konsumen'),
				'nama_konsumen ' => $this->input->post('nama_konsumen'),
				'alamat ' => $this->input->post('alamat'),
				'lokasi_bongkar' => $this->input->post('lokasi_bongkar'),
				'no_telp ' => $this->input->post('no_telp'),
				// 'nama_bank' => $this->input->post('nama_bank'),
				// 'rekening' => $this->input->post('rekening'),
				'penjab' => $this->input->post('penjab'),
			);
				if (count($_POST) > 0) {
					$this->Konsumen->update($id,$data);
					$this->session->set_flashdata('alert', 'success_post');
					redirect(site_url('konsumen'));
				} else {
					$this->session->set_flashdata('alert', 'fail_post');
					redirect(site_url('konsumen'));
				}
		} else {
			$data = array(
				'judul' => 'Edit Data Konsumen',
				'konsumen' => $this->Konsumen->getKonsumenById($id),
			);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/konsumen/update', $data);
			$this->load->view('backend/templates/footer');
		}
	}

	public function search()
    {
        $searchTerm = $this->input->get('term'); // Ambil nilai pencarian dari parameter GET 'term'

        // Panggil method getKonsumen dari model Konsumen_model untuk mendapatkan data konsumen
        $results = $this->Konsumen->getKonsumenByName($searchTerm);

        // Format data untuk format JSON yang diharapkan oleh Select2
        $data = array();
        foreach ($results as $row) {
            $data[] = array(
                'id' => $row['kode_konsumen'],
                'text' => $row['nama_konsumen'] . ' - ' . $row['lokasi_bongkar']
            );
        }

        // Keluarkan data dalam format JSON
        echo json_encode($data);
    }

	public function delete($id){
        $this->Konsumen->delete($id);
        $this->session->set_flashdata('alert', 'success_delete');
		redirect(site_url('konsumen'));
		}
}