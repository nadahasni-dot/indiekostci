
<?php 
foreach ($data_kamar as $row) {  
?>
<div class="col col-12 col-sm-6 col-lg-3 mb-4 d-flex align-items-stretch">
  <div class="card">

    <div class="no-kamar"><span class="font-weight-bold"><?php echo $row['nomor_kamar']; ?></span>
    </div>

    <?php if($row['foto_kamar'] == NULL){ ?>

    <img src="<?= base_url('assets'); ?>/img/profile-img-none.png" height="200px" class="card-img-top" alt="...">

    <?php } else { ?>
    <img src="<?= base_url('assets'); ?>/img/<?php echo $row['foto_kamar']; ?>" height="200px" class="card-img-top"
      alt="...">
    <?php } ?>

    <div class="d-flex flex-column card-body">
      <h6 class="card-title small"><span class="font-weight-bold">Tipe:</span>
        <?php echo strtoupper($row['nama_tipe']); ?></h6>

      <p class="card-text"><span class="font-weight-bold small">Luas:</span>
        <?php echo $row['luas_kamar'];  ?></p>

      <p class="card-text"><span class="font-weight-bold small">Lantai:</span>
        <?php echo $row['lantai_kamar'];  ?></p>

      <p class="card-text"><span class="font-weight-bold small">Deskripsi:</span>
        <?php                     
        if(strlen($row['deskripsi_kamar']) > 50){
          $row['deskripsi_kamar'] = substr($row['deskripsi_kamar'], 0, 47).' ...';
        }
          
        echo $row['deskripsi_kamar'];  
        ?></p>

      <p class="card-text"><span class="font-weight-bold small">Harga Bulanan:</span>
        <?php echo 'Rp. '.number_format($row['total_harga']);  ?></p>
      
      <a href="<?= base_url('login'); ?>" class="btn btn-outline-primary btn-block mt-auto">Login Untuk Memesan</a>      
    </div>
  </div>
</div>
</div>
<?php } ?>