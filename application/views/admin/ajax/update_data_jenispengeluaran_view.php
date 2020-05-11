<!doctype html>
<html lang="en">
<form action="<?= base_url('update/updatedatajenispengeluaran'); ?>" method="POST">
  <input type="hidden" name="id" value="<?php echo $jenis_pengeluaran['id_jenis_pengeluaran']; ?>">
  <div class="form-group">
    <label for="kodePengeluaran">Kode Pengeluaran</label>
    <input value="<?php echo $jenis_pengeluaran['kode_pengeluaran']; ?>" type="text" class="form-control" id="kodePengeluaran"
      name="kodePengeluaran" aria-describedby="Nomor induk kewarganegaraan" placeholder="Masukkan NIK baru" required>
  </div>

  <div class="form-group">
    <label for="kategori">Kategori</label>
    <select name="kategori" type="text" class="form-control" id="kategori"
      placeholder="Masukkan kategori pengeluaran anda" required>
      <?php 
        if ($jenis_pengeluaran['kategori_pengeluaran'] == 'Biaya Operasional') {
        
      ?>
      <option value="">Pilih Kategori</option>
      <option selected value="Biaya Operasional">Biaya Operasional</option>
      <option value="Biaya Pemeliharaan">Biaya Pemeliharaan</option>
      <option value="Biaya Makanan">Biaya Makanan</option>
      <option value="Biaya Marketing">Biaya Marketing</option>
      <option value="Biaya Lainnya">Biaya Lainnya</option>
      <option value="Pajak">Pajak</option>
      <?php } elseif ($jenis_pengeluaran['kategori_pengeluaran'] == 'Biaya Pemeliharaan') {?>
      <option value="">Pilih Kategori</option>
      <option value="Biaya Operasional">Biaya Operasional</option>
      <option selected value="Biaya Pemeliharaan">Biaya Pemeliharaan</option>
      <option value="Biaya Makanan">Biaya Makanan</option>
      <option value="Biaya Marketing">Biaya Marketing</option>
      <option value="Biaya Lainnya">Biaya Lainnya</option>
      <option value="Pajak">Pajak</option>
      <?php } elseif ($jenis_pengeluaran['kategori_pengeluaran'] == 'Biaya Makanan') {?>
      <option value="">Pilih Kategori</option>
      <option value="Biaya Operasional">Biaya Operasional</option>
      <option value="Biaya Pemeliharaan">Biaya Pemeliharaan</option>
      <option selected value="Biaya Makanan">Biaya Makanan</option>
      <option value="Biaya Marketing">Biaya Marketing</option>
      <option value="Biaya Lainnya">Biaya Lainnya</option>
      <option value="Pajak">Pajak</option>
      <?php } elseif ($jenis_pengeluaran['kategori_pengeluaran'] == 'Biaya Marketing') {?>
      <option value="">Pilih Kategori</option>
      <option value="Biaya Operasional">Biaya Operasional</option>
      <option value="Biaya Pemeliharaan">Biaya Pemeliharaan</option>
      <option value="Biaya Makanan">Biaya Makanan</option>
      <option selected value="Biaya Marketing">Biaya Marketing</option>
      <option value="Biaya Lainnya">Biaya Lainnya</option>
      <option value="Pajak">Pajak</option>
      <?php } elseif ($jenis_pengeluaran['kategori_pengeluaran'] == 'Biaya Lainnya') {?>
      <option value="">Pilih Kategori</option>
      <option value="Biaya Operasional">Biaya Operasional</option>
      <option value="Biaya Pemeliharaan">Biaya Pemeliharaan</option>
      <option value="Biaya Makanan">Biaya Makanan</option>
      <option value="Biaya Marketing">Biaya Marketing</option>
      <option selected value="Biaya Lainnya">Biaya Lainnya</option>
      <option value="Pajak">Pajak</option>
      <?php } elseif ($jenis_pengeluaran['kategori_pengeluaran'] == 'Pajak') {?>
      <option value="">Pilih Kategori</option>
      <option value="Biaya Operasional">Biaya Operasional</option>
      <option value="Biaya Pemeliharaan">Biaya Pemeliharaan</option>
      <option value="Biaya Makanan">Biaya Makanan</option>
      <option value="Biaya Marketing">Biaya Marketing</option>
      <option value="Biaya Lainnya">Biaya Lainnya</option>
      <option selected value="Pajak">Pajak</option>
      <?php } else {?>
      <option selected value="">Pilih Kategori</option>
      <option value="Biaya Operasional">Biaya Operasional</option>
      <option value="Biaya Pemeliharaan">Biaya Pemeliharaan</option>
      <option value="Biaya Makanan">Biaya Makanan</option>
      <option value="Biaya Marketing">Biaya Marketing</option>
      <option value="Biaya Lainnya">Biaya Lainnya</option>
      <option value="Pajak">Pajak</option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label for="namaPengeluaran">Nama Pengeluaran</label>
    <input value="<?php echo $jenis_pengeluaran['nama_pengeluaran']; ?>" type="text" class="form-control" id="namaPengeluaran"
      name="namaPengeluaran" aria-describedby="nama" placeholder="Masukkan nama baru" required>
  </div>


  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
    <button type="submit" name="update_jenis_pengeluaran" class="btn btn-primary"
      onclick="return confirm('Anda yakin ingin mengupdate data?');">Update</button>
  </div>
</form>

</html>