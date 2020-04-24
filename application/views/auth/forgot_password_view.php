<div class="container up">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-xl-10 col-lg-12 col-md-9">

			<div class="card o-hidden border-0 shadow-lg my-5" data-aos="fade">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
						<div class="col-lg-6">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-2">Lupa Password Akun?</h1>
									<p class="mb-4">Masukkan email anda, dan kami akan mengirim link untuk mereset password anda.</p>
								</div>
								<?= $this->session->flashdata('message') ?>
								<form class="user" action="" method="POST">
									<div class="form-group">
										<input type="email" name="email" class="form-control form-control-user"
											id="exampleInputEmail" aria-describedby="emailHelp"
											placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
										<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<input type="submit" name="reset_pass" class="btn btn-primary btn-user btn-block"
										value="Reset Password">
								</form>
								<hr>
								<div class="text-center">
									<a class="small" href="<?= base_url('register'); ?>">Belum mempunyai akun? Buat
										Akun!</a>
								</div>
								<div class="text-center">
									<a class="small" href="<?= base_url('login'); ?>">Sudah memiliki akun? Masuk
										Sekarang!</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>
