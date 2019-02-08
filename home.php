<?php
include "koneksi.php";
session_start();
if(isset($_SESSION['KodeLoginAdmin']))
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Utama Pembayaran Listrik Pasca Bayar</title>
</head>

<body>
  <?php
    
  function dataTarif()
  {
    $sql = "SELECT * FROM tbtarif";
    $query = mysql_query($sql);
    $hasil = mysql_num_rows($query);
    return $hasil;
  }
  function dataPelanggan()
  {
    $sql = "SELECT * FROM tbpelanggan";
    $query = mysql_query($sql);
    $hasil = mysql_num_rows($query);
    return $hasil;
  }
  function dataLogin()
  {
    $sql = "SELECT * FROM tblogin";
    $query = mysql_query($sql);
    $hasil = mysql_num_rows($query);
    return $hasil;
  }
  function dataTagihan()
  {
    $sql = "SELECT * FROM tbtagihan";
    $query = mysql_query($sql);
    $hasil = mysql_num_rows($query);
    return $hasil;
  }
  function dataPembayaran()
  {
    $sql = "SELECT * FROM tbpembayaran";
    $query = mysql_query($sql);
    $hasil = mysql_num_rows($query);
    return $hasil;
  }
?>
  <center>
    <h1>Selamat Datang Di Halaman Utama Pembayaran Listrik Pasca Bayar</h1>
  </center>
  <hr>
  <br>
  Nama :
  <?=$_SESSION['Username'];?>
  <br>
  Level :
  <?=$_SESSION['Level']; ?>
  <br>
  <br>
  <table border="1px" width="100%" align="center">
    <tr>
      <td colspan="5">
        <center>
          Dashboard
        </center>
      </td>
    </tr>
    <tr>
      <td>
        <center>
          Jumlah Data Tarif :
          <?=dataTarif(); ?>
        </center>
      </td>
      <td>
        <center>
          Jumlah Data Pelanggan :
          <?=dataPelanggan(); ?>
        </center>
      </td>
      <td>
        <center>
          Jumlah Data Tagihan :
          <?=dataTagihan(); ?>
        </center>
      </td>
      <td>
        <center>
          Jumlah Data Pembayaran :
          <?php
            if(dataPembayaran() == 0)
            {
              echo "<apamen style='color:red'>Belum Ada Data</apamen>";
            }
            else
            {
              echo dataPelanggan();
            }
          ?>
        </center>
      </td>
      <td>
        <center>
          Jumlah Data Login :
          <?php
          $datalogin = dataLogin();
          if($datalogin == 0)
          {
            echo "Belum Ada Data";
          }
          else
          {
            echo $datalogin;
          }
          ?>
        </center>
      </td>
    </tr>
  </table>
  <br>
  <br>
  <table width="100%" border="1px" align="center">
    <tr align="center">
      <td colspan="7">Menuutama</td>
    </tr>
    <tr align="center">
      <td><a href="tarif/index.php">Input Tarif</a></td>
      <td><a href="pelanggan/index.php">Input Pelanggan</a></td>
      <td><a href="tagihan/index.php">Tagihan</a></td>
      <td><a href="pembayaran/index.php">Pembayaran</a></td>
      <td><a href="petugas/index.php">Input Petugas</a></td>
      <td><a onclick="return confirm('Yakin Ingin Keluar ?');" href="logout.php">Log Out</a></td>
  </table>
</body>

</html>
<?php }
elseif(isset($_SESSION['KodeLoginPetugas']))
{ ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Utama Pembayaran Listrik Pasca Bayar</title>
</head>

<body>
  <?php
    
  function dataTarif()
  {
    $sql = "SELECT * FROM tbtarif";
    $query = mysql_query($sql);
    $hasil = mysql_num_rows($query);
    return $hasil;
  }
  function dataPelanggan()
  {
    $sql = "SELECT * FROM tbpelanggan";
    $query = mysql_query($sql);
    $hasil = mysql_num_rows($query);
    return $hasil;
  }
  function dataLogin()
  {
    $sql = "SELECT * FROM tblogin";
    $query = mysql_query($sql);
    $hasil = mysql_num_rows($query);
    return $hasil;
  }
  function dataTagihan()
  {
    $sql = "SELECT * FROM tbtagihan";
    $query = mysql_query($sql);
    $hasil = mysql_num_rows($query);
    return $hasil;
  }
  function dataPembayaran()
  {
    $sql = "SELECT * FROM tbpembayaran";
    $query = mysql_query($sql);
    $hasil = mysql_num_rows($query);
    return $hasil;
  }
?>
  <center>
    <h1>Selamat Datang Di Halaman Utama Pembayaran Listrik Pasca Bayar</h1>
  </center>
  <hr>
  <br>
  Nama :
  <?=$_SESSION['Username'];?>
  <br>
  Level :
  <?=$_SESSION['Level']; ?>
  <br>
  <br>
  <table border="1px" width="100%" align="center">
    <tr>
      <td colspan="5">
        <center>
          Dashboard
        </center>
      </td>
    </tr>
    <tr>
      <td>
        <center>
          Jumlah Data Tarif :
          <?=dataTarif(); ?>
        </center>
      </td>
      <td>
        <center>
          Jumlah Data Pelanggan :
          <?=dataPelanggan(); ?>
        </center>
      </td>
      <td>
        <center>
          Jumlah Data Tagihan :
          <?=dataTagihan(); ?>
        </center>
      </td>
      <td>
        <center>
          Jumlah Data Pembayaran :
          <?php
            if(dataPembayaran() == 0)
            {
              echo "<apamen style='color:red'>Belum Ada Data</apamen>";
            }
            else
            {
              echo dataPelanggan();
            }
          ?>
        </center>
      </td>
      <td>
        <center>
          Jumlah Data Login :
          <?php
          $datalogin = dataLogin();
          if($datalogin == 0)
          {
            echo "Belum Ada Data";
          }
          else
          {
            echo $datalogin;
          }
          ?>
        </center>
      </td>
    </tr>
  </table>
  <br>
  <br>
  <table width="100%" border="1px" align="center">
    <tr align="center">
      <td colspan="7">Menuutama</td>
    </tr>
    <tr align="center">
      <td><a href="tarif/index.php">Input Tarif</a></td>
      <td><a href="pelanggan/index.php">Input Pelanggan</a></td>
      <td><a href="tagihan/index.php">Tagihan</a></td>
      <td><a href="pembayaran/index.php">Pembayaran</a></td>
      <td><a onclick="return confirm('Yakin Ingin Keluar ?');" href="logout.php">Log Out</a></td>
  </table>
</body>

</html>

<?php  
}
elseif(isset($_SESSION['KodeLoginPelanggan']))
{
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Utama Pembayaran Listrik Pasca Bayar</title>
</head>

<body>
  <?php
    
  function dataTarif()
  {
    $sql = "SELECT * FROM tbtarif";
    $query = mysql_query($sql);
    $hasil = mysql_num_rows($query);
    return $hasil;
  }
  function dataPelanggan()
  {
    $sql = "SELECT * FROM tbpelanggan";
    $query = mysql_query($sql);
    $hasil = mysql_num_rows($query);
    return $hasil;
  }
  function dataLogin()
  {
    $sql = "SELECT * FROM tblogin";
    $query = mysql_query($sql);
    $hasil = mysql_num_rows($query);
    return $hasil;
  }
  function dataTagihan()
  {
    $sql = "SELECT * FROM tbtagihan";
    $query = mysql_query($sql);
    $hasil = mysql_num_rows($query);
    return $hasil;
  }
  function dataPembayaran()
  {
    $sql = "SELECT * FROM tbpembayaran";
    $query = mysql_query($sql);
    $hasil = mysql_num_rows($query);
    return $hasil;
  }
?>
  <center>
    <h1>Selamat Datang Di Halaman Utama Pembayaran Listrik Pasca Bayar</h1>
  </center>
  <hr>
  <br>
  Nama :
  <?=$_SESSION['Username'];?>
  <br>
  Level :
  <?=$_SESSION['Level']; ?>
  <br>
  NamaPelanggan :
  <?=$_SESSION['NamaLengkap']; ?>
  <br>
  <br>
  <table width="100%" border="1px" align="center">
    <tr align="center">
      <td colspan="7">Menuutama</td>
    </tr>
    <tr align="center">
      <td><a href="tagihan/index.php">Tagihan</a></td>
      <td><a href="pembayaran/index.php">Pembayaran</a></td>
      <td><a onclick="return confirm('Yakin Ingin Keluar ?');" href="logout.php">Log Out</a></td>
  </table>
</body>

</html>

<?php  
}
else
{
  echo"<script>alert('Anda Tidak Boleh Masuk');location.href='index.php'</script>";
}
?>