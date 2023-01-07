 <?php include './DB_connection.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" href="admin-doctors_css.css" rel="stylesheet"/>

        <title></title>
    </head>
    <body>
        <?php include './admin_navbar_1.php';?>
        <div class="maindivadmin">

            <div class="divadmin">
                <div class="fromdiv">
                    <span style="color: white; font-size: 2.23vw; margin-top: -30%;margin-left: 5%;"> Doctor Registration</span>
 
                    <br>
                    <br>
                   
                     <!--            dpctrs registed    start--> 
                     
                     <form class="from1"method="post"action="admin_doctor_registration.php">
                     <select name="status" class="combo1">
 
                        <option value="Mr.">Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Miss.">Miss.</option>
                        <option value="Dr(Ms)">Dr(Ms).</option>
                        <option value="Dr(Mrs).">Dr(Mrs).</option>
                        <option value="Prof.">Prof.</option> 
                    </select>
                     <select name="hospital" class="combo1">
                          <?php
                        $hquery="SELECT * FROM `hospital`";                        // get all doctors name
                        $resultr=  mysqli_query($connection, $hquery);
                        while ($rowh=$resultr->fetch_assoc()){
                                ?>
                            <option value="<?php echo$rowh['hname']; ?>"><?php echo$rowh['hname']; ?></option>
                      <?php
                           }
                            ?>
                         
                    </select>
                      <br><br>
                    <input class="inputadmin" type="text" name="fname" placeholder="Enter First Number"/>
                     
                    <input class="inputadmin" type="text" name="lname" placeholder="Enter Last Number"/>
                    <br><br>
                    <input class="inputadmin" type="text" name="nic" placeholder="Enter NIC Number"/>
                    
                    <input class="inputadmin" type="text" name="d_id" placeholder="Enter License ID Number"/>
                    <br><br>
                    <input class="inputadmin" type="email" name="email" placeholder="Enter Valide Email"/>
                     
                    <input class="inputadmin" type="tel" name="mobile" placeholder="Enter Mobile Number"/>
                    <br><br> 
                    <input  class="inputadmin" type="time" name="s_time" placeholder="Start Time"/>
                    
                    <input  class="inputadmin" type="time" name="e_time" placeholder="End Time"/>
                 
                    <br><br> 
                    <input  class="inputadmin" type="password" name="password" placeholder="Enter Password"/>
                    <br><br> 
                    <input  class="adminbt" type="submit" name="submit" value="Save"/>
                    
                    
                 </form>
                       
                    
                     
                     
                        <!--            doctors registration  End-->
                </div>
                <br> <br> <br>
            </div>
            <div class="divadminsub">
      <!--           load doctors registed    start-->
      <table class="table">
                    <tr>
                        <th >ID </th>
                        <th>Tital</th>
                       <th>First Name</th>    
                        <th>Last Name </th>
                        <th>NIC Number </th>
                        <th>License ID Number </th>
                        <th>Hospital</th>
                        <th>Email </th>
                        <th>Mobile </th>     
                        <th>Start Time </th>
                        <th>End Time </th>
                        <th>Password </th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                                   <?php
                    $query = "SELECT * FROM doctors";   // load all register doctoers details
                    $result = $connection->query($query);
                    while ($row = $result->fetch_assoc()) {
                ?>
                    <form action="update_doctor.php" method="post">
                    <tr>
                        <td><input class="inputfield " type="text" name="idd" id=" " value="<?php echo $row["iddoctors"]; ?>"/></td>
                        <td><input class="inputfield" type="text" name="titals" id=" " value="<?php echo $row["tital"]; ?>"/></td>
                        <td><input  class="inputfield"type="text" name="f_name" id=" " value="<?php echo $row["f_name"]; ?>"/></td>
                        <td><input  class="inputfield"type="text" name="l_name" id=" " value="<?php echo $row["l_name"]; ?>"/></td>
                       <td><input  class="inputfield"type="text" name="nic" id=" " value="<?php echo $row["nic_number"]; ?>"/></td>
                       <td><input  class="inputfield"type="text" name="id_doc" id=" " value="<?php echo $row["license_nu"]; ?>"/></td>
                       <td><input  class="inputfield"type="text" name="hosname" id=" " value="<?php echo $row["hospital_name"]; ?>"/></td>
                       <td><input  class="inputfield"type="text" name="email" id=" " value="<?php echo $row["email"]; ?>"/></td>
                       <td><input  class="inputfield"type="tel" name="mobile" id=" " value="<?php echo $row["mobile"]; ?>"/></td>
                       <td><input  class="inputfield"type="time" name="stime" id=" " value="<?php echo $row["start_time"]; ?>"/></td>
                       <td><input  class="inputfield"type="time" name="etime" id=" " value="<?php echo $row["end_time"]; ?>"/></td>
                       <td><input  class="inputfield"type="tel" name="password" id=" " value="<?php echo $row["password"]; ?>"/></td>
                       <td><button style="background-color: red;color: white;border-style: none;width: 100%;height: 4vh;"><a href="delete_doctor.php?id=<?php echo $row["iddoctors"];?>">DELETE</a></button></td>
                         <td><input style="background-color: #ff9900;color: white;border-style: none;width: 100%;height: 4vh;" type="submit" value="UPDATE"/></td>
                    </tr>
                    
                   </form>
                <?php } ?>   

                </table>
        </div>
      
        
          <!--           load doctors registed    end-->
          
        </div>
        <br><br><br><br> <br><br><br><br> <br><br><br><br>
        <?php include './footer.php';?>
    </body>
</html>
