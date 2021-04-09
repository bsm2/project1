<?php 

    session_start();

    require 'connection.php';   

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        function clean($str){

        return stripcslashes(htmlspecialchars(trim($str)));

        }

        
        $name     = clean($_POST['name']);
        $email    = clean($_POST['email']);
        $password = md5(clean($_POST['password']));
        $address  = clean($_POST['address']);
        $phone    = clean($_POST['phone']);
        
    

        // Validation 

        $Messages = array();
        if (empty($_POST['name']) || strlen($_POST['name']) <5) {
            $Messages[]='error happend in the name<br>';
        }else{
            echo $_POST['name'].'<br>';
            $_SESSION['name']= $name;
        }
        if ( empty($_POST['email'])|| !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
            $Messages[]= 'error happend in the email <br>';
        }else{
            echo $_POST['email'].'<br>';
            $_SESSION['email']= $email;
        }
        if ( empty($_POST['password']) || strlen($_POST['password']) < 5) {
            $Messages[]='error happend in the password <br>';
        }else {
            echo $_POST['password'].'<br>';
        }
        if (empty($_POST['address']) ) {
            $Messages[]='error happend in the address <br>';
        }else{
            $_SESSION['address']= $address;
            echo $_POST['address'].'<br>';
        }
        if (strlen($phone) < 11) {
            $Messages[]='error happend in the phone <br>';
            echo $phone;
            
        }else{
            $_SESSION['phone']= $phone;
        }

        if( !empty($Messages) ){

            $_SESSION['errorMessage']= $Messages;
            header('Location: signup.php');


        }else{
            $query = "INSERT into users (name,password,email,address,phone) values('$name','$password','$email','$address','$phone')";
            $result =  mysqli_query($con,$query);  
            
            if($result){
                $Messg =  'data inserted ';
                
            }else{
                $Messg =   'error in insert op';
            }


        }

            //echo $Messg;
            //$_SESSION['id']=;
            header('Location: profil.php');




    }else{

    $errorMessage =  'Error in request method';
    
}

?>
