<!doctype html>
<html lang="en">

<form action="<?= base_url('update/updatedatatipekamar'); ?>" method="POST">
  <input type="hidden" name="id" value="<?php echo $tipe_kamar['id_tipe']; ?>">
  <div class="form-group">
    <label for="namaTipe">Nama Tipe Kamar</label>
    <input value="<?php echo $tipe_kamar['nama_tipe']; ?>" type="text" class="form-control" id="namaTipe" name="namaTipe"
      aria-describedby="Nomor induk kewarganegaraan" placeholder="Masukkan NIK baru" required>
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
    <button type="submit" name="update_tipe_kamar" class="btn btn-primary" onclick="return confirm('Anda yakin ingin mengupdate data?');">Update</button>
  </div>
</form>

</html>