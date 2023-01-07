<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" href="register_css.css" rel="stylesheet"/>
    </head>
    <body>
         <?php
        include './header.php';
        ?>
        <div class="l-main-div">
           
            
            <div class="sub_div">
                <h3 class="h3head">Sign Up</h3>
                 <form class="from1"method="post"action="#">
                     <select name="status" class="combo1">
                         <option>Title- Required</option>
                        <option value="Mr">Mr.</option>
                        <option value="Mrs">Mrs.</option>
                        <option value="Miss">Miss.</option>
                        <option value="Dr(Ms">Dr(Ms).</option>
                        <option value="Dr(Mrs)">Dr(Mrs).</option>
                        <option value="Prof">Prof.</option> 
                    </select>
                      <br><br>
                    <input class="input" type="text" name="fname" placeholder="Enter First Number"/>
                    <br><br>
                    <input class="input" type="text" name="lname" placeholder="Enter Last Number"/>
                    <br><br>
                    <input class="input" type="text" name="nic" placeholder="Enter NIC Number"/>
                    <br><br>
                    <input class="input" type="email" name="email" placeholder="Enter Valide Email"/>
                    <br><br>
                    <input  class="input" type="password" name="password" placeholder="Enter Password"/>
                    <br><br><br>
                    <input  class="regibt" type="submit" name="submit" value="Sign Up"/>

                 </form><br><br>
                 <span  class="h5head">Alreay registered ?</span> <button class="loginbt">Login</button>
            </div>
            
        </div>
        
        <?php
        include './footer.php';
        ?>
    </body>
</html>
