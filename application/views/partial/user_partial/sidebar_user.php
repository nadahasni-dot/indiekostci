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

	<?php if($menu == 'dashboard'): ?>
	<!-- Nav Item - Dashboard -->
	<li class="nav-item active">
		<a class="nav-link" href="<?= base_url('user'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
    </li>
    <?php else: ?>
    <!-- Nav Item - Dashboard -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('user'); ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
    </li>
    <?php endif; ?>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Fitur
	</div>
    
    <?php if($menu == 'kamar'): ?>
	<!-- Nav Item - Charts -->
	<li class="nav-item active">
		<a class="nav-link" href="<?= base_url('user/kamar'); ?>">
			<i class="fas fa-fw fa-bed"></i>
			<span>Kamar</span></a>
    </li>
    <?php else: ?>
    <!-- Nav Item - Charts -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('user/kamar'); ?>">
			<i class="fas fa-fw fa-bed"></i>
			<span>Kamar</span></a>
    </li>
    <?php endif; ?>
    
    <?php if($menu == 'pembayaran'): ?>
	<!-- Nav Item - Charts -->
	<li class="nav-item active">
		<a class="nav-link" href="<?= base_url('user/pembayaran'); ?>">
			<i class="fas fa-fw fa-money-bill"></i>
			<span>Pembayaran</span></a>
    </li>
    <?php else: ?>
    <!-- Nav Item - Charts -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('user/pembayaran'); ?>">
			<i class="fas fa-fw fa-money-bill"></i>
			<span>Pembayaran</span></a>
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
