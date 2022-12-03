<?php 
include_once("serverconnect.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $verifyUser = "SELECT * from users where 
    email = '$email' AND password = '$password'";
    $verifyCheck = mysqli_query($con, $verifyUser);
    $length = mysqli_num_rows($verifyCheck);

    if ($length == 1) {
    $_SESSION['firstname'] = $verifyCheck['firstname'];
    $_SESSION['email'] = $verifyCheck['email'];
    $_SESSION['lastname'] = $verifyCheck['lastname'];
    header('location:..\public\dashboard.php');
    } else {
    header('location:..\public\dashboard.php'); // change to index when it actually works.
    }
}

?>