<?php
    $servername = "localhost";
    $user = "demo";
    $password = "password";
    $dbname="quizbud";
    
    $con = new mysqli($servername, $user, $password, $dbname)
        or die ('Could not connect to the database server' . mysqli_connect_error());
?>