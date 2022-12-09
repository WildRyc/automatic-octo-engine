<?php session_start();

?>
<!--
Assessment: Assignment 2
Student Names: Jordan Chen, Kyle Ryc, Renato Simoes
Student Number: 041050455, 040778889, 040908766
Lab Professor: Hala Own
Due Date: December 4th 2022
Dashboard for logged in users
-->
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
    // prints a list of users current classes
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