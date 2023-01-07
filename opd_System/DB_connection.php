<?php
$username = "root";
$password = "chamodjava.01";
$databasename = "opd_cannelling";
$hosturl = "localhost";
$hostport = "3307";

$connection = new mysqli($hosturl, $username,$password, $databasename,$hostport);

if ($connection->connect_error){
    
    echo 'error !!!' . $connection->connect_error;
    
}else{
   // echo 'hello word';
}
?>

