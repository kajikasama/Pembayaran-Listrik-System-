<?php
include "../koneksi.php";
$KodeTagihan = $_GET['KodeTagihan'];
$query = query("select * from tbtagihan inner join tbpelanggan where KodeTagihan='$KodeTagihan'");
$hasil = jadi_array($query);

if($hasil['Status'] == "Belum")
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cetak Nota</title>
</head>

<body>
  <fieldset align="" style="width:90%;margin:0 auto;height:500px;">
    <h2 align="center">Nota Pembayaran Listrik Pasca Bayar</h2>
    <table>
      <tr>
        <td>Nama Pelanggan</td>
        <td>:</td>
        <td>
          <?=$hasil['NamaLengkap']; ?>
        </td>
      </tr>
      <tr>
        <td>No Meter</td>
        <td>:</td>
        <td>
          <?=$hasil['NoMeter']; ?>
        </td>
      </tr>
    </table>
    <table align="center" border="1px" width="90%">
      <tr>
        <td>No Tagihan</td>
        <td>Bulan</td>
        <td>Tahun</td>
        <td>Jumlah Pemakaian</td>
        <td>Total Bayar</td>
      </tr>
      <tr>
        <td>
          <?=$hasil['NoTagihan']; ?>
        </td>
        <td>
          <?=$hasil['BulanTagih']; ?>
        </td>
        <td>
          <?=$hasil['TahunTagih']; ?>
        </td>
        <td>
          <?=$hasil['JumlahPemakaian']; ?>
        </td>
        <td>
          <?=$hasil['TotalBayar']; ?>
        </td>
      </tr>
    </table>
    <br>
    <p>
      Silahkan melakukan pembayaran sejumlah biaya diatas pada Bank BCA dengan No Rek. 123456 Atas Nama PT. PLN
      Distribusi Bali.
      <br>
      <br>
      Denpasar, .....
      <br> Admin</p>
  </fieldset>
  <a href="javascript:window.print();">Cetak</a>
  <br>
  <a href="index.php">Kembali Ke Menu Tagihan</a>
</body>

</html>
<?php }
else
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cetak Nota</title>
</head>

<body>
  <fieldset align="" style="width:90%;margin:0 auto;height:500px;">
    <h2>Nota Pembayaran Listrik Pasca Bayar</h2>
    <tr>
      <td>Nama Pelanggan</td>
      <td>:</td>
      <td>
        <?=$hasil['NamaLengkap']; ?>
      </td>
    </tr>
    <tr>
      <td>No Meter</td>
      <td>:</td>
      <td>
        <?=$hasil['NoMeter']; ?>
      </td>
    </tr>
    </table>
    <br>
    <table align="center" border="1px" width="90%">
      <tr>
        <td>No Tagihan</td>
        <td>Bulan</td>
        <td>Tahun</td>
        <td>Jumlah Pemakaian</td>
        <td>Total Bayar</td>
        <td>Status</td>
      </tr>
      <tr>
        <td>
          <?=$hasil['NoTagihan']; ?>
        </td>
        <td>
          <?=$hasil['BulanTagih']; ?>
        </td>
        <td>
          <?=$hasil['TahunTagih']; ?>
        </td>
        <td>
          <?=$hasil['JumlahPemakaian']; ?>
        </td>
        <td>
          <?=$hasil['TotalBayar']; ?>
        </td>
        <td>
          <?=$hasil['Status']; ?>
        </td>
      </tr>
    </table>
    <br>
    <p>
      Terima kasih sudah melakukan pembayaran.

      Denpasar, .....
      Admin</p>
  </fieldset>
  <a href="javascript:window.print();">Cetak</a>
  <br>
  <a href="index.php">Kembali Ke Menu Tagihan</a>

</body>

</html>
<?php
}
?>