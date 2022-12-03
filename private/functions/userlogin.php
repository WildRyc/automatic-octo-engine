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
    header('location:dashboard.php');
    } else {
    header('location:./readme.md');
    }
}

?>