<?php 
session_start();
include_once("../private/functions/serverconnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Change</title>

<?php include_once('..\private\functions\header.php');

//Only do if the form sent via POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $classInfo = $_POST['className'];
    echo "\nclassInfo" . $classInfo;

    $classCode = $_POST['classCode'];
    $classInfo = explode(" ", $classInfo);
    $className = $classInfo[0];
    $classId = $classInfo[1];

    $schoolInfo = $_POST['schoolId'];
    $schoolInfo = explode(" ",$schoolInfo);
    $schoolId = $schoolInfo[0];
    $schoolName = $schoolInfo[1];
    $choice = $_POST['choice'];
    
    // debug print
    echo "\nclassCode $classCode" ;
    echo "\nclassName" . $className;
    echo "\nclassId" . $classId;

    echo "\nschoolInfo" . $classId;
    echo "\nschoolId" . $schoolId;
    echo "\nschoolName" . $schoolName;
    echo "\nchoice" . $choice;
    echo "<div class='className'>Class Name: $className</div>";
    echo "<div class='school'>School: $schoolName</div>";
    echo "<div class='classCode'>Class Code: $classCode</div>";
    echo "<div class='choice'>Operation Choice: $choice</div>";

    if ($choice == "remove") {
        $deletionQuery = "DELETE FROM courses where id = $classId; DELETE FROM classes where id = $classId";
        if ($con->query($deletionQuery) === true ) {
            $message = "Record deleted successfully";
        } else {
            $message = "Error deleting record: " . $con->error;
        }
    } elseif ($choice == "add") {
        $insertionQuery = "INSERT INTO classes 
        (schoolid, classcode, classname, createdby) VALUES
        ($schoolId, $classCode, $className, $id)";
        if ($con->query($insertionQuery) === true ) {
            $message = "Class added successfully";
        } else {
            $message = "Error adding class: " . $con->error;
        }
    }
    //send user to courses
    echo $message;
    sleep(3);
    header('location:..\..\public\courses.php');
    $con->close();
}
session_write_close();

include_once('.\private\functions\footer.php');
?>
</body>
</html>
