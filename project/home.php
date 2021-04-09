<?php 
    session_start();
    
    include 'connection.php';
    $query = "SELECT * from food where cat_id=1";
    $op =  mysqli_query($con,$query);  
    $query2 = "SELECT * from food where cat_id=2";
    $op2 =  mysqli_query($con,$query2);  
    $query3 = "SELECT * from food where cat_id=3";
    $op3 =  mysqli_query($con,$query3);  
            
            if($op&& $op2 && $op3){
                $Messg =  'op done ';
            }else{
                $Messg =   'error in  op';
            }
    
    // if(!isset($_SESSION['name'])){

    //     header('Location: index.php');
    // }

?>
<!doctype html>
<html lang="en">
    <head>
        <?php  include 'header.php'?>
    </head>
    <body>
        
    <header>
        <?php  include 'navbar.php'?>
    </header>
    <main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Eat Good</h1>
            <p class="lead text-muted">Choose your favourite healthy food then add it to your diet.</p>
            <p>
        <?php if (isset($_SESSION['role'])) {?>
            <a href="addFood.php" class="btn btn-primary my-2">Add new food</a>
            <a href="<?php echo url("admin/dashboard.php")?>" class="btn btn-secondary my-2">Dashboard</a>
        <?php }?>
            
            </p>
        </div>
        </div>
    </section>
    <hr>

    <h2 style="margin: 10px;">fruits</h2>
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row  row-cols-1 row-cols-sm-2 row-cols-md-5 ">
                <?php while ($data=mysqli_fetch_assoc($op) ) {
                    $imagePath = './uploads/'.$data['image'];
                    $id =$data['id'];
                    if($data['cat_id'] == 1){ ?>
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
                                    <?php if (isset($_SESSION['role'])) {?>
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="deletFood.php?id=<?php echo $id;?>">Delete</a></button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="editefood.php?id=<?php echo $id;?>">Edit</a></button>
                                    <?php } ?>
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="addMyfood.php?id=<?php echo $id;?>">Add</a></button>
                                </div>
                                <!-- <small class="text-muted">9 mins</small> -->
                            </div>
                            </div>
                        </div>
                        </div>
                <?php }
                        } ?>
                
                
        </div>
        </div>
    </div>
    <h2 style="margin: 10px;">vegetables</h2>
    
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row  row-cols-1 row-cols-sm-2 row-cols-md-5 ">
                
                <?php while ($result=mysqli_fetch_assoc($op2) ) {
                        $imagePath = './uploads/'.$result['image'];
                        $id =$result['id'];
                        if($result['cat_id'] == 2){ ?>
                            <div class="col">
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="180px" xmlns="http://www.w3.org/2000/svg" role="img"  aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/>
                                    <image xlink:href="<?php echo $imagePath ?>"  x="0%" y="0%"  width="100%"   class="img-responsive fit-image" />
                                    <text style="color:black; font-style: italic;" x="50%" y="10%" fill="#4a4a4a" dy=".3em" ><?php echo $result['name']; ?></text>
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
                                                    <td><?php echo $result['protein']; ?></td>
                                                    <td><?php echo $result['netcarb']; ?></td>
                                                    <td><?php echo $result['fat']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="align-middle btn-group ">
                                        <?php if (isset($_SESSION['role'])) {?>
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="deletFood.php?id=<?php echo $id;?>">Delete</a></button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="editefood.php?id=<?php echo $id;?>">Edit</a></button>
                                        <?php } ?>
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="addMyfood.php?id=<?php echo $id;?>">Add</a></button>
                                    </div>
                                    <!-- <small class="text-muted">9 mins</small> -->
                                </div>
                                </div>
                            </div>
                            </div>
                    <?php }
                            } ?>
                    
                
            </div>
        </div>
    </div>
    <h2 style="margin: 10px;">Meat</h2>
    
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row  row-cols-1 row-cols-sm-2 row-cols-md-5 ">
                
                <?php while ($mresult=mysqli_fetch_assoc($op3) ) {
                        $imagePath = './uploads/'.$mresult['image'];
                        $id =$mresult['id'];
                        if($mresult['cat_id'] == 3){ ?>
                            <div class="col">
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="180px" xmlns="http://www.w3.org/2000/svg" role="img"  aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/>
                                    <image xlink:href="<?php echo $imagePath ?>"  x="0%" y="0%"  width="100%"   class="img-responsive fit-image" />
                                    <text style="color:black; font-style: italic;" x="50%" y="10%" fill="#4a4a4a" dy=".3em" ><?php echo $mresult['name']; ?></text>
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
                                                    <td><?php echo $mresult['protein']; ?></td>
                                                    <td><?php echo $mresult['netcarb']; ?></td>
                                                    <td><?php echo $mresult['fat']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="align-middle btn-group ">
                                    <?php if (isset($_SESSION['role'])) {?>
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="deletFood.php?id=<?php echo $id;?>">Delete</a></button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="editefood.php?id=<?php echo $id;?>">Edit</a></button>
                                    <?php } ?>
                                        
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="addMyfood.php?id=<?php echo $id;?>">Add</a></button>
                                    </div>
                                    <!-- <small class="text-muted">9 mins</small> -->
                                </div>
                                </div>
                            </div>
                            </div>
                    <?php }
                            } ?>
                    
                
            </div>
        </div>
    </div>
    </main> 
    <footer class="text-muted py-5">
    <div class="container">
        <p class="float-end mb-1">
        <a href="#">Back to top</a>
        </p>
        
    </div>
    </footer>
    </body>
</html>
