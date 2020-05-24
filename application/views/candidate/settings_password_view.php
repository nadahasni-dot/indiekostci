<!-- Page Heading -->

<div class="d-sm-flex align-items-center justify-content-between mb-3">
  <div class="card col-12">
    <div class="card-body">
      <h4 class="card-title">Rubah Password</h4>
      <p class="card-text">Isi form ini untuk mengubah password akun anda</p>
      <?= $this->session->flashdata('message') ?>
      <form class="needs-validation" method="POST" novalidate>
        <input type="hidden" name="id" value="<?php echo $user['id_pengguna'];?>">
        <div class="form-group">
          <label for="pass_lama">Password Lama</label>
          <input type="password" class="form-control" id="pass_lama" name="pass_lama"
            aria-describedby="Password Lama" placeholder="Masukkan password lama" required>
          <?= form_error('pass_lama', '<small class="text-danger pl-3">', '</small>'); ?>
          <div class="invalid-feedback">
            Masukkan Password Lama Anda
          </div>
        </div>
        <div class="form-group">
          <label for="pass_baru">Password Baru</label>
          <input type="password" class="form-control" id="pass_baru" name="pass_baru"
            aria-describedby="Password Baru" placeholder="Masukkan password baru" required>
          <?= form_error('pass_baru', '<small class="text-danger pl-3">', '</small>'); ?>
          <div class="invalid-feedback">
            Masukkan Password Baru Anda
          </div>
        </div>
        <div class="form-group">
          <label for="passBaruVerifikasi">Verifikasi Password Baru</label>
          <input type="password" class="form-control" id="passBaruVerifikasi" name="pass_baru_verifikasi"
            aria-describedby="Verifikasi Password Baru" placeholder="Verifikasi password baru" required>
          <div class="invalid-feedback">
            Verifikasi Password Baru Anda
          </div>
        </div>
        <button type="submit" name="rubah_password" class="btn btn-primary btn-block"
          onclick="return confirm('Anda yakin ingin merubah password?');">Rubah password</button>
      </form>
    </div>
  </div>
</div>
<!-- End of Main Content -->