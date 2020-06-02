<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->

	<div class="d-sm-flex align-items-center justify-content-between mb-3">
		<span class="h3 mb-0 text-gray-800">Booking Kamar</span>

		<!-- button tambah -->

		<button class="btn btn-sm btn-primary btn-icon-split float-right d-none" data-toggle="modal"
			data-target="#tambah-kamar">
			<span class="icon text-white-50">
				<i class="fas fa-plus"></i>
			</span>
			<span class="text">Tambah Kamar</span>
		</button>
	</div>


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Daftar Booking Kamar</h6>
		</div>
		<div class="card-body">
    <?= $this->session->flashdata('message') ?>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
							<th class="d-none">ID booking</th>
							<th>Kamar</th>
							<th>Pemesan</th>
							<th>Tanggal Booking</th>
							<th>Pembayaran</th>
							<th>Status Booking</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No.</th>
							<th class="d-none">ID booking</th>
							<th>Kamar</th>
							<th>Pemesan</th>
							<th>Tanggal Booking</th>
							<th>Pembayaran</th>
							<th>Status Booking</th>
							<th>Aksi</th>
						</tr>
					</tfoot>
					<tbody>
          <?php 
          $no = 1;

          foreach ($booking as $row) {
          ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td class="d-none"><?php echo $row['id_booking']; ?></td>
							<td><?php echo 'Kamar. '.$row['nomor_kamar']; ?></td>
							<td><?php echo $row['nama_pengguna']; ?></td>
							<td><?php echo $row['tanggal_booking']; ?></td>
							<td><?php echo 'Rp. '.number_format($row['nilai_booking']); ?></td>
							<td><?php echo strtoupper($row['status_booking']); ?></td>
							<td>
								<!-- view btn -->
								<button name="view" type="button" value="view" id="<?php echo $row['id_booking']; ?>"
									class="btn btn-primary btn-circle btn-sm view_data m-1" title="Lihat Detail">
									<i class="fas fa-eye"></i>
								</button>
								<!-- edit btn -->
								<button type="button" class="btn btn-success btn-circle btn-sm m-1 edit_data" title="Edit Data Kamar"
									name="edit" value="edit" id="edit">
									<i class="fas fa-pen"></i>
								</button>
								<!-- delete btn -->
								<a href="<?= base_url('delete/deletebooking/').$row['id_booking']; ?>"
									class="btn btn-danger btn-circle btn-sm m-1" title="Hapus Data Kamar"
									onclick="return confirm('Anda yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan!');">
									<i class="fas fa-trash"></i>
								</a>
							</td>
						</tr>
						<?php             
          } 
          ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->

<!-- view modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Rincian Data Booking
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

    <!-- update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Edit Data Booking</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="detail_edit">

          </div>
        </div>
      </div>
    </div>