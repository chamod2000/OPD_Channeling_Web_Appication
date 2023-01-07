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

                <div class="tab">
                    <button class="tablinks"onclick="openCity(event, 'London')">Patients</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Doctors</button>
                </div>

<!--                patients registating div-->
                <div id="London" class="tabcontent">
                    <form class="from1"method="post"action="patients_registration.php"> 
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
                    <input class="input" type="tel" name="mobile" placeholder="Enter Valide mobile"/>
                    <br><br>
                    <input  class="input" type="password" name="password" placeholder="Enter Password"/>
                    <br><br><br>
                    <input  class="regibt" type="submit" name="submit" value="Sign Up"/>

                </form>
                </div>
<!--                patients registating div end-->
<!--                doctor  registating div start-->
                <div id="Paris" class="tabcontent">
                    <form class="from1"method="post"action="doctor_registration.php">
                    <select name="status" class="combo11">
                        <option>Title- D</option>
                        <option value="Dr(Ms">Dr(Ms).</option>
                        <option value="Dr(Mrs)">Dr(Mrs).</option>
                        <option value="Prof">Prof.</option> 
                    </select>
                    <br><br>
                    <input class="input1" type="text" name="fname" placeholder="Enter First Number"/>
                    <br><br>
                    <input class="input1" type="text" name="lname" placeholder="Enter Last Number"/>
                    <br><br>
                    <input class="input1" type="text" name="nic" placeholder="Enter NIC Number"/>
                    <br><br>
                    <input class="input1" type="text" name="d_id" placeholder="Enter License ID Number"/>
                    <br><br>
                    <input class="input1" type="email" name="email" placeholder="Enter Valide Email"/>
                    <br><br>
                    <input class="input1" type="tel" name="mobile" placeholder="Enter Valide mobile"/>
                    <br><br>
                    <input  class="input1" type="password" name="password" placeholder="Enter Password"/>
                    <br><br><br>
                    <input  class="regibt1" type="submit" name="submit" value="Sign Up"/>

                </form>
                </div>
<!--                doctor  registating div end-->
              <br><br>
              <span  class="h5head">Alreay registered ?</span> <button class="loginbt"><a href="loginpage.php">Login</a>Login</button>
            </div>

        </div>

        <?php
        include './footer.php';
        ?>
        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
        </script>
    </body>
</html>
