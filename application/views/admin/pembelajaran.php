<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Kelola Data Pembelajaran</h1>
	</div>
	<!-- Page Heading -->
	<div class="mt-5"></div>

	<div class="row ml-1 mb-4">
		<!-- btn add -->
		<button class="btn btn-primary mb-4 mr-3" data-toggle="modal" data-target="#tambah_data">
			<i class="fa fa-plus fa-sm"></i> Tambah
		</button>
		<!-- end -->
		<div class="align-items-center justify-content-between mb-4">
			<a href="<?= base_url('admin/pembelajaran/print'); ?>" class="d-none d-inline-block btn btn btn-dark shadow-sm">
				<i class="fas fa-print fa-sm text-white-80"></i> Print</a>
		</div>
	</div>

	<!-- table -->
	<div class="card shadow p-4 col-xl-12 col-md-6 mb-10">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped" id="tabledata">
				<thead>
					<tr>
						<th class="text-center" width="4%">No</th>
						<th class="text-center">NIP</th>
						<th class="text-center">Guru</th>
						<th class="text-center">Pelajaran ID</th>
						<th class="text-center">Mata Pelajaran</th>
						<th class="text-center">Jam Pelajaran</th>
						<th class="text-center">Hari</th>
						<th class="text-center">Deskripsi</th>
						<th class="text-center" width="8%"></th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($item as $i) : ?>
						<tr>
							<td class="text-center"><?= $no++ ?></td>
							<td class="text-center"><?= $i['nip'] ?></td>
							<td class="text-center"><?= $i['username'] ?></td>
							<td class="text-center"><?= $i['pembelajaran_id'] ?></td>
							<td class="text-center"><?= $i['mapel'] ?></td>
							<td class="text-center"><?= $i['jam_pelajaran'] ?></td>
							<td class="text-center"><?= $i['hari'] ?></td>
							<td class="text-center"><?= $i['deskripsi'] ?></td>
							<td style="width: 8px;text-align: center;vertical-align: middle;">

								<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $i['id_pembelajaran']; ?>"><i class="fas fa-edit"></i></button>

								<?= anchor('admin/pembelajaran/hapus/' . $i['id_pembelajaran'], '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
							</td>
						</tr>
					<?php endforeach; ?>

				</tbody>
			</table>
		</div>
	</div>
	<!-- end -->

	<!-- modal tambah -->
	<div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url() . 'admin/pembelajaran/tambah'; ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label class="mr-sm-2" for="inlineFormCustomSelect">Nama Guru</label>
							<input type="hidden" name="kehadiran_id">
							<select class="custom-select mr-sm-2" name="guru_id" id="guru_id">
								<option selected>Choose...</option>
								<?php foreach ($relasi as $p) : ?>
									<option value="<?= $p->id ?>"><?= $p->username ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Pelajaran ID</label>
							<input type="hidden" name="id_pembelajaran" class="form-control">
							<input type="text" name="pembelajaran_id" id="pembelajaran_id" class="form-control">
						</div>
						<div class="form-group">
							<label>Mata Pelajaran</label>
							<input type="text" name="mapel" id="mapel" class="form-control">
						</div>
						<div class="form-group">
							<label>Jam Pelajaran</label>
							<input type="time" name="jam_pelajaran" class="form-control">
						</div>
						<div class="form-group">
							<label class="mr-sm-2" for="inlineFormCustomSelect">Hari</label>
							<select class="custom-select mr-sm-2" name="hari">
								<option selected>Choose...</option>
								<option value="Senin">Senin</option>
								<option value="Selasa">Selasa</option>
								<option value="Rabu">Rabu</option>
								<option value="Kamis">Kamis</option>
								<option value="Jumat">Jumat</option>
								<option value="Sabtu">Sabtu</option>
							</select>
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<input type="text" name="deskripsi" class="form-control">
						</div>

						<div class="modal-footer">
							<button type="submit" class="btn btn-primary col-sm-4">Save</button>
							<button type="button" data-dismiss="modal" class="btn btn-danger col-sm-4">cancel</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end -->

	<!-- modal edit -->
	<?php foreach ($item as $i) : ?>
		<div class="modal fade" id="edit<?= $i['id_pembelajaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
						<form action="<?= base_url() . 'admin/pembelajaran/update'; ?>" method="post" enctype="multipart/form-data">

							<div class="form-group">
								<label>Pelajaran ID</label>
								<input type="hidden" name="id_pembelajaran" value="<?= $i['id_pembelajaran']; ?>" class="form-control">
								<input type="hidden" name="guru_id" value="<?= $i['guru_id']; ?>" class="form-control">
								<input type="text" name="pembelajaran_id" value="<?= $i['pembelajaran_id']; ?>" class="form-control">
							</div>

							<div class="form-group">
								<label>Mata Pelajaran</label>
								<input type="text" name="mapel" id="mapel" value="<?= $i['mapel']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Jam Pelajaran</label>
								<input type="time" name="jam_pelajaran" value="<?= $i['jam_pelajaran']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<label class="mr-sm-2" for="inlineFormCustomSelect">Hari</label>
								<select class="custom-select mr-sm-2" name="hari">
									<option value="<?= $i['hari']; ?>"><?= $i['hari']; ?></option>
									<option>Choose...</option>
									<option value="Senin">Senin</option>
									<option value="Selasa">Selasa</option>
									<option value="Rabu">Rabu</option>
									<option value="Kamis">Kamis</option>
									<option value="Jumat">Jumat</option>
									<option value="Sabtu">Sabtu</option>
								</select>
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<input type="Text" name="deskripsi" value="<?= $i['deskripsi']; ?>" class="form-control">
							</div>

							<div class="modal-footer">
								<button type="submit" class="btn btn-primary col-sm-4">Update Data</button>
								<button type="button" data-dismiss="modal" class="btn btn-danger col-sm-4">cancel</button>
							</div>
						</form>

					</div>

				</div>
			</div>
		</div>
	<?php endforeach; ?>
	<!-- end -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
