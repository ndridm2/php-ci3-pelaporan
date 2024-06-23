<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                <img class="img-profile rounded-circle" style="max-width: 50px;" src="<?= base_url('assets/img/Logo.png'); ?>">
                </div>
                <div class="sidebar-text  mx-3 text-white-600 small">Pelaporan Kinerja Guru</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= ($active_link === 'dashboard') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url(); ?>kepsek/dashboard">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item <?= ($active_link === 'guru') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url(); ?>kepsek/guru">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Data Guru</span></a>
            </li>
            <li class="nav-item <?= ($active_link === 'kehadiran') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url(); ?>kepsek/kehadiran">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span>Data Kehadiran</span></a>
            </li>

            <li class="nav-item <?= ($active_link === 'pelaporan') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url(); ?>kepsek/pelaporan">
                    <i class="fa fa-clipboard" aria-hidden="true"></i>
                    <span>Pelaporan Kinerja</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
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
