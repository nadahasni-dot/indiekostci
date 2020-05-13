<!doctype html>
<html lang="en">

<form action="<?= base_url('update/updateProfil') ?>" method="POST" enctype="multipart/form-data">
	<?php if(isset($is_admin)): ?>
		<input type="hidden" name="level" value="<?php echo 'admin'; ?>">
	<?php endif; ?>
	<input type="hidden" name="id_pengguna" value="<?php echo $penghuni['id_pengguna']; ?>">
	<input type="hidden" name="foto_lama" value="<?php echo $penghuni['foto_pengguna']; ?>">
	<div class="form-group">
		<label for="nik">NIK</label>
		<input value="<?php echo $penghuni['no_ktp_pengguna']; ?>" type="text" class="form-control" id="nik" name="nik"
			aria-describedby="Nomor induk kewarganegaraan" placeholder="Masukkan NIK baru" required>
	</div>
	<div class="form-group">
		<label for="nama">Nama</label>
		<input value="<?php echo $penghuni['nama_pengguna']; ?>" type="text" class="form-control" id="nama" name="nama"
			aria-describedby="nama" placeholder="Masukkan nama baru" required>
	</div>
	<div class="form-group">
		<label for="tgl">Tanggal Lahir</label>
		<input value="<?php echo $penghuni['tanggal_lahir_pengguna']; ?>" type="date" class="form-control" id="tgl"
			name="tgl" aria-describedby="tgl" placeholder="Masukkan tanggal lahir baru" required>
	</div>
	<div class="form-group">
		<label for="jKelamin">Jenis Kelamin</label>
		<select name="jKelamin" class="form-control" id="jKelamin" required>
			<?php if ($penghuni['kelamin_pengguna'] == NULL) { ?>
			<option selected disabled value="">Pilih Jenis Kelamin</option>
			<option value="Pria">Pria</option>
			<option value="Wanita">Wanita</option>
			<?php } else if ($penghuni['kelamin_pengguna'] == 'Pria') { ?>
			<option disabled value="">Pilih Jenis Kelamin</option>
			<option selected value="Pria">Pria</option>
			<option value="Wanita">Wanita</option>
			<?php } else { ?>
			<option disabled value="">Pilih Jenis Kelamin</option>
			<option value="Pria">Pria</option>
			<option selected value="Wanita">Wanita</option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label for="alamat">Alamat</label>
		<input value="<?php echo $penghuni['alamat_pengguna']; ?>" type="text" class="form-control" id="alamat"
			name="alamat" aria-describedby="alamat" placeholder="Masukkan alamat baru" required>
	</div>
	<div class="form-group">
		<label for="provinsi">Provinsi</label>
		<input value="<?php echo $penghuni['provinsi_pengguna']; ?>" type="text" class="form-control" id="provinsi"
			name="provinsi" aria-describedby="provinsi" placeholder="Masukkan provinsi baru" required>
	</div>
	<div class="form-group">
		<label for="kota">Kota</label>
		<input value="<?php echo $penghuni['kota_pengguna']; ?>" type="text" class="form-control" id="kota" name="kota"
			aria-describedby="kota" placeholder="Masukkan kota baru" required>
	</div>
	<div class="form-group">
		<label for="telepon">Telepon</label>
		<input value="<?php echo $penghuni['telepon_pengguna']; ?>" type="telepon" class="form-control" id="telepon"
			name="telepon" aria-describedby="telepon" placeholder="Masukkan telepon baru" required>
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input value="<?php echo $penghuni['email_pengguna']; ?>" type="email" class="form-control" id="email" name="email"
			aria-describedby="email" placeholder="Masukkan email baru" required>
	</div>
	<div class="form-group">
		<label for="profil">Foto Profil</label>
		<input value="<?php echo $penghuni['foto_pengguna']; ?>" type="file" class="form-control-file" id="profil"
			name="foto_baru" aria-describedby="profil" accept="image/*">
	</div>

	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
		<button type="submit" name="update_pengguna" class="btn btn-primary"
			onclick="return confirm('Anda yakin ingin mengupdate data?');">Update</button>
	</div>
</form>

</html>
