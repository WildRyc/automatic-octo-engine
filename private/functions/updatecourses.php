<?php 
//Connect to the server
session_start();
include_once("serverconnect.php");
include_once("header.php");

//Only do if the form sent via POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // clear users current course catalogue
    $deletionQuery = "DELETE FROM courses where userid = $id";
    $con->query($deletionQuery);
    // insert new record into COURSES
    // for each class selected
    foreach( $_POST as $key => $value){
        $insertionQuery = "INSERT INTO courses VALUES ($id, $key)";
        $con->query($insertionQuery);
    }
    //send user to dashboard
    header('location:..\..\public\dashboard.php');
    $con->close();
}
session_write_close();
?>