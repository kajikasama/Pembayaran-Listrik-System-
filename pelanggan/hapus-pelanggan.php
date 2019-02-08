<?php
  include "../koneksi.php";
  $kode= $_GET['kode'];
  $sql = "delete from tbpelanggan where KodePelanggan='$kode'";
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