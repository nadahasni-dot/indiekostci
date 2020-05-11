  <!-- Begin Page Content -->
  <div class="container-fluid">

  	<!-- Page Heading -->
  	<h1 class="h3 mb-2 text-gray-800">Jenis Pengeluaran</h1>

  	<!-- DataTales Example -->
  	<div class="card shadow mb-4">
  		<div class="card-header py-3">
  			<span class="m-0 font-weight-bold text-primary">Master Data Jenis Pengeluaran</span>

  			<!-- button tambah -->
  			<button class="btn btn-sm btn-primary btn-icon-split float-right" data-toggle="modal"
  				data-target="#tambahJenisPengeluaran">
  				<span class="icon text-white-50">
  					<i class="fas fa-plus"></i>
  				</span>
  				<span class="text">Tambah Jenis Pengeluaran</span>
  			</button>
  		</div>
  		<div class="card-body">
  			<?= $this->session->flashdata('message'); ?>
  			<div class="table-responsive">
  				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  					<thead>
  						<tr>
  							<th>No</th>
  							<th class="d-none">ID Pengeluaran</th>
  							<th>Kode Pengeluaran</th>
  							<th>Kategori</th>
  							<th>Nama</th>
  							<th>Aksi</th>
  						</tr>
  					</thead>
  					<tfoot>
  						<tr>
  							<th>No</th>
  							<th class="d-none">ID Pengeluaran</th>
  							<th>Kode Pengeluaran</th>
  							<th>Kategori</th>
  							<th>Nama</th>
  							<th>Aksi</th>
  						</tr>
  					</tfoot>
  					<tbody>
  						<?php 
         
          $no = 1;
          foreach ($data_jenis_pengeluaran as $row) {

          ?>
  						<tr>
  							<td><?php echo $no; ?></td>
  							<td class="d-none"><?php echo $row['id_jenis_pengeluaran']; ?></td>
  							<td><?php echo $row['kode_pengeluaran']; ?></td>
  							<td><?php echo $row['kategori_pengeluaran']; ?></td>
  							<td><?php echo $row['nama_pengeluaran']; ?></td>
  							<td>
  								<button id="<?php echo $row['id_jenis_pengeluaran']; ?>"
  									class="btn btn-success btn-circle btn-sm view_data" data-toggle="tooltip"
  									data-placement="top" title="Edit Record">
  									<i class="fas fa-pen"></i>
  								</button>
  								<a href="<?php echo base_url('delete/jenisPengeluaranById/').$row['id_jenis_pengeluaran']; ?>"
  									class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip"
  									data-placement="top" title="Hapus Layanan Ini"
  									onclick="return confirm('Anda yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan!');">
  									<i class="fas fa-trash"></i>
  								</a>
  							</td>
  						</tr>
  						<?php 
            $no++;
          } 
          ?>
  					</tbody>
  				</table>
  			</div>
  		</div>
  	</div>

  </div>
  <!-- /.container-fluid -->
  <!-- End of Main Content -->


  <!-- insert Modal -->
  <div class="modal fade" id="tambahJenisPengeluaran" tabindex="-1" role="dialog"
  	aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Tambah Jenis
  					Pengeluaran</h5>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>


  			<div class="modal-body">

  				<!-- form dalam modal -->

  				<form action="<?= base_url('admin/createdatajenispengeluaran'); ?>" method="POST">
  					<div class="form-group">
  						<label for="inputKode">Kode Pengeluaran</label>
  						<input name="kode_pengeluaran" pe="text" class="form-control" id="inputKode"
  							aria-describedby="emailHelp" placeholder="Masukkan kode untuk jenis pengeluaran baru anda"
  							required>
  					</div>

  					<div class="form-group">
  						<label for="inputKategori">Kategori</label>
  						<select name="kategori" type="text" class="form-control" id="inputKategori"
  							placeholder="Masukkan kategori pengeluaran anda" required>
  							<option value="">Pilih Kategori</option>
  							<option value="Biaya Operasional">Biaya Operasional</option>
  							<option value="Biaya Pemeliharaan">Biaya Pemeliharaan</option>
  							<option value="Biaya Makanan">Biaya Makanan</option>
  							<option value="Biaya Marketing">Biaya Marketing</option>
  							<option value="Biaya Lainnya">Biaya Lainnya</option>
  							<option value="Pajak">Pajak</option>
  						</select>
  					</div>
  					<div class="form-group">
  						<label for="inputNama">Nama Pengeluaran</label>
  						<input name="nama" type="text" class="form-control" id="inputNama"
  							placeholder="Nama jenis pengeluaran" required>
  					</div>

  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  				<button type="submit" name="submitJenisPengeluaran" class="btn btn-primary">Simpan</button>
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
  				<h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Edit Jenis
  					Pengeluaran</h5>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<div class="modal-body" id="detail_jenis_pengeluaran">

  			</div>
  		</div>
  	</div>
  </div>
