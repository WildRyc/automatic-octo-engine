<?php
include_once('serverconnect.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    
    $verifyUser = "Select * from users where 
    email = ?";
    $stmt = $con->prepare($verifyUser);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->fetch();
    if ($stmt->num_rows == 0 ) {
        $creation = "INSERT INTO users   
        (firstname, lastname, email, password, school) 
        VALUES (?, ?, ?,
        ?, 1)";
        
        
        $stmt2 = $con->prepare($creation); 
        $stmt2->bind_param("ssss",$firstname,$lastname,$email,$password);
        $stmt2->execute();
        $result = $con->query("Select * from users where 
        email = '$email'");
        if ($result->num_rows == 1 ) {
            $values= $result->fetch_assoc();
            session_start();
            $_SESSION['firstname'] = $firstname;
            $_SESSION['email'] = $email;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['id'] = $values['id'];
            $_SESSION['school'] = $values['schoolid'];
            $_SESSION['classlist'] = array();
            session_write_close();
            header('location:../../public/dashboard.php');
            echo "New user created successfully";
        } else {
            header('location:../../../index.php');
            echo "Error: " . $creation . "<br>" . $con->error;
        }
        
    } else {
        // not working as intended, just sends you to the location with no prompt!
        echo '<script type="text/javascript">
        window.alert("A user with this email already exists!")
        </script>';
        sleep(3);
        header('location:../../public/registration.php');
    }
}
$con->close();
?>