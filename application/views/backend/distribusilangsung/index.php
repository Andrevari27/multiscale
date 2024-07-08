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
                            <?php if ($val['status'] == 'Disetujui'): ?>
                            <tr class="text-center">
                                <td><?= $no ?></td>
                                <td><?= $val['no_pemesanan'] ?></td>
                                <td><?= $val['nama_konsumen']." - ".$val['lokasi_bongkar'] ?></td>
                                <td><?= date_indo($val['tanggal']) ?></td>
                                <td><?= $val['cabang_permintaan'] ?></td>
                                <td>
                                    <a href="distribusilangsung/distribusi/<?= $val['no_pemesanan'] ?>"
                                        class="btn btn-info">Distribusi</a>
                                    <a href="distribusilangsung/kwitansi/<?= $val['no_pemesanan'] ?>"
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
        </div>
    </div>
</div>