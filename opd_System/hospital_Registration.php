<?php

include './DB_connection.php';

//insert new hospital
 //assign values to varibles
$hosname="";
$hosaddress="";
$hoscantact="";


if (isset($_POST['hospital_address'])) {
    $hosname = $_POST["hospital_address"];
}
 if (isset($_POST['hospital_contactnumber'])) {
    $hoscantact = $_POST["hospital_contactnumber"];
}
 if (isset($_POST['hospital_address'])) {
    $hosaddress = $_POST["hospital_address"];
}
 
//hospital insert query
$inserthos="INSERT INTO `hospital`(hname, haddress, hcontact)VALUES('".$hosname."','".$hosaddress."','".$hoscantact."')";
$resuldivi =  mysqli_query($connection, $inserthos);

if($resuldivi){
   header("location:admin_hospital.php");  
} else {
    echo 'Error'.$connection->error;    
}
?>