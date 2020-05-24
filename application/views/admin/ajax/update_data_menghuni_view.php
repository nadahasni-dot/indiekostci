<!doctype html>
<html lang="en">
<?php 
  // $id_menghuni = $_POST['id_menghuni'];
  // $query = "SELECT * FROM menghuni, pengguna, kamar WHERE id_menghuni = $id_menghuni AND menghuni.id_pengguna = pengguna.id_pengguna AND kamar.id_kamar = menghuni.id_kamar";        
  
?>
<form action="<?= base_url('update/updateMenghuni'); ?>" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $menghuni['id_menghuni']; ?>">  
  <div class="form-group">
    <label for="kamar">Pilih Kamar</label>
    <select name="kamar" class="form-control" id="kamar" required>
      <option disabled value="">Pilih Kamar</option>    
      <option selected value="<?php echo $menghuni['id_kamar']; ?>"><?php echo 'Kamar. '.$menghuni['nomor_kamar'].' (Asal Kamar)'; ?></option>

      <?php 
        foreach ($kamar_tersedia as $row) {
          if($row['penghuni'] == 'Belum dihuni'){
      ?>
      <option value="<?php echo $row['id_kamar']; ?>">
        <?php echo 'Kamar. '.$row['nomor_kamar'].' ('.$row['penghuni'].')'; ?>
      </option>
      <?php   
          }                         
        }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="penghuni">Pilih Penghuni yang akan didaftarkan</label>
    <select name="penghuni" class="form-control" id="penghuni" required>      
      <option selected value="<?php echo $menghuni['id_pengguna']; ?>"><?php echo $menghuni['nama_pengguna']; ?></option>
    </select>
  </div>
  <div class="form-group">
    <label for="tanggal">Tanggal Masuk</label>
    <input type="date" value="<?php echo $menghuni['tanggal_masuk'] ?>" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggal"
      placeholder="Masukkan Tanggal Masuk" required>
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
    <button type="submit" name="update_menghuni" class="btn btn-primary"
      onclick="return confirm('Anda yakin ingin mengupdate data?');">Update</button>
  </div>
</form>
<?php

?>

</html>