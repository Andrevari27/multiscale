<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class VerfDistribusiController extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $model = array('Permintaan','Barang','Konsumen','Pegawai','Distribusi','Kendaraan','DistribusiKosong');
		$this->load->model($model);
    }

    public function index(){
        $data = array(
            'judul' => 'Data Permintaan',
			'permintaan' => $this->Permintaan->getPermintaan(),
			'distribusi' => $this->Distribusi->getDistribusi(),
            'distribusikosong' => $this->DistribusiKosong->getDistribusiKosong()

        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/verf_distribusi/index',$data);
        $this->load->view('backend/templates/footer');
    }


    public function distribusiKosong($id){
        if (isset($_POST['simpan'])) {
            $data = array(
                'no_distribusi' => $this->input->post('no_distribusi'),
                'no_pemesanan' => $this->input->post('no_pemesanan'),
                'dep_asal' => $this->input->post('dep_asal'),
                'kode_brng' => $this->input->post('kode_brng'),
                'nama_konsumen' => $this->input->post('kode_konsumen'),
                'tim_muat' => str_replace(',', '', $this->input->post('tim_muat')),
                'no_kendaraan' => $this->input->post('no_kendaraan'),
                'supir' => $this->input->post('supir'),
                'tgl_berangkat' => $this->input->post('tgl_berangkat'),
                'uang_JP' => str_replace(',', '', $this->input->post('uang_JP')),
                'uang_JT' => str_replace(',', '', $this->input->post('uang_JT')),
                'Keterangan' => $this->input->post('Keterangan'),
                'nip_penginputan' => $this->input->post('nip_penginputan'),
                'satuan' => $this->input->post('satuan'),
                'harga' => str_replace(',','', $this->input->post('harga')),
                'jam_berangkat ' => $this->input->post('jam_berangkat'),
            );
				if (count($_POST) > 0) {
					$this->Distribusi->create($data);
					$this->session->set_flashdata('alert', 'success_post');
					redirect(site_url('verf_distribusi'));
				} else {
					$this->session->set_flashdata('alert', 'fail_post');
					redirect(site_url('verf_distribusi'));
				}
		}else{
            
        $data = array(
            'judul' => 'Distribusi Kosong',
            'permintaan' => $this->Permintaan->getPermintaanById($id),
            'distribusikosong' => $this->DistribusiKosong->getDistribusiKosongById($id),
            'distribusi' => $this->Distribusi->getDistribusiAById($id),

        );
        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/verf_distribusi/distribusiKosong', $data);
        $this->load->view('backend/templates/footer');  
    
        }
    }

	public function distribusi($id){
		if (isset($_POST['simpan'])) {
            $data = array(
                'no_pemesanan' => $this->input->post('no_pemesanan'),
                'dep_asal' => $this->input->post('dep_asal'),
                'kode_brng' => $this->input->post('kode_brng'),
                'kode_konsumen' => $this->input->post('kode_konsumen'),
                'tim_muat' => str_replace(',', '', $this->input->post('tim_muat')),
                'no_kendaraan' => $this->input->post('no_kendaraan'),
                'supir' => $this->input->post('supir'),
                'tgl_berangkat' => $this->input->post('tgl_berangkat'),
                'uang_JP' => str_replace(',', '', $this->input->post('uang_JP')),
                'Keterangan' => $this->input->post('Keterangan'),
                'nip_penginputan' => $this->input->post('nip_penginputan'),
                'satuan' => $this->input->post('satuan'),
                'harga' => str_replace(',','', $this->input->post('harga')),
                'jam_berangkat ' => $this->input->post('jam_berangkat'),
            );
				if (count($_POST) > 0) {
					$this->Distribusi->create($data);
					$this->session->set_flashdata('alert', 'success_post');
					redirect(site_url('verf_distribusi'));
				} else {
					$this->session->set_flashdata('alert', 'fail_post');
					redirect(site_url('verf_distribusi'));
				}
		} else {
            // $id = $this->input->post('no_pemesanan'); // Sesuaikan dengan cara Anda mendapatkan ID
			$data = array(
				'judul' => 'Distribusi Data Permintaan',
				'permintaan' => $this->Permintaan->getPermintaanById($id),
                'distribusi' => $this->Distribusi->getDistribusiAById($id),
                
			);
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/verf_distribusi/distribusi', $data);
			$this->load->view('backend/templates/footer');
		}
	}

    public function verifikasi($id){
		if (isset($_POST['simpan'])) {

            $tim_muat = str_replace(',', '', $this->input->post('tim_muat'));
            $tim_bongkar = str_replace(',', '', $this->input->post('tim_bongkar'));
            $volume = ($tim_muat+$tim_bongkar)/2;
            $selisih_mb = $tim_muat-$tim_bongkar;


            $data = array(
                'no_pemesanan' => $this->input->post('no_pemesanan'),
                'dep_asal' => $this->input->post('dep_asal'),
                'kode_brng' => $this->input->post('kode_brng'),
                'tim_muat' => $tim_muat,
                'no_kendaraan' => $this->input->post('no_kendaraan'),
                'supir' => $this->input->post('supir'),
                'tgl_berangkat' => $this->input->post('tgl_berangkat'),
                'uang_JP' => str_replace(',', '', $this->input->post('uang_JP')),
                'uang_JT' => str_replace(',', '', $this->input->post('uang_JT')),
                'Keterangan' => $this->input->post('Keterangan'),
                'satuan' => $this->input->post('satuan'),
                'harga' => str_replace(',','', $this->input->post('harga')),
                'jam_berangkat ' => $this->input->post('jam_berangkat'),
                'tgl_sampai ' => $this->input->post('tgl_sampai'),
                'tim_bongkar' => $tim_bongkar,
                'volume ' => $volume,
                'selisih_mb ' => $selisih_mb,
                'total_harga ' => $this->input->post('total_harga'),
                'nip_closing ' => $this->input->post('nip_closing'),
                'status ' => 'Sudah Datang',
                'jam_sampai ' => $this->input->post('jam_sampai'),
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
				'judul' => 'Verifikasi Distribusi Data Permintaan',
				'distribusi' => $this->Distribusi->getDistribusiById($id),
			);
            // var_dump($data['distribusi']);exit();
			$this->load->view('backend/templates/header', $data);
			$this->load->view('backend/verf_distribusi/verifikasi', $data);
			$this->load->view('backend/templates/footer');
		}
	}
    
    
    public function getDataByNoPemesanan()
    {
    // Pastikan Anda menggunakan model untuk mengambil data
    $no_pemesanan = $this->input->post('no_pemesanan');

    // Panggil model untuk mengambil data berdasarkan no pemesanan
    $data = $this->Permintaan->getDataByNoPemesanan($no_pemesanan); // Ganti Permintaan dengan nama model yang sesuai

    // Kemudian kirimkan data dalam format JSON
    echo json_encode($data);
}   

    public function invoice($id){
        $data = array(
            'judul' => 'Invoice',
            'distribusi' => $this->Distribusi->getDistribusiByPemesananId($id), // Perubahan di sini
            'distribusiPpn' => $this->Distribusi->getPpnByNoPemesanan($id), // Perubahan di sini
            'distribusiPph' => $this->Distribusi->getPphByNoPemesanan($id), // Perubahan di sini
            'distribusiA' => $this->Distribusi->getDistribusiAById($id), // Perubahan di sini
            'distribusiJumlah' => $this->Distribusi->getDistribusiJumlah($id), // Perubahan di sini
        );
        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/verf_distribusi/invoice', $data);
        $this->load->view('backend/templates/footer');
    }
    public function kwitansi($id){
        $data = array(
            'judul' => 'Kwitansi',
			'distribusi' => $this->Distribusi->getDistribusiByPemesananId($id), // Perubahan di sini
            'distribusiA' => $this->Distribusi->getDistribusiAById($id), // Perubahan di sini
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/verf_distribusi/kwitansi',$data);
        $this->load->view('backend/templates/footer');
    }
}