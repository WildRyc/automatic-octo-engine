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
    $className = $_POST['className'];
    $classCode = $_POST['classCode'];

    $schoolInfo = $_POST['schoolId'];
    $schoolInfo = explode(" ",$schoolInfo);
    $schoolId = (int)$schoolInfo[0];
    $schoolName = $schoolInfo[1];
    $choice = $_POST['choice'];
    
    // debug print
    echo "<p>classCode:$classCode</p>" ;
    echo "<p>className:$className</p>";
    echo "<p>ID:$id</p>";
    echo "<p>schoolId:$schoolId</p>";
    echo "<p>schoolName:$schoolName</p>";
    echo "<p>choice:$choice</p>";
    echo "<div class='className'>Class Name: $className</div>";
    echo "<div class='school'>School: $schoolName</div>";
    echo "<div class='classCode'>Class Code: $classCode</div>";
    echo "<div class='choice'>Operation Choice: $choice</div>";

    if ($choice == "remove") {
        $deletionQuery = "DELETE FROM courses where classid = ?; DELETE FROM classes where id = ?";
        $stmt = $con->prepare($deletionQuery); 
        $stmt->bind_param("ii",$classid,$classid);
        $stmt->execute();
        if ($stmt->execute() === true ) {
            $message = "Record deleted successfully";
        } else {
            $message = "Error deleting record: " . $con->error;
        }
    } elseif ($choice == "add") {
        $insertionQuery = "INSERT INTO classes 
        (schoolid, classcode, classname, createdby) VALUES
        (?, ?, ?, ?)";
        $stmt = $con->prepare($insertionQuery); 
        $stmt->bind_param("issi",$schoolId,$classCode,$className,$id);
        $stmt->execute();
        if ($stmt->execute() === true ) {
            $message = "Class added successfully";
        } else {
            $message = "Error adding class: " . $con->error;
        }
    }

    //send user to courses
    echo $message;
    sleep(3);
    header('location:..\public\classes.php');
    $con->close();
}
session_write_close();

include_once('.\private\functions\footer.php');
?>
</body>
</html>
