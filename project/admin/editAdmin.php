<?php 
    session_start();
    include '../connection.php';
    if (!isset($_SESSION['role']) && $_SESSION['role']!=1) {
        header('location: dashboard.php');
    } 

    $sql2 = "SELECT * FROM roles ";
    $op2= mysqli_query($con,$sql2); 
    if ($_SESSION['role']!=1) {
        header('location: dashboard.php');
    }
    //get id
    if($_SERVER['REQUEST_METHOD'] == "GET"){

        $id =  filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT); 

        $sql  = "SELECT * from admins where id=".$id;

        $op =   mysqli_query($con,$sql);

        if($op){

            $data = mysqli_fetch_assoc($op);
            
        }else{
            echo 'No data related to this id ';
        }

        
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        function clean($str){
    
            return stripcslashes(htmlspecialchars(trim($str)));
    
        }
        $id = $_POST['id'];
        $name = clean($_POST['name']);
        $email= $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $role = $_POST['role'];
        $password = md5(clean($_POST['password']));
        
        
    

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
        if (empty($_POST['address']) ) {
            $Messages[]='error happend in the address <br>';
        }else{
            
            echo $_POST['address'].'<br>';
        }

        if (empty($role) ) {
            $Messages[]='error happend in the role <br>';
        }
        if(!empty($password)){
            if( strlen($password) < 6  ){
                
                $Message[] = "Length must be > 6";
            }
        } 

        if( !empty($messages)){
            
            foreach ($messages as $message) {
                echo $message.'<br>';
            }
    
        }else{

            if(!empty($password)){
            
                $password = md5($password);
                $query = "UPDATE admins SET  name ='$name' , email='$email' , address='$address' , role='$role', phone='$phone', password='$password' where id=".$id;
            }else{
                $query = " UPDATE admins SET  name ='$name' , email='$email' , address='$address' , role='$role', phone='$phone' where id=".$id;
            }
            $result =   mysqli_query($con,$query);
            
                if($result){
                    echo  'data updated ';
                }else{
                    echo   'error in update.<br>';
                    echo $_POST['id'];
                    die('Connect Error: '. mysqli_error($con));
                    
                    $_SESSION['deleteMesssage']= 'error in edit';
                    echo $role;
                    
                    
                }
    
        }
        

        //  header('Location: dashboard.php');
    
    }
    

    
?>

<!doctype html>
<html lang="en">
    <head>
        <?php include '../header.php'?>
        <link href="../signup.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <header>
            
        </header>
    <main class="form-signin">
    <form action="<?php  $_SERVER['PHP_SELF']?> " method="post">
        <h1 class="h3 mb-3 fw-normal">Edit admin</h1>
        <input type="hidden" name="id" value="<?php echo $data['id'];?>">
        <div class="form-floating">
            <input type="text" class="form-control" value="<?php echo $data['name'];?>" name="name" placeholder="name">
            <label for="floatingInput">Name</label>
        </div>
        
        <div class="form-floating">
            <input type="email" class="form-control" name="email" value="<?php echo $data['email'];?>" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email </label>
        </div>
        
        <div class="form-floating">
            <input type="text" class="form-control"  name="address" value="<?php echo $data['address'];?>" placeholder="address">
            <label for="floatingInput">address</label>
        </div>
        
        <div class="form-floating">
            <input type="number" class="form-control" name="phone" value="<?php echo $data['phone'];?>" placeholder="username">
            <label for="floatingInput">phone number</label>
        </div>
        
        <div class="form-floating">
            <input type="password" class="form-control" name="password"  id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <div class="form-floating">
                <select class="form-select" aria-label="Default select example" name="role">
                    <?php while($allRoles = mysqli_fetch_assoc($op2)) { ?>
                        <option   value="<?php echo $allRoles['id']; ?>" <?php if($allRoles['id']  == $data['role'] ){ echo 'selected';}?> ><?php echo $allRoles['title']; ?></option>
                    <?php } ?>  
                </select>
            <label for="floatingPassword">Roles</label>
        </div>
        <br>
        <button class="w-100 btn btn-lg btn-dark" type="submit">Edit</button>
        
    </form>
    </main>


        
    </body>
</html>