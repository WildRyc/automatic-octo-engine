<?php
$user = $_POST["email"];
$servername = "localhost";
$username = "username";
$password = "password";

// Initiate a connection with the database
$connection = new mysqli($servername, $username, $password);

// Verify if connection is working
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "Use assignment2;
SELECT * FROM users
WHERE username = $user"
?>