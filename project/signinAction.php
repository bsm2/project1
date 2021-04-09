<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        require 'connection.php';

        function clean($str){

            return stripcslashes(htmlspecialchars(trim($str)));
        
        }

        $email    = clean($_POST['email']);
        $password = htmlspecialchars(trim($_POST['password']));    

        $errorFlag = 0; 

        $message = array();


        if(empty($email) || empty($password)){

            $errorFlag = 1;

            $message[]  = 'empty fields';
            
        }

        if(filter_var($email,FILTER_VALIDATE_EMAIL) == FALSE){
            $errorFlag = 1;
            $message[] = 'Invali email';
        }


        if(strlen($password) < 6){

            $errorFlag = 1;
            $message[] = 'Invalid password length , must be >= 6';
        }



    if($errorFlag == 0){
        // code 
        $password = md5($password);
        
        $sql = "select * from users where email = '$email'   and  password = '$password'  ";

        $op =  mysqli_query($con,$sql);
        
        if(mysqli_num_rows($op) == 1 ){

            $data = mysqli_fetch_assoc($op);
        
            $_SESSION['id']   = $data['id'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['address'] = $data['address'];
            $_SESSION['phone'] = $data['phone'];
            $_SESSION['email'] = $data['email'];

            header('Location: Profil.php');


        }else{
            $message[] = 'no matched data';
            // $_SESSION['Message'] =  $message ;
            

            header('Location: signin.php');

        }




        }else{

            $_SESSION['Message'] = $message ;

            header('Location: signin.php');

        }
    

    }else{

        header('Location: signin.php'); 
    }



?>