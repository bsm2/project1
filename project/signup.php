<?php
    session_start();
    if (isset($_SESSION['name'])) {
        header('location: home.php');
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
    <form action="signupAction.php" method="post">
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
        <?php if(isset($_SESSION['errorMessage'])) { ?>
            <p class="p-3 mb-2 bg-danger text-white">
                <?php
                    $variable = $_SESSION['errorMessage'];
                    foreach ( $variable as  $value) {
                        echo $value.'<br>'; 
                    }
                    unset($_SESSION['errorMessage']);
                ?>
            </p>
        <?php }?>
        <input type="hidden" name="id">
        <div class="form-floating">
            <input type="text" class="form-control"  name="name" placeholder="name">
            <label for="floatingInput">name</label>
        </div>
        
        <div class="form-floating">
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email </label>
        </div>
        
        <div class="form-floating">
            <input type="text" class="form-control"  name="address" placeholder="address">
            <label for="floatingInput">address</label>
        </div>
        
        <div class="form-floating">
            <input type="number" class="form-control" name="phone" placeholder="username">
            <label for="floatingInput">phone number</label>
        </div>
        
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-dark" type="submit">Sign up</button>
        
    </form>
    </main>


        
    </body>
</html>