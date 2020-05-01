<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Penghuni</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Daftar Penghuni</h6>
		</div>
		<div class="card-body">
    <?= $this->session->flashdata('message') ?>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th class="d-none">ID Penghuni</th>
							<th>Nama</th>
							<th>Kamar</th>
							<th>Tanggal Masuk</th>
							<th>Telepon</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No</th>
							<th class="d-none">ID Penghuni</th>
							<th>Nama</th>
							<th>Kamar</th>
							<th>Tanggal Masuk</th>
							<th>Telepon</th>
							<th>Aksi</th>
						</tr>
					</tfoot>
					<tbody>
						<?php 
        //   $query = "SELECT pengguna.id_pengguna, pengguna.nama_pengguna, menghuni.id_kamar, menghuni.tanggal_masuk, pengguna.telepon_pengguna, kamar.nomor_kamar
        //   FROM pengguna
        //     INNER JOIN menghuni ON pengguna.id_pengguna = menghuni.id_pengguna 
        //     INNER JOIN kamar ON kamar.id_kamar = menghuni.id_kamar
        //     ORDER BY kamar.nomor_kamar ASC";
        //   $hasil = mysqli_query($conn, $query);
        //   $no = 1;

        //   while ($data_penghuni = mysqli_fetch_array($hasil)) {
            $no = 1;
            foreach($penghuni as $row):
          ?>
						<tr>
							<td><?= $no++; ?></td>
							<td class="d-none"><?= $row['id_pengguna']; ?></td>
							<td><?= $row['nama_pengguna']; ?></td>
							<td><?= $row['nomor_kamar']; ?></td>
							<td><?= $row['tanggal_masuk']; ?></td>
							<td><?= $row['telepon_pengguna']; ?></td>
							<td>
								<!-- view btn -->
								<button name="view" type="button" value="view" id="<?= $row['id_pengguna']; ?>"
									class="btn btn-primary btn-circle btn-sm view_data m-1" title="Lihat Detail">
									<i class="fas fa-eye"></i>
								</button>
								<!-- edit btn -->
								<button type="button" class="btn btn-success btn-circle btn-sm m-1 edit_data" title="Edit Data Pengguna"
									name="edit" value="edit" id="edit">
									<i class="fas fa-pen"></i>
								</button>
								<!-- delete btn -->
								<a href="<?= base_url('delete/penghunibyid/').$row['id_pengguna']; ?>"
									class="btn btn-danger btn-circle btn-sm m-1"
									onclick="return confirm('Anda yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan!');">
									<i class="fas fa-trash"></i>
								</a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->

<!-- view modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Rincian Data Penghuni
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="detail_pengguna">


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
				<h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Edit Data Penghuni</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="detail_edit">

			</div>
		</div>
	</div>
</div>
