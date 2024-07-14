<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Kelola Data kegiatan Pembelajaran</h1>
	</div>
	<!-- Page Heading -->
	<div class="mt-5"></div>

	<div class="row">

	</div>

	<!-- btn add -->
	<button class="btn btn-sm btn-primary p-2" data-toggle="modal" data-target="#tambah_data"><i class="fas fa-plus fa-sm"></i> Input Data
	</button>
	<div class="mt-4"></div>
	<!-- end -->

	<!-- table -->
	<div class="card shadow p-4 col-xl-12 col-md-6 mb-10">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped" id="tabledata">
				<thead>
					<tr>
						<th class="text-center" width="4%">No</th>
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
							<td class="text-center"><?= $i['pembelajaran_id'] ?></td>
							<td class="text-center"><?= $i['mapel'] ?></td>
							<td class="text-center"><?= $i['jam_pelajaran'] ?></td>
							<td class="text-center"><?= $i['hari'] ?></td>
							<td class="text-center"><?= $i['deskripsi'] ?></td>
							<td style="width: 8px;text-align: center;vertical-align: middle;">

								<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $i['id_pembelajaran']; ?>"><i class="fas fa-edit"></i></button>

								<?= anchor('guru/pembelajaran/hapus/' . $i['id_pembelajaran'], '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
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
					<form action="<?= base_url() . 'guru/pembelajaran/tambah'; ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for="exampleFormControlSelect1">Role</label>
							<select class="form-control" id="exampleFormControlSelect1" name="guru_id">
								<option>Pilih</option>
								<option value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
							</select>
						</div>

						<div class="form-group">
							<label>Pelajaran ID</label>
							<input type="hidden" name="id_pembelajaran">
							<input type="text" name="pembelajaran_id" class="form-control">
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
							<select class="custom-select mr-sm-2" name="hari" id="hari">
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
						<form action="<?= base_url() . 'guru/pembelajaran/update'; ?>" method="post" enctype="multipart/form-data">

							<div class="form-group">
								<label>Pelajaran ID</label>
								<input type="hidden" name="id_pembelajaran" value="<?= $i['id_pembelajaran']; ?>">
								<input type="hidden" name="guru_id" value="<?= $i['guru_id']; ?>">
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
