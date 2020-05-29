<!-- Begin Page Content -->
<div class="container-fluid">
	
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-3">
		<div class="card col-12">
			<div class="card-body">
				<h4 class="card-title">Profil</h4>
				<p class="card-text">Detail data diri anda</p>
				<?= $this->session->flashdata('message') ?>
				<div class="container-fluid">
					<img src="<?= base_url('assets') ?>/img/<?php
        if ($user['foto_pengguna'] == NULL) {
            echo 'none.png';
        } else {
            echo $user['foto_pengguna']; 
        }
        ?>" alt="<?php echo $user['nama_pengguna']; ?>" class="img-thumbnail mx-auto d-block mb-3 rounded"
						width="300px">
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td class="font-weight-bold" width="30%">NIK</td>
									<td><?php 
                if($user['no_ktp_pengguna'] == NULL){
                  echo '<span class="font-italic">Belum Dilengkapi</span>';
                }else{
                  echo $user['no_ktp_pengguna'];
                } ?>
									</td>
								</tr>
								<tr>
									<td class="font-weight-bold" width="30%">Nama</td>
									<td><?php echo $user['nama_pengguna']; ?></td>
								</tr>
								<tr>
									<td class="font-weight-bold" width="30%">Tanggal Lahir</td>
									<td><?php 
                if($user['tanggal_lahir_pengguna'] == '0000-00-00'){
                  echo '<span class="font-italic">Belum Dilengkapi</span>';
                }else{
                  echo $user['tanggal_lahir_pengguna'];
                } ?></td>
								</tr>
								<tr>
									<td class="font-weight-bold" width="30%">Jenis Kelamin</td>
									<td><?php 
                if($user['kelamin_pengguna'] == NULL){
                  echo '<span class="font-italic">Belum Dilengkapi</span>';
                }else{
                  echo $user['kelamin_pengguna'];
                } ?></td>
								</tr>
								<tr>
									<td class="font-weight-bold" width="30%">Alamat</td>
									<td><?php 
                if($user['alamat_pengguna'] == NULL){
                  echo '<span class="font-italic">Belum Dilengkapi</span>';
                }else{
                  echo $user['alamat_pengguna'];
                } ?></td>
								</tr>
								<tr>
									<td class="font-weight-bold" width="30%">Provinsi</td>
									<td><?php 
                if($user['provinsi_pengguna'] == NULL){
                  echo '<span class="font-italic">Belum Dilengkapi</span>';
                }else{
                  echo $user['provinsi_pengguna'];
                } ?></td>
								</tr>
								<tr>
									<td class="font-weight-bold" width="30%">Kota</td>
									<td><?php 
                                        if($user['kota_pengguna'] == NULL){
                                        echo '<span class="font-italic">Belum Dilengkapi</span>';
                                        }else{
                                        echo $user['kota_pengguna'];
                                        } ?></td>
								</tr>
								<tr>
									<td class="font-weight-bold" width="30%">Telepon</td>
									<td><?php echo $user['telepon_pengguna']; ?></td>
								</tr>
								<tr>
									<td class="font-weight-bold" width="30%">Email</td>
									<td><?php echo $user['email_pengguna']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<button class="btn btn-success btn-block edit_data" id="<?php echo $user['id_pengguna']; ?>">Edit
						Profil</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

<!-- update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Edit Data Pengguna
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="detail_edit">
			</div>
		</div>
	</div>
</div>
