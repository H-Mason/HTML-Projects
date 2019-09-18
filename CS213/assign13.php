<?php
$type;
$first;
$last;
$id;
$skill;
$instrument;
$building;
$room;
$time;


if ($_GET['type']) {
   $myfile = fopen("data/regStudents.txt", "a") or die("Unable to register student!");
   $type = $_GET['type'];
   $first = $_GET['first'];
   $last = $_GET['last'];
   $id = $_GET['id'];
   $skill = $_GET['skill'];
   $instrument = $_GET['instrument'];
   $building = $_GET['building'];
   $room = $_GET['room'];
   $time = $_GET['time'];

   $studentInfo = $first . " " . $last . ", " . $id;
   if ($type == "Duet") {
      $first2 = $_GET['first2'];
      $last2 = $_GET['last2'];
      $id2 = $_GET['id2'];
      $studentInfo .= " & " . $first2 . " " . $last2 . ", " . $id2;
   }
   $location = $building . " " . $room;   

   $textString = "<table><tr class=\"head\"><td>Performance Type</td><td>Student Info: " .
              "</td><td>" . "Skill Level</td><td>Instrument</td><td>Location</td><td>" .
              "Time</td></tr>" . "<tr><td>" . $type . "</td>" . "<td>" . $studentInfo . 
              "</td>" . "<td>" . $skill . "</td>" . "<td>" . $instrument . "</td>" .
              "<td>" . $location . "</td>" . "<td>" . $time . "</td></tr></td><hr>"; 

   fwrite($myfile, $textString);

   fclose($myfile);
}
$myfile2 = fopen("data/regStudents.txt", "r");
while (!feof($myfile2))  {
   $line = fgets($myfile2);
   echo $line;
}
fclose($myfile2);
?>
