<?php
    //get the url of functions right
    $page_data = explode('/',$_SERVER['PHP_SELF']);
    $count =  count(explode('/',$_SERVER['PHP_SELF']));
    
    if($page_data[$count-1] == 'dashboard.php'  ){
        include '../logic/functions.php';
    
    }elseif($page_data[$count-1] == 'displayUsers.php' || $page_data[$count-1] == 'displayAdmins.php'){
        include '../logic/functions.php';
    
    }else {
        include './logic/functions.php';
    }
    
    
    
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Eat Good</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo url("home.php")?>">Home</a>
                    </li>
                    <li class="nav-item">
                    <?php if(isset($_SESSION['role'])){ ?>
                        <a class="nav-link" href="<?php echo url("/admin/dashboard.php")?>">Dashboard</a>
                        
                    <?php }else {?>
                        <a class="nav-link" href="<?php echo url("profil.php")?>">Profile</a>
                        
                    <?php } ?>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                    <div class="dropdown">
                        <button class=" dropbtn "><?php if (isset($_SESSION['name'])) {
                            echo $_SESSION['name'];
                        }else{ echo 'empty';}  ?></button>
                        
                        <div class="dropdown-content">
                            
                            <!-- <a href="<?php echo url("profil.php")?>">profile</a> -->
                            <a href="<?php echo url("editeProfile.php")?>">Edit my profile</a>
                            <a href="<?php echo url("signout.php")?>">signout</a>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </nav>