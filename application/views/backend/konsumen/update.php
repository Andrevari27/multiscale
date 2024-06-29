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
				<form action="<?= base_url() ?>konsumen/update/<?= $konsumen['kode_konsumen'] ?>" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-12">
							<div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Kode Konsumen</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" placeholder="Kode Konsumen"
										   name="kode_konsumen" value="<?= $konsumen['kode_konsumen'] ?>" required>
								</div>
							</div>
                            <div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Nama Konsumen</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" placeholder="Nama Konsumen"
										   name="nama_konsumen" value="<?= $konsumen['nama_konsumen'] ?>" required>
								</div>
							</div>
                            <div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Alamat</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" placeholder="Alamat"
										   name="alamat" value="<?= $konsumen['alamat'] ?>" required>
								</div>
							</div>
                            <div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Lokasi Bongkar</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" placeholder="Lokasi Bongkar"
										   name="lokasi_bongkar" value="<?= $konsumen['lokasi_bongkar'] ?>" required>
								</div>
							</div>
                            <div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Nomor Telpon</label>
								<div class="col-sm-10">
									<input class="form-control" type="number" placeholder="Nomor Telpon"
										   name="no_telp" value="<?= $konsumen['no_telp'] ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Penanggung Jawab</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" placeholder="Penanggung Jawab"
										   name="penjab" value="<?= $konsumen['penjab'] ?>" required>
								</div>
							</div>
						</div> <!-- end col -->
					</div>
					<div class="row">
						<div class="col-md-12">
							<button name="simpan" type="submit" class="btn btn-info float-right ml-2">Simpan</button>
							<a onclick="history.back()" class="btn btn-light float-right">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


