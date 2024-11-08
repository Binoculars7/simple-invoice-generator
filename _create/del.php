<?php  
require 'config.php';

$del_id = $_GET['delete'];

if ($del_id == '') {
	echo "<script>window.location = 'index.php';</script>";
}else{
	$sql = "DELETE FROM `product_list` WHERE `ID` = '$del_id'";
	$query = mysqli_query($conn, $sql);

	echo "<script>window.alert('Product deleted!'); window.location = 'index.php';</script>";
}


?>