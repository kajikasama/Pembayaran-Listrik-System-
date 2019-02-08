<?php
  include "../koneksi.php";
  $KodePelanggan = $_POST['KodePelanggan'];
  $KodeTarif = $_POST['KodeTarif'];
  $NoPelanggan = $_POST['NoPelanggan'];
  $NoMeter = $_POST['NoMeter'];
  $NamaLengkap = $_POST['NamaLengkap'];
  $Telp = $_POST['Telp'];
  $Alamat = $_POST['Alamat'];

  $sql = "update tbpelanggan set KodePelanggan='$KodePelanggan',KodeTarif='$KodeTarif',NoPelanggan='$NoPelanggan',NoMeter='$NoMeter',NamaLengkap='$NamaLengkap',Telp='$Telp',Alamat='$Alamat' where KodePelanggan='$KodePelanggan'";
  $query = mysql_query($sql);
  if($query)
  {
    echo"<script>alert('Data Berhasil Di Edit');location.href='index.php'</script>";
  }
  else
  {
    echo"<script>alert('Data Gagal Di Edit');location.href='index.php'</script>";
  }
?>