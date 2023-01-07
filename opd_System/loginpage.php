<!DOCTYPE html>
 
<html>
    <head>
        <meta charset="UTF-8">
        <title>login</title>
        <link type="text/css" href="login_css.css" rel="stylesheet"/>
    </head>
    <body>
        <?php
        include './header.php';
        ?>
        <div class="l-main-div">
           
            
            <div class="sub_div">
                <h3 class="h3head">Sign In</h3>
                
                
                 <div class="tab">
                    <button class="tablinks"onclick="openCity(event, 'London')">Patients</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Doctors</button>
                </div>
                
                
                <div id="London" class="tabcontent">
                       
                    <form class="from1"method="post"action="admin_paitent_login.php">
                    <input class="input" type="text" name="puname" placeholder="Enter NIC Number"/>
                    <br>
                    <br>
                    <input  class="input" type="password" name="ppassword" placeholder="Enter Password"/>
                    <br><br><br>
                    <input  class="loginbt" type="submit" name="submit" value="Login"/>

                 </form>

            
                </div>

                <div id="Paris" class="tabcontent">
                       
                    <form class="from1"method="post"action="doctor_login.php">
                    <input class="input1" type="text" name="duname" placeholder="Enter NIC  "/>
                    <br>
                    <br>
                    <input  class="input1" type="password" name="dpassword" placeholder="Enter Password"/>
                    <br><br><br>
                    <input  class="loginbt1" type="submit" name="submit" value="Login"/>

                 </form>

                </form>
                </div>
                
                
                
                
                
                
                
                
             <br><br><br>
                 <span  class="h5head">Not yet registered ?</span> <button class="regibt">Register</button>
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
