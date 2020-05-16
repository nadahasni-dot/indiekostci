<!doctype html>
<html lang="en">

<form action="<?= base_url('update/updatepembayaran'); ?>" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $pembayaran['id_pembayaran']; ?>">
	<input type="hidden" name="bukti_lama" value="<?php echo $pembayaran['bukti_pembayaran']; ?>">
	<div class="form-group">
		<label for="menghuni">Data Menghuni</label>
		<select name="menghuni" class="form-control" id="menghuni" required>
			<option selected disabled value="">Pilih Data Menghuni</option>

			<?php 
        foreach ($menghuni as $row) {
          if($row['id_menghuni'] == $pembayaran['id_menghuni']) {                  
      ?>
			<option selected value="<?php echo $row['id_menghuni']; ?>">
				<?php echo 'Kamar no. '.$row['nomor_kamar'].' ['.$row['nama_pengguna'].']'; ?></option>
			<?php } else { ?>

			<option value="<?php echo $row['id_menghuni']; ?>">
				<?php echo 'Kamar no. '.$row['nomor_kamar'].' ['.$row['nama_pengguna'].']'; ?></option>

			<?php    
          }                   
        }
      ?>
		</select>
	</div>
	<div class="form-group">
		<label for="tanggal">Tanggal Pembayaran</label>
		<input value="<?php echo $pembayaran['tanggal_pembayaran']; ?>" type="date" class="form-control" id="tanggal"
			name="tanggal" aria-describedby="tanggal" placeholder="Masukkan tanggal pengeluaran" required>
	</div>
	<div class="form-group">
		<label for="nominal">Nominal Pembayaran</label>
		<input value="<?php echo $pembayaran['nilai_pembayaran']; ?>" type="number" class="form-control" id="nominal"
			name="nominal" aria-describedby="nominal" placeholder="Masukkan nominal pembayaran" required>
	</div>
	<div class="form-group">
		<label for="keterangan">Keterangan</label>
		<textarea type="text" class="form-control" id="keterangan" name="keterangan" aria-describedby="keterangan" rows="3"
			placeholder="Masukkan keterangan pengeluaran" required><?php echo $pembayaran['keterangan']; ?></textarea>
	</div>
	<div class="form-group">
		<label for="status">Status Konfirmasi Pembayaran</label>
		<select name="status" class="form-control" id="status" required>
			<option selected disabled value="">Pilih Status Konfirmasi</option>

			<?php 
        foreach ($jenis_status as $row) { 
          if($row['id_status'] == $pembayaran['id_status']){                     
      ?>

			<option selected value="<?php echo $row['id_status']; ?>">
				<?php echo strtoupper($row['nama_status_pembayaran']); ?></option>

			<?php } else {?>

			<option value="<?php echo $row['id_status']; ?>">
				<?php echo strtoupper($row['nama_status_pembayaran']); ?></option>

			<?php                       
        }
      }
      ?>
		</select>
	</div>
	<div class="form-group">
		<label for="bukti_baru">Bukti Pembayaran</label>
		<input value="" type="file" class="form-control-file" id="bukti_baru" name="bukti_baru"
			aria-describedby="bukti_baru" accept="image/*">
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
		<button type="submit" name="update_pembayaran" class="btn btn-primary"
			onclick="return confirm('Anda yakin ingin mengupdate data?');">Update</button>
	</div>
</form>

</html>
