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
    <link rel="stylesheet" href="css/style.css">
    <title>QuizBud: Landing Page</title>
</head>
<body>
    <header>
        <img src="images/Logo.png" alt="Logo">
    </header>
    <main>
        <form action="/userlogin.php" method="post">
            <fieldset>
                <label for="username">User E-mail:</label>
            <input type="email" name="username" id="username">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <button type="submit">Login</button>
            </fieldset>
            <p>New user?</p>
            <button type="submit" formaction="registration.php">Create Account</button>
        </form>
    </main>
    <a href="dashboard.php">click here</a>
</body>
</html>
