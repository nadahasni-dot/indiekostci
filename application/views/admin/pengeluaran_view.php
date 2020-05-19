<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <span class="h3 mb-0 text-gray-800">Pengeluaran</span>

  <!-- button tambah -->
  <button class="btn btn-sm btn-primary btn-icon-split float-right" data-toggle="modal"
    data-target="#tambah-pengeluaran">
    <span class="icon text-white-50">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Pengeluaran</span>
  </button>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran</h6>
  </div>
  <div class="card-body">
  <?= $this->session->flashdata('message') ?>
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
        //   $query = "SELECT pengeluaran.id_pengeluaran, jenis_pengeluaran.kategori_pengeluaran, jenis_pengeluaran.nama_pengeluaran, pengeluaran.tanggal_pengeluaran, pengeluaran.nilai_pengeluaran, pengeluaran.keterangan
        //   FROM pengeluaran, jenis_pengeluaran
        //     WHERE
        //       pengeluaran.id_jenis_pengeluaran = jenis_pengeluaran.id_jenis_pengeluaran 
        //       ORDER BY pengeluaran.tanggal_pengeluaran DESC";

        //   $hasil = mysqli_query($conn, $query);
        //   $no = 1;

        //   while ($dataPengeluaran = mysqli_fetch_array($hasil)) {
            $no = 1;
            foreach($pengeluaran as $row):
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td class="d-none"><?php echo $row['id_pengeluaran']; ?></td>
            <td><?php echo $row['kategori_pengeluaran']; ?></td>
            <td><?php echo $row['nama_pengeluaran']; ?></td>
            <td><?php echo $row['tanggal_pengeluaran']; ?></td>
            <td><?php echo 'Rp. '.number_format($row['nilai_pengeluaran']); ?></td>
            <td><?php echo $row['keterangan']; ?></td>
            <td>
              <!-- view btn -->
              <button name="view" type="button" value="view"
                id="<?php echo $row['id_pengeluaran']; ?>"
                class="btn btn-primary btn-circle btn-sm view_data m-1" title="Lihat Detail">
                <i class="fas fa-eye"></i>
              </button>
              <!-- edit btn -->
              <button type="button" class="btn btn-success btn-circle btn-sm m-1 edit_data"
                title="Edit Data Kamar" name="edit" value="edit" id="edit">
                <i class="fas fa-pen"></i>
              </button>
              <!-- delete btn -->
              <a href="<?= base_url('delete/delpengeluaran/').$row['id_pengeluaran']; ?>"
                class="btn btn-danger btn-circle btn-sm m-1" title="Hapus Data Kamar"
                onclick="return confirm('Anda yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan!');">
                <i class="fas fa-trash"></i>
              </a>
            </td>
          </tr>
          <?php             
            endforeach;
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


</div>
<!-- End of Main Content -->

    <!-- view modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Rincian Pengeluaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="detail_pengeluaran">

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
            <h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Edit Data Pengeluaran
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

    <!-- Modal tambah -->
    <div class="modal fade" id="tambah-pengeluaran" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Tambah Pengeluaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('admin/createPengeluaran'); ?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="jenis">Jenis Pengeluaran</label>
                <select name="jenis" class="form-control" id="jenis" required>
                  <option selected disabled value="">Pilih Jenis Pengeluaran</option>

                  <?php                  
                    foreach($jenis_pengeluaran as $row):
                  ?>

                  <option value="<?php echo $row['id_jenis_pengeluaran']; ?>">
                    <?php echo $row['nama_pengeluaran'].' ['.$row['kategori_pengeluaran'].']'; ?></option>

                  <?php                       
                    endforeach;
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="tanggal">Tanggal Pembayaran</label>
                <input value="" type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggal"
                  placeholder="Masukkan tanggal pengeluaran" required>
              </div>
              <div class="form-group">
                <label for="nominal">Nominal Pembayaran</label>
                <input value="" type="number" class="form-control" id="nominal" name="nominal"
                  aria-describedby="nominal" placeholder="Masukkan nominal pembayaran" required>
              </div>
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea value="" type="text" class="form-control" id="keterangan" name="keterangan"
                  aria-describedby="keterangan" rows="3" placeholder="Masukkan keterangan pengeluaran"
                  required></textarea>
              </div>
              <div class="form-group">
                <label for="profil">Bukti Pembayaran</label>
                <input value="" type="file" class="form-control-file" id="profil" name="bukti_pembayaran"
                  aria-describedby="profil" accept="image/*" required>
              </div>
              <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                <button type="submit" name="submitPengeluaran" class="btn btn-primary"
                  onclick="return confirm('Anda yakin ingin menambah data?');">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>