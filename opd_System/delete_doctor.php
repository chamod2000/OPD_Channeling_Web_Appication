<?php

include './DB_connection.php';

//deleted inserted doctor

$doctID="";

$doctID = $_GET['id'];

$sql = "DELETE FROM `doctors` WHERE iddoctors = '".$doctID."'";

$isDelete = mysqli_query($connection, $sql);

if ($isDelete) {
    
  header("location:admin_doctors.php");
    
} else {
    echo 'Error !';
}

?>
