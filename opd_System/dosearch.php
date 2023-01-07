<?php

session_start();
include './DB_connection.php';

$docname="";
$hospitalname="";
 $date="";

 //validation 
if (isset($_POST['dname'])) {$docname = $_POST['dname'];}
if (isset($_POST['hospital'])) {$hospitalname = $_POST['hospital'];}
if (isset($_POST['datee'])) {$date = $_POST['datee'];}


 $_SESSION["docname"]=$docname;
 $_SESSION["hospital"]=$hospitalname;
 $_SESSION["date"]=$date;
 
 if($date==''){
     echo "<script> alert('Please Select Oppintment Date');window.location='index.php'</script>"; // if date varible is empty send msg to user
     echo 'date';
 }elseif ($hospitalname=='') {
 echo "<script> alert('Please Select Oppintment Hospital');window.location='index.php'</script>"; // if hospital name varible is empty send msg to user
 
 }else{
 header("Location:search_oppinment.php?msg=inactive user");
 }

 //echo 'done'.$docname.$hospitalname.$time;