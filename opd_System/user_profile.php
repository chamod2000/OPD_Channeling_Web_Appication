<!DOCTYPE html>
<?php
if (session_id() == '') {
    session_start();
}
include './DB_connection.php';
$is_login = false;
$usertype = "";
$uid="";
if (isset($_SESSION["is_Login"])) {
    $is_login = $_SESSION["is_Login"];
}
if (isset($_SESSION["usertype"])) {
    $usertype = $_SESSION["usertype"];
}
if (isset($_SESSION["dId"])) {
    $uid = $_SESSION["dId"];
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>User Profile</title>
        <link type="text/css" href="user_profile_css.css" rel="stylesheet"/>
    </head>
    <body>
        <?php
        include './header.php';
        ?>
        <div class="l-main-div">


            <div class="sub_div">
                <h3 class="h3head">User Profile</h3>

                <?php
                $queryu = "";
                $nic_u = "";
                if (isset($_SESSION['nic'])) {  // assing value to varibles
                    $nic_u = $_SESSION['nic'];
                }
                 //check if patient login or doctor login  into the system
                if ($usertype == 2) {
                    $queryu = "SELECT * FROM doctors WHERE nic_number='".$nic_u."'";
                } else if ($usertype == 0) {
                    $queryu = "SELECT * FROM patients WHERE nic_number='".$nic_u."'";
                }
                 
                $resultu = $connection->query($queryu);
                if ($rowu = $resultu->fetch_assoc()) {
                    ?>


                <form class="from1"method="post"action="user-update.php">
                        <span>Tital</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                        <select name="status" class="combo1">
                            <?php
                            if ($usertype == 2) {
                                ?>
                                <option value="<?php echo$rowu['iddoctors']; ?>"><?php echo$rowu['tital']; ?></option>
                                <?php
                            } elseif ($usertype == 0) {
                                ?>
                                <option value="<?php echo$rowu['idpatients']; ?>"><?php echo$rowu['tital']; ?></option>

                                <?php
                            }
                            ?>
                            <option value="Mr">Mr.</option>
                            <option value="Mrs">Mrs.</option>
                            <option value="Miss">Miss.</option>
                            <option value="Dr(Ms">Dr(Ms).</option>
                            <option value="Dr(Mrs)">Dr(Mrs).</option>
                            <option value="Prof">Prof.</option> 
                        </select>
                        <br><br>
                        <span>First Name</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="input" type="text" name="fname" placeholder="" value="<?php echo $rowu["f_name"]; ?>"/>
                        <br><br>
                        <span>Last Name</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="input" type="text" name="lname" placeholder=" " value="<?php echo $rowu["l_name"]; ?>" />
                        <br><br>
                        <span>NIC Number</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="input" type="text" name="nic" placeholder=""value="<?php echo $rowu["nic_number"]; ?>"/>
                        <br><br>
                         
                        <span>Mobile</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="input" type="text" name="mobile" placeholder="" value="<?php echo $rowu["mobile"]; ?>"/>
                        <br><br>
                        <span>Email Address</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                        <input class="input" type="email" name="email" placeholder="" value="<?php echo $rowu["email"]; ?>"/>
                        <br><br>
                        <span>Passsword</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input  class="input" type="text" name="password" value="<?php echo $rowu["password"]; ?>"/>
                        <br><br> 

                        <?php
                        if ($usertype == 2) {  // if doctor login to the syste these input will enable to the doctor
                            ?>
                        
                        <span>Select Hospital</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select name="hstatus" class="combo1">
                              <option><?php echo$rowu['hospital_name']; ?></option>
                            <?php
                        $hquery="SELECT * FROM `hospital`";    //get all registered hospital name
                        $resultr=  mysqli_query($connection, $hquery);
                        while ($rowh=$resultr->fetch_assoc()){
                                ?>
                                <option value="<?php echo$rowh['hname']; ?>"><?php echo$rowh['hname']; ?></option>
                                <?php
                           }
                            ?>
                           
                        </select>
                         <br><br> 
                            <span>Doctor License ID</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input  class="input" type="text" name="li_num" placeholder="" value="<?php echo $rowu["license_nu"]; ?>"/>
                            <br><br> 
                            <span>Start Time</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input  class="input" type="time" name="stime" placeholder="" value="<?php echo $rowu["start_time"]; ?>"/>
                            <br><br> 
                            <span>End Time</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input  class="input" type="time" name="etime" placeholder="" value="<?php echo $rowu["end_time"]; ?>"/>
                            <br><br> 

                            <?php
                        }
                        ?>
                        <input  class="regibt" type="submit" name="submit" value="Update"/>

                    </form><br><br>
                    <?php
                }
                ?>
            </div>

        </div>

        <?php
        include './footer.php';
        ?>
    </body>
</html>
