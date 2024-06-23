<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Data Kehadiran</h1>
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
			<a href="<?= base_url('admin/kehadiran/print'); ?>" 
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
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Nama Guru</th>
                        <th class="text-center">Status</th>
                        <th class="text-center"width="8%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($item as $i) : ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= date('j F Y', strtotime($i['tanggal'])) ?></td>
                            <td class="text-center"><?= $i['username'] ?></td>
                            <td class="text-center"><?= $i['status'] ?></td>
                            <td style="width: 8px;text-align: center;vertical-align: middle;">

                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $i['kehadiran_id'];?>"><i class="fas fa-edit"></i></button>
                
                            <?= anchor('admin/kehadiran/hapus/' . $i['kehadiran_id'], '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
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
                    <form action="<?= base_url() . 'admin/kehadiran/tambah'; ?>" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label class="mr-sm-2" for="inlineFormCustomSelect">Nama Guru</label>
							<input type="hidden" name="kehadiran_id">
							<select class="custom-select mr-sm-2" name="guru_id" id="guru_id">
								<option selected>Choose...</option>
								<?php foreach ($relasi as $p): ?>
								<option value="<?= $p->id ?>"><?= $p->username ?></option>
							<?php endforeach; ?>
							</select>			
						</div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" class="form-control">
                        </div>
						<fieldset class="form-group">
							<div class="row">
							<legend class="col-form-label col-sm-2 pt-0">Status</legend>
								<div class="col-sm-10">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="status" id="status" value="Hadir">
										<label class="form-check-label" for="status">
											Hadir
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="status" id="status" value="Izin">
										<label class="form-check-label" for="status">
											Izin
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="status" id="status" value="Sakit">
										<label class="form-check-label" for="status">
											Sakit
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="status" id="status" value="Tanpa Keterangan">
										<label class="form-check-label" for="status">
											Tanpa Keterangan
										</label>
									</div>
								</div>
							</div>
						</fieldset>

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
        <div class="modal fade" id="edit<?= $i['kehadiran_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="<?= base_url() . 'admin/kehadiran/update'; ?>" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Guru Id</label>
								<input type="hidden" name="kehadiran_id" value="<?= $i['kehadiran_id']; ?>">
                                <input type="text" name="guru_id" value="<?= $i['guru_id']; ?> - <?= $i['username']; ?>" class="form-control" readonly=true>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" value="<?= $i['tanggal']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" name="status" value="<?= $i['status']; ?>" class="form-control" readonly=true>
                            </div>

							<fieldset class="form-group">
							<div class="row">
							<legend class="col-form-label col-sm-2 pt-0"></legend>
							
								<div class="col-sm-10">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="status" id="status" value="Hadir">
										<label class="form-check-label" for="gridRadios1">
											Hadir
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="status" id="gridRadios2" value="Izin">
										<label class="form-check-label" for="status">
											Izin
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="status" id="status" value="Sakit">
										<label class="form-check-label" for="gridRadios3">
											Sakit
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="status" id="gridRadios4" value="Tanpa Keterangan">
										<label class="form-check-label" for="status">
											Tanpa Keterangan
										</label>
									</div>
								</div>
							</div>
						</fieldset>
            
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
