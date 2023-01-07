 <?php

include './DB_connection.php';


$tital = $_POST['status'];  // assing parameter values to variable
$f_name = $_POST['fname'];
$l_name = $_POST['lname'];
$nic = $_POST['nic'];
$l_id = $_POST['d_id'];
$mail = $_POST['email'];
$mobile = $_POST['mobile'];
$stime = $_POST['s_time'];
$etime = $_POST['e_time'];
$pw = $_POST['password'];
$hospitalnamea=$_POST["hospital"];
 

$sql = "INSERT INTO doctors (tital, f_name, l_name, nic_number, license_nu, email, mobile, start_time, end_time, password, usertype, hospital_name)values('".$tital."','".$f_name."','".$l_name."','".$nic."','".$l_id."','".$mail."','".$mobile."','".$stime."','".$etime."','".$pw."','2','".$hospitalnamea."')";
$isSaved = mysqli_query($connection, $sql);
if($isSaved){
    header("location:admin_doctors.php?msg=User Registered Successfully");
} else {
    echo 'Error'.$connection->error;
}
mysqli_close($connection);



?>