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
                    <h1 class="text-left font-weight-bold h2 text-gray-900">Ganti Password</h1>
                    <p class="text-muted">Harap masukkan password baru untuk <strong><?= $this->session->userdata('reset_email'); ?></strong>. Anda dapat mereset password kapan saja melalui email anda</p>                    
                  </div>

                  <!-- form mulai -->
                  <form class="user needs-validation" action="" method="POST" novalidate>

                  <input type="hidden" value="<?php echo $this->session->userdata('reset_email'); ?>" name="email">

                    <!-- password -->
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user password" id="inputPassword"
                          placeholder="Password baru" name="password1" required>
                          <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                          <div class="invalid-feedback">
                            Harap isi password untuk akun anda.
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <input type="password" class="form-control form-control-user confpass" id="repeatPassword"
                          placeholder="Ulangi password baru" name="password2" required>
                          <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                        <div class="invalid-feedback">
                          Harap isi konfirmasi password untuk akun anda.
                        </div>
                      </div>
                    </div>

                    <!-- button submit registrasi -->
                    <button type="submit" id="submit" name="new_pass" class="btn btn-primary btn-user btn-block">Ganti Password</button>
                  </form>


                  <!-- akhir form -->
                  

                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('register'); ?>">Belum mempunyai akun? Daftar sekarang</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('login'); ?>">Sudah mempunyai akun? Masuk sekarang</a>
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