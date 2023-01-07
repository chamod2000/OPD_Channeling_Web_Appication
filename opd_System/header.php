<?php
if (session_id() == '') {
    session_start();
}
$is_login = false;
$usertypevalue="";
if (isset($_SESSION["is_Login"])) {
    $is_login = $_SESSION["is_Login"];
}
if (isset($_SESSION["usertype"])) {
    $usertypevalue = $_SESSION["usertype"];
}
 
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" href="header_css.css" rel="stylesheet"/>

        <script src="headerjs.js"></script>
    </head>
    <body>
          
        <header class="header">
            <h1 class="logo"><a href="index.php">OPD CHANNELING</a></h1>
            <ul class="main-nav">
                <li><a href="index.php">HOME</a></li>
                <?php
                if ($is_login) {
                    
                    if($usertypevalue==0){
                    ?>
                   
                    <li><a href="user_oppintment.php">BOOKING</a></li>
                    <?php }elseif ($usertypevalue==2) {?>
                    <li><a href="doctor_oppintment.php">APPOINTMENT</a></li>
                     <?php   }     ?>
                  
                    
                    <li><a href="user_profile.php">PROFILE</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>


                    <?php } else {
                    ?>
                    <li><a href="test.php">SIGN UP</a></li>
                    <li><a href="loginpage.php">SIGN IN</a></li>
                <?php } ?>
            </ul>
        </header> 

    </body>
</html>
