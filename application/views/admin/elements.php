<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Kelola Data System</h1>
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
						<th class="text-center">ID</th>
						<th class="text-center">Username</th>
						<th class="text-center">Password</th>
						<th class="text-center">Role</th>
						<th class="text-center" width="8%"></th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($item as $i) : ?>
						<tr>
							<td class="text-center"><?= $no++ ?></td>
							<td class="text-center"><?= $i['id'] ?></td>
							<td class="text-center"><?= $i['username'] ?></td>
							<td class="text-center"><?= $i['password'] ?></td>
							<td class="text-center"><?= $i['role'] ?></td>
							<td style="width: 8px;text-align: center;vertical-align: middle;">

								<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $i['id']; ?>"><i class="fas fa-edit"></i></button>

								<?= anchor('admin/elements/hapus/' . $i['id'], '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
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
					<form action="<?= base_url() . 'admin/elements/tambah'; ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label>Username</label>
							<input type="hidden" name="id">
							<input type="text" name="username" class="form-control">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control">
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect1">Role</label>
							<select class="form-control" id="exampleFormControlSelect1" name="role">
								<option>Pilih</option>
								<option value="3">Guru</option>
								<option value="2">Kepala Sekolah</option>
								<option value="1">Admin</option>
							</select>
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
						<form action="<?= base_url() . 'admin/elements/update'; ?>" method="post" enctype="multipart/form-data">

							<div class="form-group">
								<label>Usename</label>
								<input type="hidden" name="id" value="<?= $i['id']; ?>">
								<input type="text" name="username" value="<?= $i['username']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" value="<?= $i['password']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Role</label>
								<select class="form-control" id="exampleFormControlSelect1" name="role">
									<option><?= $i['role']; ?></option>
									<option>Pilih</option>
									<option value="3">Guru</option>
									<option value="2">Kepala Sekolah</option>
									<option value="1">Admin</option>
								</select>
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
