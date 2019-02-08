<?php
  include "../koneksi.php";
  $kode = $_GET['kode'];
  $sql = "delete from tbtarif where KodeTarif='$kode'";

  $query = mysql_query($sql);
  $sqltest = "SELECT * FROM tbpelanggan JOIN tbtarif USING(KodeTarif) WHERE KodeTarif='$kode'";
  $coba = mysql_query($sqltest);
  $hasil = mysql_num_rows($coba);

  if($query)
  {
    echo"<script>alert('Data Berhasil Di Hapus');location.href='index.php'</script>";
  }
  else if($hasil > 0)
  {
    echo"<script>alert('Data Gagal Di Hapus Karena Tabel tbpelanggan Masih Terkait Dengan Tabel tbtarif ');location.href='index.php'</script>";
  }
  else
  {
    echo"<script>alert('Data Gagal Di Hapus ');location.href='index.php'</script>";
  }
?>