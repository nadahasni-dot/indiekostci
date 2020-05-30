<!doctype html>
<html lang="en">

<div class="container-fluid">
	<a href="<?php
    echo base_url('assets/img/');
    if ($pembayaran['bukti_pembayaran'] == NULL) {
        echo 'profile-img-none.png';
    } else {
        echo $pembayaran['bukti_pembayaran']; 
    }
     ?>" data-lightbox="<?php echo $pembayaran['id_pembayaran']; ?>" data-tittle="<?php
     if ($pembayaran['bukti_pembayaran'] == NULL) {
         echo 'profile-img-none.png';
     } else {
         echo $pembayaran['bukti_pembayaran']; 
     }
      ?>">
		<img src="<?php
        echo base_url('assets/img/');
    if ($pembayaran['bukti_pembayaran'] == NULL) {
        echo 'profile-img-none.png';
    } else {
        echo $pembayaran['bukti_pembayaran']; 
    }
     ?>" alt="<?php echo $pembayaran['tanggal_pembayaran']; ?>" class="img-thumbnail mx-auto d-block mb-3 rounded"
			width="300px"> </a>
	<div class="table-responsive">
		<table class="table">
			<tbody>
				<tr>
					<td class="font-weight-bold" width="30%">No. Kamar</td>
					<td><?php echo 'Kamar no.'.$pembayaran['nomor_kamar']; ?></td>
				</tr>
				<tr>
					<td class="font-weight-bold" width="30%">Penghuni</td>
					<td><?php echo $pembayaran['nama_pengguna']; ?></td>
				</tr>
				<tr>
					<td class="font-weight-bold" width="30%">Tanggal Pembayaran</td>
					<td><?php echo $pembayaran['tanggal_pembayaran']; ?></td>
				</tr>
				<tr>
					<td class="font-weight-bold" width="30%">Nominal</td>
					<td><?php echo 'Rp. '.number_format($pembayaran['nilai_pembayaran']); ?></td>
				</tr>
				<tr>
					<td class="font-weight-bold" width="30%">Keterangan</td>
					<td><?php echo $pembayaran['keterangan']; ?></td>
				</tr>
				<tr>
					<td class="font-weight-bold" width="30%">Status Konfirmasi Pembayaran</td>
					<td><?php echo strtoupper($pembayaran['nama_status_pembayaran']); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

</html>
