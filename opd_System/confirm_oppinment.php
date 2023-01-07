<?php
session_start();
include './DB_connection.php';

$paID="";
$doctor_ID="";
$channel_date="";
$hospital_name="";$hospital_ID="";
$oppCount=0;
$opfees=0;

//assing valuse to the varible

 if(isset($_SESSION["pId"])){ $paID= $_SESSION["pId"];}
 if(isset($_SESSION["doctid"])){ $doctor_ID= $_SESSION["doctid"];}
 if(isset($_SESSION["date"])){ $channel_date= $_SESSION["date"];}
 if(isset($_SESSION["hospital"])){ $hospital_name= $_SESSION["hospital"];}
if(isset($_POST["appo_nu"])){$oppCount=$_POST["appo_nu"];}
if(isset($_POST["fees"])){$opfees=$_POST["fees"];}


if($hospital_name!==''){  // get hospotal id
    $getid_hos="SELECT * FROM hospital WHERE hname='".$hospital_name."'";
     $result = $connection->query($getid_hos);
      if($row = $result->fetch_assoc()) {
       $hospital_ID=$row["idhospital"];
      }
}
 //appointment insert query
$insertOpp="INSERT INTO appoinment(appoi_id, paitent_id, doctor_id, hospital_id, date, status_p, status_d)VALUES('".$oppCount."','".$paID."','".$doctor_ID."','".$hospital_ID."','".$channel_date."','1','1')";
 $isSaved =  mysqli_query($connection, $insertOpp);
 
  //payment insert query
$payment="INSERT INTO payment(user_id, amount, po_id_no)VALUES('".$paID."','".$oppCount."','".$opfees."')";
 $isSavedp =  mysqli_query($connection, $payment);
 
 
 
 
if($isSaved){
  echo "<script> alert('Successfully Placed');window.location='index.php'</script>";
} else {
   //echo "<script> alert('Chnneling Failed');window.location='index.php'</script>";
     echo 'Error'.$connection->error;   
}
?>