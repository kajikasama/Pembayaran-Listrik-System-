<?php
session_start();
if(isset($_SESSION['KodeLogin']))
{
include "../koneksi.php";
$kode = $_GET['kode'];
$sql = "select * from tbtarif where KodeTarif='$kode'";
$query = mysql_query($sql);
$hasil = mysql_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Data Tarif</title>
</head>

<body>
  <center>
    <h2>Edit Data Tarif</h2>
  </center>
  <hr>
  <form method="post" action="proses-edit-tarif.php">
    <table>
      <tr>
        <td></td>
        <td></td>
        <td><input type="hidden" name="KodeTarif" id="" value="<?=$hasil['KodeTarif'] ?>"></td>
      </tr>
      <tr>
        <td>Daya</td>
        <td>:</td>
        <td><input type="text" name="Daya" id="" value="<?=$hasil['Daya'] ?>"></td>
      </tr>
      <tr>
        <td>TarifPerKwh</td>
        <td>:</td>
        <td><input type="text" name="TarifPerKwh" id="" value="<?=$hasil['TarifPerKwh'] ?>"></td>
      </tr>
      <tr>
        <td>Beban</td>
        <td>:</td>
        <td><input type="text" name="Beban" id="" value="<?=$hasil['Beban'] ?>"></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input onclick="return confirm('Apakah Anda Ingin Mengubahnya ?');" type="submit" value="ubah" id="">
          <input type="reset" value="hapus" id="">
        </td>
      </tr>
    </table>
  </form>
  <br>
  <hr>
  <a onclick="return confirm('Tidak Jadi Di Edit ??');" href="index.php">
    <--Kembali Ke Menu Utama</a> </body> </html> <?php } else { echo"<script>alert('Anda Tidak Boleh
      Masuk');location.href='index.php'</script>";
      }
      ?>