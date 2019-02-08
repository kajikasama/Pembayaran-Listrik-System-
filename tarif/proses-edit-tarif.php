<?php

  include "../koneksi.php";

  $KodeTarif = $_POST['KodeTarif'];
  $Daya = $_POST['Daya'];
  $TarifPerKwh = $_POST['TarifPerKwh'];
  $Beban = $_POST['Beban'];

  $sql = "update tbtarif set KodeTarif='$KodeTarif',Daya='$Daya',TarifPerKwh='$TarifPerKwh',Beban='$Beban' where KodeTarif='$KodeTarif'";
  $query = mysql_query($sql);
  if($query)
  {
    echo"<script>alert('Data Berhasil Di Ubah');location.href='index.php'</script>";
  }
  else
  {
    echo"<script>alert('Data Gagal Di Ubah');location.href='index.php'</script>";
  }

?>