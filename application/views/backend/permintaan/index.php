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
                        <?php echo anchor('permintaan/create', '<i class="fa fa-plus"></i> Tambah Data', array('class' => 'btn btn-primary btn-sm float-right')) ?>
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
                                <th>Nama Pegawai</th>
                                <th>Konsumen</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Barang</th>
                                <th>Volume</th>
                                <th>Status Pemesanan</th>
                                <?php if ($this->session->userdata('session_dep') == 'Arengka'): ?>
                                <th>Proses</th>
                                <?php endif ?>
                                <th>Lihat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
						$no = 1;
						foreach ($permintaan as $val): ?>
                            <tr class="text-center">
                                <td><?= $no ?></td>
                                <td><?= $val['no_pemesanan'] ?></td>
                                <td><?= $val['nip'] ?></td>
                                <td><?= $val['nama_konsumen']." - ".$val['lokasi_bongkar'] ?></td>
                                <td><?= date_indo($val['tanggal']) ?></td>
                                <td><?= $val['nama_brng'] ?></td>
                                <td><?= $val['jumlah']." ".$val['satuan'] ?></td>
                                <td><?= $val['status'] ?></td>
                                <?php if ($this->session->userdata('session_dep') == 'Arengka'): ?>
                                <td>
                                    <?php if ($val['status'] !== 'Disetujui'): ?>
                                    <a href="permintaan/approve/<?= $val['no_pemesanan'] ?>" class="btn btn-warning"><i
                                            class="fa fa-check"></i> Setujui</a>
                                            <a href="permintaan/delete/<?= $val['no_pemesanan'] ?>" class="btn btn-danger"><i
                                            class="fa fa-times"></i> Tolak</a>
                                    <?php else: ?>
                                         Selesai
                                    <?php endif; ?>
                                </td>
                                <?php endif ?>
                                <td><a href="permintaan/view/<?= $val['no_pemesanan'] ?>" class="btn btn-info"><i
                                            class="fa fa-eye"></i></a></td>
                            </tr>
                            <?php
							$no++;
						endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>