<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizBuddy - classes</title>
    <script src="./scripts/tableSorter.js" defer></script>

    <?php
    include('..\private\functions\header.php');
    ?>
<!-- these are search bars to filter table contents -->
<input type="text" id="myInput0" class="search" onkeyup="filterTable('myInput0', 0)" placeholder="Search by Course Names.." size=100>
<input type="text" id="myInput1" class="search" onkeyup="filterTable('myInput1', 1)" placeholder="Search by Codes.." size=100>
<input type="text" id="myInput2" class="search" onkeyup="filterTable('myInput2', 2)" placeholder="Search by Schools.." size=100>
<div class="classes">

<form action="..\private\functions\updatecourses.php" method="POST">
<table id="classesTable">
    <tr>
        <th onclick="sortTable(0)">Name</th>
        <th onclick="sortTable(1)">Code</th>
        <th onclick="sortTable(2)">School</th>
        <th onclick="sortTable(3)">Enrolled?</th>
    </tr>

<?php
include_once("../private/functions/serverconnect.php");
// generate table of classes user is enrolled in
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
// generate table of all classes
$query2 = "SELECT * from classlist";
$enrollment = "";
if ($stmt = $con->prepare($query2)) {
    $stmt->execute();
    $stmt->bind_result($classname, $classcode, $schoolname, $classid);
    while ($stmt->fetch()) {
        // checkbox is marked if student is enrolled
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
<button type="submit" value="submit">Update Enrollment</button>
<button><a href="addclass.php">Add or remove a class?</a>
</button>
</form>
</div>
    <?php
    include_once('..\private\functions\footer.php');
    ?>
</body>
</html>