<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data Pelaporan Kinerja</h1>
	</div>
	<!-- Page Heading -->
	<div class="mt-5"></div>

	<div class="row">

	</div>

	<div class="row mr-5 ml-1">
		<button class="btn btn-primary mb-4 mr-3" data-toggle="modal" data-target="#tambah_data">
			<i class="fa fa-plus fa-sm"></i> Tambah
		</button>
		<div class="align-items-center justify-content-between mb-4">
			<a href="<?= base_url('kepsek/pelaporan/print'); ?>" 
			class="d-none d-inline-block btn btn btn-dark shadow-sm">
			<i class="fas fa-print fa-sm text-white-80"></i> Print</a>
		</div>

	</div>

	<!-- table -->
	<div class="card shadow p-4 col-xl-12 col-md-6 mb-10">

		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped" id="pelaporanTable">
				<thead>
					<tr>
						<th class="text-center" width="4%">No</th>
						<th class="text-center">Periode Laporan</th>
						<th class="text-center">NIP</th>
						<th class="text-center">Nama Guru</th>
						<th class="text-center">Penilaian</th>
						<th class="text-center">Deskripsi</th>
						<th class="text-center" width="12%"></th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($item as $i) : ?>
						<tr>
							<td class="text-center"><?= $no++ ?></td>
							<td class="text-center"><?= date('d-m-Y', strtotime($i['periode_laporan'])) ?></td>
							<td class="text-center"><?= $i['nip'] ?></td>
							<td class="text-center"><?= $i['username'] ?></td>
							<td class="text-center"><?= $i['penilaian'] ?></td>
							<td class="text-center"><?= $i['deskripsi'] ?></td>
							<td style="width: 12px;text-align: center;vertical-align: middle;">

								<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $i['pelaporan_id']; ?>"><i class="fas fa-edit"></i></button>

								<?= anchor('kepsek/pelaporan/hapus/' . $i['pelaporan_id'], '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
								<?= anchor('kepsek/pelaporan/print/' . $i['pelaporan_id'], '<div class="btn btn-sm btn-dark"><i class="fa fa-print"></i></div>') ?>
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
					<form action="<?= base_url() . 'admin/pelaporan/tambah'; ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label class="mr-sm-2" for="inlineFormCustomSelect">Nama Guru</label>
							<input type="hidden" name="pelaporan_id">
							<select class="custom-select mr-sm-2" name="guru_id" id="guru_id">
								<option selected>Choose...</option>
								<?php foreach ($relasi as $p) : ?>
									<option value="<?= $p->id ?>"><?= $p->username ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Periode Laporan</label>
							<input type="date" name="periode_laporan" value="<?= date('Y-m-d') ?>" class="form-control">
						</div>

						<div class="form-group">
							<label>penilaian</label>
							<input type="Text" name="penilaian" class="form-control">
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<input type="text" name="deskripsi" class="form-control">
						</div>

						<div class="modal-footer">
							<button type="button" data-dismiss="modal" class="btn btn-danger col-sm-4">cancel</button>
							<button type="submit" class="btn btn-primary col-sm-4">Save</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end -->

	<!-- modal edit -->
	<?php foreach ($item as $i) : ?>
		<div class="modal fade" id="edit<?= $i['pelaporan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
						<form action="<?= base_url() . 'admin/pelaporan/update'; ?>" method="post" enctype="multipart/form-data">

							<div class="form-group">
								<label>Guru</label>
								<input type="hidden" name="pelaporan_id" value="<?= $i['pelaporan_id']; ?>">
								<input type="text" name="guru_id" value="<?= $i['guru_id']; ?> - <?= $i['username']; ?>" class="form-control" readonly=true>
							</div>
							<div class="form-group">
								<label>Periode Laporan</label>
								<input type="date" name="periode_laporan" value="<?= $i['periode_laporan']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Penilaian</label>
								<input type="text" name="penilaian" value="<?= $i['penilaian']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<input type="text" name="deskripsi" value="<?= $i['deskripsi']; ?>" class="form-control">
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
