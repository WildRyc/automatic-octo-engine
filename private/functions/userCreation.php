<?php
include_once('serverconnect.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // gather user variables
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    
    //check if the user is in the system already
    $verifyUser = "Select * from users where 
    email = ?";
    $stmt = $con->prepare($verifyUser);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->fetch();

    // if not, proceed to insert
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
        // we have to do this search again to get the ID number the user has gained
        // as we display it in the header
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
        session_start();
        $_SESSION['msg'] = "User e-mail already in system.";
        session_write_close();
        sleep(3);
        header('location:../../public/registration.php');
        
        
    }
}
$con->close();
?>