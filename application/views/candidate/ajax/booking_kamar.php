<!doctype html>
<html lang="en">
<?php 
  // cek apakah data diri sudah lengkap
  if(in_array('', $user) || in_array('0000-00-00', $user)){    
?>
<div class="container">
	<div class="row font-weight-bold text-center">Anda Belum Melengkapi Data Diri Anda. Lengkapi Data Diri Anda Terlebih
		Dahulu Untuk Melakukan Pemesanan Kamar</div>
	<div class="row justify-content-center align-items-center">
		<a href="<?= base_url('candidate/settingsprofil'); ?>"
			class="btn btn-primary justify-content-center mb-3 mt-3">Lengkapi Data Diri</a>
	</div>
</div>
<?php
    
  } else {
    
    if($kamar){
?>
<form action="<?= base_url('candidate/createBooking'); ?>" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="id_kamar" value="<?php echo $kamar['id_kamar']; ?>">
	<input type="hidden" name="nominal" value="<?php echo $kamar['harga_bulanan_total']; ?>">
	<div class="form-group">
		<input value="<?php echo $kamar['nomor_kamar']; ?>" type="hidden" class="form-control" id="nomorKamar"
			name="nomorKamar" aria-describedby="Nomor Kamar" placeholder="Masukkan nomor kamar baru" readonly>
	</div>
	<div class="container-fluid">
		<img src="<?= base_url('assets'); ?>/img/<?php
    if ($kamar['foto_kamar'] == NULL) {
        echo 'profile-img-none.png';
    } else {
        echo $kamar['foto_kamar']; 
    }
     ?>" alt="<?php echo $kamar['nomor_kamar'] ?>" class="img-thumbnail mx-auto d-block mb-3 rounded" width="300px">
		<div class="table-respomsive">
			<table class="table">
				<tbody>
					<tr>
						<td class="font-weight-bold" width="30%">Nomor Kamar</td>
						<td><?php echo $kamar['nomor_kamar']; ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold" width="30%">Tipe</td>
						<td><?php echo $kamar['nama_tipe']; ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold" width="30%">Luas Kamar</td>
						<td><?php echo $kamar['luas_kamar']; ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold" width="30%">Letak Lantai</td>
						<td><?php echo $kamar['lantai_kamar']; ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold" width="30%">Kapasitas</td>
						<td><?php echo $kamar['kapasitas_kamar'].' orang';?></td>
					</tr>
					<tr>
						<td class="font-weight-bold" width="30%">Deskripsi Kamar</td>
						<td><?php echo $kamar['deskripsi_kamar']; ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold" width="30%">Harga Bulanan</td>
						<td><?php echo 'Rp '.number_format($kamar['harga_bulanan']); ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold" width="30%">Layanan Tambahan</td>
						<td><?php echo $kamar['nama_layanan'].' ('.'Rp '.number_format($kamar['harga_layanan']).')';?>
						</td>
					</tr>
					<tr>
						<td class="font-weight-bold" width="30%">Total Harga Bulanan</td>
						<td><?php echo 'Rp '.number_format($kamar['harga_bulanan_total']); ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold" width="30%">Denda (Jika Melewati Tenggat Pembayaran)</td>
						<td><?php echo 'Rp '.number_format($kamar['denda']); ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold" width="30%">Total Yang Harus Dibayar</td>
						<td class="font-weight-bold text-success">
							<?php echo 'Rp '.number_format($kamar['harga_bulanan_total']); ?></td>
					</tr>
					<tr>
						<td width="0%"></td>
						<td class="font-weight-bold" width="100%">Lakukan Pembayaran Booking Kamar ke no. Rekening
							123456789 (BCA) A.N. Nada Hasni Muhammad. Upload Struk (Bukti Bayar) dibawah ini</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<?php
        }
    ?>
	<div class="form-group">
		<label class="ml-4 font-weight-bold text-danger" for="profil">Upload Bukti Pembayaran (Lakukan Pembayaran
			Terlebih Dahulu Untuk Memesan Kamar)</label>
		<input value="<?php echo $kamar['foto_kamar']; ?>" type="file" class="form-control-file ml-4" id="profil"
			name="bukti_booking" aria-describedby="profil" accept="image/*" required>
	</div>

	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
		<button type="submit" name="submitBooking" class="btn btn-primary"
			onclick="return confirm('Anda yakin ingin mengupdate data?');">Booking Kamar</button>
	</div>
</form>
<?php
  }
?>
</html>
