<?php
  include "../koneksi.php";
  session_start();
  if(isset($_SESSION['KodeLogin']))
  {
    $sql = "SELECT * FROM tbtagihan JOIN tbpelanggan USING(KodePelanggan)";
    $query = mysql_query($sql);
    $no = rand(101,999);
    $isi = "NTG";
    $campur = $isi . sprintf("%s", $no);

    function nampilPelanggan()
    {
      $sql = "SELECT * FROM tbpelanggan JOIN tbtarif USING(KodeTarif)";
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
  <title>Data Tagihan</title>
</head>

<body>
  <center>
    <h2>Data Tagihan</h2>
  </center>
  <form method="post" action="proses-simpan-tagihan.php">
    <table>
      <tr>
        <td>NoTagihan</td>
        <td>:</td>
        <td><input value="<?=$campur; ?>" type="text" name="NoTagihan" id=""></td>
      </tr>
      <tr>
        <td>Nama Pelanggan</td>
        <td>:</td>
        <td>
          <select name="KodePelanggan" id="">
            <option value="">-- Pilih Pelanggan --</option>
            <?php 
            $nampilpelanggan = nampilPelanggan(); 
            while ($hasil = mysql_fetch_array($nampilpelanggan)) { ?>
            <option value="">
              <?=$hasil['NamaLengkap'] ?>
            </option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>TahunTagih</td>
        <td>:</td>
        <td><input value="<?=date(" Y"); ?>" type="text" name="TahunTagih" readonly></td>
      </tr>
      <tr>
      <tr>
        <td>BulanTagih</td>
        <td>:</td>
        <td>
          <select name="BulanTagih" id="">
            <option value="">-- Pilih Tanggal --</option>
            <option value="Januari">Januari</option>
            <option value="Februari">Februari</option>
            <option value="Maret">Maret</option>
            <option value="April">April</option>
            <option value="Mei">Mei</option>
            <option value="Juni">Juni</option>
            <option value="Juli">Juli</option>
            <option value="Agustus">Agustus</option>
            <option value="September">September</option>
            <option value="Oktober">Oktober</option>
            <option value="November">November</option>
            <option value="Desember">Desember</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>PemakaianAkhir</td>
        <td>:</td>
        <td>
          <input type="text" name="PemakaianAkhir" id="">
        </td>
      </tr>
      <tr>
        <td>JumlahPemakaian</td>
        <td>:</td>
        <td>
          <input type="text" name="JumlahPemakaian" id="">
        </td>
      </tr>
      <tr>
        <td>TotalBayar</td>
        <td>:</td>
        <td>
          <input type="text" name="TotalBayar" id="">
        </td>
      </tr>
      <tr>
        <td>TglMulaiBayar</td>
        <td>:</td>
        <td>
          <input value="02 <?=date('M Y'); ?>" type="text" name="TglMulaiBayar" id="" readonly>
        </td>
      </tr>
      <tr>
        <td>TglAkhirBayar</td>
        <td>:</td>
        <td>
          <input value="20 <?=date('M Y'); ?>" type="text" name="TglAkhirBayar" id="" readonly>
        </td>
      </tr>
      <tr>
        <td>Keterangan</td>
        <td>:</td>
        <td>
          <textarea value="" name="Keterangan" id="" cols="20" rows="4"></textarea>
        </td>
      </tr>
      <!-- <tr>
        <td>Status</td>
        <td>:</td>
        <td>
          <select name="Status" id="">
            <option value="">-- Pilih Status --</option>
            <option value="Januari">Januari</option>
            <option value="Februari">Februari</option>
          </select>
        </td>
      </tr> -->
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
      <td>NoTagihan</td>
      <td>Atas Nama</td>
      <td>TahunTagih</td>
      <td>BulanTagih</td>
      <td>PemakaianAkhir</td>
      <td>JumlahPemakaian</td>
      <td>TglPencatatan</td>
      <td>TotalBayar</td>
      <td>Status</td>
      <td>Keterangan</td>
      <td>Aksi</td>
    </tr>
    <?php while($hasil = mysql_fetch_array($query)){ ?>
    <tr>
      <td>
        <?=$hasil['NoTagihan']; ?>
      </td>
      <td>
        <?=$hasil['NamaLengkap']; ?>
      </td>
      <td>
        <?=$hasil['TahunTagih']; ?>
      </td>
      <td>
        <?=$hasil['BulanTagih']; ?>
      </td>
      <td>
        <?=$hasil['PemakaianAkhir']; ?>
      </td>
      <td>
        <?=$hasil['JumlahPemakaian']; ?>
      </td>
      <td>
        <?=$hasil['TglPencatatan'];
        ?>
      </td>
      <td>Rp.
        <?=$hasil['TotalBayar']; ?>
      </td>
      <td>
        <?=$hasil['Status']; ?>
      </td>
      <td>
        <?=$hasil['Keterangan']; ?>
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
  <hr>
  <br>
  <a href="../home.php">
    <-- Kembali Ke Menu Utama </a> </body> </html> <?php } else { echo"<script>alert('Anda Tidak Boleh
      Masuk');location.href='index.php'</script>";
      }
      ?>