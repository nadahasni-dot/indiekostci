<!doctype html>
<html lang="en">

<div class="container-fluid">
	<a href="<?php
    echo base_url('assets/img/');

    if ($pengeluaran['bukti_pengeluaran'] == NULL) {
        echo 'profile-img-none.png';
    } else {
        echo $pengeluaran['bukti_pengeluaran']; 
    }
     ?>" data-lightbox="<?php echo $pengeluaran['id_pengeluaran']; ?>" data-tittle="<?php
     if ($pengeluaran['bukti_pengeluaran'] == NULL) {
         echo 'profile-img-none.png';
     } else {
         echo $pengeluaran['bukti_pengeluaran']; 
     }
      ?>">
		<img src="<?php 
    echo base_url('assets/img/');
    
    if ($pengeluaran['bukti_pengeluaran'] == NULL) {
        echo 'profile-img-none.png';
    } else {
        echo $pengeluaran['bukti_pengeluaran']; 
    }
     ?>" alt="<?php echo $pengeluaran['nama_pengeluaran']; ?>" class="img-thumbnail mx-auto d-block mb-3 rounded"
			width="300px"> </a>
	<div class="table-responsive">
		<table class="table">
			<tbody>
				<tr>
					<td class="font-weight-bold" width="30%">Kategori</td>
					<td><?php echo $pengeluaran['kategori_pengeluaran']; ?></td>
				</tr>
				<tr>
					<td class="font-weight-bold" width="30%">Nama Pengeluaran</td>
					<td><?php echo $pengeluaran['nama_pengeluaran']; ?></td>
				</tr>
				<tr>
					<td class="font-weight-bold" width="30%">Tanggal Pembayaran</td>
					<td><?php echo $pengeluaran['tanggal_pengeluaran']; ?></td>
				</tr>
				<tr>
					<td class="font-weight-bold" width="30%">Nominal</td>
					<td><?php echo 'Rp. '.number_format($pengeluaran['nilai_pengeluaran']); ?></td>
				</tr>
				<tr>
					<td class="font-weight-bold" width="30%">Keterangan</td>
					<td><?php echo $pengeluaran['keterangan']; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

</html>
