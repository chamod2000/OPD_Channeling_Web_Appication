<?php
session_start();
include './DB_connection.php';

//validation

$islogin=false;
$pid="";
if (isset($_SESSION['is_Login'])) {
    $islogin = $_SESSION['is_Login'];
}
if (isset($_SESSION["pId"])) {$pid = $_SESSION["pId"];
}

$ptname="";
$pFname="";
$pLname="";

//get patient all data
$getuserName="SELECT * FROM patients WHERE idpatients='".$pid."'";
$resultp=$connection->query($getuserName);
if($rowp=$resultp->fetch_assoc()){
    $ptname=$rowp['tital'];
    $pFname=$rowp['f_name'];
    $pLname=$rowp['l_name'];
}
 

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" href="user_appoinment_css.css" rel="stylesheet"/>
    </head>
    <body>
        <?php
        include './header.php';
        ?>
         <div class="l-main-div">

            <div class="search_div">
                     <h1 style="color: #003399">My Booking Appointments</h1>
                <table class="m_tb">
                    
                    <?php
                    $op_t_id="";
                    $hosname="";
                    $doctorfname="";
                    $docti="";
                    $doclname="";
                    $dSTime="";
                    $dEDtime="";
                    
                   $bookingdata="SELECT * FROM appoinment WHERE paitent_id='".$pid."' AND status_p='1'"; // get data when user and status no is 1 patient data
                    $result = $connection->query($bookingdata);
                    while ($row = $result->fetch_assoc()) {
                        
                        $docid=$row["doctor_id"];
                        $hosid=$row["hospital_id"];
                        $op_t_id=$row["idappoinment"];
                        
                        $gethosname="SELECT * FROM hospital WHERE idhospital='".$hosid."'"; // get hosptal name
                        $resulthos=$connection->query($gethosname);
                        if($rowhos=$resulthos->fetch_assoc()){
                            $hosname=$rowhos["hname"];
                        }
                        $getDocname="SELECT * FROM doctors WHERE iddoctors='".$docid."'"; // get doctors infromation 
                        $resultdoc=$connection->query($getDocname);
                        if($rowhos=$resultdoc->fetch_assoc()){
                            $docti=$rowhos["tital"];
                            $doctorfname=$rowhos["f_name"];
                            $doclname=$rowhos["l_name"];
                            $dSTime=$rowhos["start_time"];
                            $dEDtime=$rowhos["end_time"];
                        }
                       
                        ?>
                        <tr>
                            <td style="text-align: center;border-style: none;width:25%;">
                                <div style="width: 100%;height: 22vh;background-color:transparent;margin-top: 0%;">

                                    <img width="60px" height="60px" src="image/appointment-icon-25.jpg">
                                </div>        
                            </td>
<!--                            <td style="text-align:left;border-style: none; border-bottom: 3px #666 solid;width:20%;">

                                <label><?php //echo $ptname.".".$pFname.$pLname;?></label>

                            </td>-->
                            <td style="text-align:left;border-style: none; border-left: 3px red solid;border-bottom: 6px white solid;width:10%;">

                                <label><?php echo $hosname ;?></label>

                            </td>
                            <td style="text-align:left;border-style: none;width:10%;">
                                 <label><?php echo "Op ID.".$row["appoi_id"];?></label>
                                

                            </td>
                            <td style="text-align:left;border-style: none;width:10%;">

                                <label><?php echo $docti.").".$doctorfname.$doclname;?></label>

                            </td>
                            <td style="text-align:left;border-style: none; width:10%;">

                                <label><?php echo $row["date"] ;?></label>

                            </td>
                            <td style="text-align:left;border-style: none; width:10%;">

                                <label><?php echo "From&nbsp;".$dSTime."&nbsp;To&nbsp;".$dEDtime ;?></label>

                            </td>
                            <td style="text-align:left;border-style: none; width:20%;">
                                <form method="post" action="deactivate_appoin.php" style=""> 
                                    <input type="hidden" name="pid" value="<?php echo $pid; ?>">  
                                    <input type="hidden" name="op_tid" value="<?php echo $op_t_id; ?>">  
                                    <input type="submit" class="button btn-ani" style="background-color:  #00cc00; color:white;
                                           border: none;padding: 10px 10px;font-size: 90%;margin-left: 3.5%;margin-top: 5%;
                                           font-weight: bold; border-radius: 5%;" value="Completed"> <br><br>
                                    
                                </form>
                            </td>
                            
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
