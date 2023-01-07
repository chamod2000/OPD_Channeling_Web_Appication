<!DOCTYPE html>
<?php
session_start();
include './DB_connection.php';

$sdocname = "";
$shospitalname = "";
//$stime="";
$islogin=false;

if (isset($_SESSION['is_Login'])) {
    $islogin = $_SESSION['is_Login'];
}
if (isset($_SESSION['docname'])) {
    $sdocname = $_SESSION['docname'];
}
if (isset($_SESSION['hospital'])) {
    $shospitalname = $_SESSION["hospital"];
}

//echo 'docname'.$sdocname;
//echo 'Hospital name'.$shospitalname;
//if (isset($_SESSION['time'])) {
//    $stime = $_SESSION["time"];
////}
//echo $sdocname;
//echo $shospitalname;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" href="search_oppinment_css.css" rel="stylesheet"/>
    </head>
    <body>
        <?php
        include './header.php';
        ?>
        <div class="l-main-div">

            <div class="search_div">

                <table class="m_tb">
                    <?php
                    if ($shospitalname == '' && $sdocname !== '') {            //check hospital name and doctor name empty
                        $query = "SELECT * FROM doctors where f_name like '%" . $sdocname . "%'";
                    } else if ($sdocname == '' && $shospitalname !== '') {                    //check hospital name null empty
                        $query = "SELECT * FROM doctors where hospital_name like '%" . $shospitalname . "%'";
                    } else if ($sdocname !== '' && $shospitalname !== '') {                           //check both varible are emply
                        $query = "SELECT * FROM doctors where f_name like '%" . $sdocname . "%' OR hospital_name like '%" . $shospitalname . "%'"; //AND start_time like '%" . $stime . "%'
                    } else {
                         $query = "SELECT * FROM doctors"; 
                 
                    }

                    $result = $connection->query($query);
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td style="text-align: center;border-style: none;width:25%;">
                                <div style="width: 100%;height: 22vh;background-color:transparent;">

                                    <img width="140px" height="140px" src="image/774984.png">
                                </div>        
                            </td>
                            <td style="text-align:left;border-style: none; width:55%;">

                                <?php
                                echo "<h3>" . $row["tital"] . ")." . $row["f_name"] . $row["l_name"] . "</h3>";
                                echo "<h5> Hospital Name&nbsp&nbsp;" . $row["hospital_name"] . "</h5>";
                                // echo "<h6> Start Time &nbsp;&nbsp;" . $row["start_time"] . $row["end_time"] . "</h6>";
                                ?>

                            </td>
                            <td style="text-align:left;border-style: none;;width:20%;">
                                <form method="post" action="boobking_start.php" style=""> 
                                    <input type="hidden"name="docid" value="<?php echo $row["iddoctors"]; ?>"/>
                                    <input type="hidden"name="login_status" value="<?php echo $islogin; ?>"/>
                                    
                                    <input type="submit" class="button btn-ani" style="background-color:  #6666ff; color:white;
                                           border: none;padding: 10px 10px;font-size: 90%;margin-left: 3.5%;margin-top: 5%;
                                           font-weight: bold; border-radius: 5%;" value="Channel Now"> <br><br>
                                    
                                </form>

                            
                        </tr>
<?php } ?>
                </table>

            </div>  

        </div>



<?php
include './footer.php';
?>
    </body>
</html>
