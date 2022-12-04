<?php
include_once("serverconnect.php");

$query = "SELECT classes.classname FROM classes  
LEFT JOIN courses on classes.id = courses.classid 
WHERE courses.userid = $id";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($classname);
    while ($stmt->fetch()) {
        
        if (!in_array($classname, $_SESSION['classlist']))
        {
            $_SESSION['classlist'][] = $classname;
        }
        printf("<li>%s</li>", $classname);
    }
    $stmt->close();
}

?>