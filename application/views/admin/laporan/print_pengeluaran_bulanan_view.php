<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title id="tittle">Cetak Pengeluaran <?php echo $nama_bulan.' '.$tahun; ?></title>
  <style type="text/css">    
    .style1 {
      font-size: large
    }

    body{
      max-height: 500px;
    }
  </style>
</head>

<body>



<table width="910" border="0" align="center" cellpadding="0" cellspacing="0">    
    <tr height="20px"></tr>
    <tr>
      <td width="100%" colspan="4">
        <div align="center" class="style1"><strong><?php echo strtoupper($info_kost['nama_kost']); ?></strong><br>
          <?php echo $info_kost['alamat_kost']; ?>, Telp <?php echo $info_kost['no_kost']; ?> <?php echo $info_kost['kota_kost']; ?> <?php echo $info_kost['provinsi_kost']; ?><br>
          Website : indiekost.mif-project.com E-Mail : <?php echo $info_kost['email_kost']; ?> </div>
      </td>    
    <tr>
      <td colspan="4"></td>
    </tr>
    <tr>
      <td colspan="4">
        <hr noshade>
      </td>
    </tr>
    <tr>
      <td colspan="4"  align="center">
        <strong class="style1">LAPORAN PENGELUARAN</strong>
      </td>
    </tr>
    <tr>
      <td colspan="4"  align="center">
        <strong class="style1"><?php echo $nama_bulan.' '.$tahun ?></strong>
      </td>
    </tr>
    <tr height="20px">      
      <td width="25%">
        
      </td>
      <td width="25%">        
      </td>      
      <td width="25%" colspan="2"></td>
    </tr>
    <tr>      
      <td width="25%">
        
      </td>
      <td width="25%">        
      </td>      
      <td width="25%" colspan="2"><strong>TANGGAL CETAK: <?php 
        if($pengeluaran != null)
        echo $pengeluaran[0]['tanggal_cetak']; 
      ?></strong></td>
    </tr>
    <tr height="30px">      
      <td width="25%"></td>
      <td width="25%"></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">      
      <td width="25%"><strong>PERIODE</strong></td>
      <td width="25%">: <?php echo $nama_bulan.' '.$tahun; ?></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <?php 
    // select data pengeluaran
    // $query = "SELECT jenis_pengeluaran.nama_pengeluaran, SUM(pengeluaran.nilai_pengeluaran) AS total_pengeluaran, pengeluaran.tanggal_pengeluaran, DATE_FORMAT(CURRENT_DATE(), '%d %M %Y') AS tanggal_cetak FROM pengeluaran, jenis_pengeluaran WHERE pengeluaran.id_jenis_pengeluaran = jenis_pengeluaran.id_jenis_pengeluaran AND YEAR(pengeluaran.tanggal_pengeluaran) = '$tahun' AND MONTH(pengeluaran.tanggal_pengeluaran) = '$bulan'

    // GROUP BY jenis_pengeluaran.nama_pengeluaran";

    // $result = mysqli_query($conn, $query);
    
    $totalPengeluaran = 0;
    foreach($pengeluaran as $row){
    
    ?>
    <tr height="30px">      
      <td width="25%"><strong><?php echo $row['nama_pengeluaran']; ?></strong></td>
      <td width="25%">: <?php echo 'Rp. '.number_format($row['total_pengeluaran']); ?></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>    
    <?php 
        $totalPengeluaran += $row['total_pengeluaran'];
      } 
    
    ?>
    <tr height="30px">      
      <td width="25%"><strong>TOTAL PENGELUARAN</strong></td>
      <td width="25%">: <?php echo 'Rp. '.number_format($totalPengeluaran); ?></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">      
      <td width="26%"></td>
      <td width="74%" colspan="3"></td>    
    </tr>    
    <tr height="30px">      
      <td align="center"><button name="cetak" type="button" id="cetak" value="Cetak" onClick="Cetakan()">Cetak</button></td>
      <td ></td>      
      <td colspan="2"></td>
    </tr>
  </table>
  
  

<script>
function Cetakan()
{ 
  var x = document.getElementsByName("cetak");
  for(i = 0; i < x.length ; i++)
  {
  		x[i].style.visibility = "hidden";
  }

  window.print();
  alert("Jangan di tekan tombol OK sebelum dokumen selesai tercetak!");
  for(i = 0; i < x.length ; i++)
  {
  		x[i].style.visibility = "visible";
  }
}
</script>