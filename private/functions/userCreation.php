<?php
include_once('serverconnect.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $emailCheck ="";
    $verifyUser = "Select email from users where 
    email = ?";
    $stmt = $con->prepare($verifyUser); 
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows == 0 ) {
    $creation = "INSERT INTO users   
        (firstname, lastname, email, password, school) 
        VALUES (?, ?, ?,
        ?, 1)";
    $stmt->close(); 

    $stmt = $con->prepare($creation); 
    $stmt->bind_param("ssss",$firstname,$lastname,$email,$password);
    $stmt->execute();
    if ($stmt->execute() === true ) {
        echo "New user created successfully";
        header('location:dashboard.php');
    } else {
        header('location:index.php');
        echo "Error: " . $creation . "<br>" . $con->error;
    }
    
    } else {
        echo '<script type="text/javascript">
        window.alert("User with this email already exists!")
        </script>';
    }
}
$con->close();
?>