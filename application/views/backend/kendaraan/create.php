<div class="content-page">
<script>
function formatCurrency(input) {
    // Menghilangkan semua karakter selain angka
    var num = input.value.replace(/\D/g, '');
    
    // Memformat angka menjadi format uang dengan pemisah ribuan
    var formattedNum = new Intl.NumberFormat('en-US').format(num);

    // Memasukkan kembali nilai yang diformat ke dalam input
    input.value = formattedNum;
}
</script>
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
				<form action="<?= base_url() ?>kendaraan/create" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-12">
							<div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">No Kendaraan</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" placeholder="No Kendaraan"
										   name="no_kendaraan" required>
								</div>
							</div>
                            <div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Merk Kendaraan</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" placeholder="Merk Kendaraan"
										   name="merk_kendaraan">
								</div>
							</div>
                            <div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Jenis</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" placeholder="Jenis"
										   name="jenis" required>
								</div>
							</div>
                            <div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Berat</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" placeholder="Berat"
										   name="Berat" oninput="formatCurrency(this)">
								</div>
							</div>
                            <div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Status</label>
								<div class="col-sm-10">
									<select name="status" id="" class="form-control">
										<option value="0">TIDAK ADA</option>
										<option value="1">ADA</option>
									</select>
								</div>
							</div>
                            <div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Supir</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" placeholder="Supir"
										   name="supir" required>
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


