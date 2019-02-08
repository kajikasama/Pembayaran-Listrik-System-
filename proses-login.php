<?php

include "koneksi.php";
session_start();
$Username = $_POST['Username'];
$Password = $_POST['Password'];

$sql = "SELECT * FROM tblogin WHERE Username='$Username' AND Password='$Password'";
$query = mysql_query($sql);
$cek = mysql_num_rows($query);
if($cek > 0)
{
  $hasil = mysql_fetch_array($query);
  if($hasil['Level'] == "Admin")
  {
    $_SESSION['KodeLoginAdmin'] = $hasil['KodeLogin'];
  }
  elseif($hasil['Level'] == "Petugas")
  {
    $_SESSION['KodeLoginPetugas'] = $hasil['KodeLogin'];
    
  }
  else
  {
    $_SESSION['KodeLoginPelanggan'] = $hasil['KodeLogin'];
  }
  $_SESSION['Username'] = $hasil['Username'];
  $_SESSION['Level'] = $hasil['Level']; 
  $_SESSION['NamaLengkap'] = $hasil['NamaLengkap']; 
  echo"<script>alert('Berhasil Login');location.href='home.php'</script>";
}
else
{
  echo"<script>alert('Gagal Login');
  location.href='index.php'</script>";
}

?>