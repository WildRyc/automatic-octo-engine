<header>
<button style="float:right" a href="<?php echo 'index.php'; ?>">Home</a></button>
<img src="images/Logo.png" alt="Logo">
<div style="float:right">
    <form name="logoutheader" method="post" action="../private/functions/userlogout.php">
    <button type="submit">Logout</button>
</form>
</div>

<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo 'style.css'; ?>" />
  </head>

  <body>
    <header>
      <h3>Your Credentials</h3>
      <hr>
    </header>

<?php
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$email = $_SESSION['email'];
$id = $_SESSION['id'];
echo nl2br("Name: $firstname $lastname\n E-mail: $email\r\n ID Number: $id");  
?>
<link rel="icon" type="image/x-icon" href="./images/favicon.png">
<link rel="stylesheet" href="./stylesheet/style.css">
</head>
<body>
<hr>


