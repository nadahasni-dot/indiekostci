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
                     $no=0;
					 foreach ($booking->result() as $row) :
						 $no++;
  
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td class="d-none"><?php echo $row->id_booking; ?></td>
                      <td><?php echo 'Kamar. '.$row->nomor_kamar; ?></td>
                      <td><?php echo $row->nama_pengguna; ?></td>
                      <td><?php echo $row->tanggal_booking; ?></td>
                      <td><?php echo 'Rp. '.number_format($row->nilai_booking); ?></td>
                      <td><?php echo strtoupper($row->status_booking); ?></td>
                      <td>
                        <!-- view btn -->
                        <button name="view" type="button" value="view" id="<?php echo $row->id_booking; ?>"
                          class="btn btn-primary btn-circle btn-sm view_data m-1" title="Lihat Detail">
                          <i class="fas fa-eye"></i>
                        </button>
                        <!-- edit btn -->
                        <a href="#" class="btn btn-success btn-circle btn-sm edit-data m-1"
						data-id_booking="<?php echo $row->id_booking;?>"
						 data-nama_pengguna="<?php echo $row->nama_pengguna;?>">
						 <i class="fas fa-pen"></i>
					 	</a>
                        <!-- delete btn -->
                    <a onclick="return confirm('Apakah Anda Ingin Menghapus Data Booking <?=$row->nama_pengguna;?> ?');" 
					   href="<?php echo site_url('Admin/deleteBooking/'.$row->id_booking); ?>"
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
		
		<!-- Modal Update-->
		<form action="<?php echo site_url('Admin/updateBooking');?>" method="post">
        <div class="modal fade" id="UpdateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
			  <?php foreach ($booking->result() as $row) :?>
              
                            
			  <input type="hidden" name="id_booking" value="<?php echo $row->id_booking; ?>">
  <a href="../../img/<?php
    if ($row->bukti_booking == NULL) {
        echo 'profile-img-none.png';
    } else {
        echo $row->bukti_booking; 
    }
     ?>" data-lightbox="<?php echo $row->id_booking; ?>" data-tittle="<?php
     if ($row->bukti_booking == NULL) {
         echo 'profile-img-none.png';
     } else {
         echo $row->bukti_booking; 
     }
      ?>">
    <img src="../../img/<?php
    if ($row->bukti_booking == NULL) {
        echo 'profile-img-none.png';
    } else {
        echo $row->bukti_booking; 
    }
     ?>" alt="<?php echo $row->tanggal_booking; ?>" class="img-thumbnail mx-auto d-block mb-3 rounded"
      width="300px"> </a>

  <div class="table-respomsive">
    <table class="table">
      <tbody>
        <tr>
          <td class="font-weight-bold" width="30%">No. Kamar</td>
          <td><?php echo 'Kamar no.'.$row->nomor_kamar; ?></td>
        </tr>
        <tr>
          <td class="font-weight-bold" width="30%">Pemesan</td>
          <td><?php echo $row->nama_pengguna; ?></td>
        </tr>
        <tr>
          <td class="font-weight-bold" width="30%">Tanggal Booking</td>
          <td><?php echo $row->tanggal_booking; ?></td>
        </tr>
        <tr>
          <td class="font-weight-bold" width="30%">Nominal</td>
          <td><?php echo 'Rp. '.number_format($orw->nilai_booking); ?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="form-group">
    <label for="status">Status Konfirmasi Booking</label>
    <select name="status" class="form-control" id="status" required>
      <option selected disabled value="">Pilih Status Konfirmasi</option>

      <?php                 
          if($row->status_booking == 'belum dikonfirmasi'){                     
      ?>

      <option selected value="belum dikonfirmasi">
        <?php echo strtoupper('belum dikonfirmasi'); ?></option>
      <option value="sudah dikonfirmasi">
        <?php echo strtoupper('sudah dikonfirmasi'); ?></option>

      <?php } else {?>
      <option value="belum dikonfirmasi">
        <?php echo strtoupper('belum dikonfirmasi'); ?></option>
      <option selected value="sudah dikonfirmasi">
        <?php echo strtoupper('sudah dikonfirmasi'); ?></option>

      <?php                       
        }
      
      ?>
	</select>
	<?php endforeach;?>
  </div>
  <div class="modal-footer">
  <input type="hidden" name="id_booking" required>
    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
    <button type="submit" name="update_booking" class="btn btn-primary"
      onclick="return confirm('Anda yakin ingin mengupdate data?');">Update</button>
  </div>
 
              </div>
              
            </div>
          </div>
        </div>
	</form>



	<script type="text/javascript">
//Didn't done this function AJAX
	$(document).ready(function(){
		$('.bootstrap-select').selectpicker();
 //GET UPDATE
 $('.edit-data').on('click',function(){
	 var id_booking = $(this).data('id_booking');
	 var nama_pengguna = $(this).data('nama_pengguna');
	 $(".strings").val('');
	 $('#UpdateModal').modal('show');
	 $('[name="id"]').val(id_booking);
	 $('[name="nama_pengguna"]').val(nama_pengguna);
	 //AJAX REQUEST TO GET SELECTED PRODUCT
	 $.ajax({
		 url: "<?php echo site_url('Admin/get_booking_by_id');?>",
		 method: "POST",
		 data :{id_booking:id_booking},
		 cache:false,
		 success : function(data){
			 var item=data;
			 var val1=item.replace("[","");
			 var val2=val1.replace("]","");
			 var values=val2;
			 $.each(values.split(","), function(i,e){
				 $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
				 $(".strings").selectpicker('refresh');

			 });
		 }
		  
	 });
	 return false;
 });


});
</script>
