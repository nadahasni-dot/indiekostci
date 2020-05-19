<!doctype html>
<html lang="en">

<form action="<?= base_url('update/updatepengeluaran') ?>" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= $pengeluaran['id_pengeluaran']; ?>">
	<input type="hidden" name="bukti_lama" value="<?= $pengeluaran['bukti_pengeluaran']; ?>">
	<div class="form-group">
		<label for="jenis">Jenis Pengeluaran</label>
		<select name="jenis" class="form-control" id="jenis" required>
			<option selected disabled value="">Pilih Jenis Pengeluaran</option>

			<?php 
        // $query = "SELECT * FROM jenis_pengeluaran";

        // $result = mysqli_query($conn, $query);

        foreach($jenis_pengeluaran as $row){
          if($row['id_jenis_pengeluaran'] == $pengeluaran['id_jenis_pengeluaran']){                  
      ?>

			<option selected value="<?php echo $row['id_jenis_pengeluaran']; ?>">
				<?php echo $row['nama_pengeluaran'].' ['.$row['kategori_pengeluaran'].']'; ?></option>

			<?php } else { ?>

			<option value="<?php echo $row['id_jenis_pengeluaran']; ?>">
				<?php echo $row['nama_pengeluaran'].' ['.$row['kategori_pengeluaran'].']'; ?></option>

			<?php   
          }           
        }
      ?>
		</select>
	</div>
	<div class="form-group">
		<label for="tanggal">Tanggal Pembayaran</label>
		<input value="<?php echo $pengeluaran['tanggal_pengeluaran']; ?>" type="date" class="form-control" id="tanggal"
			name="tanggal" aria-describedby="tanggal" placeholder="Masukkan tanggal pengeluaran" required>
	</div>
	<div class="form-group">
		<label for="nominal">Nominal Pembayaran</label>
		<input value="<?php echo $pengeluaran['nilai_pengeluaran']; ?>" type="number" class="form-control" id="nominal"
			name="nominal" aria-describedby="nominal" placeholder="Masukkan nominal pembayaran" required>
	</div>
	<div class="form-group">
		<label for="keterangan">Keterangan</label>
		<textarea type="text" class="form-control" id="keterangan" name="keterangan" aria-describedby="keterangan" rows="3"
			placeholder="Masukkan keterangan pengeluaran" required><?php echo $pengeluaran['keterangan']; ?></textarea>
	</div>
	<div class="form-group">
		<label for="bukti_baru">Bukti Pembayaran</label>
		<input value="" type="file" class="form-control-file" id="bukti_baru" name="bukti_baru"
			aria-describedby="bukti_baru" accept="image/*">
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
		<button type="submit" name="update_pengeluaran" class="btn btn-primary"
			onclick="return confirm('Anda yakin ingin mengupdate data?');">Update</button>
	</div>
</form>

</html>
