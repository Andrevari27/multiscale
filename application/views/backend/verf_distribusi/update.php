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
				<form action="<?= base_url() ?>verf_distribusi/update/<?= $permintaan['no_pemesanan'] ?>" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-12">
							<div class="form-group row">
								<div class="col-sm-3">
                                    <label for="" class="col-form-label">No Pemesanan</label>
									<input class="form-control" type="text" placeholder="No Pemesanan"
										   name="no_pemesanan" value="<?= $permintaan['no_pemesanan'] ?>">
								</div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Departemen Asal</label>
									<input class="form-control" type="text" placeholder="Departemen Asal"
										   name="dep_asal">
								</div>
                                <?php
								$permintaan_e = $this->Barang->getBarang();
								?>
								<div class="col-sm-3">
                                    <label for="" class="col-form-label">Barang</label>
									<select name="kode_konsumen" id="" class="form-control">
										<?php foreach ($permintaan_e as $a): ?>
											<option value="<?= $a['kode_brng'] ?>"><?= $a['nama_brng'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Tim Muat</label>
									<input class="form-control" type="text" placeholder="Tim Muat"
										   name="tim_muat">
								</div>
							</div>
							<div class="form-group row">
                                <?php
								$permintaan_f = $this->Kendaraan->getKendaraan();
								?>
								<div class="col-sm-3">
                                    <label for="" class="col-form-label">Kendaraan</label>
                                    <select name="no_kendaraan" id="" class="form-control">
										<?php foreach ($permintaan_f as $a): ?>
											<option value="<?= $a['no_kendaraan'] ?>"><?= $a['no_kendaraan'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="col-sm-3">
                                    <label for="" class="col-form-label">Supir</label>
                                    <select name="no_kendaraan" id="" class="form-control">
										<?php foreach ($permintaan_f as $a): ?>
											<option value="<?= $a['no_kendaraan'] ?>"><?= $a['supir'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Tanggal Berangkat</label>
									<input class="form-control" type="date" placeholder="Tanggal Berangkat"
										   name="tgl_berangkat">
								</div>
								<div class="col-sm-3">
                                    <label for="" class="col-form-label">Uang JP</label>
                                    <input class="form-control" type="number" placeholder="Uang JP"
										   name="uang_JP">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-3">
                                    <label for="" class="col-form-label">Uang JT</label>
                                    <input class="form-control" type="number" placeholder="Uang JT"
										   name="uang_JT">
								</div>
								<div class="col-sm-3">
                                    <label for="" class="col-form-label">Keterangan</label>
                                    <input class="form-control" type="text" placeholder="Keterangan"
										   name="Keterangan">
								</div>
								<div class="col-sm-3">
                                    <label for="" class="col-form-label">NIP Penginputan</label>
                                    <input class="form-control" type="text" placeholder="NIP Penginputan"
										   name="nip_penginputan">
								</div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Harga</label>
									<input class="form-control" type="number" placeholder="Harga"
										   name="harga">
								</div>
								
							</div>
                            <div class="form-group row">
								<div class="col-sm-3">
                                    <label for="" class="col-form-label">Tim Bongkar</label>
									<input class="form-control" type="number" placeholder="Tim Bongkar"
										   name="tim_bongkar">
								</div>
								<div class="col-sm-3">
                                    <label for="" class="col-form-label">Volume</label>
									<input class="form-control" type="number" placeholder="Volume"
										   name="volume">
								</div>
								<div class="col-sm-3">
                                    <label for="" class="col-form-label">Selisih</label>
									<input class="form-control" type="number" placeholder="Selisih"
										   name="selisih_mb">
								</div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Tanggal Sampai</label>
									<input class="form-control" type="date" placeholder="Tanggal Sampai"
										   name="tgl_sampai">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-3">
                                    <label for="" class="col-form-label">Total Harga</label>
									<input class="form-control" type="number" placeholder="Total Harga"
										   name="total_harga">
								</div>
								<div class="col-sm-3">
                                    <label for="" class="col-form-label">NIP Closing</label>
									<input class="form-control" type="number" placeholder="NIP Closing"
										   name="nip_closing">
								</div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Status</label>
                                    <select name="status" id="" class="form-control">
										<option value="Sudah Berangkat">Sudah Berangkat</option>
										<option value="Sudah Datang">Sudah Datang</option>
									</select>
								</div>
                                <div class="col-sm-3">
                                    <label for="" class="col-form-label">Jam Berangkat</label>
									<input class="form-control" type="time" placeholder="Jam Berangkat"
										   name="jam_berangkat">
								</div>
							</div>
                            <div class="form-group row">
								<div class="col-sm-3">
                                    <label for="" class="col-form-label">Jam Sampai</label>
									<input class="form-control" type="time" placeholder="Jam Sampai"
										   name="jam_sampai">
								</div>
								<div class="col-sm-3">
                                    <label for="" class="col-form-label">Asal Tambahan</label>
									<input class="form-control" type="text" placeholder="Asal"
										   name="asal_tambahan">
								</div>
							</div>
						</div> <!-- end col -->
					</div>
					<div class="row">
						<div class="col-md-12">
							<button name="simpan" type="submit" class="btn btn-info float-right ml-2">Distribusi</button>
							<a onclick="history.back()" class="btn btn-light float-right">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


