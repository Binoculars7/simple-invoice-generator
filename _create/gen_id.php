<?php  
session_start();

$cid_final = rand(11, 9999);
$cid_ini = "cid";

$cid = $cid_final.$cid_ini;

$_SESSION['cid'] = $cid;


echo "<script>window.location = 'index.php'; </script>";



?>