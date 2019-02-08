<?php
include "../koneksi.php";

$Username = $_POST['Username'];
$Password = $_POST['Password'];
$NamaLengkap = $_POST['NamaLengkap'];
$Level = $_POST['Level'];

$sql = "INSERT INTO tblogin VALUES ('','$Username','$Password','$NamaLengkap','$Level')";
$query = mysql_query($sql);
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