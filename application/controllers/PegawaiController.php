<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiController extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $model = array('Pegawai');
		$this->load->model($model);
    }

    public function index(){
        $data = array(
            'judul' => 'Data Pegawai',
			'pegawai' => $this->Pegawai->getPegawai()
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/pegawai/index',$data);
        $this->load->view('backend/templates/footer');
    }

    public function create(){
		if (isset($_POST['simpan'])){

				$data = array(
					'nik ' => $this->input->post('nik'),
					'nip ' => $this->input->post('nip'),
					'nama ' => $this->input->post('nama'),
					'jk' => $this->input->post('jk'),
					'jbtn ' => $this->input->post('jbtn'),
					'departemen ' => $this->input->post('departemen'),
                    'npwp' => $this->input->post('npwp'),
					'pendidikan' => $this->input->post('pendidikan'),
					'tmp_lahir ' => $this->input->post('tmp_lahir'),
					'tgl_lahir ' => $this->input->post('tgl_lahir'),
					'alamat ' => $this->input->post('alamat'),
					'kota' => $this->input->post('kota'),
					'mulai_kerja' => $this->input->post('mulai_kerja'),
					'rekening ' => $this->input->post('rekening'),
					'photo' => $this->input->post('photo'),
				);

			if (count($_POST)>0) {
            	$this->Pegawai->create($data);
            	$this->session->set_flashdata('alert', 'success_post');
            	redirect(site_url('pegawai'));
        	}else{
            	$this->session->set_flashdata('alert', 'fail_post');
            	redirect(site_url('pegawai'));
            }
		}else{
			$data = array(
            'judul' => 'Tambah Data Pegawai',
            'pegawai' => $this->Pegawai->getPegawai()
        	);
			$this->load->view('backend/templates/header',$data);
        	$this->load->view('backend/pegawai/create',$data);
        	$this->load->view('backend/templates/footer');
        }
	}
	public function update($id){
		if (isset($_POST['simpan'])) {

            $data = array(
					'nik ' => $this->input->post('nik'),
					'nip ' => $this->input->post('nip'),
					'nama ' => $this->input->post('nama'),
					'jk' => $this->input->post('jk'),
					'jbtn ' => $this->input->post('jbtn'),
					'departemen ' => $this->input->post('departemen'),
                    'npwp' => $this->input->post('npwp'),
					'pendidikan' => $this->input->post('pendidikan'),
					'tmp_lahir ' => $this->input->post('tmp_lahir'),
					'tgl_lahir ' => $this->input->post('tgl_lahir'),
					'alamat ' => $this->input->post('alamat'),
					'kota' => $this->input->post('kota'),
					'mulai_kerja' => $this->input->post('mulai_kerja'),
					'rekening ' => $this->input->post('rekening'),
					'photo' => $this->input->post('photo'),
			);
				if (count($_POST) > 0) {
					$this->Pegawai->update($id,$data);
					$this->session->set_flashdata('alert', 'success_post');
					redirect(site_url('pegawai'));
				} else {
					$this->session->set_flashdata('alert', 'fail_post');
					redirect(site_url('pegawai'));
				}
		} else {
			$data = array(
				'judul' => 'Edit Data pegawai',
				'pegawai' => $this->Pegawai->getPegawaiById($id),
			);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/pegawai/update', $data);
			$this->load->view('backend/templates/footer');
		}
	}

	public function delete($id){
        $this->Pegawai->delete($id);
        $this->session->set_flashdata('alert', 'success_delete');
		redirect(site_url('pegawai'));
		}
}