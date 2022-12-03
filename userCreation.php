<?php
include_once('serverconnect.php');

$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$password = $_POST['password'];


$sql = "INSERT INTO users 
(firstname, lastname, email, password, 
registrationdate, lastonline, school) 
VALUES ($firstname, $lastname, $email,
$password, sysdate, 1)";
    

if ($con->query($sql) == TRUE) {
    echo "New user created successfully";
}else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();
?>