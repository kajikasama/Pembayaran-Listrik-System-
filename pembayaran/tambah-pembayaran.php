<?php

include "../koneksi.php";
// NoTagihan
// TglBayar
// JumlahTagihan
// BuktiPembayaran
$NoTagihan = $_POST['NoTagihan'];
$TglBayar = $_POST['TglBayar'];
$JumlahTagihan = $_POST['JumlahTagihan'];
$BuktiPembayaran = $_POST['BuktiPembayaran'];
$Status = "";
$query = query("insert into tbpembayaran values ('','$NoTagihan','$TglBayar','$JumlahTagihan','$BuktiPembayaran','$Status')");
if($query)
{
  echo "<script>
  alert('Data Berhasil Di Simpan');
  location.href='index.php';
  </script>";
}
else
{
  echo "<script>
  alert('Data GAGAL Di Simpan');
  location.href='index.php';
  </script>";

}

?>