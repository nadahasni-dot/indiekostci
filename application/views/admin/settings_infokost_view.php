        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <div class="card col-12">
              <div class="card-body">
              <?= $this->session->flashdata('message') ?>
                <h4 class="card-title">Informasi Kost</h4>
                <p class="card-text">Detail data kost anda</p>                
                <div class="container-fluid pr-3">
                  <img src="<?= base_url('assets'); ?>/img/<?php
                  if ($info_kost['foto_kost'] == NULL) {
                      echo 'profile-img-none.png';
                  } else {
                      echo $info_kost['foto_kost']; 
                  }
                  ?>" alt="<?php echo $info_kost['nama_kost']; ?>" class="img-fluid mx-auto d-block mb-3 rounded">
                  <div class="table-responsive pr-3">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td class="font-weight-bold" width="30%">Pemilik</td>
                          <td><?php echo $user['nama_pengguna']; ?></td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold" width="30%">Nama Kost</td>
                          <td><?php echo $info_kost['nama_kost']; ?></td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold" width="30%">Jenis Kost</td>
                          <td><?php echo $info_kost['jenis_kost']; ?></td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold" width="30%">Alamat Kost</td>
                          <td><?php echo $info_kost['alamat_kost']; ?></td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold" width="30%">Provinsi</td>
                          <td><?php echo $info_kost['provinsi_kost']; ?></td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold" width="30%">Kota</td>
                          <td><?php echo $info_kost['kota_kost']; ?></td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold" width="30%">Telepon</td>
                          <td><?php echo $info_kost['no_kost']; ?></td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold" width="30%">Email</td>
                          <td><?php echo $info_kost['email_kost']; ?></td>
                        </tr>
                        <tr>
                          <td class="font-weight-bold" width="30%">Deskripsi Kost</td>
                          <td><?php echo $info_kost['deskripsi_kost']; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <button class="btn btn-success btn-block edit_data" id="<?php echo $info_kost['id_kost']; ?>">Edit Info Kost</button>
                </div>
              </div>
            </div>
          </div>

          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

            <!-- update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Edit Info Kost</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="detail_edit">
                                 
          </div>
        </div>
      </div>
    </div>