<?php 
    session_start();
    require 'connection.php';
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $id =  filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT); 


        $sql = "DELETE from usersfood where id=".$id;
    
        $op =  mysqli_query($con,$sql);
        $deleteMesssage = '';
        
        if($op){
    
            $deleteMesssage = "Record deleted";
    
        }else{
    
            $deleteMesssage = "Error in delete op";
            
    
    
        }
    
        $_SESSION['deleteMesssage'] = $deleteMesssage;
    
        header("Location: profil.php");
    
    }
?> 
