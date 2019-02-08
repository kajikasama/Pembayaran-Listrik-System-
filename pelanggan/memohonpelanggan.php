<?php
include "../koneksi.php";

$keyword = $_GET['keyword'];

$sql = "select * from tbpelanggan join tbtarif using(KodeTarif) where KodePelanggan like '%$keyword%' or NoPelanggan like '%$keyword%' or NoMeter like '%$keyword%' or KodeTarif like '%$keyword%' or NamaLengkap like '%$keyword%' or Telp like '%$keyword%' or Alamat like '%$keyword%'";
$query = mysql_query($sql); ?>
<table border="1px" width="100%">
  <tr align="center">
    <!-- <td>KodePelanggan</td> -->
    <td>NoPelanggan</td>
    <td>NoMeter</td>
    <td>Tarif</td>
    <td>NamaLengkap</td>
    <td>Telp</td>
    <td>Alamat</td>
    <td colspan="2">Aksi</td>
  </tr>
  <?php while($hasil = mysql_fetch_array($query)){ ?>
  <tr>
    <!-- <td>
        <?php //$hasil['KodePelanggan'];?>
      </td> -->
    <td>
      <?=$hasil['NoPelanggan'];?>
    </td>
    <td>
      <?=$hasil['NoMeter'];?>
    </td>
    <td>
      Daya :
      <?=$hasil['Daya'];?>
      <br>
      Tarif : RP.
      <?=$hasil['TarifPerKwh'];?>
      <br>
      Beban :
      <?=$hasil['Beban'];?>
      <br>
    </td>
    <td>
      <?=$hasil['NamaLengkap'];?>
    </td>
    <td>
      <?=$hasil['Telp'];?>
    </td>
    <td>
      <?=$hasil['Alamat'];?>
    </td>
    <td>
      <a href="edit-pelanggan.php?kode=<?=$hasil['KodePelanggan']; ?>">Edit</a>
      <a onclick="return confirm('Yakin Hapus ?');" href="hapus-pelanggan.php?kode=<?=$hasil['KodePelanggan']; ?>">Hapus</a>
    </td>
  </tr>
  <?php } ?>
</table>