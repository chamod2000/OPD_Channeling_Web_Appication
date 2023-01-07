<?php
include './DB_connection.php';

//update admin

$id=$_POST["ida"];
$username=$_POST["useida"];
$adminpassword=$_POST["passworda"];
//echo $id,$adminid,$adminpassword;

$sql="UPDATE `admin` SET username='".$username."',`password`='".$adminpassword."' WHERE `idadmin`='".$id."'";
$isSaved= mysqli_query($connection, $sql);

if($isSaved){
    
   header("location:admin_administratior.php");
    
}else{
    echo "error in updating!!!";
}
 
?>

