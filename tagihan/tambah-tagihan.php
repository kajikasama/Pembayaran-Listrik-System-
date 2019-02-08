<?php
include "../koneksi.php";
$kode = $_POST['kode'];
$huruf = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
$NoTagihan = substr(str_shuffle($huruf),0,9);
// $NoTagihan = $_POST['NoTagihan'];
$TahunTagih = $_POST['TahunTagih'];
$BulanTagih = $_POST['BulanTagih'];
$NoPelanggan = $_POST['NoPelanggan'];
$JumlahPemakaian = $_POST['JumlahPemakaian'];
function cariDataTarif()
{
  $NoPelanggan = $_POST['NoPelanggan'];
  $JumlahPemakaian = $_POST['JumlahPemakaian'];
  $sql = "select * from tbpelanggan join tbtarif using(KodeTarif) where NoPelanggan='$NoPelanggan'";
  $query = mysql_query($sql);
  $hasil = mysql_fetch_array($query);
  $datatarif = [$hasil["Daya"],$hasil["TarifPerKwh"],$hasil["Beban"]];
  $Daya = $datatarif[0];
  $Tarif = $datatarif[1];
  $Beban = $datatarif[2];
  $TotalHarga = ($Tarif * $JumlahPemakaian) + $Beban;
  return $TotalHarga;
}
$TotalHarga = cariDataTarif();
$Status = "Belum";

$tambah = "insert into tbtagihan values('','$NoTagihan','$NoPelanggan','$TahunTagih','$BulanTagih','$JumlahPemakaian','$TotalHarga','$Status')";

$query = mysql_query($tambah);
if($query)
{
  echo
  "<script>alert('Data Berhasil Di Simpan');location.href='tagihan.php?kode=$kode'</script>";
}
else
{
  echo
  "<script>alert('Data GAGAL Di Simpan');location.href='tagihan.php?kode=$kode'</script>";
}


?>