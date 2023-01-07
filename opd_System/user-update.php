<?php

session_start();
include './DB_connection.php';
$nic_u = "";
$userID = "";
$pid="";
$Did="";

// assign values to the variables

if (isset($_SESSION['nic'])) {
    $nic_u = $_SESSION['nic'];
}
if (isset($_SESSION['usertype'])) {
    $userID = $_SESSION["usertype"];
}
if (isset($_SESSION['pId'])) {
    $pid = $_SESSION["pId"];
}
if (isset($_SESSION['dId'])) {
    $Did = $_SESSION["dId"];
} 
 
 
$tital = "";
$fname = "";
$lname = "";
$nic = "";
$emali = "";
$password = "";
$dStart_time = "";
$dEnd_time = "";
$license_nu = "";
$mobile = "";
$hname="";

$tital = $_POST['status'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$nic = $_POST['nic'];
$emali = $_POST['email'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];

 

 if (isset($_POST['stime'])) {
    $dStart_time = $_POST["stime"];
}
 if (isset($_POST['etime'])) {
    $dEnd_time = $_POST["etime"];
}
 if (isset($_POST['li_num'])) {
    $license_nu = $_POST["li_num"];
}
 if (isset($_POST['hstatus'])) {
    $hname = $_POST["hstatus"];
}
 
if ($userID == 0) {   //if patient log in to the systm this update query will execute
  
    if (true) {
        $pQuery = "UPDATE patients SET tital='" . $tital . "',f_name='" . $fname . "',l_name='" . $lname . "',nic_number='" . $nic . "',email='" . $emali . "',mobile='" . $mobile . "',password='" . $password . "'WHERE idpatients='" . $pid . "'";
        $issaved = mysqli_query($connection, $pQuery);
 
         header("location:user_profile.php"); 
     
    } else {
        echo 'error' . $connection->error;
}
} else if ($userID == 2) { //if doctor log in to the systm this update query will execute
    if (true) {
       
        $dQuery = "UPDATE doctors SET tital='".$tital."',f_name='".$fname."',l_name='".$lname."',nic_number='".$nic."',license_nu='".$license_nu."',email='".$emali."',mobile='".$mobile."',start_time='".$dStart_time."',end_time='" . $dEnd_time . "',password='" . $password . "',hospital_name='".$hname."'WHERE iddoctors='" . $Did . "'";
        $issavedd = mysqli_query($connection, $dQuery);
        header("location:user_profile.php"); 
      // echo 'error' . $connection->error;
    } else {
        echo 'error' . $connection->error;
    }
}
 
?><br />
  
 