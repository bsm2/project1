<?php 
    session_start();
    if (!isset($_SESSION['role']) && $_SESSION['role']!=1) {
        header('location: dashboard.php');
    } 
    require '../connection.php';
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $id =  filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT); 


        $sql = "DELETE from admins where id=".$id;
    
        $op =  mysqli_query($con,$sql);
        $deleteMesssage = '';
        
        if($op){
    
            echo "Record deleted";
    
        }else{
    
            $deleteMesssage = "Error in delete op";
            
    
    
        }
    
        $_SESSION['deleteMesssage'] = $deleteMesssage;
    
        header("Location: dashboard.php");
    
    }
?> 
