<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Layanan</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<!-- judul tabel -->
			<span class="m-0 font-weight-bold text-primary">Master Data Layanan</span>

			<!-- button tambah -->
			<button class="btn btn-sm btn-primary btn-icon-split float-right" data-toggle="modal"
				data-target="#tambah-layanan">
				<span class="icon text-white-50">
					<i class="fas fa-plus"></i>
				</span>
				<span class="text">Tambah Layanan</span>
			</button>
		</div>
		<div class="card-body">
        <?= $this->session->flashdata('message'); ?>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th class="d-none">ID Layanan</th>
							<th>Nama Layanan</th>
							<th>Harga Bulanan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No</th>
							<th class="d-none">ID Layanan</th>
							<th>Nama Layanan</th>
							<th>Harga Bulanan</th>
							<th>Aksi</th>
						</tr>
					</tfoot>
					<tbody>
						<?php           
                $no = 1;
                foreach ($data_layanan as $row) {
            ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td class="d-none"><?php echo $row['id_layanan']; ?></td>
							<td><?php echo $row['nama_layanan']; ?></td>
							<td><?php echo 'Rp. '.number_format($row['harga_bulanan']); ?></td>
							<td>
								<button class="btn btn-success btn-circle btn-sm view_data"
									id="<?php echo $row['id_layanan']; ?>" data-toggle="tooltip" data-placement="top"
									title="Edit Layanan Ini">
									<i class="fas fa-pen"></i>
								</button>
								<a href="<?php echo base_url('delete/layananbyid/').$row['id_layanan']; ?>"
									class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top"
									title="Hapus Layanan Ini"
									onclick="return confirm('Anda yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan!');">
									<i class="fas fa-trash"></i>
								</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->


<!-- Modal tambah -->
<div class="modal fade" id="tambah-layanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Tambah Layanan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>


			<div class="modal-body">
				<form action="<?= base_url('admin/createDataLayanan'); ?>" method="POST">
					<!-- form dalam modal -->

					<div class="form-group">
						<label for="inputLayanan">Nama Layanan</label>
						<input name="inputLayanan" type="text" class="form-control" id="inputLayanan"
							aria-describedby="emailHelp" placeholder="Masukkan nama layanan baru" required>
					</div>
					<div class="form-group">
						<label for="inputHarga">Harga Bulanan</label>
						<input name="inputHarga" type="text" class="form-control" id="inputHarga"
							placeholder="Masukkan nilai harga layanan anda" required>
					</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" name="submitJenisLayanan" class="btn btn-primary">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>

<!-- update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Edit Data Layanan
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="detail_layanan">

			</div>
		</div>
	</div>
</div>
