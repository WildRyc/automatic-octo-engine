<?php 
include_once("serverconnect.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $verifyUser = "Select * from users where 
    email = $email && password = $password";
    $verifyCheck = mysqli_query($con, $verifyUser);
    $length = mysqli_num_rows($result);

    if ($length > 0) {
    $_SESSION['firstname'] = $verifyCheck['firstname'];
    $_SESSION['email'] = $verifyCheck['email'];
    $_SESSION['lastname'] = $verifyCheck['lastname'];
    header('location:dashboard.php');
    } else {
    header('location:index.php');
    }
}

?>