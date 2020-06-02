<!doctype html>
<html lang="en">
<form action="<?= base_url('update/updatebooking'); ?>" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id_booking" value="<?php echo $booking['id_booking']; ?>">
  <a href="<?= base_url('assets'); ?>/img/<?php
    if ($booking['bukti_booking'] == NULL) {
        echo 'profile-img-none.png';
    } else {
        echo $booking['bukti_booking']; 
    }
     ?>" data-lightbox="<?php echo $booking['id_booking']; ?>" data-tittle="<?php
     if ($booking['bukti_booking'] == NULL) {
         echo 'profile-img-none.png';
     } else {
         echo $booking['bukti_booking']; 
     }
      ?>">
    <img src="<?= base_url('assets'); ?>/img/<?php
    if ($booking['bukti_booking'] == NULL) {
        echo 'profile-img-none.png';
    } else {
        echo $booking['bukti_booking']; 
    }
     ?>" alt="<?php echo $booking['tanggal_booking']; ?>" class="img-thumbnail mx-auto d-block mb-3 rounded"
      width="300px"> </a>

  <div class="table-respomsive">
    <table class="table">
      <tbody>
        <tr>
          <td class="font-weight-bold" width="30%">No. Kamar</td>
          <td><?php echo 'Kamar no.'.$booking['nomor_kamar']; ?></td>
        </tr>
        <tr>
          <td class="font-weight-bold" width="30%">Pemesan</td>
          <td><?php echo $booking['nama_pengguna']; ?></td>
        </tr>
        <tr>
          <td class="font-weight-bold" width="30%">Tanggal Booking</td>
          <td><?php echo $booking['tanggal_booking']; ?></td>
        </tr>
        <tr>
          <td class="font-weight-bold" width="30%">Nominal</td>
          <td><?php echo 'Rp. '.number_format($booking['nilai_booking']); ?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="form-group">
    <label for="status">Status Konfirmasi Booking</label>
    <select name="status" class="form-control" id="status" required>
      <option selected disabled value="">Pilih Status Konfirmasi</option>

      <?php                 
          if($booking['status_booking'] == 'belum dikonfirmasi'){                     
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
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
    <button type="submit" name="update_booking" class="btn btn-primary"
      onclick="return confirm('Anda yakin ingin mengupdate data?');">Update</button>
  </div>
</form>
</html>