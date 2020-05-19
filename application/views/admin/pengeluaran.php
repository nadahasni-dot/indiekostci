<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Pengeluaran</h1>

  <!-- button tambah -->
  <button class="btn btn-sm btn-primary btn-icon-split float-right" data-toggle="modal"
    data-target="#tambah-pengeluaran">
    <span class="icon text-white-50">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Pengeluaran</span>
  </button>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th class="d-none">id pengeluaran</th>
            <th>Kategori</th>
            <th>Nama Pengeluaran</th>
            <th>Tanggal Pembayaran</th>
            <th>Nominal</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No.</th>
            <th class="d-none">id pengeluaran</th>
            <th>Kategori</th>
            <th>Nama Pengeluaran</th>
            <th>Tanggal Pembayaran</th>
            <th>Nominal</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php 
          $query = "SELECT pengeluaran.id_pengeluaran, jenis_pengeluaran.kategori_pengeluaran, jenis_pengeluaran.nama_pengeluaran, pengeluaran.tanggal_pengeluaran, pengeluaran.nilai_pengeluaran, pengeluaran.keterangan
          FROM pengeluaran, jenis_pengeluaran
            WHERE
              pengeluaran.id_jenis_pengeluaran = jenis_pengeluaran.id_jenis_pengeluaran 
              ORDER BY pengeluaran.tanggal_pengeluaran DESC";

          $hasil = mysqli_query($conn, $query);
          $no = 1;

          foreach($dataPengeluaran as $row) {

          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td class="d-none"><?php echo $row['id_pengeluaran']; ?></td>
            <td><?php echo $row['kategori_pengeluaran']; ?></td>
            <td><?php echo $row['nama_pengeluaran']; ?></td>
            <td><?php echo $row['tanggal_pengeluaran']; ?></td>
            <td><?php echo 'Rp. '.number_format($row['nilai_pengeluaran']); ?></td>
            <td><?php echo $row['keterangan']; ?></td>
            <td>
              <!-- view btn -->
              <button name="view" type="button" value="view"
                id="<?php echo $dataPengeluaran['id_pengeluaran']; ?>"
                class="btn btn-primary btn-circle btn-sm view_data m-1" title="Lihat Detail">
                <i class="fas fa-eye"></i>
              </button>
              <!-- edit btn -->
              <button type="button" class="btn btn-success btn-circle btn-sm m-1 edit_data"
                title="Edit Data Kamar" name="edit" value="edit" id="edit">
                <i class="fas fa-pen"></i>
              </button>
              <!-- delete btn -->
              <a href="../../actions/process-delete.php?id_hapus_pengeluaran=<?php echo $dataPengeluaran['id_pengeluaran']; ?>"
                class="btn btn-danger btn-circle btn-sm m-1" title="Hapus Data Kamar"
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
<!-- End of Main Content -->
