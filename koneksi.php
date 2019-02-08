<?php
  mysql_connect('localhost','root','');
  mysql_select_db('dbpembayaranlistrik');

  function formatHarga($angka)
  {
    $harga = number_format($angka,0,'.','.');
    return $harga;
  }

  function query($query)
  {
    return mysql_query($query);
  }

  function jadi_array($hasil)
  {
    return mysql_fetch_array($hasil);
  }
  function hapus($query)
  {
    $sql = "delete from";
    $where = "where";
    return mysql($sql." ".$query." ".$where);
  }
  function hitung_baris($query)
  {
    return mysql_num_rows($query);
  }
?>