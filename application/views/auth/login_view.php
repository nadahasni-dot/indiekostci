<body class="bg-gradient-primary">

	<div class="container up">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5" data-aos="fade">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
									</div>
									<?= $this->session->flashdata('message') ?>
									<form class="user needs-validation" method="POST" novalidate>

										<!-- email -->
										<div class="form-group">
											<input type="email" class="form-control form-control-user"
												id="inputEmailLogin" placeholder="Alamat Email" name="email"
												value="<?= set_value('email'); ?>" required>
											<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
											<div class="invalid-feedback">
												Harap isi alamat email anda.
											</div>
										</div>


										<div class="form-group">
											<input type="password" class="form-control form-control-user"
												id="exampleInputPassword" placeholder="Password" name="password"
												required>
											<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
											<div class="invalid-feedback">
												Harap isi password anda.
											</div>
										</div>

										<input type="submit" class="btn btn-primary btn-user btn-block" value="Masuk"
											name="submit_login">

										<hr>
										<a href="<?= base_url(); ?>" class="btn btn-google btn-user btn-block">
											<i class="fas fa-home"></i> Kembali Ke Homepage
										</a>
									</form>

									<hr>

									<div class="text-center">
										<a class="small" href="<?= base_url('password'); ?>">Lupa Password?</a>
									</div>
									<div class="text-center">
										<a class="small" href="<?= base_url('register'); ?>">Buat Akun!</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>
