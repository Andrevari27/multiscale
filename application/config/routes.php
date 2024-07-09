<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['dashboard'] = 'DashboardController/index';

//barang
$route['barang'] = 'BarangController/index';
$route['barang/create'] = 'BarangController/create';
$route['barang/update/(:any)'] = 'BarangController/update/$1';
$route['barang/delete/(:any)'] = 'BarangController/delete/$1';
$route['barang/getHargaByBarang'] = 'BarangController/getHargaByBarang';


//jenisbarang
$route['jenisbarang'] = 'JenisBarangController/index';
$route['jenisbarang/create'] = 'JenisBarangController/create';
$route['jenisbarang/update/(:any)'] = 'JenisBarangController/update/$1';
$route['jenisbarang/delete/(:any)'] = 'JenisBarangController/delete/$1';

//konsumen
$route['konsumen'] = 'KonsumenController/index';
$route['konsumen/create'] = 'KonsumenController/create';
$route['konsumen/update/(:any)'] = 'KonsumenController/update/$1';
$route['konsumen/delete/(:any)'] = 'KonsumenController/delete/$1';
$route['konsumen/search'] = 'KonsumenController/search';


//pegawai
$route['pegawai'] = 'PegawaiController/index';
$route['pegawai/create'] = 'PegawaiController/create';
$route['pegawai/update/(:any)'] = 'PegawaiController/update/$1';
$route['pegawai/delete/(:any)'] = 'PegawaiController/delete/$1';

//permintaan
$route['permintaan'] = 'PermintaanController/index';
$route['permintaan/create'] = 'PermintaanController/create';
$route['permintaan/approve/(:any)'] = 'PermintaanController/approve/$1';
$route['permintaan/view/(:any)'] = 'PermintaanController/view/$1';
$route['permintaan/delete/(:any)'] = 'PermintaanController/delete/$1';

//distribusikosong
$route['distribusikosong'] = 'DistribusiKosongController/index';
$route['distribusikosong/create'] = 'DistribusiKosongController/create';
$route['distribusikosong/update/(:any)'] = 'DistribusiKosongController/update/$1';
$route['distribusikosong/view/(:any)'] = 'DistribusiKosongController/view/$1';
$route['distribusikosong/delete/(:any)'] = 'DistribusiKosongController/delete/$1';
$route['distribusikosong/kwitansi/(:any)'] = 'DistribusiKosongController/kwitansi/$1';

//distribusilangsung
$route['distribusilangsung'] = 'DistribusiLangsungController/index';
$route['distribusilangsung/distribusi/(:any)'] = 'DistribusiLangsungController/distribusiLangsung/$1';
$route['distribusilangsung/update/(:any)'] = 'DistribusiLangsungController/update/$1';
$route['distribusilangsung/view/(:any)'] = 'DistribusiLangsungController/view/$1';
$route['distribusilangsung/delete/(:any)'] = 'DistribusiLangsungController/delete/$1';
$route['distribusilangsung/kwitansi/(:any)'] = 'DistribusiLangsungController/kwitansi/$1';


//verf distribusi
$route['verf_distribusi'] = 'VerfDistribusiController/index';
$route['verf_distribusi/create'] = 'VerfDistribusiController/create';
$route['verf_distribusi/distribusi'] = 'VerfDistribusiController/distribusi';
$route['verf_distribusi/distribusi/(:any)'] = 'VerfDistribusiController/distribusi/$1';
$route['verf_distribusi/verifikasi/(:any)'] = 'VerfDistribusiController/verifikasi/$1';
$route['verf_distribusi/view/(:any)'] = 'VerfDistribusiController/view/$1';
$route['verf_distribusi/delete/(:any)'] = 'VerfDistribusiController/delete/$1';
$route['verf_distribusi/distribusiKosong/(:any)'] = 'VerfDistribusiController/distribusiKosong/$1';
$route['verf_distribusi/getDataByNoPemesanan'] = 'VerfDistribusiController/getDataByNoPemesanan';

//Kendaraan
$route['kendaraan'] = 'KendaraanController/index';
$route['kendaraan/create'] = 'KendaraanController/create';
$route['kendaraan/update/(:any)'] = 'KendaraanController/update/$1';
$route['kendaraan/view/(:any)'] = 'KendaraanController/view/$1';
$route['kendaraan/delete/(:any)'] = 'KendaraanController/delete/$1';
$route['kendaraan/getSupirByKendaraan'] = 'KendaraanController/getSupirByKendaraan';

//dokumen
$route['invoice'] = 'LaporanController/invoice';
$route['laporan'] = 'LaporanController/index';
$route['dokumen/getBarangByNoPemesanan/(:any)'] = 'LaporanController/getbarangByNoPemesanan/$1';
$route['dokumen/getDistribusiByPemesananBarang/(:any)'] = 'LaporanController/getDistribusiByPemesananBarang/$1';

$route['login'] = 'AuthController/index';
$route['auth/login'] = 'AuthController/login';
$route['auth/logout'] = 'AuthController/logout';
$route['default_controller'] = 'AuthController/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

