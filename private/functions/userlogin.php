<?php 
//Connect to the server
include_once("serverconnect.php");


//Only do if the form sent via POST
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // gather input from login page
    $email = $_POST['username'];
    $password = $_POST['password'];
    
    // SQL check for inputs in the database
    $query = "SELECT * from users where 
    email = '$email' AND password = '$password'";
    $verifyCheck = $con->query($query);
    
    // If the query returns only a single unique result...
    $rows = mysqli_num_rows($verifyCheck);
    if ($rows == 1) {
    
    // convert result into associative array
    $userInfo = $verifyCheck->fetch_all(MYSQLI_ASSOC);
    
    //Store all info as Session variables
    session_start();   
    $_SESSION['firstname'] = $userInfo[0]['firstname'];
    $_SESSION['email'] = $userInfo[0]['email'];
    $_SESSION['lastname'] = $userInfo[0]['lastname'];
    $_SESSION['id'] = $userInfo[0]['id'];
    $_SESSION['school'] = $userInfo[0]['school'];
    $_SESSION['classlist'] = array();
    session_write_close();

    //free some memory
    $verifyCheck->free_result();
    //send user to dashboard
    header('location:..\..\public\dashboard.php');
    } else {
    //return user to index
    header('location:..\..');
    }
    //close database connection
    $con->close();
}

?>