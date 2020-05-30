<!doctype html>
<html lang="en">
<?php 
    // include '../../../actions/koneksi.php';
    // ob_start();
    // session_start();

    // if (!isset($_SESSION['akun_id'])){
    //   header("location: ../../../landing-page.php");
    // } 
    // elseif (isset($_SESSION['akun_id'])){
    //   if($_SESSION['hak_akses'] == 2){
    //     header("location: ../../penghuni/penghuni-dashboard.php");
    //   }
    //   elseif($_SESSION['hak_akses'] == 3){
    //     header("location: ../../calon-penghuni/calon-dashboard.php");
    //   } 
    // }
    
    // if(isset($_POST['id_pengguna'])){
    //     $id_pengguna = $_POST['id_pengguna'];
    //     $query = "SELECT * FROM pengguna WHERE id_pengguna = $id_pengguna";
    //     $result = mysqli_query($conn, $query);

        // while ($data = mysqli_fetch_array($result)) {
?>
<div class="container-fluid">
    <a href="<?php
    echo base_url('assets/img/');

    if ($penghuni['foto_pengguna'] == NULL) {
        echo 'profile-img-none.png';
    } else {
        echo $penghuni['foto_pengguna']; 
    }
     ?>" data-lightbox="../../img/<?php
     if ($penghuni['foto_pengguna'] == NULL) {
         echo 'profile-img-none.png';
     } else {
         echo $penghuni['foto_pengguna']; 
     }
      ?>" data-tittle="../../img/<?php
      if ($penghuni['foto_pengguna'] == NULL) {
          echo 'profile-img-none.png';
      } else {
          echo $penghuni['foto_pengguna']; 
      }
       ?>">
    <img src="<?php
    echo base_url('assets/img/');

    if ($penghuni['foto_pengguna'] == NULL) {
        echo 'profile-img-none.png';
    } else {
        echo $penghuni['foto_pengguna']; 
    }
     ?>" alt="<?php echo $penghuni['nama_pengguna']; ?>" class="img-thumbnail mx-auto d-block mb-3 rounded" width="300px">
     </a>
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td class="font-weight-bold" width="30%">NIK</td>
                    <td><?php echo $penghuni['no_ktp_pengguna']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Nama</td>
                    <td><?php echo $penghuni['nama_pengguna']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Tanggal Lahir</td>
                    <td><?php echo $penghuni['tanggal_lahir_pengguna']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Jenis Kelamin</td>
                    <td><?php echo $penghuni['kelamin_pengguna']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Alamat</td>
                    <td><?php echo $penghuni['alamat_pengguna']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Provinsi</td>
                    <td><?php echo $penghuni['provinsi_pengguna']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Kota</td>
                    <td><?php echo $penghuni['kota_pengguna']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Telepon</td>
                    <td><?php echo $penghuni['telepon_pengguna']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" width="30%">Email</td>
                    <td><?php echo $penghuni['email_pengguna']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
    //     }
    // }
?>

</html>