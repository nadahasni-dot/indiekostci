<!-- Begin Page Content -->
<div class="container-fluid">




	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		<form action="<?= base_url('laporan/labarugi'); ?>" method="POST" target="_blank">

			<input type="hidden" name="tahun" value="<?= date("Y"); ?>" required>
			<button href="#" type="submit" name="cetakTahun" value="true"
				class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
					class="fas fa-print fa-sm text-white-50"></i> Cetak Laporan</button>
		</form>
	</div>




	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<a href="<?= base_url('admin/pemasukan') ?>" class="stretched-link"></a>
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pendapatan
								(<?= $pendapatanThisMonth['bulan_sekarang']; ?>)</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">Rp
								<?= number_format($pendapatanThisMonth['pendapatan_bulan']); ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<a href="<?= base_url('admin/pemasukan') ?>" class="stretched-link"></a>
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan
								(<?= $pendapatanThisYear['tahun_sekarang']; ?>)</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">Rp
								<?php echo number_format($pendapatanThisYear['pendapatan_tahun']); ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<a href="<?= base_url('admin/penghuni') ?>" class="stretched-link"></a>
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Penghuni</div>
							<?php 
                        // $query = "SELECT COUNT(pengguna.nama_pengguna) total_penghuni FROM pengguna
                        // WHERE pengguna.id_akses = 2";
        
                        // $result = mysqli_query($conn, $query);
                        // $data_penghuni = mysqli_fetch_array($result);
                      ?>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sumPenghuni['total_penghuni']; ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user-friends fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">

				<div class="card-body">
					<a href="<?= base_url('admin/pemasukan') ?>" class="stretched-link"></a>
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pembayaran Pending
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pendingIncome['belum_dikonfirmasi']; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>




	<!-- Content Row -->
	<div class="row">

		<div class="col-xl-8 col-lg-7">

			<!-- Area Chart -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Pendapatan Tiap Bulan</h6>
				</div>
				<div class="card-body">
					<div class="chart-area">
						<canvas id="myAreaChart"></canvas>
					</div>
					<hr>
					<span class="text-danger">Data pendapatan rumah kost anda tiap bulan</span>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-5">

			<!-- Basic Card Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Pembayaran Kamar Terbaru</h6>
				</div>
				<div class="card-body">
					<?php foreach($newestIncome as $row): ?>
					<div class="row">
						<div class="col-2">
							<?php if($row['foto_pengguna'] == NULL): ?>

							<img class="rounded-circle mt-1" width="40px" height="40px"
								src="<?= base_url('assets/img/profile-img-none.png'); ?>" alt="">

							<?php else : ?>

							<img class="rounded-circle mt-1" width="40px" height="40px"
								src="<?= base_url('assets/img/').$row['foto_pengguna']; ?>" alt="">

							<?php endif; ?>

						</div>
						<div class="col-10">
							<h3 class="h6 font-weight-bolder text-dark"><?= $row['nama_pengguna']  ?></h3>
							<p class="text-muted">Rp <?= number_format($row['nilai_pembayaran']); ?></p>
						</div>
					</div>

					<?php endforeach; ?>

					<a href="<?= base_url('admin/pemasukan') ?>"
						class="btn btn-outline-primary btn-block">Selengkapnya</a>
				</div>
			</div>
		</div>		
	</div>


	
</div>
