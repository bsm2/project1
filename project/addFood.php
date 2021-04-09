<?php
    session_start();
    if (empty($_SESSION['role'])) {
        header('location: home.php');
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.php';?>
</head>

<body>
    <header>
        <?php include 'navbar.php';?>
    </header>
    <br>
    <div class="container">
        <h2>Add new food</h2>
        <form method="post" action="addFaction.php" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">protin</label>
                <input type="text" name="protin" class="form-control" id="exampleInputName" aria-describedby="" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">netcarb</label>
                <input type="text" name="netcarb" class="form-control" id="exampleInputName" aria-describedby="" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">fats</label>
                <input type="text" name="fat" class="form-control" id="exampleInputName" aria-describedby="" placeholder="">
            </div>

            <div class="form-group ">
                <label for="inputGroupFile02">Image</label>
                <input type="file" name="image" class="form-control" id="inputGroupFile02">
            </div>
            
            <div class="form-group">
                <label for="inputGroupFile02">Category</label>
                <select class="form-select" aria-label="Default select example" name="cat">
                    <option selected value="1">Fruits</option>
                    <option value="2">Vegs</option>
                    <option value="3">Meat</option>
                </select>
            </div>
            <br>


            <button type="submit" class="btn btn-primary">Submit</button>
        
        </form>
        
    </div>
    <br>

</body>

</html>

