<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Informasi Kinerja</h1>
	</div>
	<!-- Page Heading -->
	<div class="mt-5"></div>

	<div class="row">

	</div>

	<!-- table -->
	<div class="card shadow p-4 col-xl-12 col-md-6 mb-10">
		<div class="card" style="width: 100rem;">
			<div class="card-header">
				Data Guru
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">NIP : <?= $user['nip']; ?> </li>
				<li class="list-group-item">Nama : <?= $user['username']; ?></li>
				
				<li class="list-group-item">Penilaian : <?= $item['penilaian']; ?></li>
				<li class="list-group-item">Deskripsi : <?= $item['deskripsi']; ?></li>
			</ul>
		</div>
	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
