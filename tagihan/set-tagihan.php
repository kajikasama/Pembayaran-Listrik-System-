<?php

include "../koneksi.php";
$KodeTagihan = $_POST['KodeTagihan'];
$Status = $_POST['Status'];
$update1 = query("update tbpembayaran set Status='$Status' where KodeTagihan='$KodeTagihan'");

$update2 = query("update tbtagihan set Status='$Status' where KodeTagihan='$KodeTagihan'");

if($update1||$update2)
{
  echo "<script>alert ('Data sudah diset...!');
		location.href='index.php';
	</script>";
}
else
{
  echo "<script>alert ('Data GAGAL diset...!');
		location.href='index.php';
  </script>";
}

?>