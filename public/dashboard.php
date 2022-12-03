<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizBuddy - Dashboard</title>
</head>
<body>
    <?php
    include('..\private\functions\header.php');
    ?>
    
<div class="dashboard">
    <div><h3>Courses</h3>
    <?php
    include_once('..\private\functions\serverconnect.php');
    echo "<p>Test with Select all users</p>";
    $query = "SELECT * FROM users";


    $result = $con->query($query);
    while($row = $result->fetch_assoc()) {
        echo "first name: " . $row['firstname']; 
    }
    ?>
    </div>
    <div></div>
    <div></div>
    <div></div>
</div>
    <?php
    include_once('..\private\functions\footer.php');
    ?>
</body>
</html>