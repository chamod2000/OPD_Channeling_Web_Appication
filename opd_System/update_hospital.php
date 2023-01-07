<?php

include './DB_connection.php';

//variable
$hosid="";
$hospname="";
$hosaddresss="";
$hospcontact="";
//assiign values
if(isset($_POST["idd"])){$hosid=$_POST["idd"];}
if(isset($_POST["hos_name"])){$hospname=$_POST["hos_name"];}
if(isset($_POST["hos_address"])){$hosaddresss=$_POST["hos_address"];}
if(isset($_POST["hos_contactnumber"])){$hospcontact=$_POST["hos_contactnumber"];}
//hospital update query
$sql="UPDATE `hospital` SET hname='".$hospname."',`haddress`='".$hosaddresss."',`hcontact`='".$hospcontact."' WHERE `idhospital`='".$hosid."'";
$isSaved= mysqli_query($connection, $sql);

if($isSaved){
    
   header("location:admin_hospital.php");
    
}else{
    echo "error in updating!!!";
}


?>