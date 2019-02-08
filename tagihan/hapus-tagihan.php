<?php
include "../koneksi.php";
$kode = $_GET['kode'];

function hapusdata()
{
  $kode = $_GET['kode'];
  $sql = "delete from tbtagihan where KodeTagihan='$kode'";
  $query = mysql_query($sql);
  return $query;
}
function cariDataTarif()
{
  $kode = $_GET['kode'];
  $sql = "select KodePelanggan from tbpelanggan inner join tbtagihan on tbpelanggan.NoPelanggan = tbtagihan.NoPelanggan where KodeTagihan='$kode'";
  $query = mysql_query($sql);
  return $query;
}
$kode2 = cariDataTarif();
$kembali = $kode2['KodePelanggan'];
$hasil = mysql_fetch_array($kode2);
// $NoPelanggan = $hasil['NoPelanggan'];
$hapus = hapusdata();
if($hapus)
{
  echo"<script>alert('data berhasil dihapus');location.href='index.php'</script>";
}
else
{
  echo"<script>alert('data berhasil dihapus');location.href='index.php'</script>";
}

?>