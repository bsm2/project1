<?php
    session_start();
    include 'connection.php';
    
    
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $name =$_POST['name'];
        $email=$_POST['email'];
        $address =$_POST['address'];
        $phone=$_POST['phone'];
        $sql = "UPDATE users set name='$name' , email = '$email', address = '$address', phone = '$phone'  where id =".$id;
        $op = mysqli_query($con,$sql);
        if($op){
            $_SESSION['id']   = $id;
            $_SESSION['name'] = $name;
            $_SESSION['address'] = $address;
            $_SESSION['phone'] = $phone;
            $_SESSION['email'] =$email;
            header('Location: profil.php'); 
        }else{
            echo "error in update";

        }
        
    } 
    
?>
<!doctype html>
<html lang="en">
    <head>
        <?php include 'header.php'?>
        <link href="signup.css" rel="stylesheet">
    </head>
    <body class="text-center">
        
    <main class="form-signin">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <h1 class="h3 mb-3 fw-normal">Edit</h1>
        <input type="hidden" name="id">
        <div class="form-floating">
            <input type="text" class="form-control" value="<?php echo $_SESSION['name']; ?>" name="name" placeholder="name">
            <label for="floatingInput">Name</label>
        </div>
        
        <div class="form-floating">
            <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email']; ?>" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
        </div>
        
        <div class="form-floating">
            <input type="text" class="form-control" value="<?php echo $_SESSION['address']; ?>"  name="address" placeholder="address">
            <label for="floatingInput">address</label>
        </div>
        
        <div class="form-floating">
            <input type="numbers" class="form-control" value="<?php echo $_SESSION['phone']; ?>" name="phone" placeholder="phone">
            <label for="floatingInput">Phone Number</label>
        </div>
        
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-dark" type="submit">Edit my profile</button>
        
    </form>
    </main>


        
    </body>
</html>