<?php 
    session_start();
    require 'connection.php';
    if (isset($_SESSION['role'])) {
        header('location: dashboard.php');
    } 
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $id =  filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT); 
        $userId = $_SESSION['id'];

        $sql = "INSERT into usersfood(user_id,food_id) values ($userId,$id)";
    
        $op =  mysqli_query($con,$sql);
        $addMesssage = '';
        
        if($op){
    
            $deleteMesssage = "Record added";
    
        }else{
    
            $deleteMesssage = "Error in added op";
            
    
    
        }
    
        $_SESSION['addeMesssage'] = $addMesssage;
    
        header("Location: profil.php");
    
    }
?> 
