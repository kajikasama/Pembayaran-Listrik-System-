<?php
  include "../koneksi.php";
  $sql = query("select * from tblogin where Level='Admin' or Level='Petugas'");
  $sql2 = query("select * from tblogin where Level='Pelanggan'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Input Petugas</title>
</head>

<body>
  <center>
    <h1>Input Petugas</h1>
  </center>
  <hr>
  <form action="tambah-petugas.php" method="post">
    <table align="center">
      <tr>
        <td>Username</td>
        <td>:</td>
        <td><input type="text" name="Username" id="" required></td>
      </tr>
      <tr>
        <td>Password</td>
        <td>:</td>
        <td><input type="password" name="Password" id="" required></td>
      </tr>
      <tr>
        <td>NamaLengkap</td>
        <td>:</td>
        <td><input type="text" name="NamaLengkap" id="" required></td>
      </tr>
      <tr>
        <td>Level</td>
        <td>:</td>
        <td><select name="Level" id="" required>
            <option value="">-- Pilih Nama Petugas --</option>
            <option value="Admin">Admin</option>
            <option value="Petugas">Petugas</option>
          </select></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><button type="submit">Tambah</button>
          <input type="reset" value="hapus"></td>
      </tr>
    </table>
  </form>
  <br>
  <hr>
  <center>
    <h2>Data Login Petugas</h2>
  </center>
  <table align="center" border="1px" width="100%">
    <tr>
      <!-- <td>KodeLogin</td> -->
      <td>Username</td>
      <td>Password</td>
      <td>NamaLengkap</td>
      <td>Level</td>
      <td colspan="2">Aksi</td>
    </tr>
    <?php while($hasil = mysql_fetch_array($sql)){ ?>
    <tr>
      <!-- <td>
      </td> -->
      <td>
        <?=$hasil['Username'];?>
      </td>
      <td>
        <?php
        $pass = strlen($hasil['Password']);
        for($i=1;$i<=$pass;$i++)
        {
          echo"*";
        }
        ?>
      </td>
      <td>
        <?=$hasil['NamaLengkap'];?>
      </td>
      <td>
        <?=$hasil['Level'];?>
      </td>
      <td>
        <a href="edit-petugas.php?kode=<?=$hasil['KodeLogin'] ?>">Edit</a>
      </td>
      <td>
        <a onclick="confirm('Yakin Hapus');" href="hapus-petugas.php?kode=<?=$hasil['KodeLogin']; ?>">Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </table>
  <br>
  <center>
    <h2>Data Login Pelanggan</h2>
  </center>
  <table align="center" border="1px" width="100%">
    <tr>
      <!-- <td>KodeLogin</td> -->
      <td>Username</td>
      <td>Password</td>
      <td>NamaLengkap</td>
      <td>Level</td>
      <td colspan="2">Aksi</td>
    </tr>
    <?php while($hasil = mysql_fetch_array($sql2)){ ?>
    <tr>
      <!-- <td>
      </td> -->
      <td>
        <?=$hasil['Username'];?>
      </td>
      <td>
        <?php
        $pass = strlen($hasil['Password']);
        for($i=1;$i<=$pass;$i++)
        {
          echo"*";
        }
        ?>
      </td>
      <td>
        <?=$hasil['NamaLengkap'];?>
      </td>
      <td>
        <?=$hasil['Level'];?>
      </td>
      <td>
        <a href="edit-petugas.php?kode=<?=$hasil['KodeLogin'] ?>">Edit</a>
      </td>
      <td>
        <a onclick="confirm('Yakin Hapus');" href="hapus-petugas.php?kode=<?=$hasil['KodeLogin']; ?>">Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </table>
  <br>
  <a href="../home.php">
    <-- Kembali Ke Menuutama</a> </body> </html>