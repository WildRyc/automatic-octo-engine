<?php session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizBud - Add a Class</title>

    <?php include_once('..\private\functions\header.php');
    
    ?>
    <form action=".\classadder.php" method="POST">
    <fieldset>
        <label for="school">Choose a school:</label>
        <select name="schoolId" id="schoolId">
        <?php
        include_once('..\private\functions\serverconnect.php');
        
        //populate element with list of current schools only
        $query = "SELECT id, schoolname FROM schools";
        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($schoolID, $schoolName);
            while ($stmt->fetch()) {
                printf("<option value='%s %s'>%s</option>\n", $schoolID, $schoolName, $schoolName);
            }

        }?>
        </select>
        <br>
        <label for="className">Enter Class Name:</label>
        <input list="classNames" name="className" id="className">
        <datalist id="classnames">
        <?php
        
        //populate element with list of current classes
        $query = "SELECT classname, id FROM classes";

        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($classname, $classid);
            while ($stmt->fetch()) {
                printf("<option value=\"%s %s\">%s</option>\n", $classname, $classid, $classname);
            }
            
        }
        ?>
        </datalist>
        <br>
        <label for="classCode">Enter Class Code:</label>
        <input list="text" name="classCode" id="classCode" default="Enter Class Code Here">
        <datalist id="classCodes">

        </datalist>
        <br>
        <select name="choice" id="choice">
            <option value="add">Add</option>
            <option value="remove">Remove</option>
        </select>        
        <input type="submit" value="Submit">
    </fieldset>
    </form>
    <script>

    // this is supposed to help with populating the above fields, but isn't quite working yet --Kyle
    var data = <?php
        // based on https://stackoverflow.com/questions/383631/json-encode-mysql-results
        $classlist = $con->query('SELECT * FROM classlist');
        $rows = $classlist->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
        $stmt->close();
        ?>;
        
        console.log(data);
    
    var chooser = document.getElementById('choice');
    var choice = chooser.value;
    var schoolChoice = document.getElementById('schoolId');
    var school = schoolChoice.value.slice(2);
    schoolChoice.addEventListener('change', ()=>
{    school = schoolChoice.value.slice(2);});
    var className = document.getElementById('className');
    var classCodes = document.getElementById('classCodes');


    // update fields based on if add or remove has been selected
    chooser.addEventListener('change', function() {
        choice = chooser.value;
        if (choice == "remove") {
        
        var option = document.createElement('option');
        option.value ="testing";
        option.text = "testing";
        classCodes.appendChild(option);
        
        
        
    }
    } )
    
    
    </script>
    <?php include_once('..\private\functions\footer.php');
    ?>
</body>
</html>