<?php

include './DB_connection.php';

//deleted inserted admin user

$userID = $_GET['id'];

$sql = "DELETE FROM `admin` WHERE idadmin = '".$userID."'";

$isDelete = mysqli_query($connection, $sql);

if ($isDelete) {
    
    header("location:admin_administratior.php");
    
} else {
    echo 'Error !';
}

?>
