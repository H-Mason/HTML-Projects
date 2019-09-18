<!DOCTYPE html>
<html>
<head>
   <title>Mortgage Calculator</title>
   <link rel="stylesheet" type="text/css" href="mortgage.css">
</head>
<body>
   <h1>Mortgage</h1>
   <div>
      <h3></h3>
      <h3>APR: <?php echo $_GET["apr"]?>%</h3>
      <h3>Loan Term: <?php echo $_GET["term"]?></h3>
      <h3>Loan Amount: $<?php echo $_GET["loan"]?></h3>
      <h2>Monthly Payment: </h2>
      <?php
         $apr = $_GET["apr"];
         $term = $_GET["term"];
         $loan = $_GET["loan"];
         $r = ($apr/100) / 12;
         $n = $term * 12;
         $full = ($r * $loan) / (1 - pow((1 + $r), -$n));
         $payment = round($full, 2);
         echo "<h2> $" . $payment . "</h2>";
       ?>
   </div>
   <a href="mortgage.html">Back to Calculator</a>
</body>
</html>

