<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizBuddy - classes</title>
</head>
<body>
    <?php
    include('..\private\functions\header.php');
    ?>
    
<div class="classes">
<form action="..\private\functions\updatecourses.php" method="POST">
<table>
    <tr>
        <th>Name</th>
        <th>Code</th>
        <th>School</th>
        <th>Enrolled?</th>
    </tr>

<?php
include_once("../private/functions/serverconnect.php");

$query1 = "SELECT classes.id as classid FROM classes   LEFT JOIN courses on classes.id = courses.classid  WHERE courses.userid = $id";
$enrolledClasses = array();

if ($stmt = $con->prepare($query1)) {
    $stmt->execute();
    $stmt->bind_result($enrolledClassId);
    while ($stmt->fetch()) {
        $enrolledClasses[] = $enrolledClassId;
    }
    $stmt->close();
}

$query2 = "SELECT * from classlist";
$enrollment = "";
if ($stmt = $con->prepare($query2)) {
    $stmt->execute();
    $stmt->bind_result($classname, $classcode, $schoolname, $classid);
    while ($stmt->fetch()) {
        if (in_array($classid,$enrolledClasses)){
            $enrollment = "checked";
        } else {
            $enrollment = "";
        }
        printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>\n", $classname, $classcode, $schoolname, "<input type='checkbox' name='$classid' $enrollment>");
    }
    $stmt->close();
}
?>
</table>
<input type="submit" value="Submit">
</form>
</div>
    <?php
    include_once('..\private\functions\footer.php');
    ?>
</body>
</html>