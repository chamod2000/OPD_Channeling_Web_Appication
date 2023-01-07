 <?php include './DB_connection.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" href="admin_patients_css.css" rel="stylesheet"/>

        <title></title>
    </head>
    <body>
        <?php include './admin_navbar_1.php';?>
        <div class="maindivadmin">

            <div class="divadmin">
                <div class="fromdiv">
                    <span style="color: white; font-size: 2.23vw;margin-top: -10%">patients Management</span>
                    <br>
                    <br>
                    <br>
                     <!--            patient registed    start-->
                     <form class="from1"method="post"action="admin_patient_registration.php">
                  
                         <select name="status" class="combo1">
                        <option>Title- Required</option>
                        <option value="tital">Mr.</option>
                        <option value="tital">Mrs.</option>
                        <option value="tital">Miss.</option>
                        <option value="tital">Dr(Ms).</option>
                        <option value="tital">Dr(Mrs).</option>
                        <option value="tital">Prof.</option> 
                    </select>
                    <br> <br> 
                    <input class="inputadmin" type="text" name="fname" placeholder="Enter First Number"/>
                    <br><br>
                    <input class="inputadmin" type="text" name="lname" placeholder="Enter Last Number"/>
                    <br><br>
                    <input class="inputadmin" type="text" name="nic" placeholder="Enter NIC Number"/>
                    <br><br>
                    <input class="inputadmin" type="email" name="email" placeholder="Enter Valide Email"/>
                    <br><br>
                    <input class="inputadmin" type="email" name="mobile" placeholder="Enter Contact Numbet"/>
                    <br><br>
                    <input  class="inputadmin" type="password" name="password" placeholder="Enter Password"/>
                    <br>  <br> 
                    <input  class="adminbt" type="submit" name="submit" value="Save"/>
               
                    </form>
                        <!--            patient registed    End-->
                </div>
            </div>
            <div class="divadminsub">
      <!--           load patient registed  data  start-->
                <table>
                    <tr>
                        <th >ID </th>
                        <th>Tital</th>
                        <th>First Name</th>
                       <th>Last Name</th>    
                        <th>NIC Number </th>
                        <th>Email </th>
                        <th>Mobile </th>
                        <th>Password </th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                                   <?php
                    $query = "SELECT * FROM patients" ; // load all patient data
                    $result = $connection->query($query);
                    while ($row = $result->fetch_assoc()) {
                ?>
                    <form action="update_patient.php" method="post">
                    <tr>
                        <td><input class="inputfield " type="text" name="idds" id=" " value="<?php echo $row["idpatients"]; ?>"/></td>
                        <td><input class="inputfield" type="text" name="titals" id=" " value="<?php echo $row["tital"]; ?>"/></td>
                        <td><input  class="inputfield"type="text" name="f_name" id=" " value="<?php echo $row["f_name"]; ?>"/></td>
                        <td><input  class="inputfield"type="text" name="l_name" id=" " value="<?php echo $row["l_name"]; ?>"/></td>
                       <td><input  class="inputfield"type="text" name="nic" id=" " value="<?php echo $row["nic_number"]; ?>"/></td>
                       <td><input  class="inputfield"type="text" name="email" id=" " value="<?php echo $row["email"]; ?>"/></td>
                       <td><input  class="inputfield"type="tel" name="mobile" id=" " value="<?php echo $row["mobile"]; ?>"/></td>
                       <td><input  class="inputfield"type="tel" name="password" id=" " value="<?php echo $row["password"]; ?>"/></td>
                       <td><button style="background-color: red;color: white;border-style: none;width: 100%;height: 4vh;"><a href="delete_patient.php?id=<?php echo $row["idpatients"];?>">DELETE</a></button></td>
                         <td><input style="background-color: #ff9900;color: white;border-style: none;width: 100%;height: 4vh;" type="submit" value="UPDATE"/></td>
                    </tr>
                   </form>
                <?php } ?>   

                </table>
          <!--           load patient registed data  end-->
            </div>
        </div>
        <?php
        include './footer.php';
        ?>
    </body>
</html>
