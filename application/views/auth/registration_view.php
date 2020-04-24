<div class="container up">
	<div class="row">
		<div class="col-lg-8 mx-auto">
			<div class="card o-hidden border-0 shadow-lg my-5" data-aos="fade">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<!-- form -->
						<div class="col-lg-12">
							<div class="p-5">
								<div>
									<h1 class="text-left font-weight-bold h2 text-gray-900">DAFTAR AKUN</h1>
									<p class="text-muted">Anda harus membuat akun terlebih dahulu sebelum melakukan
										pemesanan kamar di
										rumah kost ini. Lengkapi form dibawah ini dengan data yang valid agar menjadi
										anggota.</p>
								</div>

								<!-- form mulai -->
								<form class="user needs-validation" method="POST" novalidate>
									<!-- nama lengkap -->
									<div class="form-group">
										<input type="text" class="form-control form-control-user" id="inputNama"
											placeholder="Nama Lengkap" name="nama" value="<?= set_value('nama') ?>" required>
											<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
										<div class="invalid-feedback">
											Harap isi nama lengkap anda.
										</div>
									</div>

									<!-- email -->
									<div class="form-group">
										<input type="email" class="form-control form-control-user" id="inputEmail"
											placeholder="Alamat Email" name="email" value="<?= set_value('email') ?>" required>
											<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
										<div class="invalid-feedback">
											Harap isi alamat email anda.
										</div>
									</div>


									<!-- no telepon -->
									<div class="form-group">
										<input type="text" class="form-control form-control-user" id="inputNomor"
											placeholder="Nomor telepon" name="telp" value="<?= set_value('telp') ?>" required>
											<?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
										<div class="invalid-feedback">
											Harap isi nomor telepon anda.
										</div>
									</div>


									<!-- password -->
									<div class="form-group row">
										<div class="col-sm-6 mb-3 mb-sm-0">
											<input type="password" class="form-control form-control-user password"
												id="inputPassword" placeholder="Password" name="password1" required>
												<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
											<div class="invalid-feedback">
												Harap isi password untuk akun anda.
											</div>
										</div>
										<div class="col-sm-6">
											<input type="password" class="form-control form-control-user confpass"
												id="repeatPassword" placeholder="Repeat Password"
												name="password2" required>
												<?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
											<div class="invalid-feedback">
												Harap isi konfirmasi password untuk akun anda.
											</div>
										</div>
									</div>

									<!-- button submit registrasi -->
									<button type="submit" name="submit_daftar" id="submit"
										class="btn btn-primary btn-user btn-block">SIGN
										UP</button>
									<a href="<?= base_url(); ?>" class="btn btn-google btn-user btn-block">
										<i class="fas fa-home"></i> KEMBALI KE HOMEPAGE
									</a>
								</form>
								<!-- akhir form -->

								<hr>

								<div class="text-center">
									<a class="small" href="<?= base_url('password'); ?>">Lupa Password?</a>
								</div>
								<div class="text-center">
									<a class="small" href="<?= base_url('login'); ?>">Sudah mempunyai akun? Masuk
										sekarang</a>
								</div>
							</div>
						</div>
						<!-- akhir form -->

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
