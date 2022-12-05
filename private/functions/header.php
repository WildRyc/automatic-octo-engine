<?php
echo "Header bar to be replaced here at header.php";
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$id = $_SESSION['id'];
print_r("<div id='firstname'>$firstname</div>");
print_r("<div id='lastname'>$lastname</div>");
print_r("<div id='email'>$email</div>");
print_r("<div id='idnumber'>$id</div>");
?>
<link rel="icon" type="image/x-icon" href="./images/favicon.png">
<link rel="stylesheet" href="./stylesheet/style.css">
</head>
<body>
<header>
<img src="images/Logo.png" alt="Logo">
<div style="float:right">
    <form name="logoutheader" method="post" action="..\private\functions\userLogout.php">
    <button type="submit">Logout</button>
    </form>
</div>
</header>


