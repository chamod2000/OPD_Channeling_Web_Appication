 <?php

include './DB_connection.php';

//assign values to the variables
$tital = $_POST['status'];
$f_name = $_POST['fname'];
$l_name = $_POST['lname'];
$nic = $_POST['nic'];
$mail = $_POST['email'];
$mobile = $_POST['mobile'];
$pw = $_POST['password'];
 
// patients insert query 
$sql = "INSERT INTO patients (tital, f_name, l_name, nic_number, email,mobile,password,user_type)values('".$tital."','".$f_name."','".$l_name."','".$nic."','".$mail."','$mobile','".$pw."','0')";
$isSaved = mysqli_query($connection, $sql);
if($isSaved){
    header("location:index.php?msg=User Registered Successfully");
} else {
    echo 'Error';
}
mysqli_close($connection);



?>