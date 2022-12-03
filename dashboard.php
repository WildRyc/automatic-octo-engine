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
    include_once('header.php');
    ?>
    
<div class="dashboard">
    <div><h3>Courses</h3>
    <?php
    include_once('serverconnect.php');
    echo "<p>Test with Select all users</p>";
    $query = "SELECT * FROM users";


    if ($stmt = $con->prepare($query)) {
        $stmt->execute();
        $stmt->bind_result($field1, $field2);
        while ($stmt->fetch()) {
            printf("%s, %s\n", $field1, $field2);
        }
        $stmt->close();
    };
    ?>
    </div>
    <div></div>
    <div></div>
    <div></div>
</div>
    <?php
    include_once('footer.php');
    ?>
</body>
</html>