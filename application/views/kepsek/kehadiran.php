<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Kelola Data Guru</h1>
	</div>
	<!-- Page Heading -->
	<div class="mt-5"></div>

	<div class="row">

	</div>

	<!-- table -->
	<div class="card shadow p-4 col-xl-12 col-md-6 mb-10">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped" id="tabledata">
				<thead>
					<tr>
						<th class="text-center" width="4%">No</th>
						<th class="text-center">Tanggal</th>
						<th class="text-center">NIP</th>
						<th class="text-center">Nama Guru</th>
						<th class="text-center">Status</th>
						<th class="text-center" width="8%"></th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($item as $i) : ?>
						<tr>
							<td class="text-center"><?= $no++ ?></td>
							<td class="text-center"><?= date('d-m-Y', strtotime($i['tanggal'])) ?></td>
							<td class="text-center"><?= $i['nip'] ?></td>
							<td class="text-center"><?= $i['username'] ?></td>
							<td class="text-center"><?= $i['status'] ?></td>
							<td style="width: 8px;text-align: center;vertical-align: middle;">

								<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#read<?= $i['id']; ?>"><i class="fas fa-search"></i></button>
							</td>
						</tr>
					<?php endforeach; ?>

				</tbody>
			</table>
		</div>
	</div>
	<!-- end -->

	<!-- modal edit -->
	<!-- <?php foreach ($item as $i) : ?>
		<div class="modal fade" id="read<?= $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Data Detail</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
						<div class="form-group">
							<label>NIP</label>
							<input type="hidden" name="id" id="id" value="<?= $i['id']; ?>">
							<input type="hidden" name="password" value="<?= $i['password']; ?>">
							<input type="hidden" name="role" value="<?= $i['role']; ?>">
							<input type="text" name="nip" id="nip" value="<?= $i['nip']; ?>" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="username" value="<?= $i['username']; ?>" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<input type="Text" name="alamat" value="<?= $i['alamat']; ?>" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Telepon</label>
							<input type="text" name="hp" value="<?= $i['hp']; ?>" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Tanggal Lahir</label>
							<input type="text" name="tanggal_lahir" value="<?= $i['tanggal_lahir']; ?>" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Pendidikan Terakhir</label>
							<input type="Text" name="pendidikan" value="<?= $i['pendidikan']; ?>" class="form-control" readonly>
						</div>

						<div class="modal-footer">
							<button type="button" data-dismiss="modal" class="btn btn-danger col-sm-4">cancel</button>
						</div>
					</div>

				</div>
			</div>
		</div>
	<?php endforeach; ?> -->
	<!-- end -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
