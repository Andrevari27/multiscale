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
				<form action="<?= base_url() ?>jenisbarang/update/<?= $jenisbarang['kd_jenis']?>" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-12">
							<div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Kode Jenis</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" placeholder="Kode Jenis"
										   name="kd_jenis" value="<?= $jenisbarang['kd_jenis'] ?>">
								</div>
							</div>
                            <div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Nama Jenis</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" placeholder="Nama Jenis"
										   name="nm_jenis"  value="<?= $jenisbarang['nm_jenis'] ?>">
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


