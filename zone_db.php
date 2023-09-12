<?php 
    session_start();
    include('server.php');
   
    $errors = array();
?>
    <?php
        $zname_zone = $_POST['zname_zone'];

        mysqli_query($conn ,"INSERT INTO zone (zname_zone)
                     VALUES ('$zname_zone')");

        

   ?>