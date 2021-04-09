<?php 
    session_start();
    if (isset($_SESSION['role'])) {
        header('location: dashboard.php');
    } 

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        require '../connection.php';

        function clean($str){

            return stripcslashes(htmlspecialchars(trim($str)));
        
        }

        $email    = clean($_POST['email']);
        $password = htmlspecialchars(trim($_POST['password']));    

        $errorFlag = 0; 

        $errorMsg =array();

        if(empty($email) || empty($password)){

            $errorFlag = 1;

            $errorMsg['messageEmpty']  = 'empty fields';
        }

        if(filter_var($email,FILTER_VALIDATE_EMAIL) == FALSE){
            $errorFlag = 1;
            $errorMsg['messageEmail']  = 'Invali email';
        }


        if(strlen($password) < 6){

            $errorFlag = 1;
            $errorMsg['messagePassword']  = 'Invalid password length , must be >= 6';
            
        }



    if($errorFlag == 0){
        // get admine data
        $password = md5($password);
        
        $sql = "SELECT * from admins where email = '$email'   and  password = '$password' ";

        $op =  mysqli_query($con,$sql);
        
        if(mysqli_num_rows($op) == 1 ){
            
            $data= mysqli_fetch_assoc($op);
            
            $_SESSION['id']   = $data['id'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['address'] = $data['address'];
            $_SESSION['phone'] = $data['phone'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['role'] = $data['role'];

            header('Location: dashboard.php');


        }else{
            
            // foreach ($errorMsg as $key => $value) {
            //     $_SESSION['errorMessage']= $value;
            // }
            
            header('Location: signin.php');

        }




        }else{

            
                $_SESSION['errorMessage']= $errorMsg;
            
            header('Location: signin.php');

        }
    

    }else{


    header('Location: signin.php'); 
    }



?>
