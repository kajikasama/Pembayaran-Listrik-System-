<?php

  include "../koneksi.php";

  $Daya = $_POST['Daya'];
  $TarifPerKwh = $_POST['TarifPerKwh'];
  $Beban = $_POST['Beban'];

  $sql = "insert into tbtarif values ('','$Daya','$TarifPerKwh','$Beban')";
  $query = mysql_query($sql);
  if($query)
  {
    echo"<script>alert('Data Berhasil Di Simpan');location.href='index.php'</script>";
  }
  else
  {
    echo"<script>alert('Data Gagal Di Simpan');location.href='index.php'</script>";
  }

?>