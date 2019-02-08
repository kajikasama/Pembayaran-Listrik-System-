<?php

session_start();
session_destroy();
echo"<script>alert('Berhasil Log Out');location.href='index.php'</script>";

?>