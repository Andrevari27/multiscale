<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PermintaanController extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
		$this->load->helper('number_helper'); // Muat helper
        $model = array('Permintaan','Barang','Konsumen','Pegawai','PermintaanDetail');
		$this->load->model($model);
    }

    public function index(){
        $data = array(
            'judul' => 'Data Permintaan',
			'permintaan' => $this->Permintaan->getPermintaan()
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/permintaan/index',$data);
        $this->load->view('backend/templates/footer');
    }

    public function create() {
		if (isset($_POST['simpan'])) {
			
			$jumlah = str_replace(',', '', $this->input->post('jumlah'));
        	$harga = str_replace(',', '', $this->input->post('harga'));
			$total = $jumlah*$harga;
			$subtotal = $jumlah*$harga;
            $potongan = $this->input->post('potongan');
			$ppn_persen = $this->input->post('ppn');
			$pph_persen = $this->input->post('pph');
            $ppn = ($ppn_persen/100)*$total;
            $pph = ($pph_persen/100)*$total;
			$tagihan = $subtotal+$ppn-$pph; 
			$no_p = generate_spm_number();


			$data = array(
				'no_pemesanan' => $no_p,
				'tanggal' => $this->input->post('tanggal'),
				'tgl_deadline' => $this->input->post('tgl_deadline'),
				'kode_konsumen' => $this->input->post('kode_konsumen'),
				'kode_brng' => $this->input->post('kode_brng'),
				'nip' => $this->input->post('nip'),
				'cabang_permintaan' => $this->input->post('cabang_permintaan'),
				'satuan' => $this->input->post('satuan'),
				'jumlah' => $jumlah,
				// 'subtotal' => $jumlah*$harga,
				'total' => $total,
				'harga' => $harga,
				'potongan' => $potongan,
				'ppn' => $ppn_persen,
				'pph' => $pph_persen,
				'tagihan' => $tagihan,
			);
	
			// // Simpan data permintaan
			// $no_pemesanan = $this->Permintaan->create($data);
	
			// // Data untuk detail permintaan
			// $data_detail_permintaan = array(
			// 	'no_pemesanan' => $this->input->post('no_pemesanan'),
			// 	'kode_brng' => $this->input->post('kode_brng'),
			// 	'kode_sat' => 'Ton',
			// 	'jumlah' => $jumlah,
			// 	'harga' => $harga,
			// 	'subtotal' => $total,

			// );
	
			// Lakukan pemeriksaan untuk memastikan tidak ada duplikasi
			// Misalnya, cek apakah kombinasi id_permintaan dan kode_brng sudah ada sebelumnya
			// if ($this->PermintaanDetail->isDuplicate($no_pemesanan, $data_detail_permintaan['kode_brng'])) {
			// 	// Jika duplikat ditemukan, berikan pesan kesalahan
			// 	$this->session->set_flashdata('alert', 'duplicate_entry');
			// 	redirect(site_url('permintaan/create'));
			// } else {
			// 	// Simpan data detail permintaan
			// 	$this->PermintaanDetail->create($data_detail_permintaan);
	
			// 	// Berikan pesan sukses dan redirect
			// 	$this->session->set_flashdata('alert', 'success_post');
			// 	redirect(site_url('permintaan'));
			// }
			if (count($_POST)>0) {
            	$this->Permintaan->create($data);
            	$this->session->set_flashdata('alert', 'success_post');
            	redirect(site_url('permintaan'));
        	}else{
            	$this->session->set_flashdata('alert', 'fail_post');
            	redirect(site_url('permintaan'));
            }
		} else {
			// Tampilkan halaman form tambah data permintaan
			$data = array(
				'judul' => 'Tambah Data Permintaan',
				'permintaan' => $this->Permintaan->getPermintaan()
			);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/permintaan/create', $data);
			$this->load->view('backend/templates/footer');
		}
	}
	
	public function approve($id){
		if (isset($_POST['simpan'])) {

            $data = array(
                	'no_pemesanan' => $this->input->post('no_pemesanan'),
					'kode_konsumen' => $this->input->post('kode_konsumen'),
					'nip' => $this->input->post('nip'),
					'tanggal' => $this->input->post('tanggal'),
					'tgl_deadline' => $this->input->post('tgl_deadline'),
					'cabang_permintaan' => $this->input->post('cabang_permintaan'),
					'status' => 'Approval',
					'cabang_approval' => $this->input->post('cabang_approval'),
					// 'satuan' => $this->input->post('satuan'),
					'cabang_distribusi' => 'Rimbo Panjang',
					// 'subtotal' => str_replace(',', '', $this->input->post('subtotal')),
					'potongan' => str_replace(',', '', $this->input->post('potongan')),
					'total' => str_replace(',', '', $this->input->post('total')),
					'ppn' => str_replace(',', '', $this->input->post('ppn')),
					'pph' => str_replace(',', '', $this->input->post('pph')),
					'tagihan' => str_replace(',', '', $this->input->post('tagihan')),
					'jenis_harga' => $this->input->post('jenis_harga'),
            );
				if (count($_POST) > 0) {
					$this->Permintaan->update($id,$data);
					$this->session->set_flashdata('alert', 'success_post');
					redirect(site_url('permintaan'));
				} else {
					$this->session->set_flashdata('alert', 'fail_post');
					redirect(site_url('permintaan'));
				}
		} else {
			$data = array(
				'judul' => 'Approve Data Permintaan',
				'permintaan' => $this->Permintaan->getPermintaanById($id),
			);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/permintaan/approve', $data);
			$this->load->view('backend/templates/footer');
		}
	}
	
	public function view($id){
		$data = array(
			'judul' => 'Lihat Data Permintaan',
			'permintaan' => $this->Permintaan->getPermintaanById($id),
		);
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/permintaan/view', $data);
		$this->load->view('backend/templates/footer');
	}

	public function delete($id){
        $this->Permintaan->delete($id);
        $this->session->set_flashdata('alert', 'success_delete');
		redirect(site_url('permintaan'));
		}
}