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
				<form action="<?= base_url() ?>barang/create" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-12">
							<div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Kode Barang</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" placeholder="Kode Barang"
										   name="kode_brng" required>
								</div>
							</div>
                            <div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Nama Barang</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" placeholder="Nama Barang"
										   name="nama_brng" required>
								</div>
							</div>
                            <!-- <div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Satuan</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" placeholder="Satuan"
										   name="kode_sat">
								</div>
							</div> -->
                            <!-- <?php
							$jenisbarang = $this->Barang->getJenisBarang();
							?>
                            <div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Jenis</label>
								<div class="col-sm-10">
                                <select name="jenis" id="" class="form-control">
										<?php foreach ($jenisbarang as $a): ?>
											<option value="<?= $a['kd_jenis'] ?>"><?= $a['nm_jenis'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div> -->
                            <!-- <div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Harga</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" placeholder="Harga"
										   name="harga" oninput="formatCurrency(this)">
								</div>
							</div> -->
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


