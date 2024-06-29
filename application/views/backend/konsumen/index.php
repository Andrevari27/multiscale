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
						<?php if ($this->session->userdata('session_level') == 'superadmin'): ?>
							<?php echo anchor('konsumen/create', '<i class="fa fa-plus"></i> Tambah Data', array('class' => 'btn btn-primary btn-sm float-right')) ?>
						<?php endif ?>
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
							<th>Nama Konsumen</th>
                            <th>Alamat</th>
                            <th>Lokasi Bongkar</th>
                            <th>Nomor Telpon</th>
							<!-- <th>Nama Bank</th>
							<th>Rekening</th> -->
							<th>Penanggung Jawab</th>
							<?php if ($this->session->userdata('session_level') == 'superadmin'): ?>
							<th class="text-center">Aksi</th>
							<?php endif ?>
						</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						foreach ($konsumen as $val): ?>
							<tr class="text-center">
								<td><?= $no ?></td>
                                <td><?=$val['nama_konsumen']?></td>
								<td><?=$val['alamat']?></td>
								<td><?=$val['lokasi_bongkar']?></td>
                                <td><?=$val['no_telp']?></td>
								<!-- <td><?=$val['nama_bank']?></td>
								<td><?=$val['rekening']?></td> -->
								<td><?=$val['penjab']?></td>
								<?php if ($this->session->userdata('session_level') == 'superadmin'): ?>
								<td class="text-center">
										<a href="<?= base_url() ?>konsumen/update/<?= $val['kode_konsumen'] ?>"
										   class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
										<a href="<?= base_url() ?>konsumen/delete/<?= $val['kode_konsumen'] ?>"
										   onclick="return confirm('Yakin ingin menghapus cabor <?= $val['nama_konsumen'] ?>? Menghapus berarti menghilangkan semua data yang memiliki kaitan dengan data ini !')"
										   class="btn btn-danger"><i class="fa fa-trash"></i></a>
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


