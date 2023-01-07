 <?php

include './DB_connection.php';

//assign values to the variables
$tital = $_POST['status'];
$f_name = $_POST['fname'];
$l_name = $_POST['lname'];
$nic = $_POST['nic'];
$l_id = $_POST['d_id'];
$mail = $_POST['email'];
$mobile = $_POST['mobile'];
$pw = $_POST['password'];
 
// doctor insert query 
$sql = "INSERT INTO doctors (tital, f_name, l_name, nic_number, license_nu, email, mobile, start_time, end_time, password, usertype)values('".$tital."','".$f_name."','".$l_name."','".$nic."','".$l_id."','".$mail."','".$mobile."','0','0','".$pw."','2')";
$isSaved = mysqli_query($connection, $sql);
if($isSaved){
    header("location:index.php?msg=User Registered Successfully");
} else {
    echo 'Error'.$connection->error;
}
mysqli_close($connection);



?>