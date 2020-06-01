<!doctype html>
<html lang="en">
<div class="container-fluid">
    <img src="<?= base_url('assets'); ?>/img/<?php
    if ($kamar['foto_kamar'] == NULL) {
        echo 'profile-img-none.png';
    } else {
        echo $kamar['foto_kamar']; 
    }
     ?>" alt="<?php echo $kamar['nomor_kamar'] ?>" class="img-thumbnail mx-auto d-block mb-3 rounded" width="300px">
    <div class="table-respomsive">
        <table class="table">
            <tbody>
                <tr>
                    <td class="font-weight-bold" width="30%">Nomor Kamar</td>
                    <td><?php echo $kamar['nomor_kamar']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Tipe</td>
                    <td><?php echo $kamar['nama_tipe']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Luas Kamar</td>
                    <td><?php echo $kamar['luas_kamar']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Letak Lantai</td>
                    <td><?php echo $kamar['lantai_kamar']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Kapasitas</td>
                    <td><?php echo $kamar['kapasitas_kamar'].' orang';?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Deskripsi Kamar</td>
                    <td><?php echo $kamar['deskripsi_kamar']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Harga Bulanan</td>
                    <td><?php echo 'Rp '.number_format($kamar['harga_bulanan']); ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Layanan Tambahan</td>
                    <td><?php echo $kamar['nama_layanan'].' ('.'Rp '.number_format($kamar['harga_layanan']).')';?></td>
                </tr>                
                <tr>
                    <td class="font-weight-bold" width="30%">Total Harga Bulanan</td>
                    <td><?php echo 'Rp '.number_format($kamar['harga_bulanan_total']); ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Denda (Jika Melewati Tenggat Pembayaran)</td>
                    <td><?php echo 'Rp '.number_format($kamar['denda']); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</html>