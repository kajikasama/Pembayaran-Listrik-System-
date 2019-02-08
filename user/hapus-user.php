<?php
include "../koneksi.php";
$kode = $_GET['kode'];
$sql = "DELETE FROM tblogin WHERE KodeLogin='$kode'";
$hapus= mysql_query($sql);
if($hapus)
{
  echo
  "<script>
  alert('Data Berhasil DI Hapus');
  location.href='index.php'</script>";
}
else
{
  echo
  "<script>
  alert('Data GAGAL DI Hapus');
  location.href='index.php'</script>";
}

?>