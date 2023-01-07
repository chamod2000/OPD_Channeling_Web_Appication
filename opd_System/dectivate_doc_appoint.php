<?php
include './DB_connection.php';


$optid="";

 
if(isset($_POST["op_tid"])){$optid=$_POST["op_tid"];} //assing parameter vluese to variables


$dQuery = "UPDATE appoinment SET status_d='0' WHERE idappoinment='" . $optid . "'";//update user status in appointment tble
$issavedd = mysqli_query($connection, $dQuery);

if ($issavedd) {
    header("location:doctor_oppintment.php");
} else {
    echo 'error' . $connection->error;
}