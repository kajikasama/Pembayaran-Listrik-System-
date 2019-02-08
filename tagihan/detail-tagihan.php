<?php
session_start();
  include "../koneksi.php";
  $NoPelanggan = $_GET['NoPelanggan'];
  $KodeTagihan = $_GET['KodeTagihan'];
  $query1 = query("select * from tbpelanggan join tbtagihan using(NoPelanggan) where NoPelanggan='$NoPelanggan'");
  $hasil1 = jadi_array($query1); 
  if(isset($_SESSION['KodeLoginAdmin']) || isset($_SESSION['KodeLoginPetugas']))
  {
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Detail</title>
</head>

<body>
  <form action="set-tagihan.php" method="post">
    <table width="400px">
      <tr>
        <td></td>
        <td></td>
        <td>
          <input type="hidden" name="KodeTagihan" value="<?=$hasil1['KodeTagihan'];?>">
        </td>
      </tr>
      <tr>
      <tr>
        <td>Nama Pelanggan </td>
        <td>:</td>
        <td>
          <?=$hasil1['NamaLengkap'];?>
        </td>
      </tr>
      <tr>
        <td>No Meter</td>
        <td>:</td>
        <td>
          <?=$hasil1['NoMeter'];?>
        </td>
      </tr>
      <tr>
        <td>No Tagihan</td>
        <td>:</td>
        <td>
          <?=$hasil1['NoTagihan'] ?>
        </td>
      </tr>
      <tr>
        <td>Bulan / Tahun</td>
        <td>:</td>
        <td>
          <?=$hasil1['BulanTagih'] ?> /
          <?=$hasil1['TahunTagih'] ?>
        </td>
      </tr>
      <tr>
        <td>Total Tagihan</td>
        <td>:</td>
        <td>
          Rp.
          <?=number_format($hasil1['TotalBayar'],0,'.','.') ?>
        </td>
      </tr>
      <tr>
        <td>Bukti Pembayaran</td>
        <td>:</td>
        <td>
          <?php
      
      $query2 = query("select * from tbpembayaran where KodeTagihan='$KodeTagihan'");
      $cekbaris = hitung_baris($query2);
      if($cekbaris > 0)
      { 
        $hasil12 = jadi_array($query2);
        $BuktiPemayaran = $hasil12['BuktiPembayaran'];
        echo"<img src='foto/$BuktiPemayaran' height='100px' width='100px' />";
      }
      else
      {
        echo "Belum Bayar";
      }
      
      ?>
        </td>
      </tr>
      <tr>
        <td>Set Status</td>
        <td>:</td>
        <td>
          <select name="Status" id="" required>
            <option value="" selected>-- Pili Status Pembayaran --</option>
            <option value="Sudah">Sudah</option>
            <option value="Belum">Belum</option>
          </select>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>
          <input type="submit" value="simpan">
          <input type="reset" value="hapus">
        </td>
      </tr>
    </table>
  </form>
  <br>
  <a href="index.php">Kembali Ke Pencari Data Tagihan</a>
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
  <title>Detail</title>
</head>

<body>
  <form action="set-tagihan.php" method="post">
    <table width="400px">
      <tr>
        <td></td>
        <td></td>
        <td>
        </td>
      </tr>
      <tr>
      <tr>
        <td>Nama Pelanggan </td>
        <td>:</td>
        <td>
          <?=$hasil1['NamaLengkap'];?>
        </td>
      </tr>
      <tr>
        <td>No Meter</td>
        <td>:</td>
        <td>
          <?=$hasil1['NoMeter'];?>
        </td>
      </tr>
      <tr>
        <td>No Tagihan</td>
        <td>:</td>
        <td>
          <?=$hasil1['NoTagihan'] ?>
        </td>
      </tr>
      <tr>
        <td>Bulan / Tahun</td>
        <td>:</td>
        <td>
          <?=$hasil1['BulanTagih'] ?> /
          <?=$hasil1['TahunTagih'] ?>
        </td>
      </tr>
      <tr>
        <td>Total Tagihan</td>
        <td>:</td>
        <td>
          Rp.
          <?=number_format($hasil1['TotalBayar'],0,'.','.') ?>
        </td>
      </tr>
      <tr>
        <td>Bukti Pembayaran</td>
        <td>:</td>
        <td>
          <?php
      
      $query2 = query("select * from tbpembayaran where KodeTagihan='$KodeTagihan'");
      $cekbaris = hitung_baris($query2);
      if($cekbaris > 0)
      { 
        $hasil12 = jadi_array($query2);
        $BuktiPemayaran = $hasil12['BuktiPembayaran'];
        echo"<img src='foto/$BuktiPemayaran' height='100px' width='100px' />";
      }
      else
      {
        echo "Belum Bayar";
      }
      
      ?>
        </td>
      </tr>
      <tr>
        <td>Set Status</td>
        <td>:</td>
        <td>
          <?=$hasil1['Status']; ?>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>
        </td>
      </tr>
    </table>
  </form>
  <br>
  <a href="index.php">Kembali Ke Pencari Data Tagihan</a>
</body>

</html>

<?php    
  }
  else
  {
    echo"<script>
    alert('Anda Tidak Boleh Masuk !');
    location.href = '../index.php';
    </script>";
  }
?>