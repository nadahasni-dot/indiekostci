<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
		<div class="sidebar-brand-icon">
			<i class="fas fa-home"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Indiekost</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">




	<!-- menu dasbor -->
	<?php if($menu == 'dashboard') : ?>
	<!-- Nav Item - Dashboard -->
	<li class="nav-item active">
		<a class="nav-link" href="<?= base_url('admin'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<?php else : ?>
	<!-- Nav Item - Dashboard -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<?php endif; ?>






	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Pengelolaan
	</div>





	<!-- menu penghuni -->

	<?php if($menu == 'penghuni') : ?>
	<!-- Nav Item - Charts -->
	<li class="nav-item active">
		<a class="nav-link" href="<?= base_url('admin/penghuni'); ?>">
			<i class="fas fa-fw fa-user-friends"></i>
			<span>Penghuni</span></a>
	</li>
	<?php else : ?>
	<!-- Nav Item - Charts -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin/penghuni'); ?>">
			<i class="fas fa-fw fa-user-friends"></i>
			<span>Penghuni</span></a>
	</li>
	<?php endif; ?>






	<!-- menu kamar -->

	<?php 
        if($menu == 'kamar'):             
            if($subMenu == 'booking_kamar'):
    ?>
	<!-- Nav Item - Kamar Collapse Menu -->
	<li class="nav-item active">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKamar" aria-expanded="true"
			aria-controls="collapseKamar">
			<i class="fas fa-fw fa-bed"></i>
			<span>Kamar</span>
		</a>
		<div id="collapseKamar" class="collapse show" aria-labelledby="headingUtilities"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu:</h6>
				<a class="collapse-item active" href="<?= base_url('admin/bookingkamar'); ?>">Booking Kamar</a>
				<a class="collapse-item" href="<?= base_url('admin/datakamar'); ?>">Data Kamar</a>
				<a class="collapse-item" href="<?= base_url('admin/menghuni'); ?>">Menghuni</a>
			</div>
		</div>
	</li>
	<?php elseif($subMenu == 'data_kamar'): ?>
	<!-- Nav Item - Kamar Collapse Menu -->
	<li class="nav-item active">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKamar" aria-expanded="true"
			aria-controls="collapseKamar">
			<i class="fas fa-fw fa-bed"></i>
			<span>Kamar</span>
		</a>
		<div id="collapseKamar" class="collapse show" aria-labelledby="headingUtilities"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu:</h6>
				<a class="collapse-item" href="<?= base_url('admin/bookingkamar'); ?>">Booking Kamar</a>
				<a class="collapse-item active" href="<?= base_url('admin/datakamar'); ?>">Data Kamar</a>
				<a class="collapse-item" href="<?= base_url('admin/menghuni'); ?>">Menghuni</a>
			</div>
		</div>
	</li>

	<?php elseif($subMenu == 'menghuni'): ?>
	<!-- Nav Item - Kamar Collapse Menu -->
	<li class="nav-item active">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKamar" aria-expanded="true"
			aria-controls="collapseKamar">
			<i class="fas fa-fw fa-bed"></i>
			<span>Kamar</span>
		</a>
		<div id="collapseKamar" class="collapse show" aria-labelledby="headingUtilities"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu:</h6>
				<a class="collapse-item" href="<?= base_url('admin/bookingkamar'); ?>">Booking Kamar</a>
				<a class="collapse-item" href="<?= base_url('admin/datakamar'); ?>">Data Kamar</a>
				<a class="collapse-item active" href="<?= base_url('admin/menghuni'); ?>">Menghuni</a>
			</div>
		</div>
	</li>
	<?php endif; ?>

	<?php else: ?>
	<!-- Nav Item - Kamar Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKamar" aria-expanded="true"
			aria-controls="collapseKamar">
			<i class="fas fa-fw fa-bed"></i>
			<span>Kamar</span>
		</a>
		<div id="collapseKamar" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu:</h6>
				<a class="collapse-item" href="<?= base_url('admin/bookingkamar'); ?>">Booking Kamar</a>
				<a class="collapse-item" href="<?= base_url('admin/datakamar'); ?>">Data Kamar</a>
				<a class="collapse-item" href="<?= base_url('admin/menghuni'); ?>">Menghuni</a>
			</div>
		</div>
	</li>

	<?php endif; ?>




	<!-- menu pembayaran -->

	<?php 
        if($menu == 'pembayaran'):
            if($subMenu == 'pemasukan'):
    ?>
	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item active">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-money-bill"></i>
			<span>Pembayaran</span>
		</a>
		<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu:</h6>
				<a class="collapse-item active" href="<?= base_url('admin/pemasukan'); ?>">Pemasukan</a>
				<a class="collapse-item" href="<?= base_url('admin/pengeluaran'); ?>">Pengeluaran</a>
			</div>
		</div>
	</li>
	<?php elseif($subMenu == 'pengeluaran'): ?>
	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item active">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-money-bill"></i>
			<span>Pembayaran</span>
		</a>
		<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu:</h6>
				<a class="collapse-item" href="<?= base_url('admin/pemasukan'); ?>">Pemasukan</a>
				<a class="collapse-item active" href="<?= base_url('admin/pengeluaran'); ?>">Pengeluaran</a>
			</div>
		</div>
	</li>

	<?php endif; ?>

	<?php else : ?>
	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-money-bill"></i>
			<span>Pembayaran</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu:</h6>
				<a class="collapse-item" href="<?= base_url('admin/pemasukan'); ?>">Pemasukan</a>
				<a class="collapse-item" href="<?= base_url('admin/pengeluaran'); ?>">Pengeluaran</a>
			</div>
		</div>
	</li>
	<?php endif; ?>






	<!-- menu laporan -->

	<?php 
        if($menu == 'laporan') :
            if($subMenu == 'laba_rugi'):
    ?>
	<!-- Nav Item - Utilities Collapse Menu -->
	<li class="nav-item active">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
			aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-book"></i>
			<span>Laporan</span>
		</a>
		<div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu:</h6>
				<a class="collapse-item active" href="<?= base_url('admin/labarugi'); ?>">Laporan Laba/Rugi</a>
				<a class="collapse-item" href="<?= base_url('admin/laporanpengeluaran'); ?>">Laporan Pengeluaran</a>
				<!-- <a class="collapse-item" href="admin-status-kamar.php">Laporan Status Kamar</a> -->
			</div>
		</div>
	</li>

	<?php elseif($subMenu == 'laporan_pengeluaran'): ?>
	<!-- Nav Item - Utilities Collapse Menu -->
	<li class="nav-item active">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
			aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-book"></i>
			<span>Laporan</span>
		</a>
		<div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu:</h6>
				<a class="collapse-item" href="<?= base_url('admin/labarugi'); ?>">Laporan Laba/Rugi</a>
				<a class="collapse-item active" href="<?= base_url('admin/laporanpengeluaran'); ?>">Laporan Pengeluaran</a>
				<!-- <a class="collapse-item" href="admin-status-kamar.php">Laporan Status Kamar</a> -->
			</div>
		</div>
	</li>

	<?php endif; ?>

	<?php else: ?>
	<!-- Nav Item - Utilities Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
			aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-book"></i>
			<span>Laporan</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu:</h6>
				<a class="collapse-item" href="<?= base_url('admin/labarugi'); ?>">Laporan Laba/Rugi</a>
				<a class="collapse-item" href="<?= base_url('admin/laporanpengeluaran'); ?>">Laporan Pengeluaran</a>
				<!-- <a class="collapse-item" href="admin-status-kamar.php">Laporan Status Kamar</a> -->
			</div>
		</div>
	</li>
	<?php endif; ?>




	<!-- menu master data -->
	<?php 
        if($menu == 'masterdata'):
            if($subMenu == 'data_layanan'):
    ?>
	<!-- Nav Item - masteData Collapse Menu -->
	<li class="nav-item active">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true"
			aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-box"></i>
			<span>Master Data</span>
		</a>
		<div id="collapseMaster" class="collapse show" aria-labelledby="headingUtilities"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu:</h6>
				<a class="collapse-item active" href="<?= base_url('admin/datalayanan'); ?>">Data Layanan</a>
				<a class="collapse-item" href="<?= base_url('admin/datajenispengeluaran'); ?>">Data Jenis
					Pengeluaran</a>
				<a class="collapse-item" href="<?= base_url('admin/datatipekamar'); ?>">Data Tipe Kamar</a>
			</div>
		</div>
	</li>

	<?php elseif($subMenu == 'data_jenis_pengeluaran'): ?>
	<!-- Nav Item - masteData Collapse Menu -->
	<li class="nav-item active">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true"
			aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-box"></i>
			<span>Master Data</span>
		</a>
		<div id="collapseMaster" class="collapse show" aria-labelledby="headingUtilities"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu:</h6>
				<a class="collapse-item" href="<?= base_url('admin/datalayanan'); ?>">Data Layanan</a>
				<a class="collapse-item active" href="<?= base_url('admin/datajenispengeluaran'); ?>">Data Jenis
					Pengeluaran</a>
				<a class="collapse-item" href="<?= base_url('admin/datatipekamar'); ?>">Data Tipe Kamar</a>
			</div>
		</div>
	</li>

	<?php elseif($subMenu == 'data_tipe_kamar'): ?>
	<!-- Nav Item - masteData Collapse Menu -->
	<li class="nav-item active">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true"
			aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-box"></i>
			<span>Master Data</span>
		</a>
		<div id="collapseMaster" class="collapse show" aria-labelledby="headingUtilities"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu:</h6>
				<a class="collapse-item" href="<?= base_url('admin/datalayanan'); ?>">Data Layanan</a>
				<a class="collapse-item" href="<?= base_url('admin/datajenispengeluaran'); ?>">Data Jenis
					Pengeluaran</a>
				<a class="collapse-item active" href="<?= base_url('admin/datatipekamar'); ?>">Data Tipe Kamar</a>
			</div>
		</div>
	</li>

	<?php endif; ?>

	<?php else: ?>
	<!-- Nav Item - masteData Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true"
			aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-box"></i>
			<span>Master Data</span>
		</a>
		<div id="collapseMaster" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Menu:</h6>
				<a class="collapse-item" href="<?= base_url('admin/datalayanan'); ?>">Data Layanan</a>
				<a class="collapse-item" href="<?= base_url('admin/datajenispengeluaran'); ?>">Data Jenis
					Pengeluaran</a>
				<a class="collapse-item" href="<?= base_url('admin/datatipekamar'); ?>">Data Tipe Kamar</a>
			</div>
		</div>
	</li>
    <?php endif; ?>
    


    

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->
