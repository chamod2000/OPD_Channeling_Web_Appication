<?php

include './DB_connection.php';

//deleted inserted appointment

$opID="";

if(isset($_POST["idd"])){$opID=["idd"];}

$sql = "DELETE FROM `appoinment` WHERE idappoinment = '".$opID."'";

$isDelete = mysqli_query($connection, $sql);

if ($isDelete) {
    
    header("location:admin_oppointment.php");
    
} else {
    echo 'Error !';
}

?>
