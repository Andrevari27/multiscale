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
			'permintaan' => $this->Permintaan->getPermintaan(),
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/permintaan/index',$data);
        $this->load->view('backend/templates/footer');
    }

    public function create() {
		if (isset($_POST['simpan'])) {
			// Generate nomor pemesanan
			$no_p = generate_spm_number();
			// Ambil data barang yang di-inputkan
			$kode_barangs = $this->input->post('kode_brng');
			$jumlahs = str_replace(',', '', $this->input->post('jumlah'));
			$satuans = $this->input->post('kode_satuan');
			$hargas = str_replace(',', '', $this->input->post('harga'));
			
			// Inisialisasi total
			$total = 0;
	
			// Ambil semua data dari form
			$data = array(
				'no_pemesanan' => $no_p,
				'tanggal' => $this->input->post('tanggal'),
				'tgl_deadline' => $this->input->post('tgl_deadline'),
				'kode_konsumen' => $this->input->post('kode_konsumen'),
				'nip' => $this->input->post('nip'),
				'cabang_permintaan' => $this->input->post('cabang_permintaan'),
				'ppn' => $this->input->post('ppn'),
				'pph' => $this->input->post('pph'),
				'potongan' => $this->input->post('potongan'),
				// Tambahkan data lain yang diperlukan
			);
	
			// Lakukan validasi atau operasi lainnya sesuai kebutuhan aplikasi
	
			// Simpan data permintaan
			$this->Permintaan->create($data);
	
			// Lakukan iterasi untuk menyimpan detail permintaan
			for ($i = 0; $i < count($kode_barangs); $i++) {
				$detail_data = array(
					'no_pemesanan' => $no_p,
					'kode_brng' => $kode_barangs[$i],
					'jumlah' => $jumlahs[$i],
					'kode_sat' => $satuans[$i],
					'harga' => $hargas[$i],
					'subtotal' => $jumlahs[$i] * $hargas[$i],
					// Tambahkan data lain yang diperlukan
				);
	
				// Tambahkan subtotal ke total
				$total += $detail_data['subtotal'];
	
				// Simpan detail permintaan
				$this->PermintaanDetail->create($detail_data);
			}
	
			// Set total ke dalam data pemesanan
			$data['total'] = $total;
	
			// Update total di tabel pemesanan
			$this->Permintaan->updateTotal($no_p, $total); // Adjust this according to your model method
	
			// Set flashdata untuk alert
			$this->session->set_flashdata('alert', 'success_post');
	
			// Redirect ke halaman permintaan atau halaman lain sesuai kebutuhan
			redirect(site_url('permintaan'));
		} else {
			// Tampilkan halaman form tambah data permintaan
			$data = array(
				'judul' => 'Tambah Data Permintaan',
				'permintaan' => $this->Permintaan->getPermintaan(),
				'konsumen' => $this->Konsumen->getKonsumen(),
				'barang' => $this->Barang->getBarang()
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
					'status' => 'Disetujui',
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