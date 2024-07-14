<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Informasi Kinerja</h1>
	</div>
	<!-- Page Heading -->
	<div class="mt-5"></div>

	<div class="row ml-1">

		<div class="card shadow p-4 col-xl-4 col-md-4 mb-10" style="width: 18rem;">
			<img src="<?= base_url('assets/img/undraw_male_avatar_g98d.svg'); ?>" class="card-img-top" width="100px" height="150px" alt="...">
			<div class="card-body">
				<p class="card-text">Some quick example text to build on the card title and make up the <?= $user['username']; ?>.</p>
			</div>
		</div>
		<!-- table -->
		<div class="card shadow p-4 col-xl-7 col-md-8 mb-10">
			<div class="card mt-4">
				<div class="card-header">
					Data Guru
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">NIP : <?= $user['nip']; ?> </li>
					<li class="list-group-item">Nama : <?= $user['username']; ?></li>
					<li class="list-group-item">Mata Pelajaran : <?= $user['mapel']; ?></li>
					<li class="list-group-item">Deskripsi : <?= $item['descripsion']; ?></li>
				</ul>
			</div>
		</div>
	</div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
