<?php
  include "../koneksi.php";

  $KodeTarif = htmlspecialchars($_POST['KodeTarif']);
  $HurufAngka = "10";
  $NoPelanggan = sprintf($HurufAngka.rand(000,999));
  $NoMeter = htmlspecialchars($_POST['NoMeter']);
  $NamaLengkap = htmlspecialchars($_POST['NamaLengkap']);
  $Telp = htmlspecialchars($_POST['Telp']);
  $Alamat = htmlspecialchars($_POST['Alamat']);

  $sql = "insert into tbpelanggan values ('','$NoPelanggan',$NoMeter,'$KodeTarif','$NamaLengkap','$Telp','$Alamat')";
  $query = mysql_query($sql);
  if($query)
  {
    $Username = $NoPelanggan;
    $Password = $NoPelanggan;
    $Level = "Pelanggan";
    $update = "insert into tblogin values('','$Username','$Password','$NamaLengkap','$Level')";
    mysql_query($update);
    echo"<script>alert('Data Berhasil Di Simpan');location.href='index.php'</script>";
  }
  else
  {
    echo"<script>alert('Data Gagal Di Simpan');location.href='index.php'</script>";
  }
?>