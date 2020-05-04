        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <span class="h3 mb-0 text-gray-800">Data Kamar</span>

            <!-- button tambah -->

            <button id="btn_tambah" class="btn btn-sm btn-primary btn-icon-split float-right" data-toggle="modal" data-target="#tambahEdit-kamar">
              <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
              </span>
              <span class="text">Tambah Kamar</span>
            </button>
          </div>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Data Kamar</h6>


            </div>
            <div class="card-body">
            <?= $this->session->flashdata('message') ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No. Kamar</th>
                      <th class="d-none">ID kamar</th>
                      <th>Tipe</th>
                      <th>Luas</th>
                      <th>Lantai</th>
                      <th>Kapasitas</th>
                      <th>Harga Bulanan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No. Kamar</th>
                      <th class="d-none">ID kamar</th>
                      <th>Tipe</th>
                      <th>Luas</th>
                      <th>Lantai</th>
                      <th>Kapasitas</th>
                      <th>Harga Bulanan</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $no = 0;
                    foreach ($dataKamar->result() as $row) :
                      $no++;

                    ?>
                      <tr>
                        <td><?php echo 'Kamar. ' . $row->nomor_kamar; ?></td>
                        <td class="d-none"><?php echo $row->id_kamar; ?></td>
                        <td><?php echo $row->nama_tipe; ?></td>
                        <td><?php echo $row->luas_kamar; ?></td>
                        <td><?php echo $row->lantai_kamar; ?></td>
                        <td><?php echo $row->kapasitas_kamar; ?></td>
                        <td><?php echo 'Rp. ' . number_format($row->harga_bulanan); ?></td>
                        <td>
                          <!-- view btn  BELOM-->
                          <button type="button" id="<?php echo $row->id_kamar; ?>" class="btn btn-primary btn-circle btn-sm view_data m-1" title="Lihat Detail" data-target="#viewDetails" data-toggle="modal">
                            <i class="fas fa-eye"></i>
                          </button>
                          <!-- edit btn BELOM -->
                          <button type="button" id="<?php echo $row->id_kamar; ?>" class="btn btn-success btn-circle btn-sm edit_data m-1" data-target="#tambahEdit-kamar" data-toggle="modal">
                            <i class="fas fa-pen"></i>
                          </button>
                          <!-- delete btn -->
                          <a onclick="return confirm('Apakah Anda Ingin Menghapus Data Kamar <?= $row->nomor_kamar; ?> ?');" href="<?php echo site_url('Admin/deleteKamar/' . $row->id_kamar); ?>" class="btn btn-danger btn-circle btn-sm m-1"><i class="fas fa-trash"></i></a>
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


        <!-- Modal Tambah dan Edit-->

        <div class="modal fade" id="tambahEdit-kamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Tambah Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="<?= site_url('Admin/saveKamar'); ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="idKamar">
                  <input type="hidden" name="fotoKamar">
                  <div class="form-group">
                    <label for="nomorKamar">Nomor Kamar</label>
                    <input value="" type="number" class="form-control" id="nomorKamar" name="nomorKamar" aria-describedby="Nomor Kamar" placeholder="Masukkan nomor kamar baru" required>
                  </div>
                  <div class="form-group">
                    <label for="tipe">Tipe Kamar</label>
                    <select name="tipe" class="form-control" id="tipe" required>
                      <option selected disabled value="">Pilih Layanan</option>

                      <?php
                      $nomor = 0;
                      foreach ($dataTipe as $tipe) :
                        $nomor++;
                      ?>
                        <option value="<?php echo $tipe['id_tipe'] ?>"><?php echo $tipe['nama_tipe']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="luas">Luas Kamar</label>
                    <input value="" type="text" class="form-control" id="luas" name="luas" aria-describedby="luas" placeholder="Masukkan luas kamar baru" required>
                  </div>
                  <div class="form-group">
                    <label for="lantai">Letak Lantai</label>
                    <input value="" type="number" class="form-control" id="lantai" name="lantai" aria-describedby="lantai" placeholder="Masukkan letak lantai baru" required>
                  </div>
                  <div class="form-group">
                    <label for="kapasitas">Kapasitas Hunian</label>
                    <input value="" type="number" class="form-control" id="kapasitas" name="kapasitas" aria-describedby="kapasitas" placeholder="Masukkan kapasitas baru" required>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi Kamar</label>
                    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" aria-describedby="deskripsi" placeholder="Masukkan deskripsi baru" rows="3" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="hargaBulanan">Harga Bulanan</label>
                    <input value="" type="text" class="form-control" id="hargaBulanan" name="hargaBulanan" aria-describedby="hargaBulanan" placeholder="Masukkan harga bulanan baru" required>
                  </div>
                  <div class="form-group">
                    <label for="layanan">Layanan</label>
                    <select name="layanan" class="form-control" id="layanan" required>
                      <option selected disabled value="">Pilih Layanan</option>
                      <?php
                      $nomor = 0;
                      foreach ($dataLayanan as $layanan) :
                        $nomor++;
                      ?>
                        <option value="<?php echo $layanan['id_layanan'] ?>">
                          <?php echo $layanan['nama_layanan'] . ' (Rp ' . number_format($layanan['harga_bulanan']) . ')'; ?>
                        </option>
                      <?php
                      endforeach;
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="denda">Denda</label>
                    <input value="" type="text" class="form-control" id="denda" name="denda" aria-describedby="denda" placeholder="Masukkan denda baru" required>
                  </div>
                  <div class="form-group">
                    <label for="profil">Foto Kamar</label>
                    <input value="" type="file" class="form-control-file" id="profil" name="profil" aria-describedby="profil" accept="image/*">
                  </div>
                  <div class="form-group">
                    <img id="fotolama" style="width:20%; margin-top:10px;" src="" alt="image" />
                  </div>

                  <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                    <button type="submit" id="btnSubmitTambahEdit" class="btn btn-primary">Tambah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>


        <!-- End Modal Tambah -->


        <!-- Modal Details -->
        <div class="modal fade" id="viewDetails" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="viewDetailsLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-primary" id="viewDetailsLabel"><strong>Rincian Data Kamar</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container">
                  <img src="" alt="fotoo" id="ajaxImage" class="img-thumbnail rounded mx-auto d-block mb-3">

                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-lg-3">Nomor Kamar</div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8" id="ajaxNoKamar"></div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-lg-3">Type</div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8" id="ajaxType"></div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-lg-3">Luas Kamar</div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8" id="ajaxLuasKamar"></div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-lg-3">Lantai Kamar</div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8" id="ajaxLantaiKamar"> lantai</div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-lg-3">Kapasitas</div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8" id="ajaxKapasitas"> orang</div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-lg-3">Deskripsi Kamar</div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8" id="ajaxDeskripsi"> </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-lg-3">Harga Bulanan</div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8" id="ajaxHargaBulan"> Rp. <?= number_format($row->harga_bulanan) ?></div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-lg-3">Layanan Tambahan</div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8" id="ajaxLayanan"> <?= $row->nama_layanan; ?> (Rp. <?= number_format($row->layanan_bulanan); ?>)</div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-lg-3">Denda(Jika Melewati Tenggat Pembayaran)</div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8" id="ajaxDenda">Rp. <?= number_format($row->denda); ?></div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

          <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.4.1.min.js');?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-select.js');?>"></script>



        <script>
          $(document).ready(function() {


            $('#btnSubmitTambahEdit').click(function() {
              var file = $('#profil').val(); //Ambil Value 
              var ekstensi = ['jpg', 'png']; //Variabel array untuk penentuan Ekstensi
              if (file) {
                var ambilekstensi = file.split('.'); //Ambil Ekstensi
                ambilekstensi = ambilekstensi.reverse();
                if ($.inArray(ambilekstensi[0].toLowerCase(), ekstensi) > -1) {
                  var file_size = $('#profil')[0].files[0].size;
                  if (file_size > 2097152) {
                    alert('Ukuran file Max 2 MB');
                    return false;
                  }
                  return true;
                } else {
                  alert('Tipe Foto harus .jpg / .png'); //Alert jika ekstensi tidak cocok
                  return false;
                }
              }
            });

            function bacaGambar(input) {
              if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                  $('#fotolama').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
              }
            }

            $("#profil").change(function() {
              bacaGambar(this);
            });



            $("#btn_tambah").click(function() {
              $('#tambahEdit-kamar').find('form')[0].reset();
              $('#btnSubmitTambahEdit').text('Tambah');
              $('#tambahEdit-kamar h5').text('Tambah Kamar');

            });

            $("#dataTable").on('click', '.view_data', function() {
              var url = "<?= base_url() ?>";
              var id = $(this).attr('id');
              $.ajax({
                url: '<?php echo base_url(); ?>Admin/dataKamarById/' + id,
                type: 'POST',
                data: {
                  id: id
                },
                dataType: 'json',
                success: function(response) {

                  $("#ajaxImage").attr("src", url + "assets/img/" + response.foto_kamar);
                  $('#ajaxNoKamar').text(response.nomor_kamar);
                  $('#ajaxType').text(response.nama_tipe);
                  $('#ajaxLuasKamar').text(response.luas_kamar);
                  $('#ajaxLantaiKamar').text(response.lantai_kamar);
                  $('#ajaxKapasitas').text(response.kapasitas_kamar);
                  $('#ajaxDeskripsi').text(response.deskripsi_kamar);
                  $('#ajaxHargaBulan').text(response.harga_bulanan);
                  $('#ajaxLayanan').text(response.layanan_bulanan);
                  $('#ajaxDenda').text(response.denda);
                }
              })
            });

            $("#dataTable").on('click', '.edit_data', function() {
              $('#btnSubmitTambahEdit').text('Edit');
              $('#tambahEdit-kamar h5').text('Edit Kamar');

              var url = "<?= base_url() ?>";
              var id = $(this).attr('id');

              $.ajax({
                url: '<?php echo base_url(); ?>Admin/dataKamarById/' + id,
                type: 'POST',
                data: {
                  id: id
                },
                dataType: 'json',
                success: function(response) {
                  $("#fotolama").attr("src", url + "assets/img/" + response.foto_kamar);
                  $('input[name="idKamar"]').val(response.id_kamar);
                  $('input[name="fotoKamar"]').val(response.foto_kamar);
                  $('input[name="nomorKamar"]').val(response.nomor_kamar);
                  $('select[name="tipe"]').val(response.id_tipe);
                  $('input[name="luas"]').val(response.luas_kamar);
                  $('input[name="lantai"]').val(response.lantai_kamar);
                  $('input[name="kapasitas"]').val(response.kapasitas_kamar);
                  $('textarea[name="deskripsi"]').val(response.deskripsi_kamar);
                  $('input[name="hargaBulanan"]').val(response.harga_bulanan);
                  $('select[name="layanan"]').val(response.id_layanan);
                  $('input[name="denda"]').val(response.denda);
                }
              })
            });
          });
        </script>