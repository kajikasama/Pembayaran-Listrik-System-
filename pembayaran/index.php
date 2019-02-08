<?php
  session_start();
  include "../koneksi.php";
  $query = query("select * from tbtagihan");
  if(isset($_SESSION['KodeLoginAdmin']) || isset($_SESSION['KodeLoginPetugas']))
  {
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pembayaran Tagihan</title>
</head>

<body>
  <h2>Form Input Data Pembayaran</h2>
  <hr>
  <br>
  <table>
    <form action="tambah-pembayaran.php" method="post">
      <tr>
        <td>Pilih No Tagihan</td>
        <td>:</td>
        <td>
          <select name="NoTagihan" id="">
            <?php while($hasil = jadi_array($query)){ ?>
            <option value="<?=$hasil['KodeTagihan']; ?>">
              <?=$hasil['NoTagihan']; ?>
            </option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>TglBayar</td>
        <td>:</td>
        <td><input type="date" name="TglBayar" id=""></td>
      </tr>
      <tr>
        <td>JumlahTagihan</td>
        <td>:</td>
        <td><input type="text" name="JumlahTagihan" id=""></td>
      </tr>
      <tr>
        <td>Upload BuktiPembayaran</td>
        <td>:</td>
        <td><input type="file" name="BuktiPembayaran" id=""></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input type="submit" value="kirim">
          <input type="reset" value="batal"></td>
      </tr>
    </form>
  </table>
  <a href="../home.php">Kembali Ke Menuutama</a>
</body>

</html>
<?php
}
elseif(isset($_SESSION['KodeLoginPelanggan']))
{
  $NoPelanggan = $_SESSION['Username'];
  $query2 = query("select * from tbtagihan where NoPelanggan='$NoPelanggan'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pembayaran Tagihan</title>
</head>

<body>
  <h2>Form Input Data Pembayaran</h2>
  <hr>
  <br>
  <table>
    <form action="tambah-pembayaran.php" method="post">
      <tr>
        <td>Pilih No Tagihan</td>
        <td>:</td>
        <td>
          <select name="NoTagihan" id="">
            <?php while($hasil = jadi_array($query2)){ ?>
            <option value="<?=$hasil['KodeTagihan']; ?>">
              <?=$hasil['NoTagihan']; ?>
            </option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>TglBayar</td>
        <td>:</td>
        <td><input type="date" name="TglBayar" id=""></td>
      </tr>
      <tr>
        <td>JumlahTagihan</td>
        <td>:</td>
        <td><input type="text" name="JumlahTagihan" id=""></td>
      </tr>
      <tr>
        <td>Upload BuktiPembayaran</td>
        <td>:</td>
        <td><input type="file" name="BuktiPembayaran" id=""></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input type="submit" value="kirim">
          <input type="reset" value="batal"></td>
      </tr>
    </form>
  </table>
  <a href="../home.php">Kembali Ke Menuutama</a>
</body>

</html>

<?php  
}
else
{
  echo "
  <script>
  alert('Anda Tidak Boleh Masuk');
  location.href = '../index.php';
  </script>";
}
?>