<?php

// logout code

session_start();
$_SESSION["is_login"]=false;
header("Location:index.php ");
session_destroy();
?>