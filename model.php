<?php  

require('config.php');

public function main(){

// initializing the basic infos	
public function __construct(){
	private $fname;
	private $email;
	private $number;
}

// executing user details
public function userDetail($fname, $email, $number){
	$fname = $conn->fname;
	$email = $conn->email;
	$number = $conn->number;
}

public function uploadUserDetails($fname, $email, $number){
	$sql = "INSERT INTO `customer_details` WHERE `fname` = '$fname', `email` = 'email'";
	$query = mysqli_query($conn, $sql);
}

// generating invoice number
public function invoiceNoGenerator(){
	$invoiceStatic = "xH";
	$invoiceRand = rand(20, 99);
	$invoiceNo = $invoiceStatic.$invoiceRand; 
	return $invoiceNo;
}

// generating invoice date
public function orderDateGenerator(){
	$orderDate = date('Y-m-d');
	return $orderDate;
}








}









?>