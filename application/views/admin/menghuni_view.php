        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <span class="h3 mb-0 text-gray-800">Data Menghuni</span>

            <!-- button tambah -->

            <button class="btn btn-sm btn-primary btn-icon-split float-right d-none" data-toggle="modal"
              data-target="#tambah-kamar">
              <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
              </span>
              <span class="text">Tambah Menghuni</span>
            </button>
          </div>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Data Menghuni</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No. Kamar</th>
                      <th class="d-none">ID menghuni</th>
                      <th>Penghuni</th>
                      <th>Tanggal Masuk</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No. Kamar</th>
                      <th class="d-none">ID menghuni</th>
                      <th>Penghuni</th>
                      <th>Tanggal Masuk</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php 
                     $no=0;
					 foreach ($menghuni->result() as $row) :
						 $no++;
  
                    ?>
                    <tr>
                      <td><?php echo 'Kamar. '.$row->nomor_kamar; ?></td>
                      <td class="d-none"><?php echo $row->id_menghuni; ?></td>
                      <td><?php echo $row->nama_pengguna; ?></td>
                      <td><?php echo $row->tanggal_masuk; ?></td>
                      <td>
                        <!-- view btn  BELOM-->
                        <button name="view" type="button" value="view" id="<?php echo $row->id_menghuni; ?>"
                          class="btn btn-primary btn-circle btn-sm view_data m-1" title="Lihat Detail">
                          <i class="fas fa-eye"></i>
                        </button>
                        <!-- edit btn BELOM -->
                        <a href="#" class="btn btn-success btn-circle btn-sm edit-data m-1"
						data-id_menghuni="<?php echo $row->id_menghuni;?>"
						 data-nama_pengguna="<?php echo $row->nama_pengguna;?>">
						 <i class="fas fa-pen"></i>
					 	</a>
                        <!-- delete btn -->
                    <a onclick="return confirm('Apakah Anda Ingin Menghapus Data Menghuni <?=$row->nama_pengguna;?> ?');" 
					   href="<?php echo site_url('Admin/deleteMenghuni/'.$row->id_menghuni); ?>"
					    class="btn btn-danger btn-circle btn-sm m-1"><i class="fas fa-trash"></i></a>
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



          <!-- /.container-fluid -->

        </div>
		<!-- End of Main Content -->
		
