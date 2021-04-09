<?php 
    session_start();
    include 'connection.php';
    if(!isset($_SESSION['name'])){

        header('Location: index.php');
    }
    $email=$_SESSION['email'];

    $query = "SELECT id from users where email='$email'" ;
    $result =  mysqli_query($con,$query); 

    
    if($result){
        $data1 = mysqli_fetch_assoc($result);
        $Messg =  'data inserted ';
        $_SESSION['id']= $data1['id'];
    }else{
        $Messg =   'error in get id op';
    }
    if (isset($_SESSION['id'])) {

        $user_id=$_SESSION['id'];
        $sql= "SELECT food.* ,usersfood.id as usersfood_id,usersfood.food_id,usersfood.user_id FROM food JOIN usersfood on food.id=usersfood.food_id JOIN users on users.id=usersfood.user_id WHERE users.id=".$user_id;
        $op = mysqli_query($con,$sql);

    }
    
    

?>

<!doctype html>
<html lang="en">
    <head>
        <?php include 'header.php' ?>
    </head>
    <body>
        
    <header>
        <?php include 'navbar.php' ?>
    </header>

    <main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">My diet</h1>
            <p class="lead text-muted">My favourite healthy food .</p>
            <p class="danger"><?php if(isset($_SESSION['addedMesssage'])) echo $_SESSION['addedMesssage']; unset($_SESSION['addedMesssage'])?></p>
            <p>
            <!-- <a href="" class="btn btn-primary my-2">Main call to action</a>
            <a href="" class="btn btn-secondary my-2">Secondary action</a> -->
            </p>
        </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

        <div class="row  row-cols-1 row-cols-sm-2 row-cols-md-5 "> 
            <?php 
                    while ($data=mysqli_fetch_assoc($op) ) {
                    

                        $imagePath = './uploads/'.$data['image'];
                        $id =$data['usersfood_id'];
                        ?>
                            <div class="col">
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="180px" xmlns="http://www.w3.org/2000/svg" role="img"  aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/>
                                    <image xlink:href="<?php echo $imagePath ?>"  x="0%" y="0%"  width="100%"   class="img-responsive fit-image" />
                                    <text style="color:black; font-style: italic;" x="50%" y="10%" fill="#4a4a4a" dy=".3em" ><?php echo $data['name']; ?></text>
                                </svg>
                                <div class=" card-body">
                                    <div class=" card-text ">
                                        <table class="table table-sm align-center">
                                            <thead>
                                                <tr>
                                                    <th >protin</th>
                                                    <th >netcarb</th>
                                                    <th >fat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $data['protein']; ?></td>
                                                    <td><?php echo $data['netcarb']; ?></td>
                                                    <td><?php echo $data['fat']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="align-middle btn-group ">
                                        
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="deleteMyFood.php?id=<?php echo $id;?>">Delete from my diet</a></button>
                                            
                                    </div>
                                    <!-- <small class="text-muted">9 mins</small> -->
                                </div>
                                </div>
                            </div>
                            </div>
                <?php }?>
            
        </div>
        
        </div>
    </div>

    </main>

    <footer class="text-muted py-5">
    <div class="container">
        <p class="float-end mb-1">
        <a href="#">Back to top</a>
        </p>
        <!-- <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.0/getting-started/introduction/">getting started guide</a>.</p> -->
    </div>
    </footer>


        <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        
    </body>
</html>