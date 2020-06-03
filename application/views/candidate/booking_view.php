	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-3">
        <span class="h3 mb-0 text-gray-800">Booking Kamar</span>        
	</div>

	<!-- untuk cek apakah sudah booking -->
	<?php 
        if($booking) {            
    ?>

	<div class="row mb-3">
		<div class="card col-12">
			<div class="card-body">
				<h4 class="card-title">Pembayaran Booking</h4>
                <p class="card-text">Detail data booking kamar anda</p>
                <?= $this->session->flashdata('message'); ?>
				<div class="container-fluid pr-3">
					<img src="<?= base_url('assets'); ?>/img/<?php
        if ($pembayaran_booking['foto_kamar'] == NULL) {
            echo 'none.png';
        } else {
            echo $pembayaran_booking['foto_kamar']; 
        }
        ?>" alt="<?php echo $pembayaran_booking['nomor_kamar']; ?>" class="img-thumbnail mx-auto d-block mb-3 rounded" width="300px">
					<div class="table-responsive pr-3">
						<table class="table">
							<tbody>
								<tr>
									<td class="font-weight-bold" width="30%">Kamar Yang Dipesan</td>
									<td><?php echo 'Kamar no. '.$pembayaran_booking['nomor_kamar'];
                ?>
									</td>
								</tr>
								<tr>
									<td class="font-weight-bold" width="30%">Pemesan</td>
									<td><?php echo $pembayaran_booking['nama_pengguna']; ?></td>
								</tr>
								<tr>
									<td class="font-weight-bold" width="30%">Tanggal Booking</td>
									<td><?php echo $pembayaran_booking['tanggal_booking']; ?></td>
								</tr>
								<tr>
									<td class="font-weight-bold" width="30%">Total Pembayaran</td>
									<td><?php echo 'Rp. '.number_format($pembayaran_booking['total_bayar']); ?></td>
								</tr>
								<?php if($pembayaran_booking['status_booking'] == 'belum dikonfirmasi'){ ?>
								<tr>
									<td class="font-weight-bold" width="30%">Status Konfirmasi</td>
									<td><?php echo strtoupper($pembayaran_booking['status_booking']); ?></td>
								</tr>
								<tr>
									<td class="font-weight-bold" width="30%">Informasi</td>
									<td class="font-weight-bold text-success">Setelah Pembayaran dikonfirmasi, anda
										resmi
										terdaftar sebagai penghuni. "Bukti Pembayaran" dan "Status Konfirmasi" akan
										dikirim
										melalui e-mail anda (Pastikan email anda valid).</td>
								</tr>
								<?php } else {?>
								<tr>
									<td class="font-weight-bold" width="30%">Status Konfirmasi</td>
									<td>SUDAH DIKONFIRMASI</td>
								</tr>
								<tr>
									<td class="font-weight-bold" width="30%">Informasi</td>
									<td class="font-weight-bold text-success">Pembayaran Telah Dikonfirmasi. Harap
										Logout dan Sign In kembali untuk melanjutkan. <br><br><button type="button"
											class="btn btn-primary btn-block" data-target="#logoutModal"
											data-toggle="modal">Log Out</button></td>
								</tr>

								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>				
			</div>
		</div>
	</div>

	<?php } else {?>

	<div class="row">
    <?= $this->session->flashdata('message'); ?>
		<!-- QUERY UNTUK MENAMPILKAN DATA KAMAR -->
    <?php 
        foreach ($kamar_tersedia as $row) {    
    ?>
		<div class="col col-12 col-sm-6 col-lg-3 mb-4 d-flex align-items-stretch">
			<div class="card">

				<div class="no-kamar"><span class="font-weight-bold"><?php echo $row['nomor_kamar']; ?></span>
				</div>

				<?php if($row['foto_kamar'] == NULL){ ?>

				<img src="<?= base_url('assets'); ?>/img/profile-img-none.png" height="200px" class="card-img-top"
					alt="...">

				<?php } else { ?>
				<img src="<?= base_url('assets'); ?>/img/<?php echo $row['foto_kamar']; ?>" height="200px"
					class="card-img-top" alt="...">
				<?php } ?>

				<div class="d-flex flex-column card-body">
					<h6 class="card-title small"><span class="font-weight-bold">Tipe:</span>
						<?php echo strtoupper($row['nama_tipe']); ?></h6>

					<p class="card-text"><span class="font-weight-bold small">Luas:</span>
						<?php echo $row['luas_kamar'];  ?></p>

					<p class="card-text"><span class="font-weight-bold small">Lantai:</span>
						<?php echo $row['lantai_kamar'];  ?></p>

					<p class="card-text"><span class="font-weight-bold small">Deskripsi:</span>
						<?php                     
          if(strlen($row['deskripsi_kamar']) > 50){
            $row['deskripsi_kamar'] = substr($row['deskripsi_kamar'], 0, 47).' ...';
          }
            
          echo $row['deskripsi_kamar'];  
          ?></p>

					<p class="card-text"><span class="font-weight-bold small">Harga Bulanan:</span>
						<?php echo 'Rp. '.number_format($row['total_harga']);  ?></p>

					<div class="btn-group mt-auto" role="group" aria-label="Basic example">
						<button name="view" value="view" id="<?php echo $row['id_kamar']; ?>"
							class="btn btn-outline-primary view_data">Lihat Detail</button>
						<button name="view" value="view" id="<?php echo $row['id_kamar']; ?>"
							class="btn btn-outline-success booking_kamar">Booking</button>
					</div>
				</div>
			</div>
		</div>		
    <?php
        }
    } 
    ?>
	<!-- /.container-fluid -->

	<!-- view modal -->
	<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Rincian Data
						Kamar
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="detail_kamar">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Booking modal -->
	<div class="modal fade" id="bookingKamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Booking Kamar
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="booking_data">

				</div>
			</div>
		</div>
	</div>
