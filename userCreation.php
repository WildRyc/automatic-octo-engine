<?php
include_once('serverconnect.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];

    $verifyUser = "Select * from users where 
    email = $email";
    $verifyCheck = mysqli_query($con, $verifyCheck);
    
    $anythingThere = mysqli_num_rows($verifyCheck);
    if ($row < 1){
        mysqli_query($con,"INSERT INTO users   
        (firstname, lastname, email, password,school) 
        VALUES ($firstname, $lastname, $email,
        $password, 1)");
        
    }

    

if ($con->query($sql) == TRUE) {
    echo "New user created successfully";
}else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
}
$con->close();
?>