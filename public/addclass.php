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
    <?php include_once('..\private\functions\header.php');
    ?>
    <form action=".\public\classadder.php" method="POST">
        <label for="school">Choose a school:</label>
        <select name="schoolId" id="schoolId">
        <?php
        include_once('..\private\functions\serverconnect.php');
        
        $query = "SELECT id, schoolname FROM schools";
        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($schoolID, $schoolName);
            while ($stmt->fetch()) {
                printf("<option value='%s %s'>%s</option>\n", $schoolID, $schoolName, $schoolName);
            }

        }?>
        </select>
        <label for="className">Enter Class Name:</label>
        <input list="classNames" name="className" id="className">
        <datalist id="classnames">
        <?php        
        $query = "SELECT classname FROM classes";

        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($classname);
            while ($stmt->fetch()) {
                printf("<option value=\"%s\">\n", $classname);
            }
            $stmt->close();
        }
        ?>
        </datalist>
        <input type="text" name="classCode" id="classCode" default="Enter Class Code Here">
        
        <select name="choice" id="choice">
            <option value="add">Add</option>
            <option value="remove">Remove</option>
        </select>        
        <input type="submit" value="Submit">

    </form>

    <?php include_once('..\private\functions\footer.php');
    ?>
</body>
</html>