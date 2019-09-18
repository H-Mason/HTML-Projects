<?php

$to = $_GET["to"];
$from = $_GET["from"];
$subject = $_GET["subject"];
$message = $_GET["message"];

$message = wordwrap($message, 70, "r\n");

mail($from, $subject, $message);
?>
