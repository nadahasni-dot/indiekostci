<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Raleway&display=swap" rel="stylesheet">

	<!-- fontawesome icon -->
	<script src="https://kit.fontawesome.com/9afba118d6.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

	<!-- custom css -->
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

	<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/favicon'); ?>/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/favicon'); ?>/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/favicon'); ?>/favicon-16x16.png">
	<link rel="manifest" href="<?= base_url('assets/favicon'); ?>/site.webmanifest">

	<title>INDIEKOS | Landing Page</title>
</head>

<body>

	<!-- navbar -->
	<header id="header">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<a class="navbar-brand" href="#">INDIEKOST</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
					aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav ml-auto">
						<a class="nav-item nav-link item-scroll" id="btn-tentang" href="#tentang">Tentang</a>
						<a class="nav-item nav-link item-scroll" id="btn-keunggulan" href="#keunggulan">Keunggulan</a>
						<a class="nav-item nav-link item-scroll" id="btn-testimoni" href="#testimoni">Testimoni</a>
						<a class="nav-item btn btn-light tombol tombol-nav" href="<?= base_url('register') ?>"
							tabindex="-1" aria-disabled="true">Daftar</a>
						<a class="nav-item btn btn-light tombol tombol-nav" href="<?= base_url('login') ?>"
							tabindex="-1" aria-disabled="true">Masuk</a>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<!-- navbar end -->
