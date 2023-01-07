 <?php
 include './DB_connection.php';
 
 ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" href="admin_administratiorDesing.css" rel="stylesheet"/>

        <title></title>
    </head>
    <body>
        <?php
        include './admin_navbar_1.php';
        ?>
        <div class="maindivadmin">

<!--            Admin Users registratiin start-->
            
            <div class="divadmin">
                <div class="fromdiv">
                    <span style="color: white; font-size: 2.23vw;"> System Users Administration</span>
                    <br>
                    <br>
                    <br>
                    <form class="from1"method="post"action="checkadminregister.php">
                        <input class="inputadmin" type="text" name="username" placeholder="Enter Admin user name"/>
                        <br>
                        <br>
                        <input  class="inputadmin" type="password" name="password" placeholder="Enter Password"/>
                        <br><br><br>
                        <input  class="adminbt" type="submit" name="submit" value="Save"/>

                    </form>
                </div>
            </div>
<!--            admin Users registratiin End-->
            <div class="divadminsub">
   <!--           admin Load registered admin start-->
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Admin User Number</th>
                        <th>Password</th>
                        <th>Update</th>
                        <th>Password</th>
                    </tr>
                                   <?php
                    $query = "SELECT * FROM `admin`";
                    $result = $connection->query($query);
                    while ($row = $result->fetch_assoc()) {
                ?>
                    <form action="updateadmin.php" method="post">
                    <tr>
                        <td><input class="inputfield" type="text" name="ida" id="id_product" value="<?php  echo $row["idadmin"]; ?>"/></td>
                        <td><input  class="inputfield"type="text" name="useida" id="id_product" value="<?php  echo $row["username"]; ?>"/></td>
                        <td><input class="inputfield"type="text" name="passworda" id="ProductName" value="<?php  echo $row["password"]; ?>"/></td>
                        <td><button style="background-color: red;color: white;border-style: none;width: 80%;height: 4vh;"><a href="deleteadmin.php?id=<?php echo $row["idadmin"];?>">DELETE</a></button></td>
                        <td><input style="background-color: #ff9900;color: white;border-style: none;width: 80%;height: 4vh;" type="submit" value="UPDATE"/></td>
                    </tr>
                   </form>
                <?php } ?>   

                </table>
            </div>
   <!--           Load registered admin end-->
        </div>
        <?php
        include './footer.php';
        ?>
    </body>
</html>
