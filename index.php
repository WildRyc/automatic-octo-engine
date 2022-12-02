<?php session_start();
if (isset($_SESSION["count"])) {
    $_SESSION["count"] +=1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kyle Ryc">
    <meta name="author" content="Renato Simoes">
    <meta name="author" content="Jordan Chen">
    <title>Landing Page</title>
</head>
<body>
    <header>
        <h1>fillername title</h1>
    </header>
    <main>
        <form action="userlogin.php" method="post">
            <fieldset>
                <label for="username">User E-mail:</label>
                <input type="email" name="username" id="username">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <button type="submit">Login</button>
            </fieldset>
            <p>New user?</p>
            <button type="submit" formaction="userCreation.php">Create Account</button>
        </form>
    </main>
</body>
</html>