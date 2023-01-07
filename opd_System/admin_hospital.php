 <?php include './DB_connection.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" href="admin_hospital-css.css " rel="stylesheet"/>

        <title></title>
    </head>
    <body>
        <?php include './admin_navbar_1.php';?>
        <div class="maindivadmin">

            <div class="divadmin">
                <div class="fromdiv">
                    <span style="color: white; font-size: 2.23vw;"> Hospital Registration</span>
                    <br>
                    <br>
                    <br>
                     <!--            hospital registration   start-->
                     <form class="from1"method="post"action="hospital_Registration.php">
                        <input class="inputadmin" type="text" name="hospitallname" placeholder="Hospital Name"/>
                        <br>
                        <br>
                        <input class="inputadmin" type="text" name="hospital_address" placeholder="Hospital Address"/>
                        <br>
                        <br>
                        <input class="inputadmin" type="text" name="hospital_contactnumber" placeholder="Contact Number"/>
                        <br>
                        <br>
                       
                        <input  class="adminbt" type="submit" name="submit" value="Save"/>

                    </form>
                        <!--             hospital registration   End-->
                </div>
            </div>
            <div class="divadminsub">
      <!--           load   hospital registration data  start-->
                <table>
                    <tr>
                        <th >ID </th>
                        <th>Hospital Name</th>
                       <th>Hospital Address</th>    
                        <th>Hospital Contact </th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                                   <?php
                    $query = "SELECT * FROM hospital"; 
                    $result = $connection->query($query);
                    while ($row = $result->fetch_assoc()) {
                ?>
                    <form action="update_hospital.php" method="post">
                    <tr>
                        <td><input class="inputfield wi" type="text" name="idd" id="id_product" value="<?php echo $row["idhospital"]; ?>"/></td>
                       
                        <td><input  class="inputfield"type="text" name="hos_name" id="id_product" value="<?php echo $row["hname"]; ?>"/></td>
                       <td><input  class="inputfield"type="text" name="hos_address" id="id_product" value="<?php echo $row["haddress"]; ?>"/></td>
                       <td><input  class="inputfield"type="text" name="hos_contactnumber" id="id_product" value="<?php echo $row["hcontact"]; ?>"/></td>
                       <td><button style="background-color: red;color: white;border-style: none;width: 100%;height: 4vh;"><a href="delete_hospital.php?id=<?php echo $row["idhospital"];?>">DELETE</a></button></td>
                         <td><input style="background-color: #ff9900;color: white;border-style: none;width: 100%;height: 4vh;" type="submit" value="UPDATE"/></td>
                    </tr>
                   </form>
                <?php  } ?>   

                </table>
          <!--           load hospital registration data  end-->
            </div>
        </div>
        <?php
        include './footer.php';
        ?>
    </body>
</html>
