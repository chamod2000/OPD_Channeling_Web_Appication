<?php

// check your loging

session_start();
include './DB_connection.php';
$nicnumber="";
$password = "";

//check userid or password emty
if (isset($_POST['puname'])) {$nicnumber = $_POST['puname'];}
if (isset($_POST['ppassword'])) {$password = $_POST['ppassword'];}
//
 
//validation
if($username==''){   echo "<script> alert('Username not Found');window.location='user-login.php'</script>";}
if($password==''){   echo "<script> alert('Password not Found');window.location='user-login.php'</script>";
     }
     
     
     
$query3 = "select * from admin where username = '" . $nicnumber . "'"; //admin user namd pw qury
$query2 = "select * from patients where nic_number = '".$nicnumber."'";//patient user namd pw qury

$result = $connection->query($query3);

$result2 = $connection->query($query2);

//check system admin user name and pw
if ($result->num_rows > 0) { 
    if ($row = $result->fetch_assoc()) {
        $pass = $row['password'];
        $is_active = $row['usertype'];

        if ($is_active !== '4') {
            header("Location:loginpage.php?msg=inactive user");
            die();
        } elseif ($password == $pass) {

            $_SESSION["is_Login"] = true;


            header("Location:admin_administratior.php");
            die();
        } else {
            //incorrect pw
            //  header("Location:user-login.php?msg=incorrect pw"); die();
            echo "<script> alert('incorrect password');window.location='loginpage.php'</script>";
        }
    }
    
    //check patiens user name and pw
} else if ($row2 = $result2->fetch_assoc()) {
    $pass=$row2['password'];
     $is_active=$row['is_active'];
    if ($is_active=='1'){
        header("Location:loginpage.php?msg=inactive user"); die();
    }elseif ($password==$pass) {
              $_SESSION["tital"]=$row2['tital'];
            $_SESSION["pId"]=$row2['idpatients'];
              $_SESSION["nic"]=$row2['nic_number'];
            $_SESSION["is_Login"] = true;
            $_SESSION["usertype"] = $row2['user_type'];
             header("Location:index.php?msg=welcome"); die();
    } else {
         //incorrect pw
           //  header("Location:user-login.php?msg=incorrect pw"); die();
        echo "<script> alert('incorrect password');window.location='loginpage.php'</script>";
     
    }
}else {
     //header("Location:user-login.php?msg=invalid user"); die();  
     echo "<script> alert('Invalid user');window.location='loginpage.php'</script>";
}
?>