<?php
  session_start();
  if(isset($_SESSION['KodeLoginAdmin']) || isset($_SESSION['KodeLoginPetugas']))
  {
  include "../koneksi.php";
  $sql = "select * from tbtarif";
  $query = mysql_query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tampil Data Tarif</title>
</head>

<body>
  <center>
    <h2>Data Tarif</h2>
  </center>
  <form method="post" action="proses-simpan-tarif.php">
    <table>
      <tr>
        <td>Daya</td>
        <td>:</td>
        <td><input type="text" name="Daya" id=""></td>
      </tr>
      <tr>
        <td>TarifPerKwh</td>
        <td>:</td>
        <td><input type="text" name="TarifPerKwh" id=""></td>
      </tr>
      <tr>
        <td>Beban</td>
        <td>:</td>
        <td><input type="text" name="Beban" id=""></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input type="submit" value="tambah" id="">
          <input type="reset" value="hapus" id="">
        </td>
      </tr>
    </table>
  </form>
  <hr>
  <br>
  <table border="1px" width="100%">
    <tr>
      <td>Daya</td>
      <td>TarifPerKwh</td>
      <td>Beban</td>
      <td>Aksi</td>
    </tr>
    <?php while($hasil = mysql_fetch_array($query)){ ?>
    <tr>
      <td>
        <?=$hasil['Daya']; ?> (Watt)
      </td>
      <td>
        RP.
        <?= formatHarga($hasil['TarifPerKwh']); ?>
      </td>
      <td>RP.
        <?php
        $beban = $hasil['Beban'];
        echo formatHarga($beban);
        ?>
      </td>
      <td>
        <a href="edit-tarif.php?kode=<?=$hasil['KodeTarif']; ?>">Edit</a>
        <a onclick="return confirm('Yakin Hapus ?');" href="hapus-tarif.php?kode=<?=$hasil['KodeTarif']; ?>">Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </table>
  <br>
  <hr>
  <br>
  <a href="../home.php">
    <-- Kembali Ke Menu Utama</a> </body> </html>
      <?php } else { echo"<script>alert('Anda Tidak Boleh
      Masuk');location.href='index.php'</script>";
      }
      ?>