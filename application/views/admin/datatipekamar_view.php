        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tipe Kamar</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <!-- judul tabel -->
                    <span class="m-0 font-weight-bold text-primary">Master Data Tipe Kamar</span>

                    <!-- button tambah -->
                    <button id="btn_tambah" class="btn btn-sm btn-primary btn-icon-split float-right" data-toggle="modal" data-target="#tambahEdit-tipe">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Tipe</span>
                    </button>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <?php if ($this->session->flashdata()) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php $this->session->flashdata('flash'); ?>
                                Data masih Terpakai, Data <strong>Gagal</strong> dihapus

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="d-none">ID Layanan</th>
                                    <th>Nama Tipe Kamar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th class="d-none">ID Tipe</th>
                                    <th>Nama Tipe Kamar</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $no = 1;

                                foreach ($tipe as $t) :
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td class="d-none"><?php echo $t['id_tipe']; ?></td>
                                        <td><?php echo $t['nama_tipe']; ?></td>
                                        <td>
                                            <button type="button" id="<?php echo $t['id_tipe']; ?>" class="btn btn-success btn-circle btn-sm edit_data m-1" data-target="#tambahEdit-tipe" data-toggle="modal">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <a href="<?php echo site_url('Admin/deleteTipeKamar/' . $t['id_tipe']); ?>" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus Tipe Ini" onclick="return confirm('Anda yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan!');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Tambah dan Edit -->

        <div class="modal fade" id="tambahEdit-tipe" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Tambah Tipe Kamar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= site_url('Admin/saveTipeKamar'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="idTipe">

                            <div class="form-group">
                                <label for="namaTipe">Nama Tipe</label>
                                <input value="" type="text" class="form-control" id="namaTipe" name="namaTipe" aria-describedby="namaTipe" placeholder="Masukkan Nama Tipe" required>
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



        <script>
            $("#btn_tambah").click(function() {
                $('#tambahEdit-tipe').find('form')[0].reset();
                $('#btnSubmitTambahEdit').text('Tambah');
                $('#tambahEdit-tipe h5').text('Tambah Tipe Kamar');

            });


            $("#dataTable").on('click', '.edit_data', function() {
                $('#btnSubmitTambahEdit').text('Edit');
                $('#tambahEdit-tipe h5').text('Edit Tipe Kamar');

                var url = "<?= base_url() ?>";
                var id = $(this).attr('id');

                $.ajax({
                    url: '<?php echo base_url(); ?>Admin/dataTipeKamarById/' + id,
                    type: 'POST',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('input[name="idTipe"]').val(response.id_tipe);
                        $('input[name="namaTipe"]').val(response.nama_tipe);
                    }
                })
            });
        </script>