<?php
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Data Pembayaran Listrik</title>
</head>

<body>
  <center>
    <h2>Login Data Pembayaran Listrik Pasca Bayar</h2>
    <hr>
  </center>
  <form action="proses-login.php" method="post">
    <table align="center">
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
        <td></td>
        <td></td>
        <td><input type="submit" value="login">
          <input type="reset" value="hapus">
        </td>
      </tr>
    </table>
  </form>
  <hr>
  <br>
</body>

</html>