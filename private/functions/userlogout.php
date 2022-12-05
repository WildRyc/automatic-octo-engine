<?php
session_start();
//kill the session, send the user to the home page!
session_destroy();
header('location:../../index.php');

?>