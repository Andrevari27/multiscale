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
                                <th>Konsumen</th>
                                <th>Tgl Pemesanan</th>
                                <th>Tgl Deadline</th>
                                <th>Status Permintaan</th>
                                <th>Status Approval</th>
                                <th>Status Distribusi</th>
                                <?php if ($this->session->userdata('session_dep') == 'Arengka'): ?>
                                <th>Aksi</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
						$no = 1;
						foreach ($permintaan as $val): ?>
                            <tr class="text-center">
                                <td><?= $no ?></td>
                                <td><?= $val['no_pemesanan'] ?></td>
                                <td><?= $val['nama_konsumen']." - ".$val['lokasi_bongkar'] ?></td>
                                <td><?= date_indo($val['tanggal']) ?></td>
                                <td><?= date_indo($val['tgl_deadline']) ?></td>
                                <td><?= $val['status_approval'] ?></td>
                                <td><?= $val['status_permintaan'] ?></td>
                                <td><?= $val['status_distribusi'] ?></td>
                                <?php if ($this->session->userdata('session_dep') == 'Arengka'): ?>
                                <td>
                                    <?php if ($val['status_approval'] !== 'Disetujui'): ?>
                                    <a href="permintaan/approve/<?= $val['no_pemesanan'] ?>" class="btn btn-warning"><i
                                            class="fa fa-check"></i> Approval</a>
                                    <?php else: ?>
                                        Sudah di Approve
                                    <?php endif; ?>
                                </td>
                                <?php endif ?>
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