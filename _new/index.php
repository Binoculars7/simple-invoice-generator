<?php 

require "config.php"; 

session_start();

if (isset($_SESSION['cid'])) {
    $cidd = $_SESSION['cid'];
    $realTotals = '';
}elseif(isset($_SESSION['cid_class'])){
    $cidd = $_SESSION['cid_class'];
    $realTotals = '';
}else{
    $cidd = '';
    $realTotals = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Power Hub</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white"> <img src="logos.jpg" style="width: 30px; border-radius: 20px; box-shadow: 0 0 2px white;"> Power Hub</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">Computer Village, Ikeja, Lagos, Nigeria</p>
                        <p class="text-white">customer@gmail.com</p>
                        <p class="text-white"><small>09045329010, 08145632189</small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice No: <?php echo $cidd; ?></h2>

 <?php  

     //$sql = "SELECT `ID`, `PNAME`, `QTY`, `PPRICE`, `CID` FROM `product_list` WHERE `CID` = '$cidd'";
     $sql = "SELECT `ID`, `FNAME`, `EMAIL`, `PHONE`, `CID`, `DATES` FROM `user_info` WHERE `CID` = '$cidd'";
     $query = mysqli_query($conn, $sql);

     while ($row = mysqli_fetch_assoc($query)) {
      $dates = $row['DATES'];

      echo "
            <p class='sub-heading'><b>Order Date: ".$dates." </b></p>
      ";


  }



      ?>

                    
                </div>


                <div class="col-6">


                     <?php  

     //$sql = "SELECT `ID`, `PNAME`, `QTY`, `PPRICE`, `CID` FROM `product_list` WHERE `CID` = '$cidd'";
     $sql = "SELECT `ID`, `FNAME`, `EMAIL`, `PHONE`, `CID`, `DATES` FROM `user_info` WHERE `CID` = '$cidd'";
     $query = mysqli_query($conn, $sql);

     while ($row = mysqli_fetch_assoc($query)) {
      $id = $row['ID'];
      $fname = $row['FNAME'];
      $email = $row['EMAIL'];
      $phone = $row['PHONE'];
      $cid = $row['CID'];
      $dates = $row['DATES'];

      echo "
            <p class='sub-heading'>Full Name: <b>".$fname."</b> </p>
            <p class='sub-heading'>Email:  <b>".$email."</b></p>
            <p class='sub-heading'>Phone Number:  <b>".$phone."</b></p>
      ";


  }



      ?>



                    
                </div>
            </div>
        </div>

        <div class="body-section">
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Total</th>
                    </tr>
                </thead>
                <tbody>



 <?php  
    function formatNaira($amount) {
        // Ensure the amount is properly formatted with two decimal places
        $formattedAmount = number_format($amount, 2, '.', ',');
        
        // Return the value with the Naira symbol (₦)
        return '₦' . $formattedAmount;
    }



     $sql = "SELECT `ID`, `PNAME`, `QTY`, `PPRICE`, `CID` FROM `product_lists` WHERE `CID` = '$cidd'";
     $query = mysqli_query($conn, $sql);

     $totals = 0;
     while ($row = mysqli_fetch_assoc($query)) {
      $id = $row['ID'];
      $pname = $row['PNAME'];
      $pqty = $row['QTY'];
      $pprice = $row['PPRICE'];
      $cid = $row['CID'];
      $total = $pprice * $pqty;

      $totals = $totals + $total;

      //price breakdown

      //$realPrice = ;

    // Example usage:
    $realPrice = formatNaira($pprice);
    $realTotal = formatNaira($total);
    $realTotals = formatNaira($totals);

       echo "<tr>
                <td style='text-transform:capitalize;'>".$pname."</td>
                <td>".$realPrice."</td>
                <td>".$pqty."</td>
                <td>".$realTotal."</td>
            </tr>";

  }


echo "<tr>
                        <td colspan='3' class='text-right'><b>Total </b> </td>
                        <td><b> ".$realTotals."</b></td>
                    </tr>";

      ?>


                    
                    
                   
                </tbody>
            </table>
            <br>
<!--
    <h3 class="heading">Payment Status: Paid</h3>
    <h3 class="heading">Payment Mode: Cash on Delivery</h3>
-->
            <div class="sign">

            <div class="sign_">
                <div class="img_sign">
                    <img src="sign.png" width="70px" class="sign_img">
                </div>
                
                Manager
            </div>

            <div class="sign__">
                Customer
            </div>

            </div>

            
        </div>

         
    </div>      


    <div style="display: flex; text-align: center; margin-top: 2em;">
        <div style="width: 50%;">
            <form method="get">
                <a name="new_invoice" href="remove.php" style="text-decoration:none; background:#0d1033; color:white; padding:0.7em 1.5em;">Create New Invoice</a>
            </form>
        </div>
        <div style="width:50%;">
            
            <form method="get">
                <select name="cid_class">
                    <option value="">Select CID</option>


<?php  
     $sql = "SELECT `ID`, `FNAME`, `EMAIL`, `PHONE`, `CID`, `DATES` FROM `user_info`";
     $query = mysqli_query($conn, $sql);

     while ($row = mysqli_fetch_assoc($query)) {
      $cid = $row['CID'];
      echo "<option value='".$cid."'>".$cid."</option>";
  }
?>
                </select>
                <input type="submit" name="submit_class">
<?php  
    if (isset($_GET['submit_class'])) { 
        unset($_SESSION['cid']);
        $_SESSION['cid_class'] = $_GET['cid_class'];
        echo "<script type='text/javascript'>window.location = '../_new/';</script>";
    }

?>


            </form>
        </div>
    </div>

</body>
</html>
 