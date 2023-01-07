<?php

include './DB_connection.php';

$usernameadmin="";
$pasword="";

if(isset($_POST["username"])){$usernameadmin=$_POST["username"];}   //assing parameter vluese to variables
if(isset($_POST["password"])){$pasword=$_POST["password"];}


$insert="INSERT INTO `admin`(username, password, usertype)VALUES('".$usernameadmin."','".$pasword."','4')"; // insert new admin 
 $issaved=mysqli_query($connection, $insert);
    if($issaved){
         header("location:admin_administratior.php");
    } else {
        echo 'eroor'.$connection->error;  
}

?>