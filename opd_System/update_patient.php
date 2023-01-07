<?php

session_start();
include './DB_connection.php';
 
 
$pid="";
$tital = "";
$fname = "";
$lname = "";
$nic = "";
$emali = "";
$password = "";
$mobile = "";

//initialize value to variable
$pid = $_POST['idds'];
$tital = $_POST['titals'];
$fname = $_POST['f_name'];
$lname = $_POST['l_name'];
$nic = $_POST['nic'];
$emali = $_POST['email'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];

  
 //update query
$pQuery = "UPDATE patients SET tital='" . $tital . "',f_name='" . $fname . "',l_name='" . $lname . "',nic_number='" . $nic . "',email='" . $emali . "',mobile='" . $mobile . "',password='" . $password . "'WHERE idpatients='" . $pid . "'";
  $issaved = mysqli_query($connection, $pQuery);
 
       
     
    if($issaved){
          header("location:admin_patients.php"); 
    }else {
        echo 'error' . $connection->error;
}
//<br />
 //<b>Notice</b>:  Undefined index: $uid in <b>C:xampphtdocsopd_Systemuser_profile.php</b> on line <b>106</b><br />
 
?><br />
  
 