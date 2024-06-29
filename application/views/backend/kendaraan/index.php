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
							<?php echo anchor('kendaraan/create', '<i class="fa fa-plus"></i> Tambah Data', array('class' => 'btn btn-primary btn-sm float-right')) ?>
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
							<th class="text-center" width="50">No</th>
							<th>No Kendaraan</th>
                            <th>Jenis Kendaraan</th>
							<th>Supir</th>
							<?php if ($this->session->userdata('session_level') == 'superadmin'): ?>
							<th class="text-center">Aksi</th>
							<?php endif ?>
						</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						foreach ($kendaraan as $val): ?>
							<tr class="text-center">
								<td><?= $no ?></td>
								<td><?=$val['no_kendaraan']?></td>
								<td><?=$val['jenis']?></td>
								<td><?=$val['supir']?></td>
								<?php if ($this->session->userdata('session_level') == 'superadmin'): ?>
								<td class="text-center">
										<a href="<?= base_url() ?>kendaraan/update/<?= $val['no_kendaraan'] ?>"
										   class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
										<a href="<?= base_url() ?>kendaraan/delete/<?= $val['no_kendaraan'] ?>"
										   onclick="return confirm('Yakin ingin menghapus cabor <?= $val['merk_kendaraan'] ?>? Menghapus berarti menghilangkan semua data yang memiliki kaitan dengan data ini !')"
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


