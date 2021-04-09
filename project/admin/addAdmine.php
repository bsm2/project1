<?php 
    session_start();
    include '../connection.php';
    if (!isset($_SESSION['role']) && $_SESSION['role']!=1) {
        header('location: dashboard.php');
    } 
    $sql = "SELECT * FROM roles ";
    $op= mysqli_query($con,$sql); 
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
    <form action="addAction.php" method="post">
        <h1 class="h3 mb-3 fw-normal">Add new admin</h1>
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

        <div class="form-floating">
                <select class="form-select" aria-label="Default select example" name="role">
                    <?php while($allRoles = mysqli_fetch_assoc($op)) { ?>
                        <option  <?php if($allRoles['id']  == 1 ){ echo 'selected';}?>  value="<?php echo $allRoles['id']; ?>"><?php echo $allRoles['title']; ?></option>
                    <?php } ?>  
                </select>
            <label for="floatingPassword">Roles</label>
        </div>
        <br>
        <button class="w-100 btn btn-lg btn-dark" type="submit">Add</button>
        
    </form>
    </main>


        
    </body>
</html>