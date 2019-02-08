<?php

include "../koneksi.php";
if(isset($_POST['NamaPelanggan']))
{
  $kode = $_POST['NamaPelanggan'];
  $sql = "select * from tbpelanggan where KodePelanggan='$kode'";
  $query = mysql_query($sql);
  $hasil  = mysql_fetch_array($query);
  echo "<script>
  location.href='tagihan.php?kode=".$hasil['KodePelanggan']."'
  </script>";

}
else
{
$katakunci = $_POST['Keyword'];

$sql = "SELECT * FROM tbpelanggan WHERE NoPelanggan LIKE '%$katakunci%'";
$query = mysql_query($sql);
$cek = mysql_num_rows($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cari Nama Pelanggan</title>
</head>

<body>
  <center>
    <?php
    if($cek > 0)
    {
      if($katakunci == "")
      {
        echo "<h2>Tampilkan Semua Data</h2>";
        echo "<p>Pelanggan Yang Di Temukan : $cek (orang)</p>";
        while($hasil = mysql_fetch_array($query))
        {
          echo "<a href='tagihan.php?kode=".$hasil['KodePelanggan']."'>".$hasil['NamaLengkap']."</a><br>";
        }
      }
      else
      {
        echo "<h2>Tampilkan Kata Kunci '".$katakunci. "'</h2>";
        echo "<p>Pelanggan Yang Di Temukan : $cek (orang)</p>";
        while($hasil = mysql_fetch_array($query))
        {
          echo "<a href='tagihan.php?kode=".$hasil['KodePelanggan']."'>".$hasil['NamaLengkap']."</a><br>";
        }
      }
    }
    else
    {
      echo "Pelanggan Dengan Kata Kunci : '".$katakunci."' Tidak Ditemukan";
    }  
  ?>
    <br><br>
    <a href="index.php">Cari Lagi --></a>
  </center>
</body>

</html>
<?php
}
?>