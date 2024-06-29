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
					<?php echo anchor('distribusikosong/create', '<i class="fa fa-plus"></i> Tambah Data', array('class' => 'btn btn-primary btn-sm float-right')) ?>
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
                                <th>Pegawai</th>
                                <th>Departemen Asal</th>
                                <th>Departemen Tujuan</th>
                                <th>No Kendaraan</th>
                                <th>Supir</th>
                                <th>Tanggal Berangkat</th>
                                <th>Jam Berangkat</th>
                                <th>Uang Jalan Pokok</th>
                                <th>Status</th>
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
                                <td><?= $val['tgl_berangkat'] ?></td>
								<td><?= $val['jam_berangkat'] ?></td>
                                <td><?= number_format($val['uang_JP']) ?></td>
                                <td><?= $val['status'] ?></td>
                                
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