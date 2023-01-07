<!DOCTYPE html>
<?php
session_start();
include './DB_connection.php';

$usertypevalue="";
if (isset($_SESSION["usertype"])) {
    $usertypevalue = $_SESSION["usertype"];
}
 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <link type="text/css" href="home_css.css" rel="stylesheet"/>
    </head>
    <body>
        <?php
        include './header.php';
        ?>

        <div class="l-main-div">
 

            <div class="sub_div">
                <h3 class="h3head">Cannel Your Doctor Now</h3>
                <form class="from1"method="post"action="dosearch.php">
                    <input class="input" type="text" name="dname" placeholder="Doctor Name"/>
                    <br>
                    <br>
                     <select name="hospital" class="combo1">
                         <option disabled selected>Select Hospital</option>
                         <?php
                                                                   //het all hospital name  and shoe in combo box
                        $hquery="SELECT * FROM `hospital`";
                        $result=  mysqli_query($connection, $hquery);
                        while ($row=$result->fetch_assoc()){
                            
                            ?>
                         <option value="<?php echo$row['hname']; ?>"><?php echo$row['hname'];?></option>
                        <?php
                       }
                       ?>
                    </select>
                    <br><br>
                    <input  class="input" type="date" name="datee" placeholder="Select Date"/>
                    <br><br><br>
<!--                    validation for if doctor log into the acc system will desable the search buton in home page-->
                    <?php if ($usertypevalue==2){?>            
                    <input  class="loginbt" type="submit" name="submit" value="Search" disabled/>
                    <?php }elseif ($usertypevalue==0) {?>
                     <input  class="loginbt" type="submit" name="submit" value="Search"/>
                    <?php } else {?>
                    <input  class="loginbt" type="submit" name="submit" value="Search"/>
                 <?php }?>
                </form>
            </div>
        </div>

        <?php
        include './footer.php';
        ?>
    </body>
</html>
