<!-- default head content for every page     -->
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="./images/favicon.png">
    <link rel="stylesheet" href="./stylesheet/style.css">
</head>
<body>
    <header>
    <?php
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$id = $_SESSION['id'];
// echo nl2br("Name: $firstname $lastname\n E-mail: $email\r\n ID Number: $id");  
?>  
        <div class="brandLogo"><a href="./dashboard.php"><img src="../public/images/Logo.png" alt="QuizBud"></a>
</div>
    <!-- print user data in header -->
        <?php
    print_r("<div id='userName'>$firstname $lastname</div>");
    print_r("<div id='idnumber'>User ID: $id  </div>");
    ?>
    <!-- logout button pushes user to index.php -->
    <div class="logoutButton"><form name="logoutheader" method="post" action="../private/functions/userlogout.php">
    <button type="submit">Logout</button>
    </form></div>

</header>



