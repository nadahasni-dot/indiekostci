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
          $query = "SELECT * FROM `jenis_pengeluaran`";
          $hasil = mysqli_query($conn, $query);
          $no = 1;

          while ($data_jenis_pengeluaran = mysqli_fetch_array($hasil)) {

          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td class="d-none"><?php echo $data_jenis_pengeluaran['id_jenis_pengeluaran']; ?></td>
            <td><?php echo $data_jenis_pengeluaran['kode_pengeluaran']; ?></td>
            <td><?php echo $data_jenis_pengeluaran['kategori_pengeluaran']; ?></td>
            <td><?php echo $data_jenis_pengeluaran['nama_pengeluaran']; ?></td>
            <td>
              <button id="<?php echo $data_jenis_pengeluaran['id_jenis_pengeluaran']; ?>" class="btn btn-success btn-circle btn-sm view_data" data-toggle="tooltip" data-placement="top" title="Edit Record">
                <i class="fas fa-pen"></i>
              </button>
              <a href="../../actions/process-delete.php?id_hapus_jenis_pengeluaran=<?php echo $data_jenis_pengeluaran['id_jenis_pengeluaran']; ?>" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus Layanan Ini" onclick="return confirm('Anda yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan!');">
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