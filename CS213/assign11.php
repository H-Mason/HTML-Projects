<?php
   $fName = $_GET['fName'];
   $lName = $_GET['lName'];
   $address = $_GET['address'];
   $phone = $_GET['phone'];
   $type = $_GET['type'];
   $number = $_GET['number'];
   //$exDateMonth = $_GET['exDateMonth'];
   $exDateMonth;
   switch ($_GET['exDateMonth']) {
      case "01":
         $exDateMonth = "January";
         break;
      case "02":
         $exDateMonth = "February";
         break;
      case "03":
         $exDateMonth = "March";
         break;
      case "04":
         $exDateMonth = "April";
         break;
      case "05":
         $exDateMonth = "May";
         break;
      case "06":
         $exDateMonth = "June";
         break;
      case "07":
         $exDateMonth = "July";
         break;
      case "08":
         $exDateMonth = "August";
         break;
      case "09":
         $exDateMonth = "September";
         break;
      case "10":
         $exDateMonth = "October";
         break;
      case "11":
         $exDateMonth = "November";
         break;
      case "12":
         $exDateMonth = "December";
         break;
   }
   $exDateYear = $_GET['exDateYear'];
   $iceCream = "";
   $iPrice;
   $skittles = "";
   $sPrice;
   $taffy = "";
   $tPrice;
   $werthers = "";
   $wPrice;
   $total = 0;
   if (isset($_GET['iceCream'])) {
      $iceCream = "Ice Cream";
      $iPrice = $_GET['iceCream'];
      $total += $iPrice;
   }
   if (isset($_GET['skittles'])) {
      $skittles = "Skittles";
      $sPrice = $_GET['skittles'];
      $total += $sPrice;
   }
   if (isset($_GET['taffy'])) {
      $taffy = "Salt Water Taffy";
      $tPrice = $_GET['taffy'];
      $total += $tPrice;
   }
   if (isset($_GET['werthers'])) {
      $werthers = "Werther's";
      $wPrice = $_GET['werthers'];
      $total += $wPrice;
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Confirm Your Order</title>
   <link rel="stylesheet" type="text/css" href="assign11.css">
   <script>
   </script>
</head>
<body>
   <div>
      <h2>Please review the details of your order</h2>
   </div><br>
   <div>
   <?php
      print "<h3>Your Info</h3>";
      print "Name: $fName $lName<br>";
      print "Address: $address<br>";
      print "Phone Number: $phone<br>";
      print "<h3>Your order:</h3>";
      if ($iceCream != "") {
         print "$iceCream: $$iPrice<br>";
      }
      if ($skittles != "") {
         print "$skittles: $$sPrice<br>";
      }
      if ($taffy != "") {
         print "$taffy: $$tPrice<br>";
      }
      if ($werthers != "") {
         print "$werthers: $$wPrice<br>";
      }
      print "<br>Total Purchase Price: $$total.00<br>";
      print "<br><h3>Payment Info</h3>";
      print "Credit Card Type: $type<br>";
      print "Credit Card Expiration Date: $exDateMonth $exDateYear<br>";
   ?>
   </div>
   <div>
      <form action="assign_11.php" id="confirmation" method="get" onsubmit="true">
         <input type="submit" id="confirm" name="confirm" value="Confirm Order">
         <input type="submit" id="cancel" name="cancel" value="Cancel Order">
      </form>
   </div>
</body>
</html>


