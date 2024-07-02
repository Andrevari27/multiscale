<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"><?= $judul ?></h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Sistem Informasi PT Riau Mas Bersaudara</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <!-- <?php echo anchor('distribusikosong/create', '<i class="fa fa-plus"></i> Distribusi Kosong', array('class' => 'btn btn-primary btn-sm float-right')) ?> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>No. Pemesanan</th>
                                <th>Konsumen</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Cabang Permintaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
						$no = 1;
						foreach ($permintaan as $val): ?>
                            <?php if ($val['status'] == 'Approval'): ?>
                            <tr class="text-center">
                                <td><?= $no ?></td>
                                <td><?= $val['no_pemesanan'] ?></td>
                                <td><?= $val['nama_konsumen']." - ".$val['lokasi_bongkar'] ?></td>
                                <td><?= date_indo($val['tanggal']) ?></td>
                                <td><?= $val['cabang_permintaan'] ?></td>
                                <td>
                                    <a href="verf_distribusi/distribusi/<?= $val['no_pemesanan'] ?>"
                                        class="btn btn-info">Distribusi</a>
                                    <a href="verf_distribusi/invoice/<?= $val['no_pemesanan'] ?>"
                                        class="btn btn-success">Invoice</a>
                                    <a href="verf_distribusi/kwitansi/<?= $val['no_pemesanan'] ?>"
                                        class="btn btn-primary">Kwitansi</a>
                                </td>
                            </tr>
                            <?php
							$no++;
							 endif; endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Data Distribusi Kosong</h4>
                        <ol class="breadcrumb">
                        </ol>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Pegawai</th>
                                <th>Asal</th>
                                <th>Tujuan</th>
                                <th>No Kendaraan</th>
                                <th>Supir</th>
                                <th>Tanggal Berangkat</th>
                                <th>Jam Berangkat</th>
                                <th>Uang Jalan Pokok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
						$no = 1;
						foreach ($distribusikosong as $val): ?>
                            <tr class="text-center">
                                <td><?= $no ?></td>
                                <td><?= $val['nip_penginputan'] ?></td>
                                <td><?= $val['dep_asal'] ?></td>
                                <td><?= $val['dep_tujuan'] ?></td>
                                <td><?= $val['no_kendaraan'] ?></td>
                                <td><?= $val['supir'] ?></td>
                                <td><?= date_indo($val['tgl_berangkat']) ?></td>
                                <td><?= $val['jam_berangkat'] ?></td>
                                <td><?= number_format($val['uang_JP']) ?></td>
                                <td>
                                    <a href="verf_distribusi/distribusiKosong/<?= $val['no_distribusi'] ?>"
                                        class="btn btn-warning">Distribusikan</a>
                                </td>
                            </tr>
                            <?php
							$no++;
						 endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Data Distribusi</h4>
                        <ol class="breadcrumb">
                        </ol>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>No. Pemesanan</th>
                                <th>Asal</th>
                                <th>Transit</th>
                                <th>Tujuan</th>
                                <th>Nama Barang</th>
                                <th>Timbangan Muat</th>
                                <th>No Kendaraan</th>
                                <th>Supir</th>
                                <th>Uang Jalan Pokok</th>
                                <th>Uang Jalan Tambahan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
						$no = 1;
						foreach ($distribusi as $val): ?>
                            <tr class="text-center">
                                <td><?= $no ?></td>
                                <td><?= $val['no_pemesanan'] ?></td>
                                <td><?= $val['asal_distribusi'] ?></td>
                                <td><?= $val['tujuan_distribusi'] ?></td>
                                <td><?= $val['nama_konsumen'] ?></td>
                                <td><?= $val['kode_brng'] ?></td>
                                <td><?= number_format($val['tim_muat'])." ".$val['satuan']  ?></td>
                                <td><?= $val['no_kendaraan'] ?></td>
                                <td><?= $val['supir'] ?></td>
                                <td><?= number_format($val['uang_JP']) ?></td>
                                <td><?= number_format($val['uang_JT']) ?></td>
                                <td>
                                    <?php if ($val['status'] != 'Sudah Datang'){?>
                                    <a href="verf_distribusi/verifikasi/<?= $val['no_kendaraan'] ?>"
                                        class="btn btn-warning">Verifikasi Distribusi</a>
                                    <?php }else{ ?>
                                    <span>Sudah Verifikasi</span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php
							$no++; endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>