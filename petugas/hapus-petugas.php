<?php
include "../koneksi.php";
$kode = $_GET['kode'];
$hapus = query("delete from tblogin where KodeLogin='$kode'");
if($hapus)
{
  echo "<script>alert('Data Berhasil Di Simpan');location.href='index.php'</script>";
}
else
{
  echo "<script>alert('Data GAGAL Di Simpan');location.href='index.php'</script>";
}

?>