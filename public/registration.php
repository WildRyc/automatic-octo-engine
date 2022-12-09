<!--
Assessment: Assignment 2
Student Names: Jordan Chen, Kyle Ryc, Renato Simoes
Student Number: 041050455, 040778889, 040908766
Lab Professor: Hala Own
Due Date: December 4th 2022
New user page for our website
-->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Jordan Chen">
    <link rel="stylesheet" href="./stylesheet/style.css">
    <script src="./scripts/regscript.js" defer></script>
    <title>QuizBud: Registration Page</title>
</head>
<body>
    <header>
        <img src="images/Logo.png" alt="Logo">
        <?php
        if(isset($_SESSION['msg'])){
            echo '<pre>';
            echo $_SESSION['msg'];
            echo '</pre>';
        }
        ?>

    </header>
    <main>
    <h1>User Registration</h1>
        <form action="../private/functions/userCreation.php" method="post" onsubmit="return validate()">
        <fieldset id="indexfield">
        <p>
            <label>Username/E-mail<label>
            <input type="text" name="email" id="username"> 
        </p>
        <p>
            <label>First Name</label>
            <input type="text" name="firstname" id="firstname">
        </p>
        <p>
            <label>Last Name</label>
            <input type="text" name="lastname" id="lastname">
        </p>  
        <p>
            <label>Password</label>
            <input type="password" name="password" id="password">
        </p>
        <p>
            <label>Confirm Password</label>
            <input type="password" name="password2" id="password2">
        </p>
        <br>
        <button type="submit" onlick="successmessage()">Create Account</button>
        </fieldset>
        </form>
    </main>
    <?php
    include_once('../private/functions/footer.php');
    ?>
</body>
</html>
