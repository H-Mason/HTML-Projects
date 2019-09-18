<?php
   $result = "";
   if (isset($_GET['confirm'])) {
      $result = "<h3>Your Order Is Confirmed</h3>";
   }
   else if (isset($_GET['cancel'])){
      $result = "<h3>Your Order Has Been Cancelled</h3>";
   }
   else {
      $result = "<h4>No response selected</h4>";
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
      <?php print $result?>
   </div>
</body>
</html>
