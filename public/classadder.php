<?php 
session_start();
include_once("serverconnect.php");
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
    $className = $_POST['className'];
    $schoolInfo = $_POST['schoolId'];
    $schoolInfo = explode(" ",$schoolInfo);
    $schoolId = $schoolInfo[0];
    $schoolName = $schoolInfo[1];
    $classCode = $_POST['classCode'];
    $choice = $_POST['choice'];
    
    echo "<div class='className'>Class Name: $className</div>";
    echo "<div class='school'>School: $schoolName</div>";
    echo "<div class='classCode'>Class Code: $classCode</div>";
    echo "<div class='choice'>Operation Choice: $choice</div>";

    if ($choice == "remove") {
        $deletionQuery = "DELETE FROM classes where
        className = $className AND classcode = $classCode";
        if ($con->query($deletionQuery) === TRUE) {
            $message = "Record deleted successfully";
        } else {
            $message = "Error deleting record: " . $conn->error;
        }
    } elseif ($choice == "add") {
        $insertionQuery = "INSERT INTO classes 
        (schoolid, classcode, classname, createdby) VALUES
        ($schoolId, $classCode, $className, $id)";
        if ($con->query($insertionQuery) === TRUE) {
            $message = "Class added successfully";
        } else {
            $message = "Error adding class: " . $conn->error;
        }
    }
    //send user to courses
    echo $message;
    header('location:..\..\public\courses.php');
    $con->close();
}
session_write_close();

include_once('.\private\functions\footer.php');
?>
</body>
</html>
