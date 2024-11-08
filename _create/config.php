<?php 

$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "customer_details";

$conn = mysqli_connect($servername, $username, $dbpassword) or
        die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($conn, $dbname) or die(mysqli_error($conn));


//$dbsss = mysqli_connect('sql3.freesqldatabase.com', 'sql3725364', 'XcHfci8rxr') or
        //die ('Unable to connect. Check your connection parameters.');
       // mysqli_select_db($db, 'sql3725364' ) or die(mysqli_error($db));



date_default_timezone_set("africa/lagos");





?>