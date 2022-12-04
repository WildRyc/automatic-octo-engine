<?php
echo "Header bar to be replaced here at header.php";
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$id = $_SESSION['id'];
print_r("<div id='firstname'>$firstname</div>");
print_r("<div id='lastname'>$lastname</div>");
print_r("<div id='email'>$email</div>");
print_r("<div id='idnumber'>$id</div>");
?>
