<?php 

    session_start();

    require '../connection.php';

    if (!isset($_SESSION['role']) && $_SESSION['role']!=1) {
        header('location: dashboard.php');
    }   

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        function clean($str){

        return stripcslashes(htmlspecialchars(trim($str)));

        }

        $id      = $_POST['id'];
        $name     = clean($_POST['name']);
        $email    = clean($_POST['email']);
        $password = md5(clean($_POST['password']));
        $address  = clean($_POST['address']);
        $phone    = clean($_POST['phone']);
        $role     = $_POST['role'];
        
    

        // Validation 

        $Messages = array();
        if (empty($name) || strlen($name) <5) {
            $Messages[]='error happend in the name<br>';
        }else{
            echo $_POST['name'].'<br>';
        }
        if ( empty($_POST['email'])|| !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
            $Messages[]= 'error happend in the email <br>';
        }else{
            echo $_POST['email'].'<br>';
            
        }
        if ( empty($_POST['password']) || strlen($_POST['password']) < 5) {
            $Messages[]='error happend in the password <br>';
        }else {
            echo $_POST['password'].'<br>';
        }
        if (empty($_POST['address']) ) {
            $Messages[]='error happend in the address <br>';
        }else{
            
            echo $_POST['address'].'<br>';
        }

        if( !empty($Messages) ){

            foreach ($Messages as $message) {
                echo $message.'<br>';
            }

        }else{
            $query = "INSERT into admins (name,password,email,address,phone,role) values('$name','$password','$email','$address','$phone','$role')";
            $result =  mysqli_query($con,$query);  
            
            if($result){
                $Messg =  'data inserted ';
            }else{
                $Messg =   'error in insert op';
            }

            $sql2 = "SELECT * FROM admins ";
            $op2= mysqli_query($con,$sql2);
            //$admine_data = mysqli_fetch_assoc($op2); 
            // $_SESSION['adminData']= $admine_data;
            

        }

            echo $Messg;
            
            header('Location: dashboard.php');



    }else{

    $errorMessage =  'Error in request method';
    
}


?>