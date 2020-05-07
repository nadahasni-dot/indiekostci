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
          $query = "SELECT * FROM `layanan`";
          $hasil = mysqli_query($conn, $query);
          $no = 1;

          while ($data_layanan = mysqli_fetch_array($hasil)) {

          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td class="d-none"><?php echo $data_layanan['id_layanan']; ?></td>
            <td><?php echo $data_layanan['nama_layanan']; ?></td>
            <td><?php echo number_format($data_layanan['harga_bulanan']); ?></td>
            <td>
              <button class="btn btn-success btn-circle btn-sm view_data" id="<?php echo $data_layanan['id_layanan']; ?>" data-toggle="tooltip" data-placement="top" title="Edit Layanan Ini">
                <i class="fas fa-pen"></i>
              </button>
              <a href="../../actions/process-delete.php?id_hapus_layanan=<?php echo $data_layanan['id_layanan']; ?>" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus Layanan Ini" onclick="return confirm('Anda yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan!');">
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