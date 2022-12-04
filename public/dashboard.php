<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizBuddy - Dashboard</title>

    <?php
    include('..\private\functions\header.php');
    ?>
    
<div class="dashboard">
    <div id="courses"><h3>Courses</h3>
    <ul>
    <?php
    include_once('..\private\functions\mycourses.php');
    ?>
    <li><a href="./classes.php">Add or change a class?</a></li>
    </ul>
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