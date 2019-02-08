<?php
session_start();
include "../koneksi.php";
function tampilDataPelanggan()
{
  $sql = "SELECT * FROM tbpelanggan";
  $query = mysql_query($sql);
  return $query;
}
if(isset($_SESSION['KodeLoginAdmin']) || isset($_SESSION['KodeLoginPetugas']))
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cari Data Pelanggan</title>
</head>

<body>
  <center>
    <h2>Cari Data Pelanggan ..</h2>
    <form method="post" action="cari.php">
      <fieldset>
        <legend>Cari NoPelanggan</legend>
        <input autocomplete="off" type="text" name="Keyword" id="">
        <input type="submit" value="cari">
      </fieldset>
    </form>
    <br>Atau <br><br>
    <form method="post" action="cari.php">
      <fieldset>
        <legend>Cari Yang Dipilih</legend>
        <select name="NamaPelanggan" required>
          <option value="">- Pilih Nama Pelanggan -</option>
          <?php 
        $data = tampilDataPelanggan();
        while($hasil = mysql_fetch_array($data)) {?>
          <option value="<?=$hasil['KodePelanggan']?>">
            <?=$hasil['NamaLengkap'] ?>
          </option>
          <?php } ?>
          <input type="submit" value="Cari">
        </select>
    </form>
    </fieldset>
  </center>
  <a href="../home.php"><br>
    Kembali Ke Menuutama</a>
</body>

</html>
<?php
}
elseif(isset($_SESSION['KodeLoginPelanggan']))
{
  $NoPelanggan = $_SESSION['Username'];
  $query = query("select * from tbpelanggan where NoPelanggan='$NoPelanggan'");
  $hasil2 = jadi_array($query);  

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
    <h2>Data Pelanggan ..</h2>
    <form method="post" action="cari.php">
      <fieldset>
        <legend>NoPelanggan</legend>
        <input readonly value="<?=$hasil2['NoPelanggan']; ?>" autocomplete="off" type="text" name="Keyword" id="">
        <input type="submit" value="cari">
      </fieldset>
    </form>
  </center>
  <a href="../home.php"><br>
    Kembali Ke Menuutama</a>
</body>

</html>

<?php  
}
else
{
  echo"<script>alert('Anda Tidak Boleh Masuk !');location.href='../index.php'</script>";
}
?>