<?php
session_start();
include './DB_connection.php';
 

//assing values to the variables
 $docidd="";
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
$hname = "";

$docidd = $_POST['idd'];
$tital = $_POST['titals'];
$fname = $_POST['f_name'];
$lname = $_POST['l_name'];
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
if (isset($_POST['id_doc'])) {
    $license_nu = $_POST["id_doc"];
}
if (isset($_POST['hosname'])) {
    $hname = $_POST["hosname"];
}


//doctor update query
$dQuery = "UPDATE doctors SET tital='" . $tital . "',f_name='" . $fname . "',l_name='" . $lname . "',nic_number='" . $nic . "',license_nu='" . $license_nu . "',email='" . $emali . "',mobile='" . $mobile . "',start_time='" . $dStart_time . "',end_time='" . $dEnd_time . "',password='" . $password . "',hospital_name='" . $hname . "'WHERE iddoctors='" . $docidd . "'";
$issavedd = mysqli_query($connection, $dQuery);

if ($issavedd) {
    header("location:admin_doctors.php");
} else {
    echo 'error' . $connection->error;
}



//<b>Notice</b>:  Undefined index: $uid in <b>C:xampphtdocsopd_Systemuser_profile.php</b> on line <b>106</b><br />
?><br />

