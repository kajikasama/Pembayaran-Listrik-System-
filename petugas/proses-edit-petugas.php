<?php

include "../koneksi.php";
// Username
// Password
// NamaLengkap
$KodeLogin = $_POST['KodeLogin'];
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$NamaLengkap = $_POST['NamaLengkap'];
$Level = $_POST['Level'];
$update = query("update tblogin set KodeLogin='$KodeLogin',Username='$Username',Password='$Password',NamaLengkap='$NamaLengkap',Level='$Level' where KodeLogin='$KodeLogin'");

if($update)
{
  echo "<script>alert('Data Berhasil Di Update');location.href='index.php'</script>";
}
else
{
  echo "<script>alert('Data GAGAL Di Update');location.href='index.php'</script>";
}

?>