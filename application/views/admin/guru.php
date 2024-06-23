<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Kelola Data Guru</h1>
	</div>
	<!-- Page Heading -->
	<div class="mt-5"></div>

	<div class="row mb-4 ml-1">
		<!-- btn add -->
		<button class="btn btn-primary mb-4 mr-3" data-toggle="modal" data-target="#tambah_data">
			<i class="fa fa-plus fa-sm"></i> Tambah
		</button>
		<!-- end -->
		<div class="align-items-center justify-content-between mb-4">
			<a href="<?= base_url('admin/guru/print'); ?>" 
			class="d-none d-inline-block btn btn btn-dark shadow-sm">
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
						<th class="text-center">Nama Guru</th>
						<th class="text-center">Tanggal Lahir</th>
						<th class="text-center">Pendidikan</th>
						<th class="text-center">Alamat</th>
						<th class="text-center">HP</th>
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
							<td class="text-center"><?= date('d-m-Y', strtotime($i['tanggal_lahir'])) ?></td>
							<td class="text-center"><?= $i['pendidikan'] ?></td>
							<td class="text-center"><?= $i['alamat'] ?></td>
							<td class="text-center"><?= $i['hp'] ?></td>
							<td style="width: 8px;text-align: center;vertical-align: middle;">

								<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $i['id']; ?>"><i class="fas fa-edit"></i></button>

								<?= anchor('admin/guru/hapus/' . $i['id'], '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
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
					<form action="<?= base_url() . 'admin/guru/tambah'; ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label>NIP</label>
							<input type="hidden" name="id" id="id">
							<input type="number" name="nip" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="username" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect1">Role</label>
							<select class="form-control" id="exampleFormControlSelect1" name="role">
								<option>Pilih</option>
								<option value="3">Guru</option>
								<option value="2">Kepala Sekolah</option>
							</select>
						</div>
						<div class="form-group">
							<label>Tanggal Lahir</label>
							<input type="date" name="tanggal_lahir" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Pendidikan</label>
							<input type="text" name="pendidikan" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<input type="text" name="alamat" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Telepon</label>
							<input type="text" name="hp" class="form-control" required>
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
		<div class="modal fade" id="edit<?= $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
						<form action="<?= base_url() . 'admin/guru/update'; ?>" method="post" enctype="multipart/form-data">

							<div class="form-group">
								<label>NIP</label>
								<input type="hidden" name="id" id="id" value="<?= $i['id']; ?>">
								<input type="hidden" name="password" value="<?= $i['password']; ?>">
								<input type="hidden" name="role" value="<?= $i['role']; ?>">
								<input type="text" name="nip" id="nip" value="<?= $i['nip']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="username" value="<?= $i['username']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<input type="Text" name="alamat" value="<?= $i['alamat']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Telepon</label>
								<input type="number" name="hp" value="<?= $i['hp']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Tanggal Lahir</label>
								<input type="date" name="tanggal_lahir" value="<?= $i['tanggal_lahir']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Pendidikan Terakhir</label>
								<input type="Text" name="pendidikan" value="<?= $i['pendidikan']; ?>" class="form-control">
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
