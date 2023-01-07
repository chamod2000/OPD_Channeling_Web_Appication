<?php
session_start();
include './DB_connection.php';
$nicnumber="";
$password="";

if (isset($_POST['duname'])) {$nicnumber = $_POST['duname'];}
if (isset($_POST['dpassword'])) {$password = $_POST['dpassword'];}

//validation

//if($username==''){ header("Location:user-login.php?msg=Username not Found"); die();}
//if($password==''){ header("Location:user-login.php?msg=Password not Found"); die();}
if($username==''){   echo "<script> alert('Username not Found');window.location='user-login.php'</script>";}
if($password==''){   echo "<script> alert('Password not Found');window.location='user-login.php'</script>";
     }

$query="select * from doctors where nic_number = '".$nicnumber."'";
$result = $connection->query($query);
if($result->num_rows > 0){
    if($row = $result->fetch_assoc()){
    $pass=$row['password'];
    $is_active=$row['is_active'];
    if ($is_active=='3'){
        header("Location:loginpage.php?msg=inactive user"); die();
    }elseif ($password==$pass) {
              $_SESSION["tital"]=$row['tital'];
            $_SESSION["dId"]=$row['iddoctors'];
            $_SESSION["nic"]=$row['nic_number'];
            $_SESSION["is_Login"] = true;
            $_SESSION["usertype"] = $row['usertype'];
             header("Location:index.php?msg=welcome"); die();
    } else {
         //incorrect pw
           //  header("Location:user-login.php?msg=incorrect pw"); die();
        echo "<script> alert('incorrect password');window.location='loginpage.php'</script>";
     
    }
    }
} else {
     //header("Location:user-login.php?msg=invalid user"); die();  
     echo "<script> alert('Invalid user');window.location='loginpage.php'</script>";
}







?>