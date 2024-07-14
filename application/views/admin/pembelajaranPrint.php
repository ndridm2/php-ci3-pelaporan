<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data kegiatan</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/print.css') ?>">
	<link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-12">
				<h3 class="text-center">Data Kegiatan Pembelajaran SMA 1 Ulujami Pemalang</h3>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-6">
				<p>Nama: Staff TU Sekolah</p>
				<p>NIP: 040815001235</p>
				<p>Jabatan: Pegawai</p>
				<p>Periode: <?= date('M Y') ?></p>
			</div>

			<div class="col-6 text-end">
				<p>Laporan Data Kegiatan Pembelajaran</p>
				<p><?= date('d m Y - H:i'); ?></p>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-12 table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">NIP Guru</th>
							<th class="text-center">Nama Guru</th>
							<th class="text-center">Pelajaran ID</th>
							<th class="text-center">Mata Pelajaran</th>
							<th class="text-center">Jam Pelajaran</th>
							<th class="text-center">Deskripsi</th>
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
								<td class="text-center"><?= $i['deskripsi'] ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-12 text-right">
				<p>Pemalang, <?= date('M Y') ?></p>
				<p>Admin</p>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		window.print();
		$(document).ready(function() {});
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
