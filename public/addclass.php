<?php session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizBud - Add a Class</title>
</head>
<body>
    <?php include_once('.\private\functions\header.php');
    ?>
    <form action="POST">
        <label for="school">Choose a school:</label>
        <?php
        include_once('.\private\functions\serverconnect.php');
        
        $query = "SELECT id, schoolname FROM schools";
        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($schoolID, $schoolName);
            while ($stmt->fetch()) {
                printf("<option value='%s'>%s</option>\n", $schoolID, $schoolName);
            }
            $stmt->close();
        }?>
        <input type="text" name="" id="">
        <input type="submit" value="Submit">
    </form>

    <?php include_once('.\private\functions\footer.php');
    ?>
</body>
</html>