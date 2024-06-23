<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                <img class="img-profile rounded-circle" style="max-width: 50px;" src="<?= base_url('assets/img/Logo.png'); ?>">
                </div>
                <div class="sidebar-text text-white-500 small">Pelaporan Kinerja Guru</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= ($active_link === 'dashboard') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url(); ?>admin/dashboard">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= ($active_link === 'guru') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url(); ?>admin/guru">
                    <i class="fas fa-user"></i>
                    <span>Kelola Data Guru</span></a>
            </li>
            <li class="nav-item <?= ($active_link === 'kehadiran') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url(); ?>admin/kehadiran">
                    <i class="fas fa-clipboard"></i>
                    <span>Kelola Kehadiran</span></a>
            </li>
            <li class="nav-item <?= ($active_link === 'pembelajaran') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url(); ?>admin/pembelajaran">
                    <i class="fas fa-list"></i>
                    <span>kegiatan Pembelajaran</span></a>
            </li>
            <li class="nav-item <?= ($active_link === 'pelaporan') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url(); ?>admin/pelaporan">
                    <i class="fas fa-file"></i>
                    <span>Pelaporan Kinerja</span></a>
            </li>
            <li class="nav-item <?= ($active_link === 'elements') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url(); ?>admin/elements">
                    <i class="fas fa-users"></i>
                    <span>Elements</span></a>
            </li>
            
        </ul>
        <!-- End of Sidebar -->
		<script>
			$(document).ready(function() {
				// Get the current URL path
				var currentPath = window.location.pathname;

				// Find the matching nav-link element
				$('.nav-link').each(function() {
					var linkPath = $(this).attr('href');
					if (currentPath.includes(linkPath)) {
						$(this).addClass('active'); // Add the 'active' class
					}
				});
			});
		</script>
