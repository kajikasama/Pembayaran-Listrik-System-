<?php
  session_start();
  if(isset($_SESSION['KodeLoginAdmin']) || isset($_SESSION['KodeLoginPetugas']))
  {
  include "../koneksi.php";
  $kode = $_GET['kode'];
  $sql = "select * from tbpelanggan join tbtarif using(Kodetarif) where KodePelanggan='$kode';";
  $query = mysql_query($sql);
  $hasil = mysql_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Pelanggan</title>
</head>

<body>
  <center>
    <h1>Edit Data Pelanggan</h1>
  </center>
  <hr>
  <br>
  <form action="proses-edit-pelanggan.php" method="post">
    <table>
      <tr>
        <td></td>
        <td></td>
        <td><input type="hidden" value="<?=$hasil['KodePelanggan'] ?>" name="KodePelanggan" id="" readonly></td>
      </tr>
      <tr>
        <td>KodeTarif</td>
        <td>:</td>
        <td>
          <select name="KodeTarif" id="" required>
            <?php 
            $sql2 = "select * from tbtarif";
            $query2 = mysql_query($sql2);
            ?>
            <option value="" selected>-- Daya, Tarif, Beban :
              <?=$hasil['Daya']; ?>Watt , Rp.
              <?=$hasil['TarifPerKwh']; ?>,
              <?=$hasil['Beban']; ?>Ohm --
            </option>
            <?php while($hasil2 = mysql_fetch_array($query2)) { ?>
            <option value="<?=$hasil2['KodeTarif']; ?>">Daya, Tarif, Beban :
              <?=$hasil2['Daya']; ?>Watt , Rp.
              <?=$hasil2['TarifPerKwh']; ?>,
              <?=$hasil2['Beban']; ?>Ohm
            </option>
            <?php } ?>
          </select></td>
      </tr>
      <tr>
        <td>NoPelanggan</td>
        <td>:</td>
        <td><input type="text" value="<?=$hasil['NoPelanggan'] ?>" name="NoPelanggan" id="" readonly></td>
      </tr>
      <tr>
        <td>NoMeter</td>
        <td>:</td>
        <td><input type="text" name="NoMeter" value="<?=$hasil['NoMeter']; ?>" readonly></td>
      </tr>
      <tr>
        <td>NamaLengkap</td>
        <td>:</td>
        <td><input type="text" name="NamaLengkap" value="<?=$hasil['NamaLengkap'] ?>"></td>
      </tr>
      <tr>
        <td>Telp</td>
        <td>:</td>
        <td><input type="text" name="Telp" value="<?=$hasil['Telp'] ?>"></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><input type="text" name="Alamat" value="<?=$hasil['Alamat'] ?>"></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input onclick="return confirm('Yakin Ingin Mengubah Data ??');" type="submit" value="ubah" id="">
          <input type="reset" value="ubah seperti semula" id="">
        </td>
      </tr>
    </table>
  </form>
  <br>
  <hr>
  <a onclick="return confirm('Tidak Jadi Di Edit ??');" href="index.php">
    Kembali Ke Menu Utama</a>
</body>

</html>
<?php } else { echo"<script>alert('Anda Tidak Boleh Masuk');location.href='../index.php'</script>";
      }
      ?>