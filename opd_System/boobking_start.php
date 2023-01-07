<!DOCTYPE html>
<?php
session_start();

include './DB_connection.php';

$usertype = "";
$uid = "";
$nic_number = "";

$login_status = "";        //get login startus ture or false
if (isset($_POST['login_status'])) {
    $login_status = $_POST['login_status'];
}

if ($login_status == false) {  //if login status false move to the login page
    echo "<script> alert('Please login in to your account or create an account!');window.location='loginpage.php'</script>";
}

// assign values to the variables
$doctor_id = "";
if (isset($_POST['docid'])) {    
    $doctor_id = $_POST['docid'];
    $_SESSION["doctid"] = $doctor_id;
}

if (isset($_SESSION["usertype"])) {
    $usertype = $_SESSION["usertype"];
}
if (isset($_SESSION["pId"])) {
    $nic_number = $_SESSION["pId"];
}

$channel_date = "";
$hospital_name = "";
$hospital_ID = "";
if (isset($_SESSION["date"])) {
    $channel_date = $_SESSION["date"];
}
if (isset($_SESSION["hospital"])) {
    $hospital_name = $_SESSION["hospital"];
}

if ($hospital_name !== '') {
    $getid_hos = "SELECT * FROM hospital WHERE hname='" . $hospital_name . "'";
    $result = $connection->query($getid_hos);
    if ($row = $result->fetch_assoc()) {
        $hospital_ID = $row["idhospital"];
    }
}


$apoinment_count;
$appoinment_no;
$doctital = "";
$doct_firstname = "";
$doct_lastname = "";
$doct_hospitaltname = "";
$time_start = "";
$time_end = "";


//get row count of appoitment table in system
$appoinmentCount = "SELECT COUNT(appoinment.idappoinment),COUNT(appoinment.appoi_id) FROM appoinment join doctors on appoinment.doctor_id=doctors.iddoctors join hospital on appoinment.hospital_id=hospital.idhospital WHERE appoinment.doctor_id='" . $doctor_id . "' AND appoinment.hospital_id='" . $hospital_ID . "' AND appoinment.date='" . $channel_date . "'";
$resultAcount = $connection->query($appoinmentCount);
if ($rowAc = $resultAcount->fetch_assoc()) {
    $apoinment_count = $rowAc['COUNT(appoinment.idappoinment)']; // get teble rows count
    $appoinment_no = $rowAc['COUNT(appoinment.appoi_id)']; //get oppointment nomber count
}

if ($appoinment_no == 0) {  //appoint nombers is 0 go trougt this if blck 

    $selectDoctorD = "SELECT * FROM doctors WHERE iddoctors='" . $doctor_id . "' AND hospital_name='" . $hospital_name . "'"; // get all details of dcotors

    $resultdoctor = $connection->query($selectDoctorD);

    if ($rowdoctor = $resultdoctor->fetch_assoc()) {
        $doctital = $rowdoctor["tital"];
        $doct_firstname = $rowdoctor["f_name"];
        $doct_lastname = $rowdoctor["l_name"];
        $doct_hospitaltname = $rowdoctor["hospital_name"];

//        $time_start=$rowdoctor["hospital_name"];
//        $time_end=$rowdoctor["hospital_name"];
    }
} else {
    $selectDoctorD = "SELECT * FROM doctors WHERE iddoctors='" . $doctor_id . "' AND hospital_name='" . $hospital_name . "'"; // get all details of dcotors
    $resultdoctor = $connection->query($selectDoctorD);
    if ($rowdoctor = $resultdoctor->fetch_assoc()) {
        $doctital = $rowdoctor["tital"];
        $doct_firstname = $rowdoctor["f_name"];
        $doct_lastname = $rowdoctor["l_name"];
        $doct_hospitaltname = $rowdoctor["hospital_name"];
//        $time_start=$rowdoctor["hospital_name"];
//        $time_end=$rowdoctor["hospital_name"];  
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" href="boobking_start_css.css" rel="stylesheet"/>

    </head>
    <body>
<?php
include './header.php';
?>

        <div class="l-main-div">

            <div class="search_div">

                <table class="m_tb">
<?php
//                    $queryD = "SELECT * FROM doctors WHERE iddoctors='".$doctor_id."'  ";
//                    $resultD = $connection->query($queryD);
//                    if ($rowD = $resultD->fetch_assoc()) {
?>
                    <tr>
                        <td style="text-align: center;border-style: none; border-style: none;width:5%;">
                            <div style="width: 100%;height: 15vh;background-color:transparent;">

                                <img style="margin-right: auto;"width="95px" height="95px" src="image/774984.png">
                            </div>        
                        </td>
                        <td style="text-align:left;border-style: none;border-style: none;width:55%;">

<?php
echo "<h3>" . $doctital . ")." . $doct_firstname . $doct_lastname . "</h3>";
echo "<h5>Hospital Name&nbsp&nbsp;" . $doct_hospitaltname . "</h5>";
?>

                        </td>
                        </td>
                        <td style="width: 30%">
                            <h2 style="color: red;">Appointment No.<?php echo $appoinment_no = $appoinment_no + 1; ?></h2>
                        </td> 
                    </tr>
<?php //}  ?>
                </table>

            </div>  



            <div class="sub_div">
                <h3 class="h3head">Check Out Details</h3>

                <?php
                $queryu = "";
                $nic_u = "";

                $fees = 2250; //channel fee

                if (isset($_SESSION['nic'])) {
                    $nic_u = $_SESSION['nic'];
                }

                if ($usertype == 2) {  //check login stus
                    $queryu = "SELECT * FROM doctors WHERE nic_number='" . $nic_u . "'";
                } else if ($usertype == 0) {
                    $queryu = "SELECT * FROM patients WHERE nic_number='" . $nic_u . "'";
                }

                $resultu = $connection->query($queryu);
                if ($rowu = $resultu->fetch_assoc()) {
                    ?>


                    <form class="from1"method="post"action="confirm_oppinment.php">
                        <span>Tital</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                        <select name="status" class="combo1">


                            <?php
                            if ($usertype == 0) {
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
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span>First Name</span>&nbsp;&nbsp;&nbsp;
                        <input class="input" type="text" name="fname" placeholder="" value="<?php echo $rowu["f_name"]; ?>"/>
                        <br><br>
                        <span>Last Name</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="input" type="text" name="lname" placeholder=" " value="<?php echo $rowu["l_name"]; ?>" />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                        <span>NIC Number</span>&nbsp;&nbsp;&nbsp;
                        <input class="input" type="text" name="nic" placeholder=""value="<?php echo $rowu["nic_number"]; ?>"/>
                        <br><br>
                        <span>Email Address</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                        <input class="input" type="email" name="email" placeholder="" value="<?php echo $rowu["email"]; ?>"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <span>Mobile</span>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="input" type="text" name="mobile" placeholder="" value="<?php echo $rowu["mobile"]; ?>"/>
                        <br><br>

                        <span style="margin-left: 3%;">Passsword</span>
                        <input  style="margin-left: 2%;"class="input" type="text" name="password" value="<?php echo $rowu["password"]; ?>"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span>Channeling Chargers</span>&nbsp;&nbsp;&nbsp;
                        <input style="width: 23.5%" class="input" type="text" name="fee" value="<?php echo "LKR.&nbsp;&nbsp;" . $fees . ".00"."&nbsp;&nbsp;(include Service Charge LKR 250.00)"; ?>"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br> 
                        <input type="hidden" name="appo_nu" value="<?php echo $appoinment_no; ?>" />
                        <input type="hidden" name="fees" value="<?php echo $fees; ?>" />
                        <input  class="regibt" type="submit" name="submit" value="Confirm Details"/>

                    </form><br><br>
    <?php
}
?>
            </div>



        </div>
    </div>
<?php
include './footer.php';
?>

</body>
</html>
