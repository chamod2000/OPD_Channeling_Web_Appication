<?php
include './DB_connection.php';

$pid="";
$optid="";

if(isset($_POST["pid"])){$pid=$_POST["pid"];} //assing parameter vluese to variables
if(isset($_POST["op_tid"])){$optid=$_POST["op_tid"];}


$dQuery = "UPDATE appoinment SET status_p='0' WHERE idappoinment='" . $optid . "'";  //update user status in appointment tble
$issavedd = mysqli_query($connection, $dQuery);

if ($issavedd) {
    header("location:user_oppintment.php");
} else {
    echo 'error' . $connection->error;
}