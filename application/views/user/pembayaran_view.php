<!-- Begin Page Content -->
<div class="container-fluid">

<?php   
//   $query = "SELECT *, DATE_FORMAT(CURRENT_DATE(), '%M %Y') AS bulan FROM pembayaran, kamar, pengguna, menghuni, jenis_status_pembayaran
//   WHERE menghuni.id_kamar = kamar.id_kamar AND pembayaran.id_status = jenis_status_pembayaran.id_status AND
//     menghuni.id_pengguna = pengguna.id_pengguna AND
//     pembayaran.id_menghuni = menghuni.id_menghuni AND pengguna.id_pengguna = $id_pengguna AND
//     MONTH(pembayaran.tanggal_pembayaran) = MONTH(CURRENT_DATE())";

//   $query2 = "SELECT *, DATE_FORMAT(CURRENT_DATE(), '%M %Y') AS bulan, (kamar.harga_bulanan + layanan.harga_bulanan) AS harga_total, CURRENT_DATE() AS tanggal_sekarang FROM kamar, pengguna, menghuni, layanan
//   WHERE menghuni.id_kamar = kamar.id_kamar  AND kamar.id_layanan = layanan.id_layanan AND
//     menghuni.id_pengguna = pengguna.id_pengguna AND pengguna.id_pengguna = $id_pengguna";

//   $query3 = "SELECT DATE_FORMAT(CURRENT_DATE(), '%Y') as tahun, DATE_FORMAT(CURRENT_DATE(), '%m') as bulan";
//   $result3 = mysqli_query($conn, $query3);
//   $tahunBulanSekarang = mysqli_fetch_array($result3);

//   $tahun = $tahunBulanSekarang['tahun'];
//   $bulan = $tahunBulanSekarang['bulan'];

//   $query4 = "SELECT DATEDIFF(CURRENT_DATE(),'$tahun-$bulan-10') AS selisih";
//   $result4 = mysqli_query($conn, $query4);
//   $selisihData = mysqli_fetch_array($result4);

  $selisih = $batas_pembayaran['selisih'];

  if($selisih <= 0){
    $selisih = 0;
  }          

//   $result = mysqli_query($conn,$query);
//   $result2 = mysqli_query($conn,$query2);
//   $dataPembayaran = mysqli_fetch_array($result);
//   $dataPembayaran2 = mysqli_fetch_array($result2);
//   $row = mysqli_num_rows($pembayaran);

  $totalDenda = $selisih * $harga_kamar['denda'];            

  // cek apakah sudah membayar bulan ini
  if($pembayaran){
?>         

<!-- card awal -->
<div class="card col-12 mb-3">
  <div class="card-body">
    <h4 class="card-title">Pembayaran</h4>
    <p class="card-text">Detail data pembayaran anda bulan <?php echo $pembayaran['bulan']; ?></p>
    <div class="container-fluid pr-3">
      <img src="<?= base_url('assets'); ?>/img/<?php
        if ($pembayaran['bukti_pembayaran'] == NULL) {
            echo 'none.png';
        } else {
            echo $pembayaran['bukti_pembayaran']; 
        }
        ?>" alt="<?php echo $pembayaran['tanggal_pembayaran']; ?>" class="img-thumbnail mx-auto d-block mb-3 rounded"
        width="300px">
      <div class="table-responsive pr-3">
        <table class="table">
          <tbody>
            <tr>
              <td class="font-weight-bold" width="30%">Tanggal Pembayaran</td>
              <td><?php echo $pembayaran['tanggal_pembayaran']; ?></td>
            </tr>
            <tr>
              <td class="font-weight-bold" width="30%">Kamar Yang Dibayar</td>
              <td><?php echo 'Kamar no. '.$pembayaran['nomor_kamar']; ?></td>
            </tr>                      
            <tr>
              <td class="font-weight-bold" width="30%">Pembayar</td>
              <td><?php echo strtoupper($pembayaran['nama_pengguna']); ?></td>
            </tr>
            <tr>
              <td class="font-weight-bold" width="30%">Keterangan</td>
              <td><?php echo $pembayaran['keterangan']; ?></td>
            </tr>
            <tr>
              <td class="font-weight-bold" width="30%">Harga Bulanan</td>
              <td><?php echo 'Rp. '.number_format($pembayaran['nilai_pembayaran']); ?></td>
            </tr>
            <tr>
              <td class="font-weight-bold" width="30%">Status Pembayaran</td>
              <td><?php echo strtoupper($pembayaran['nama_status_pembayaran']); ?></td>
            </tr>                      
          </tbody>
        </table>
        <?php if (strtoupper($pembayaran['nama_status_pembayaran']) == 'SUDAH DIKONFIRMASI') {?>
        <a href="<?= base_url('user/buktipembayaran/').$pembayaran['id_pembayaran']; ?>" target="_blank" class="btn btn-primary mb-3" rel="noopener noreferrer"><i class="fas fa-print"></i> Cetak Bukti Pembayaran</a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<!-- card akhir -->

<?php } else { 
  if($harga_kamar['nomor_kamar'] == NULL){  
?>

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

 <!-- card awal -->
 <div class="card col-12 mb-3">
  <div class="card-body">
    <h4 class="card-title">Pembayaran</h4>
    <?= $this->session->flashdata('message'); ?>
    <p class="card-text">Anda belum melakukan pembayaran kamar no. <?php echo $harga_kamar['nomor_kamar']; ?> bulan <?php echo $harga_kamar['bulan']; ?></p>
    <p class="font-weight-bold text-danger">Lakukan pembayaran sebelum Tanggal (10 <?php echo $harga_kamar['bulan']; ?>)</p>
    <div class="container-fluid pr-3">
      <!-- <img src="../../img/<?php
        if ($pembayaran['bukti_pembayaran'] == NULL) {
            echo 'none.png';
        } else {
            echo $pembayaran['bukti_pembayaran']; 
        }
        ?>" alt="<?php echo $pembayaran['tanggal_pembayaran']; ?>" class="img-thumbnail mx-auto d-block mb-3 rounded"
        width="300px"> -->
      <div class="table-responsive pr-3">
        <table class="table">
          <tbody>
            <tr>
              <td class="font-weight-bold" width="30%">Kamar Yang Harus Dibayar</td>
              <td><?php echo 'Kamar no. '.$harga_kamar['nomor_kamar']; ?></td>
            </tr>                      
            <tr>
              <td class="font-weight-bold" width="30%">Pembayar</td>
              <td><?php echo strtoupper($harga_kamar['nama_pengguna']); ?></td>
            </tr>
            <tr>
              <td class="font-weight-bold" width="30%">Denda</td>
              <td><?php echo 'Rp. '.number_format($totalDenda); ?></td>
            </tr>
            <tr>
              <td class="font-weight-bold" width="30%">Total Harus Dibayar</td>
              <td><?php echo 'Rp. '.number_format($harga_kamar['harga_total'] + $totalDenda); ?></td>
            </tr>
            <tr>
              <td class="font-weight-bold" width="30%">Cara Pembayaran</td>
              <td class="font-weight-bold text-success">Lakukan pembayaran kamar offline (Melalui Teknisi Kost, dengan meminta struk pembayaran) atau transfer ke <br><br>(Rekening no. 143-001-389-2367 [MANDIRI] A.N. Suliha) <br><br> Foto/Scan Bukti pembayaran dan upload saat melakukan pembayaran</td>
            </tr>                                            
          </tbody>
        </table>
        <form action="<?= base_url('user/createpembayaran'); ?>" method="POST" enctype="multipart/form-data">

              <div class="form-group">                          
                <input value="<?php echo ($harga_kamar['harga_total']+$totalDenda); ?>" type="hidden" class="form-control" id="nominal" name="nominal"
                  aria-describedby="nominal" placeholder="Masukkan nominal pembayaran" required>
              </div>
              <div class="form-group">                          
                <input value="2" type="hidden" class="form-control" id="status" name="status"
                  aria-describedby="status" placeholder="Masukkan nominal pembayaran" required>
              </div>
              <div class="form-group">                          
                <input value="<?php echo $harga_kamar['id_menghuni'] ?>" type="hidden" class="form-control" id="menghuni" name="id_menghuni"
                  aria-describedby="nominal" placeholder="Masukkan nominal pembayaran" required>
              </div>
              <div class="form-group">
                <label for="tanggal">Tanggal Pembayaran</label>
                <input value="<?php echo $harga_kamar['tanggal_sekarang'] ?>" type="date" class="form-control" id="tanggal" name="tanggal"
                  aria-describedby="nominal" placeholder="Masukkan nominal pembayaran" readonly>
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
              <button type="submit" name="submitPembayaran" class="btn btn-primary"
                onclick="return confirm('Anda yakin ingin melakukan pembayaran? Pastikan data yang diinputkan benar');">Bayar
                Kamar</button>
            </form>
      </div>
    </div>
  </div>
</div>
<!-- card akhir -->
<?php 
    } 
  }
?>
</div>


<!-- /.container-fluid -->