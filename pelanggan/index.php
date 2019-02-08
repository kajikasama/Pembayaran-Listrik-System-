<?php
  include "../koneksi.php";
  session_start();
  if(isset($_SESSION['KodeLoginAdmin']) || isset($_SESSION['KodeLoginPetugas']))
  {
  $sql = "select * from tbpelanggan join tbtarif using(KodeTarif) order by KodePelanggan desc;";
  $query = mysql_query($sql);

  function tampilDataTarif()
  {
    $sql = "select * from tbtarif";
    $query = mysql_query($sql);
    return $query;
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data Pelanggan</title>
</head>

<body>
  <center>
    <h1>Data Pelanggan</h1>
  </center>
  <hr>
  <br>
  <form action="tambah-pelanggan.php" method="post">
    <table>
      <tr>
        <td>KodeTarif</td>
        <td>:</td>
        <td>
          <select name="KodeTarif" id="">
            <?php 
            // $sql2 = "select * from tbtarif";
            // $query2 = mysql_query($sql2);
            $datatarif = tampilDataTarif();
            while($hasil = mysql_fetch_array($datatarif)) { ?>
            <option value="<?=$hasil['KodeTarif']; ?>">Daya, Tarif, Beban :
              <?=formatHarga($hasil['Daya']); ?>Watt , Rp.
              <?=formatHarga($hasil['TarifPerKwh']); ?>, Rp.
              <?=formatHarga($hasil['Beban']); ?>
            </option>
            <?php } ?>
          </select></td>
      </tr>
      <tr>
        <td>NoMeter</td>
        <td>:</td>
        <td><input type="text" name="NoMeter" id=""></td>
      </tr>
      <tr>
        <td>NamaLengkap</td>
        <td>:</td>
        <td><input type="text" name="NamaLengkap"></td>
      </tr>
      <tr>
        <td>Telp</td>
        <td>:</td>
        <td><input type="text" name="Telp" id=""></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><input type="text" name="Alamat" id=""></td>
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
  <h3>Cari Data Pelanggan</h3>
  <form action="" method="post">
    <input type="text" name="keyword" size="30px" autocomplete="off" id="keyword" autofocus>
  </form>
  <br>
  <div id="kontainer">
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
          <?=$hasil['Daya']?>
          <br>
          Tarif : RP.
          <?=formatHarga($hasil['TarifPerKwh']);?>
          <br>
          Beban :
          <?=formatHarga($hasil['Beban']);?>
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
          <a onclick="return confirm('Yakin Hapus ?');"
            href="hapus-pelanggan.php?kode=<?=$hasil['KodePelanggan']; ?>">Hapus</a>
        </td>
      </tr>
      <?php } ?>
    </table>
  </div>
  <br>
  <hr>
  <br>
  <a href="../home.php">
    <-- Kembali Ke Menu Utama </a> <script src="script.js">
      </script>
</body>

</html>
<?php } else { echo"<script>alert('Anda Tidak Boleh Masuk');location.href='../index.php'</script>";
      }
      ?>