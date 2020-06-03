<!-- Begin Page Content -->
<div class="container-fluid">

<?php if($kamar['nomor_kamar'] == NULL) {?>
  <div class="card col-12 mb-3">
  <div class="card-body">
    <h4 class="card-title text-center">Peringatan</h4>
    <p class="card-text text-danger text-center font-weight-bold">Anda bukan penghuni lagi, silahkan logout dan login kembali untuk melanjutkan</p>
    <div class="row justify-content-center align-items-center">
      <button data-toggle="modal" data-target="#logoutModal" class="btn btn-primary ">Log Out</button>
    </div>
  </div>
</div>

<?php } else { ?>  

<div class="card col-12 mb-3">
  <div class="card-body">
    <h4 class="card-title">Kamar Yang Anda Huni</h4>
    <p class="card-text">Detail data kamar anda</p>
    
    <div class="container-fluid pr-3">
      <img src="<?= base_url('assets') ?>/img/<?php
        if ($kamar['foto_kamar'] == NULL) {
            echo 'none.png';
        } else {
            echo $kamar['foto_kamar']; 
        }
        ?>" alt="<?php echo $kamar['nomor_kamar']; ?>" class="img-thumbnail mx-auto d-block mb-3 rounded"
        width="300px">
      <div class="table-responsive pr-3">
        <table class="table">
          <tbody>
            <tr>
              <td class="font-weight-bold" width="30%">Tanggal Masuk</td>
              <td><?php echo $kamar['tanggal_masuk']; ?></td>
            </tr>
            <tr>
              <td class="font-weight-bold" width="30%">Nomor Kamar</td>
              <td><?php echo $kamar['nomor_kamar']; ?></td>
            </tr>                      
            <tr>
              <td class="font-weight-bold" width="30%">Tipe Kamar</td>
              <td><?php echo strtoupper($kamar['nama_tipe']); ?></td>
            </tr>
            <tr>
              <td class="font-weight-bold" width="30%">Letak Lantai</td>
              <td><?php echo 'Lantai '.$kamar['lantai_kamar']; ?></td>
            </tr> 
            <tr>
              <td class="font-weight-bold" width="30%">Kapasitas Kamar</td>
              <td><?php echo $kamar['kapasitas_kamar'].' orang'; ?></td>
            </tr>
            <tr>
              <td class="font-weight-bold" width="30%">Luas Kamar</td>
              <td><?php echo $kamar['luas_kamar']; ?></td>
            </tr>
            <tr>
              <td class="font-weight-bold" width="30%">Deskripsi Kamar</td>
              <td><?php echo $kamar['deskripsi_kamar']; ?></td>
            </tr>
            <tr>
              <td class="font-weight-bold" width="30%">Harga Bulanan</td>
              <td><?php echo 'Rp. '.number_format($kamar['harga_kamar_bulanan']); ?></td>
            </tr>
            <tr>
              <td class="font-weight-bold" width="30%">Harga Layanan</td>
              <td><?php echo $kamar['nama_layanan'].' (Rp. '.number_format($kamar['harga_layanan']).')'; ?></td>
            </tr>
            <tr>
              <td class="font-weight-bold" width="30%">Harga Bulanan Total</td>
              <td><?php echo 'Rp. '.number_format($kamar['total_harga']); ?></td>
            </tr>
            <tr>
              <td class="font-weight-bold" width="30%">Denda/Hari (Jika Lewat 10 Hari dari awal bulan)</td>
              <td><?php echo 'Rp. '.number_format($kamar['denda']); ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <?php          
       }
    ?>
  </div>
</div>

</div>


<!-- /.container-fluid -->