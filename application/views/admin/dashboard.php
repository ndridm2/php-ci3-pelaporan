    <!-- Begin Page Content -->
    <div class="container-fluid">

    	<!-- Page Heading -->
    	<div class="d-sm-flex align-items-center justify-content-between mb-4">
    		<h1 class="h3 mb-0 text-gray-800">Welcome : <?= $user['username']; ?></h1>
    		<p><?= date("d-m-Y h:i:sa"); ?></p>
    	</div>


    	<div class="row">
    		<!-- Earnings (Monthly) Card Example -->
    		<div class="col-xl-3 col-md-6 mb-4">
    			<div class="card bg-gradient-primary shadow h-100 py-2">
    				<div class="card-body">
    					<div class="row no-gutters align-items-center">
    						<div class="col mr-2">
    							<div class="text-xs font-weight-bold text-white mb-1">Data Guru</div>
    							<div class="h5 mb-0 font-weight-bold text-white"><?= $itemGuru ?></div>
    						</div>
    						<div class="col-auto">
    							<i class="fas fa-user fa-2x text-white"></i>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>

    		<!-- Earnings (Monthly) Card Example -->
    		<div class="col-xl-3 col-md-6 mb-4">
    			<div class="card bg-gradient-success shadow h-100 py-2">
    				<div class="card-body">
    					<div class="row no-gutters align-items-center">
    						<div class="col mr-2">
    							<div class="text-xs font-weight-bold text-white mb-1">Data Kehadiran</div>
    							<div class="h5 mb-0 font-weight-bold text-white"><?= $itemKehadiran ?></div>
    						</div>
    						<div class="col-auto">
    							<i class="fas fa-users fa-2x text-white"></i>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    		<!-- Earnings (Monthly) Card Example -->
    		<div class="col-xl-3 col-md-6 mb-4">
    			<div class="card bg-gradient-info shadow h-100 py-2">
    				<div class="card-body">
    					<div class="row no-gutters align-items-center">
    						<div class="col mr-2">
    							<div class="text-xs font-weight-bold text-white mb-1">Pelaporan Kinerja</div>
    							<div class="h5 mb-0 font-weight-bold text-white"><?= $itemLaporan ?></div>
    						</div>
    						<div class="col-auto">
    							<i class="fas fa-list fa-2x text-white"></i>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    		<!-- Earnings (Monthly) Card Example -->
    		<div class="col-xl-3 col-md-6 mb-4">
    			<div class="card bg-gradient-warning shadow h-100 py-2">
    				<div class="card-body">
    					<div class="row no-gutters align-items-center">
    						<div class="col mr-2">
    							<div class="text-xs font-weight-bold text-white mb-1">Tanggal</div>
    							<div class="h5 mb-0 font-weight-bold text-white"><?= date('d-M-Y'); ?></div>
    						</div>
    						<div class="col-auto">
    							<i class="fas fa-calendar-day fa-2x text-white"></i>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<!-- Content Row -->

    	<div class="row">

    		<!-- Pie Chart -->
    		<div class="col-xl-4 col-lg-5">
    			<div class="card shadow mb-4">
    				<!-- Card Header - Dropdown -->
    				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    					<h6 class="m-0 font-weight-bold text-primary">Diagram Kehadiran</h6>
    					<div class="dropdown no-arrow">
    						<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    							<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
    						</a>
    						<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
    							<div class="dropdown-header">Dropdown Header:</div>
    						</div>
    					</div>
    				</div>
    				<!-- Card Body -->
    				<div class="card-body">
    					<div class="chart-pie pt-4 pb-2">
    						<canvas id="myPieChart"></canvas>
    					</div>
    					<div class="mt-4 text-center small">
    						<span class="mr-2">
    							<i class="fas fa-circle text-primary"></i> Hadir
    						</span>
    						<span class="mr-2">
    							<i class="fas fa-circle text-success"></i> Izin
    						</span>
    						<span class="mr-2">
    							<i class="fas fa-circle text-info"></i> Tidak Hadir
    						</span>
    					</div>
    				</div>
    			</div>
    		</div>

    		<!-- Area Chart -->
    		<div class="col-xl-8 col-lg-7">
    			<div class="card shadow p-4 col-xl-12 col-md-6 mb-10">
    				<div class="table-responsive">
    					<table class="table table-bordered table-hover table-striped" id="tabledata">
    						<thead>
    							<tr>
    								<th class="text-center" width="4%">No</th>
    								<th class="text-center">Jam</th>
    								<th class="text-center">Hari</th>
    								<th class="text-center">Pembelajaran ID</th>
    								<th class="text-center">MAPEL</th>
    								<th class="text-center">Deskripsi</th>
    							</tr>
    						</thead>
    						<tbody>
    							<?php $no = 1;
								foreach ($item as $i) : ?>
    								<tr>
    									<td class="text-center"><?= $no++ ?></td>
    									<td class="text-center"><?= $i['jam_pelajaran'] ?></td>
    									<td class="text-center"><?= $i['hari'] ?></td>
    									<td class="text-center"><?= $i['pembelajaran_id'] ?></td>
    									<td class="text-center"><?= $i['mapel'] ?></td>
    									<td class="text-center"><?= $i['deskripsi'] ?></td>
    								<?php endforeach; ?>

    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>



    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
