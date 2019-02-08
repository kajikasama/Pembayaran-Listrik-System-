<?php
  include "../koneksi.php";
  session_start();
  if(isset($_SESSION['KodeLogin']))
  {
    $sql = "SELECT * FROM tblogin";
    $query = mysql_query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data User</title>
</head>

<body>
  <center>
    <h2>Input Data User</h2>
  </center>
  <hr>
  <form method="post" action="proses-tambah-user.php">
    <table>
      <tr>
        <td>Username</td>
        <td>:</td>
        <td><input type="text" name="Username" id=""></td>
      </tr>
      <tr>
        <td>Password</td>
        <td>:</td>
        <td><input type="password" name="Password" id=""></td>
      </tr>
      <tr>
        <td>NamaLengkap</td>
        <td>:</td>
        <td><input type="text" name="NamaLengkap" id=""></td>
      </tr>
      <tr>
        <td>Level</td>
        <td>:</td>
        <td>
          <select name="Level" id="" required>
            <option value="">-- Pilih Level --</option>
            <option value="User">User</option>
            <option value="Staff">Staff</option>
            <option value="Admin">Admin</option>
          </select>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>
          <input type="submit" value="Tambah">
          <input type="reset" value="Hapus">
        </td>
      </tr>
    </table>
  </form>
  <hr>
  <br>
  <table border="1px" width="100%">
    <tr align="center">
      <!-- <td>KodeLogin</td> -->
      <td>
        <b>Username</b>
      </td>
      <td>
        <b>
          Password
        </b>
      </td>
      <td>
        <b>
          NamaLengkap
        </b>
      </td>
      <td>
        <b>
          Level
        </b>
      </td>
      <td colspan="2">
        <b>
          Aksi
        </b>
      </td>
    </tr>
    <?php while ($hasil = mysql_fetch_array($query)) 
    {
    ?>
    <tr align="center">
      <td>
        <?=$hasil['Username'] ?>
      </td>
      <td>
        <?php
          $pass = strlen($hasil['Password']);
          for($i = 1; $i <= $pass; $i++)
          {
            echo "*";
          }
        ?>
      </td>
      <td>
        <?=$hasil['NamaLengkap'] ?>
      </td>
      <td>
        <?=$hasil['Level'] ?>
      </td>
      <td>
        <a href="edit-user.php?kode=<?=$hasil['KodeLogin']; ?>">Edit</a>
      </td>
      <td>
        <a onclick="return confirm('Yakin Hapus ??');" href="hapus-user.php?kode=<?=$hasil['KodeLogin']; ?>">Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </table>
  <center>
    <?php $hitung = mysql_num_rows($query); ?>
    <p>Total User : <b>
        <?=$hitung ?> Orang</b>
    </p>
  </center>
</body>

</html>
<?php
  }
  else
  {
    echo"
    <script>
    alert('Anda Tidak Boleh Masuk');
    location.href='../index.php';
    </script>";
  }
?>