<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title id="tittle"><?php echo 'PembayaranKamarNo. '.$pembayaran['nomor_kamar'].' '.$pembayaran['tanggal_pembayaran']; ?></title>
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
        <div align="center" class="style1"><strong><?php echo strtoupper($kost['nama_kost']); ?></strong><br>
          <?php echo $kost['alamat_kost']; ?>, Telp <?php echo $kost['no_kost']; ?> <?php echo $kost['kota_kost']; ?> <?php echo $kost['provinsi_kost']; ?><br>
          Website : indiekost.mif-project.com E-Mail : <?php echo $kost['email_kost']; ?> </div>
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
      <td width="25%">
        <strong>ID PEMBAYARAN: <?php echo $pembayaran['id_pembayaran']; ?></strong>
      </td>
      <td width="25%">
        
      </td>
      <td width="25%"></td>
      <td width="25%"><strong>NO. KAMAR: <?php echo $pembayaran['nomor_kamar']; ?></strong></td>
    </tr>
    <tr height="30px">      
      <td width="25%"></td>
      <td width="25%"></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">      
      <td width="25%"><strong>PEMBAYAR </strong></td>
      <td width="25%">: <?php echo strtoupper($pembayaran['nama_pengguna']); ?></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">      
      <td width="25%"><strong>TANGGAL BAYAR</strong></td>
      <td width="25%">: <?php echo strtoupper($pembayaran['tanggal_bayar']); ?></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">      
      <td width="25%"><strong>NILAI PEMBAYARAN</strong></td>
      <td width="25%">: <?php echo 'Rp. '.number_format($pembayaran['nilai_pembayaran']); ?></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">      
      <td width="26%"><strong>KETERANGAN PEMBAYARAN</strong></td>
      <td width="74%" colspan="3">: <?php echo strtoupper($pembayaran['keterangan']); ?></td>            
    </tr>
    <tr height="30px">      
      <td width="26%"><strong>STATUS </strong></td>
      <td width="74%" colspan="3">: <?php echo strtoupper($pembayaran['nama_status_pembayaran']); ?></td>    
    </tr>
    <tr height="30px">      
      <td width="26%"></td>
      <td width="74%" colspan="3"></td>    
    </tr>
    <tr height="30px">      
      <td ></td>
      <td ></td>      
      <td colspan="2"><div align="center"><strong>PEMILIK KOST</strong></td>
    </tr>
    <tr height="30px">      
      <td align="center"><button name="cetak" type="button" id="cetak" value="Cetak" onClick="Cetakan()">CETAK BUKTI PEMBAYARAN</button></td>
      <td ></td>      
      <td colspan="2"><div align="center"><img width="200px" src="<?= base_url('assets'); ?>/images/ttdscan.png" alt="TTD PEMILIK"></div></td>
    </tr>
    <tr height="30px">      
      <td ></td>
      <td ></td>      
      <td colspan="2"><div align="center"><strong><?php echo strtoupper($pemilik['nama_pengguna']); ?></strong></td>
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
</body>

</html>