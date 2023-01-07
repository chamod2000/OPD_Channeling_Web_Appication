<?php

include './DB_connection.php';

//deleted inserted patient

$hpD = $_GET['id'];

$sql = "DELETE FROM `patients` WHERE idpatients = '".$hpD."'";

$isDelete = mysqli_query($connection, $sql);

if ($isDelete) {
    
    header("location:admin_patients.php");
    
} else {
    echo 'Error !';
}

?>


