<?php 
    
    $server   = "localhost";
    $userName = "root";
    $password = "";
    $dbName   = "mydiet";


    $con =  mysqli_connect($server,$userName,$password,$dbName);

    if(!$con){
        
        echo "error in connection ".mysqli_connect_error();
    }


?>