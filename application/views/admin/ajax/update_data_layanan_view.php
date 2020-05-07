<!doctype html>
<html lang="en">

<form action="<?= base_url('update/updatedatalayanan'); ?>" method="POST">
	<input type="hidden" name="id" value="<?php echo $layanan['id_layanan']; ?>">
	<div class="form-group">
		<label for="nik">Nama Layanan</label>
		<input value="<?php echo $layanan['nama_layanan']; ?>" type="text" class="form-control" id="namaLayanan"
			name="namaLayanan" aria-describedby="Nomor induk kewarganegaraan" placeholder="Masukkan NIK baru" required>
	</div>
	<div class="form-group">
		<label for="nama">Harga</label>
		<input value="<?php echo $layanan['harga_bulanan']; ?>" type="text" class="form-control" id="hargaLayanan"
			name="hargaLayanan" aria-describedby="nama" placeholder="Masukkan nama baru" required>
	</div>


	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
		<button type="submit" name="update_layanan" class="btn btn-primary"
			onclick="return confirm('Anda yakin ingin mengupdate data?');">Update</button>
	</div>
</form>

</html>
