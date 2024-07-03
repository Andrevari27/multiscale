<div class="content-page">
    <!-- Start content -->
    <script>
        $(document).ready(function() {
            $('#no_kendaraan').select2();
        });
        $(document).ready(function() {
            $('#kode_konsumen').select2();
        });
        $(document).ready(function() {
            $('#no_pemesanan').select2();
        });
    </script>
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <h4 class="page-title"><?= $judul ?></h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Sistem Informasi PT Riau Mas Bersaudara</li>
                        </ol>
                    </div>
                    <div class="col-sm-12">

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="page-title-box">
                <form method="GET" action="<?= site_url('laporan') ?>">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row mb-4">
                            <?php
								$distribusiK = $this->Kendaraan->getKendaraan();
								?>
                                <div class="col-sm-2">
                                    <label for="" class="col-form-label">Kendaraan</label>
                                    <select name="no_kendaraan" id="no_kendaraan" class="form-control select2" required>
                                        <option>Pilih Kendaraan</option>
                                        <?php foreach ($distribusiK as $a): ?>
                                        <option value="<?= $a['no_kendaraan'] ?>"><?= $a['no_kendaraan'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <?php 
                                $distribusiK = $this->Konsumen->getKonsumen();
                                ?>
                                <div class="col-2">
                                    <label for="" class="col-form-label">Konsumen</label>
                                    <select name="kode_konsumen" id="kode_konsumen" class="form-control select2" required>
                                        <option>Pilih Konsumen</option>
                                        <?php foreach ($distribusiK as $a): ?>
                                        <option value="<?= $a['kode_konsumen'] ?>"><?= $a['nama_konsumen']." - ".$a['lokasi_bongkar'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <?php
                                $distribusiK = $this->Permintaan->getPermintaan();
                                ?>
                                <div class="col-2">
                                    <label for="" class="col-form-label">No Pemesanan</label>
                                    <select name="no_pemesanan" id="no_pemesanan" class="form-control select2" required>
                                        <option>Pilih No Pemesanan</option>
                                        <?php foreach ($distribusiK as $a): ?>
                                        <option value="<?= $a['no_pemesanan'] ?>"><?= $a['no_pemesanan'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="" class="col-form-label">Tanggal Dari</label>
                                    <input type="date" id="tanggal_dari" name="tanggal_dari" class="form-control"
                                        value="<?= isset($_GET['tanggal_dari']) ? $_GET['tanggal_dari'] : '' ?>">
                                </div>
                                <div class="col-2">
                                    <label for="" class="col-form-label">Tanggal Sampai</label>
                                    <input type="date" id="tanggal_sampai" name="tanggal_sampai" class="form-control"
                                        value="<?= isset($_GET['tanggal_sampai']) ? $_GET['tanggal_sampai'] : '' ?>">
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 38px;">Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>No Pemesanan</th>
                                <th>Asal Distribusi</th>
                                <th>Transit</th>
                                <th>Tujuan Distribusi</th>
                                <th>No Kendaraan</th>
                                <th>Supir</th>
                                <th>Tanggal Berangkat</th>
                                <th>Jam Berangkat</th>
                                <th>Uang Jalan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
						$no = 1;
						foreach ($distribusiSearch as $val): ?>
                            <tr class="text-center">
                                <td><?= $no ?></td>
                                <td><?= $val['no_pemesanan'] ?></td>
                                <td><?= $val['asal_distribusi'] ?></td>
                                <td><?= $val['tujuan_distribusi'] ?></td>
                                <td><?= $val['nama_konsumen'] ?></td>
                                <td><?= $val['no_kendaraan'] ?></td>
                                <td><?= $val['supir'] ?></td>
                                <td><?= date_indo($val['tgl_berangkat']) ?></td>
                                <td><?= $val['jam_berangkat'] ?></td>
                                <td><?= number_format(($val['uang_JP'])+($val['uang_JT'])) ?></td>
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