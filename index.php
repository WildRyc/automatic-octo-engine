<!--
Assessment: Assignment 2
Student Names: Jordan Chen, Kyle Ryc, Renato Simoes
Student Number: 041050455, 040778889, 040908766
Lab Professor: Hala Own
Due Date: December 4th 2022
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kyle Ryc">
    <link rel="stylesheet" href="public/stylesheet/style.css">
    <script src="./scripts/validation.js" defer></script>
    <script src="./scripts/regscript.js" defer></script>
    <title>QuizBud: Landing Page</title>
    <link rel="icon" type="image/x-icon" href="./public/images/favicon.ico">
</head>
<body>
    <header>
        <img src="public/images/Logo.png" alt="Logo">
    </header>
    <main>
        <form name="myForm" action="./private/functions/userlogin.php" onsubmit="return validateForm()" method="post">
            <fieldset id="indexfield">
                <label for="username">User E-mail:</label>
            <input type="email" name="username" id="username">
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <br>
            <button type="submit">Login</button>
            </fieldset>
            <p>New user?</p>
            <button type="submit" formaction="./public/registration.php">Create Account</button>
        </form>
    </main>
</body>
</html>
