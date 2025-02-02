<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data Kehadiran</h1>
	</div>
	<!-- Page Heading -->
	<div class="mt-5"></div>

	<div class="row">

	</div>

	<div class="card">
		<div class="card-header text-center">
			<h5 class="card-title">Kehadiran <?= date('d M Y') ?></h5>
		</div>
		<div class="card-body text-center">

			<p class="card-text">Input data kehadiran pada form yang tersedia, pilih status kehadiran!</p>
			<button class="btn btn-primary" id="ons" data-toggle="modal" data-target="#tambah_data">Masukkan Kehadiran</button>
			<p></p>
			<p></p>
			<h6>Kehadiran Terakhir : <?= date('d-m-Y', strtotime($kehadiran['tanggal'])) ?></h6>
			<h6>Status :</h6>
			<h5><?= $kehadiran['status'] ?></h5>
		</div>
	</div>

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
					<form action="<?= base_url() . 'guru/kehadiran/tambah'; ?>" method="post" enctype="multipart/form-data" id="form_kehadiran">

						<div class="form-group">
							<label class="mr-sm-2" for="inlineFormCustomSelect">Guru</label>
							<input type="hidden" name="kehadiran_id">
							<input type="text" name="guru_id" value="<?= $user['id'] ?> - <?= $user['username'] ?>" class="form-control" readonly>
						</div>

						<div class="form-group">
							<label>Tanggal</label>
							<input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" class="form-control" readonly>
						</div>
						<fieldset class="form-group">
							<div class="row">
								<legend class="col-form-label col-sm-2 pt-0">Status</legend>
								<div class="col-sm-10">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="status" id="status" value="Hadir" required>
										<label class="form-check-label" for="status">
											Hadir
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="status" id="status" value="Izin" required>
										<label class="form-check-label" for="status">
											Izin
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="status" id="status" value="Sakit" required>
										<label class="form-check-label" for="status">
											Sakit
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="status" id="status" value="Tanpa Keterangan" required>
										<label class="form-check-label" for="status">
											Tanpa Keterangan
										</label>
									</div>
								</div>
							</div>
						</fieldset>

						<div class="modal-footer">
							<button type="submit" class="btn btn-primary col-sm-4" id="ons">Save</button>
							<button type="button" data-dismiss="modal" class="btn btn-danger col-sm-4">cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end -->

	<script>
		const submitButton = document.getElementById('ons'); // Dapatkan tombol submit
		let isSubmitted = false; // Variabel untuk menandai status penekanan

		submitButton.addEventListener('click', function() {
			if (isSubmitted) {
				// Jika sudah ditekan, nonaktifkan tombol
				submitButton.disabled = true;
			} else {
				// Jika belum ditekan, aktifkan tombol
				submitButton.disabled = false;
				// Tandai tombol sebagai "sudah ditekan"
				isSubmitted = true;
			}
		});

		// // Simpan nilai isSubmitted
		// document.getElementById('ons').addEventListener('click', function(e) {
		// 	e.preventDefault(); // Mencegah submit default
		// 	document.getElementById('ons').setAttribute('disabled', true); // Nonaktifkan permanen tombol submit
		// 	this.submit(); // Submit form

		// 	// Simpan isSubmitted ke localStorage
		// 	localStorage.setItem('isSubmitted', true);
		// });

		// // Hapus nilai isSubmitted saat berganti tanggal
		// const lastSubmittedDate = localStorage.getItem('itemData');
		// const currentDate = Date.now();

		// if (lastSubmittedDate) {
		// 	const lastSubmittedDateObj = new Date(lastSubmittedDate);
		// 	const currentDay = new Date(currentDate).getDate();
		// 	const lastSubmittedDay = lastSubmittedDateObj.getDate();

		// 	if (currentDay !== lastSubmittedDay) {
		// 		localStorage.removeItem('isSubmitted');
		// 		localStorage.setItem('lastSubmittedDate', currentDate);
		// 	}
		// } else {
		// 	localStorage.setItem('lastSubmittedDate', currentDate);
		// }
	</script>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
