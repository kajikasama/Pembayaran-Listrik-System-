<?php
  include "../koneksi.php";
  session_start();
  if(isset($_SESSION['KodeLoginAdmin']) || isset($_SESSION['KodeLoginPetugas']) || isset($_SESSION['KodeLoginPelanggan']))
  {
    $kode = $_GET['kode'];
    $sql = "select * from tbtagihan inner join tbpelanggan on tbtagihan.NoPelanggan = tbpelanggan.NoPelanggan where KodePelanggan='$kode'";
    $query = mysql_query($sql);
    $no = rand(101,999);
    $isi = "NTG";
    $campur = $isi . sprintf("%s", $no);

    function nampilPelanggan()
    {
      $kode = $_GET['kode'];
      $sql = "SELECT * FROM tbpelanggan JOIN tbtarif USING(KodeTarif) WHERE KodePelanggan='$kode'";
      $query = mysql_query($sql);
      return $query;
    }
    $dapet = nampilPelanggan();
    $hasil = mysql_fetch_array($dapet);
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
  <table>
    <tr>
      <td>No Meter :</td>
      <td>
        <?=$hasil['NoMeter']; ?>
      </td>
    </tr>
    <tr>
      <td>No Pelanggan :</td>
      <td>
        <?=$hasil['NoPelanggan']; ?>
      </td>
    </tr>
    <tr>
      <td>Nama Lengkap :</td>
      <td>
        <?=$hasil['NamaLengkap']; ?>
      </td>
    </tr>
  </table>

  <hr>
  <br>
  <table border="1px" width="100%">
    <tr>
      <td>No</td>
      <td>Nama Lengkap</td>
      <td>TahunTagih</td>
      <td>BulanTagih</td>
      <td>JumlahPemakaian</td>
      <td>TotalBayar</td>
      <td>Status</td>
      <td colspan="3">Aksi</td>
    </tr>
    <?php $i=1; ?>
    <?php while($hasil = mysql_fetch_array($query)){ ?>
    <tr>
      <td>
        <?=$i; ?>
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
        <?=$hasil['JumlahPemakaian']; ?>
      </td>
      <td>Rp.
        <?php 
        $Bayar = $hasil['TotalBayar'];
        echo number_format($Bayar,0,",",",") ?>
      </td>
      <td>
        <?=$hasil['Status']; ?>
      </td>
      <td>
        <a
          href="cetak.php?KodeTagihan=<?=$hasil['KodeTagihan']?>&NoTagian=<?=$hasil['NoTagihan']?>&Status=<?=$hasil['Status']?>">Cetak</a>
      </td>
      <td>
        <a
          href="detail-tagihan.php?KodeTagihan=<?=$hasil['KodeTagihan']?>&NoPelanggan=<?=$hasil['NoPelanggan']?>&Status=<?=$hasil['Status']?>">Detail</a>
      </td>
      <td>
        <?php if(isset($_SESSION['KodeLoginAdmin']) || isset($_SESSION['KodeLoginPetugas'])) { ?>
        <a onclick="return confirm('Yakin Hapus ?');"
          href="hapus-tagihan.php?kode=<?=$hasil['KodeTagihan']; ?>">Hapus</a>
        <?php }
        else
        {
        }
        ?>
      </td>
    </tr>
    <?php
    $i++;
    } ?>
  </table>
  <br>
  <hr>
  <form method="post" action="tambah-tagihan.php">
    <table>
      <tr>
        <td></td>
        <td></td>
        <td><input value="<?=$kode; ?>" type="hidden" name="kode" id="" readonly></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input value="<?=$campur; ?>" type="hidden" name="NoTagihan" id="" readonly></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>
          <?php 
          $dapet = nampilPelanggan();
          $hasil = mysql_fetch_array($dapet);
          ?>
          <input type="hidden" value="<?=$hasil['NoPelanggan'] ?>" name="NoPelanggan" id="" readonly>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>
          <?php 
          $dapet = nampilPelanggan();
          $hasil = mysql_fetch_array($dapet);
          ?>
          <input type="hidden" value="<?=$hasil['NamaLengkap'] ?>" name="NamaLengkap" id="" readonly>
        </td>
      </tr>
      <tr>
        <td>TahunTagih</td>
        <td>:</td>
        <td><input value="" type="text" name="TahunTagih"></td>
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
        <td>Jumlah Pemakaian (Kwh)</td>
        <td>:</td>
        <td>
          <input type="text" name="JumlahPemakaian" id="">
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input type="submit" value="tambah">
          <input type="reset" value="hapus">
        </td>
      </tr>
    </table>
  </form>
  <hr>
  <br>
  <a href="index.php">
    Kembali Ke Menu Pencarian Pelanggan </a> <br><br><a href="../home.php">
    Kembali Ke Menu Utama </a>
</body>

</html>
<?php } 
else { echo"<script>alert('Anda Tidak Boleh Masuk');location.href='index.php'</script>";
}
?>