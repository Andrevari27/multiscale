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
				<form action="<?= base_url() ?>pegawai/create" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-12">
							<div class="form-group row">
								<label for="" class="col-sm-1 col-form-label">NIP</label>
								<div class="col-sm-5">
									<input class="form-control" type="number" placeholder="NIP"
										   name="nip" required>
								</div>
								<label for="" class="col-sm-1 col-form-label">NIK</label>
								<div class="col-sm-5">
									<input class="form-control" type="number" placeholder="NIK"
										   name="nik">
								</div>
							</div>
                            <div class="form-group row">
								<label for="" class="col-sm-1 col-form-label">Nama</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" placeholder="Nama"
										   name="nama" required>
								</div>
								<label for="" class="col-sm-1 col-form-label">Jenis Kelamin</label>
								<div class="col-sm-5">
									<select name="jk" id="" class="form-control" required>
										<option value="Pria">PRIA</option>
										<option value="Wanita">WANITA</option>
									</select>
								</div>
							</div>
                            <div class="form-group row">
								<label for="" class="col-sm-1 col-form-label">Jabatan</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" placeholder="Jabatan"
										   name="jbtn">
								</div>
								<label for="" class="col-sm-1 col-form-label">Departemen</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" placeholder="Departemen"
										   name="departemen" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-1 col-form-label">NPWP</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" placeholder="NPWP"
										   name="npwp">
								</div>
								<label for="" class="col-sm-1 col-form-label">Pendidikan</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" placeholder="Pendidikan"
										   name="pendidikan">
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-1 col-form-label">Tempat Lahir</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" placeholder="Tempat Lahir"
										   name="tmp_lahir" required>
								</div>
								<label for="" class="col-sm-1 col-form-label">Tanggal Lahir</label>
								<div class="col-sm-5">
									<input class="form-control" type="date" name="tgl_lahir" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-1 col-form-label">Alamat</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" placeholder="Alamat"
										   name="alamat" required>
								</div>
								<label for="" class="col-sm-1 col-form-label">Kota</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" placeholder="kota"
										   name="kota" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-1 col-form-label">Mulai Kerja</label>
								<div class="col-sm-5">
									<input class="form-control" type="date" name="mulai_kerja" required>
								</div>
								<label for="" class="col-sm-1 col-form-label">Rekening</label>
								<div class="col-sm-5">
									<input class="form-control" type="number" placeholder="No Rekening"
										   name="rekening" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-1 col-form-label">Photo</label>
								<div class="col-sm-5">
									<input class="form-control" type="file" placeholder="Foto"
										   name="photo">
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


