<?php
  include "../koneksi.php";
  $kode = $_GET['kode'];
  $query = query("select * from tblogin where KodeLogin='$kode'");
  $hasil = jadi_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <center>
    <h2>Edit Petugas</h2>
  </center>
  <form action="proses-edit-petugas.php" method="post">
    <table align="center">
      <tr>
        <td></td>
        <td></td>
        <td><input type="hidden" name="KodeLogin" id="" value="<?=$hasil['KodeLogin'];?>"></td>
      </tr>
      <tr>
        <td>Username</td>
        <td>:</td>
        <td><input type="text" name="Username" id="" required value="<?=$hasil['Username'];?>"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td>:</td>
        <td><input type="password" name="Password" id="" required value="<?=$hasil['Password'];?>"></td>
      </tr>
      <tr>
        <td>NamaLengkap</td>
        <td>:</td>
        <td><input type="text" name="NamaLengkap" id="" required value="<?=$hasil['NamaLengkap'];?>"></td>
      </tr>
      <tr>
        <td>Level</td>
        <td>:</td>
        <td><select name="Level" id="" required>
            <?php
               if($hasil['Level'] == "Admin")
               {
                 echo'
                 <option value=""> --Pilih Status-- </option>
                 <option value="Petugas">Petugas</option>
                 <option value="Admin" selected>Admin</option>
                 ';
                }
                else if($hasil['Level'] == "Petugas")
                {
                  echo'
                  <option value=""> --Pilih Status-- </option>
                  <option value="Petugas" selected>Petugas</option>
                  <option value="Admin">Admin</option>
                  ';
                }
                else
                {
                  echo'
                  <option value=""> --Pilih Status-- </option>
                  <option value="Petugas">Petugas</option>
                  <option value="Admin">Admin</option>';
               } ?>
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
</body>

</html>