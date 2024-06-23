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

	<!-- btn add -->
	<button class="btn btn-sm btn-warning p-2" data-toggle="modal" data-target="#edit<?= $user['id'];?>"><i class="fas fa-plus fa-sm"></i> Update Data
	</button>
	<div class="mt-4"></div>
	<!-- end -->

	<!-- table -->
	<div class="card shadow p-4 col-xl-12 col-md-6 mb-10">
		<div class="card" style="width: 100rem;">
			<div class="card-header">
				Data Guru
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">NIP : <?= $user['nip']; ?> </li>
				<li class="list-group-item">Nama : <?= $user['username']; ?></li>
				<li class="list-group-item">Tanggal Lahir : <?= $user['tanggal_lahir']; ?></li>
				<li class="list-group-item">Alamat : <?= $user['alamat']; ?></li>
				<li class="list-group-item">Telepon : <?= $user['hp']; ?></li>
				<li class="list-group-item">Pendidikan: <?= $user['pendidikan']; ?></li>
			</ul>
		</div>
	</div>

	<!-- modal edit -->
	<?php foreach ($item as $i) : ?>
		<div class="modal fade" id="edit<?= $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
						<form action="<?= base_url() . 'guru/guru/update'; ?>" method="post" enctype="multipart/form-data">

							<div class="form-group">
								<label>NIP</label>
								<input type="hidden" name="id" id="id" value="<?= $i['id']; ?>" >
								<input type="hidden" name="password" id="password" value="<?= $i['password']; ?>" >
								<input type="hidden" name="role" id="role" value="<?= $i['role']; ?>" >
								<input type="number" name="nip" id="nip" value="<?= $i['nip']; ?>" class="form-control" readonly=true>
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
