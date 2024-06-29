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
							<?php echo anchor('pegawai/create', '<i class="fa fa-plus"></i> Tambah Data', array('class' => 'btn btn-primary btn-sm float-right')) ?>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="page-title-box">
				<div class="table-responsive">
					<table id="datatable" class="table table-striped ">
						<thead>
						<tr class="text-center">
							<th>No</th>
							<th>NIK</th>
							<th>NIP</th>
							<th>Nama Pegawai</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
							<th>Departemen</th>
                            <th>NPWP</th>
							<th>Pendidikan</th>
							<th>Tempat Lahir</th>
							<th>Tanggal Lahir</th>
                            <th>Alamat</th>
							<th>Kota</th>
							<th>Mulai Kerja</th>
                            <th>Rekening</th>
							<th>Photo</th>
							<?php if ($this->session->userdata('session_level') == 'superadmin'): ?>
							<th class="text-center">Aksi</th>
							<?php endif ?>
						</t>
						</thead>
						<tbody>
						<?php
						$no = 1;
						foreach ($pegawai as $val): ?>
							<tr class="text-center">
								<td><?= $no ?></td>
								<td><?=$val['nik']?></td>
								<td><?=$val['nip']?></td>
                                <td><?=$val['nama']?></td>
								<td><?=$val['jk']?></td>
								<td><?=$val['jbtn']?></td>
								<td><?=$val['departemen']?></td>
								<td><?=$val['npwp']?></td>
                                <td><?=$val['pendidikan']?></td>
								<td><?=$val['tmp_lahir']?></td>
								<td><?=$val['tgl_lahir']?></td>
								<td><?=$val['alamat']?></td>
                                <td><?=$val['kota']?></td>
								<td><?=$val['mulai_kerja']?></td>
								<td><?=$val['rekening']?></td>
								<td><?=$val['photo']?></td>
								<?php if ($this->session->userdata('session_level') == 'superadmin'): ?>
								<td class="text-center">
										<a href="<?= base_url() ?>pegawai/update/<?= $val['id'] ?>"
										   class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
										<a href="<?= base_url() ?>pegawai/delete/<?= $val['id'] ?>"
										   onclick="return confirm('Yakin ingin menghapus cabor <?= $val['id'] ?>? Menghapus berarti menghilangkan semua data yang memiliki kaitan dengan data ini !')"
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


