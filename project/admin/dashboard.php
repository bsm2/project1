<?php 
    session_start();
    include '../connection.php';
    
    if(!isset($_SESSION['role'])){

        header('Location: ../home.php');
    }

    $sql = "SELECT admins.*,title from admins JOIN roles on admins.role = roles.id";
    $op =  mysqli_query($con,$sql);  
            
            if($op){
                $Messg =  'op done ';
            }else{
                $Messg =   'error in  op';
            }
    
    


?>

<!doctype html>
<html lang="en">
    <head>
        <?php include '../header.php' ?>
    </head>
    <body>
        
    <header>
        <?php include '../navbar.php' ?>
    </header>

    <main>

    <section class="py-3 text-center container">
        <div class="row py-lg-3">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Dashboard</h1>
            <p class="lead text-muted">Mange your site from here</p>
            <p>
            <a href="displayUsers.php" class="btn btn-primary my-2">View users</a>
            <a href="addAdmine.php" class="btn btn-secondary my-2">Add new admin</a>
            </p>
        </div>
        </div>
    </section>
    <table class="table caption-top table-sm table-responsive table-dark">
    <?php if(isset($_SESSION['deleteMesssage'])) { ?>
    <caption class="p-3 mb-2 bg-danger text-white"><h3><?php if(isset($_SESSION['deleteMesssage'])) echo $_SESSION['deleteMesssage']; unset($_SESSION['deleteMesssage']) ?></h3></caption>
    <?php }?>
    <caption><h3>List of admins</h3></caption>
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">address</th>
        <th scope="col">phone</th>
        <th scope="col">role</th>
        <th scope="col">action</th>
        
        </tr>
    </thead>
    <tbody>
    <!-- display Admins -->
    <?php while($data=mysqli_fetch_assoc($op)){ ?>
        <tr>
            <th scope="row"><?php echo $data['id']; ?></th>
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['address']; ?></td>
            <td><?php echo $data['phone']; ?></td>
            <td><?php echo $data['title'];?></td>
        <?php if ($_SESSION['role'] == 1) { ?>
            <td><button type="button" class="btn btn-sm btn-outline-secondary"><a href="editAdmin.php?id=<?php echo $data['id']; ?>">Edit</a></button>
                <button type="button" class="btn btn-sm btn-outline-secondary"><a href="deleteAdmin.php?id=<?php echo $data['id']; ?>">delete</a></button>
            </td>
        <?php } ?>
        </tr>
        <tr>
    <?php } ?>
        </tr>
    </tbody>
    </table>
    

    </main>

    <footer class="text-muted py-5">
    <div class="container">
        <p class="float-end mb-1">
        <a href="#">Back to top</a>
        
        
        
    </div>
    </footer>


        <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        
    </body>
</html>