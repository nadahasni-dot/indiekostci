 <!-- Begin Page Content -->
 <div class="container-fluid">

 	<!-- Page Heading -->
 	<div class="d-sm-flex align-items-center justify-content-between mb-4">
 		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
 	</div>

 	<div class="row">
 		<div class="card col-12 mb-3">
 			<div class="card-body">
 				<h4 class="card-title">Profil</h4>
 				<p class="card-text">Detail data diri anda</p>
 				<div class="container-fluid pr-3">
 					<img src="<?= base_url('assets/'); ?>/img/<?php
        if ($user['foto_pengguna'] == NULL) {
            echo 'none.png';
        } else {
            echo $user['foto_pengguna']; 
        }
        ?>" alt="<?php echo $user['nama_pengguna']; ?>" class="img-thumbnail mx-auto d-block mb-3 rounded"
 						width="300px">
 					<div class="table-responsive pr-3">
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
 				</div>
 			</div>
 		</div>
 	</div>
 	<!-- /.container-fluid -->

 	<!-- End of Main Content -->
