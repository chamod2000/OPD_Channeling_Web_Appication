<?php
session_start();
include './DB_connection.php';

$islogin=false;
$did="";
if (isset($_SESSION['is_Login'])) {
    $islogin = $_SESSION['is_Login'];
}
if (isset($_SESSION["dId"])) {$did = $_SESSION["dId"];
}

$dtname="";
$dFname="";
$dLname="";

//$getdocName="SELECT * FROM doctors WHERE iddoctors='".$did."'";
//$resultd=$connection->query($getdocName);
//if($rowd=$resultd->fetch_assoc()){
//    $dtname=$rowp['tital'];
//    $dFname=$rowp['f_name'];
//    $dLname=$rowp['l_name'];
//}
 

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
                <h1 style="color: #003399">Doctor Appointment</h1>
                <table class="m_tb">
                    
                    <?php
                    
                    $hosname="";
                    //$doctorfname="";
                    $op_tab_id="";
                    $pati="";
                    $ptname="";
                    $pFname="";
                    $pLname="";
                    
                   $appointmentdata="SELECT * FROM appoinment WHERE doctor_id='".$did."' AND status_d='1'";// get data when doctor and status no is 1 doctor data
                    $result = $connection->query($appointmentdata);
                    while ($row = $result->fetch_assoc()) {
                        
                        $pid=$row["paitent_id"];
                        $hosid=$row["hospital_id"];
                        $op_tab_id=$row["idappoinment"];
                        
                        $gethosname="SELECT * FROM hospital WHERE idhospital='".$hosid."'"; // get hosptal name
                        $resulthos=$connection->query($gethosname);
                        if($rowhos=$resulthos->fetch_assoc()){
                            $hosname=$rowhos["hname"];
                        }
                        $getPainame="SELECT * FROM patients WHERE idpatients='".$pid."'";// get doctors infromation 
                        $resultp=$connection->query($getPainame);
                        if($rowpain=$resultp->fetch_assoc()){
                            $pati=$rowpain["tital"];
                            $pFname=$rowpain["f_name"];
                            $pLname=$rowpain["l_name"];
                          
                        }
                        
                        ?>
                        <tr>
                            <td style="text-align: center;border-style: none;width:25%;">
                                <div style="width: 100%;height: 22vh;background-color:transparent;margin-top: 0%;">

                                    <img width="60px" height="60px" src="image/723203.png">
                                </div>        
                            </td>
<!--                            <td style="text-align:left;border-style: none; border-bottom: 3px #666 solid;width:20%;">

                                <label><?php //echo $ptname.".".$pFname.$pLname;?></label>

                            </td>-->
                            <td style="text-align:left;border-style: none; border-left: 3px #003399 solid;border-bottom: 6px white solid;width:10%;">

                                <label><?php echo $hosname ;?></label>

                            </td>
                            <td style="text-align:left;border-style: none;width:10%;">
                                 <label><?php echo "Op ID.".$row["appoi_id"];?></label>
                                

                            </td>
                            <td style="text-align:left;border-style: none;width:10%;">

                                <label><?php echo $pati.".".$pFname.$pLname;?></label>

                            </td>
                            <td style="text-align:left;border-style: none; width:10%;">

                                <label><?php echo $row["date"] ;?></label>

                            </td>
                            
                            <td style="text-align:left;border-style: none; width:20%;">
                                <form method="post" action="dectivate_doc_appoint.php" style=""> 
                                    
                                    <input type="hidden" name="op_tid" value="<?php echo $op_tab_id; ?>">  
                                    <input type="submit" class="button btn-ani" style="background-color:  #6699ff; color:white;
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
