<!doctype html>
<html lang="en">

<div class="container-fluid">
    <img src="<?= base_url('assets'); ?>/img/<?php
    if ($menghuni['foto_pengguna'] == NULL) {
        echo 'profile-img-none.png';
    } else {
        echo $menghuni['foto_pengguna']; 
    }
     ?>" alt="<?php echo $menghuni['nama_pengguna'] ?>" class="img-thumbnail mx-auto d-block mb-3 rounded" width="300px" height="300px">
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td class="font-weight-bold" width="30%">Nama Penghuni</td>
                    <td><?php echo $menghuni['nama_pengguna']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Nomor Kamar</td>
                    <td><?php echo $menghuni['nomor_kamar']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Tipe</td>
                    <td><?php echo $menghuni['nama_tipe']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Luas Kamar</td>
                    <td><?php echo $menghuni['luas_kamar']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Letak Lantai</td>
                    <td><?php echo $menghuni['lantai_kamar']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Kapasitas</td>
                    <td><?php echo $menghuni['kapasitas_kamar'].' orang';?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Deskripsi Kamar</td>
                    <td><?php echo $menghuni['deskripsi_kamar']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Harga Bulanan</td>
                    <td><?php echo 'Rp '.number_format($menghuni['harga_bulanan']); ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Layanan Tambahan</td>
                    <td><?php echo $menghuni['nama_layanan'].' ('.'Rp '.number_format($menghuni['harga_layanan']).')';?></td>
                </tr>                
                <tr>
                    <td class="font-weight-bold" width="30%">Total Harga Bulanan</td>
                    <td><?php echo 'Rp '.number_format($menghuni['harga_bulanan_total']); ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Denda (Jika Melewati Tenggat Pembayaran)</td>
                    <td><?php echo 'Rp '.number_format($menghuni['denda']); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</html>