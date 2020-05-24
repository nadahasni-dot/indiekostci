<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->

	<div class="d-sm-flex align-items-center justify-content-between mb-3">
		<span class="h3 mb-0 text-gray-800">Data Menghuni</span>

		<!-- button tambah -->

		<button class="btn btn-sm btn-primary btn-icon-split float-right" data-toggle="modal" data-target="#tambah-kamar">
			<span class="icon text-white-50">
				<i class="fas fa-plus"></i>
			</span>
			<span class="text">Menghuni</span>
		</button>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Daftar Menghuni</h6>
		</div>
		<div class="card-body">
    <?= $this->session->flashdata('message') ?>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No. Kamar</th>
							<th class="d-none">id menghuni</th>
							<th class="d-none">id kamar</th>
							<th>Penghuni</th>
							<th>Tanggal Masuk</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No. Kamar</th>
							<th class="d-none">id menghuni</th>
							<th>Penghuni</th>
							<th>Tanggal Masuk</th>
							<th>Aksi</th>
						</tr>
					</tfoot>
					<tbody>
						<?php 
            foreach ($menghuni as $row) :
          ?>
						<tr>
							<td><?php echo $row['nomor_kamar']; ?></td>
							<td class="d-none"><?php echo $row['id_menghuni']; ?></td>
							<td><?php echo $row['nama_pengguna']; ?></td>
							<td><?php echo $row['tanggal_masuk']; ?></td>

							<td>
								<!-- view btn -->
								<button name="view" type="button" value="view" id="<?php echo $row['id_menghuni']; ?>"
									class="btn btn-primary btn-circle btn-sm view_data m-1" title="Lihat Detail">
									<i class="fas fa-eye"></i>
								</button>
								<!-- edit btn -->
								<button type="button" class="btn btn-success btn-circle btn-sm m-1 edit_data" title="Edit Data Kamar"
									name="edit" value="edit" id="edit">
									<i class="fas fa-pen"></i>
								</button>
								<!-- delete btn -->
								<a href="<?= base_url('delete/deletemenghuni/'); ?><?= $row['id_menghuni']; ?>/<?= $row['id_pengguna']; ?>"
									class="btn btn-danger btn-circle btn-sm m-1" title="Hapus Data Kamar"
									onclick="return confirm('Anda yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan!');">
									<i class="fas fa-trash"></i>
								</a>
							</td>
							<td class="d-none"></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>



	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- view modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Rincian Penghuni
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="detail_menghuni">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-primary font-weight-bold" id="editJudul">Edit Data Menghuni</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="detail_edit">

			</div>
		</div>
	</div>
</div>

<!-- Modal tambah -->
<div class="modal fade" id="tambah-kamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Tambah Data Menghuni</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/createMenghuni'); ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="kamar">Pilih Kamar</label>
						<select name="kamar" class="form-control" id="kamar" required>
							<option selected disabled value="">Pilih Kamar</option>

							<?php               
                foreach ($kamar_tersedia as $row) {
                  if($row['penghuni'] == 'Belum dihuni'){
              ?>
							<option value="<?php echo $row['id_kamar'] ?>">
								<?php echo 'Kamar. '.$row['nomor_kamar'].' ('.$row['penghuni'].')'; ?>
							</option>
							<?php   
                  }                         
                }
              ?>
						</select>
					</div>
					<div class="form-group">
						<label for="penghuni">Pilih Penghuni yang akan didaftarkan</label>
						<select name="penghuni" class="form-control" id="penghuni" required>
							<option selected disabled value="">Pilih Penghuni</option>

							<?php 
                foreach ($belum_menghuni as $row) {
              ?>
							<option value="<?php echo $row['id_pengguna'] ?>">
								<?php echo $row['nama_pengguna'].' (Belum Menghuni)'; ?>
							</option>
							<?php                                                 
                }
              ?>
						</select>
					</div>
					<div class="form-group">
						<label for="tanggal">Tanggal Masuk</label>
						<input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggal"
							placeholder="Masukkan Tanggal Masuk" required>
					</div>
					<div class="form-group">
						<label for="nominalBayar">Nominal Pembayaran</label>
						<input value="" type="number" class="form-control" id="nominalBayar" name="nominal"
							aria-describedby="nominalBayar" placeholder="Masukkan nilai pembayaran" required>
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan Pembayaran</label>
						<textarea value="" type="text" class="form-control" id="keterangan" name="keterangan"
							aria-describedby="keterangan" placeholder="Masukkan Keterangan pembayaran" rows="3" required></textarea>
					</div>
					<div class="form-group">
						<label for="profil">Upload Bukti Pembayaran</label>
						<input value="" type="file" class="form-control-file" id="profil" name="bukti_bayar"
							aria-describedby="profil" accept="image/*" required>
					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
						<button type="submit" name="submitMenghuni" class="btn btn-primary"
							onclick="return confirm('Anda yakin ingin mendaftarkan penghuni?');">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>