 <?php
include './DB_connection.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" href="admin_oppointment_css.css" rel="stylesheet"/>
    </head>
    <body>
         <?php include './admin_navbar_1.php';?>
        <div class="maindivadmin">

            
            <div class="divadminsub">
      <!--           load   opption registration data  start-->
      
      <h1>Channeling Oppointment</h1>
                <table>
                    <tr>
                        <th >ID </th>
                        <th >Oppointment ID </th>
                        <th>Patients ID</th>
                       <th>Doctor ID Name</th>    
                        <th>Hospital Name </th>
                        <th>Channeling Date </th>
                        <th>Delete</th>
                       
                    </tr>
                                   <?php
                    $hostnamee="";
                    $query = "SELECT * FROM appoinment"; // select all appoitments
                    $result = $connection->query($query);
                    while ($row = $result->fetch_assoc()) {
                        
                     $hosid=$row["hospital_id"];
                     $hosnamee="SELECT * FROM hospital WHERE idhospital='".$hosid."'"; //get hosptal name
                     $resulthos=$connection->query($hosnamee);
                     if($rowh=$resulthos->fetch_assoc()){
                         $hostnamee=$rowh["hname"];
                     }
                     
                     $docti="";
                     $doctorfname="";
                     $doclname="";
                     
                     $docopid=$row["doctor_id"];
                     $docnamee="SELECT * FROM doctors WHERE iddoctors='".$docopid."'"; // get   doctors data
                     $resultdocc=$connection->query($docnamee);
                     if($rowD=$resultdocc->fetch_assoc()){
                         $docti=$rowD["tital"];
                            $doctorfname=$rowD["f_name"];
                            $doclname=$rowD["l_name"];
                     }
                        
                ?>
                    <form action="delete_oppintment.php" method="post">
                    <tr>
                        <td><input class="inputfield wi" type="text" name="idd" id=" " value="<?php echo $row["idappoinment"]; ?>"/></td>
                       
                        <td><input  class="inputfield"type="text" name="opno"   value="<?php echo $row["appoi_id"]; ?>"/></td>
                       <td><input  class="inputfield"type="text" name="pid" id=" " value="<?php echo $row["paitent_id"]; ?>"/></td>
                       <td><input  class="inputfield"type="text" name="doid" id=" " value="<?php echo $docti.").".$doctorfname.$doclname; ?>"/></td>
                       <td><input  class="inputfield"type="text" name="hsoid" id=" " value="<?php echo $hostnamee; ?>"/></td>
                       <td><input  class="inputfield"type="text" name="cdate" id=" " value="<?php echo $row["date"]; ?>"/></td>
                       
                       <td><input style="background-color: #ff9900;color: white;border-style: none;width: 100%;height: 4vh;" type="submit" value="DELETE"/></td>
                    </tr>
                   </form>
                <?php  } ?>   

                </table>
          <!--           load appointment registration data  end-->
            </div>
        </div>
        <?php
        include './footer.php';
        ?>
    </body>
</html>
