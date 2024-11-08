<?php 

require "config.php"; 

session_start();

?>

  <!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Power Hub</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<style type="text/css">
  .header_float{

  }
  .header_float .one{
    margin-right:1em;
  }
</style>
<body>
  <div class="wrapper">
    <header style="padding-right: 2em;" class="header_float">
      <div style="font:20px arial black;" class="one">Generate Invoice </div>  
      <div style="font:18px arial black;" class="two">
      <small><b>CID:</b><a href="gen_id.php" style="text-decoration: none; display: <?php if (isset($_SESSION['cid'])) {
        echo "none";
      }else{echo "block";} ?>;">   



<?php if (isset($_SESSION['cid'])) {
        echo $_SESSION['cid'];
      }else{echo "<small> Click to Generate Customer ID</small>";} 
?>



    </a>
<?php if (isset($_SESSION['cid'])) {
        echo $_SESSION['cid'];
      }else{} 
?>
  </small></div>
    </header><br>






    
    <form method="GET">
    <h3><small>Product Details</small> <button type="submit" name="submit" style=" border: none; border-radius: 20px; font:bold 16px calibri; padding:0.2em 0.7em; background: linear-gradient(to bottom, #68EACC 0%, #497BE8 100%); color:white; box-shadow: 0 0 2px grey; cursor: pointer;"> ADD </button></h3>
    
    <div class="inputField">
      <input type="text" placeholder="Add Product" class="" name="pname" required style="width: 100%; padding-left: 5px;"><input type="text" placeholder="Add Price" class="" name="pprice" required style="padding-left: 5px;"><input type="number" placeholder="Add Qty" class="" name="pqty" required style="padding-left: 5px;">
      
    </div>

<?php  



if (isset($_GET['submit'])) {

if (isset($_SESSION['cid'])) {

  $cid = $_SESSION['cid'];


  $pname = $_GET['pname'];
  $pprice = $_GET['pprice'];
  $pqty = $_GET['pqty'];

  $sql = "INSERT INTO `product_list`(`PNAME`, `PPRICE`, `QTY`, `CID`) VALUES ('$pname','$pprice', '$pqty','$cid')";
  $query = mysqli_query($conn, $sql);

  $sqlz = "INSERT INTO `product_lists`(`PNAME`, `PPRICE`, `QTY`, `CID`) VALUES ('$pname','$pprice', '$pqty','$cid')";
  $queryz = mysqli_query($conn, $sqlz);

  if ($query == TRUE) {
    echo "<script>alert('Product Added!');</script>";
    echo "<script>windows.location = 'index.php';</script>";
  }else{
  }




}else{
  $cid = "";
   echo "<script>alert('Generate ID first!!!');</script>";
}

}

?>


    </form>
    <ul class="todoList">

      <?php  
    function formatNaira($amount) {
        // Ensure the amount is properly formatted with two decimal places
        $formattedAmount = number_format($amount, 2, '.', ',');
        
        // Return the value with the Naira symbol (₦)
        return '₦' . $formattedAmount;
    }



     $sql = "SELECT `ID`, `PNAME`, `QTY`, `PPRICE`, `CID` FROM `product_list`";
     $query = mysqli_query($conn, $sql);

     while ($row = mysqli_fetch_assoc($query)) {
      $id = $row['ID'];
      $pname = $row['PNAME'];
      $pqty = $row['QTY'];
      $pprice = $row['PPRICE'];
      $cid = $row['CID'];

      //price breakdown

      //$realPrice = ;

    // Example usage:
    $realPrice = formatNaira($pprice);

       echo "<li>".$pname." (".$pqty.") - ".$realPrice."
      <a href='del.php?delete=".$id."'><span class='icon'>
        <i class='fas fa-trash'></i>
      </span></a>
    </li>";

  }



      ?>



    
    </ul>


<header style="padding-right: 2em;" class="header_float">
      <div style="font:20px arial black;" class="one">Generate Invoice </div>  
    </header>


    <form method="GET">

    <div class="inputField" style="margin-bottom: -0.5em; margin-top:0.3em;">
    <input type="text" name="fname" placeholder="Full Name" style="width:100%;" required>
    </div>
    <div class="inputField" style="margin-bottom: -0.5em;">
    <input type="text" name="email" placeholder="Email" style="width:100%;" required>
    </div>
      <div class="inputField">
    <input type="text" name="phone" placeholder="Phone Number" style="width:100%;" required>
    </div>


    <div class="footers">
      <button name="submit_invoice" style="width: 100%; font:bold 15px arial; padding:0.5em 0; color:white; background: linear-gradient(to bottom, #68EACC 0%, #497BE8 100%); border:none; cursor:pointer; box-shadow:0 0 3px grey;">Generate Invoice</button>
      <div style="text-align:center; margin-top:1em;">
      <a href="../_new" style="text-decoration: none;">Fetch Previous Invoice</a>
      </div>
    </div>



<?php  



if (isset($_GET['submit_invoice'])) {

if (isset($_SESSION['cid'])) {

  $cid = $_SESSION['cid'];


  $fname = $_GET['fname'];
  $email = $_GET['email'];
  $phone = $_GET['phone'];

  $dates = date('Y-m-d');


  $sqls = "SELECT  `ID`, `PNAME`, `QTY`, `PPRICE`, `CID`, count(`CID`) as `countCID` FROM `product_list`";
  $querys = mysqli_query($conn, $sqls);

  while ($rows = mysqli_fetch_assoc($querys)) {
    $cidCount = $rows['countCID'];
   // echo $cidCount;
    if ($cidCount == 0 ) {
      echo "<div style='color:red; text-align:center; margin-top:1em;'> Add a product first !!!</div>";
    }else{


         $sql = "INSERT INTO `user_info`(`FNAME`, `EMAIL`, `PHONE`, `CID`, `DATES`) VALUES ('$fname','$email', '$phone','$cid', '$dates')";
          $query = mysqli_query($conn, $sql);

          if ($query == TRUE) {
            //session_destroy();
            //unset($_SESSION['MEMBER_ID']);
            $sql_d = "DELETE FROM product_list";
            $query_d = mysqli_query($conn, $sql_d);

            echo "<script type='text/javascript'>alert('Invoice generated successfully!');window.location = '../_new/';</script>";



          }else{
          }

    }


  }



}else{
  $cid = "";
   echo "<script>alert('Generate ID first!!!');</script>";
}

}

?>





</form>

  </div>

  <script src="script.js"></script>




</body>
</html>
