<?php 
//connect database
$condb= mysqli_connect("localhost","root","0979531571nai","workshop_booking_table") or die("Error: " . mysqli_error($condb));
mysqli_query($condb, "SET NAMES 'utf8' ");
date_default_timezone_set('Asia/Bangkok');
?>