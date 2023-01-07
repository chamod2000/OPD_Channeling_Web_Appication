<?php

include './DB_connection.php';

//deleted inserted hospital

$hID = $_GET['id'];

$sql = "DELETE FROM `hospital` WHERE idhospital = '".$hID."'";

$isDelete = mysqli_query($connection, $sql);

if ($isDelete) {
    
    header("location:admin_hospital.php");
    
} else {
    echo 'Error !';
}

?>
