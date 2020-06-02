<!doctype html>
<html lang="en">
<div class="container-fluid">
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
                <tr>
                    <td class="font-weight-bold" width="30%">Status Booking</td>
                    <td><?php echo strtoupper($booking['status_booking']); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</html>