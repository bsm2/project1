<?php
    session_start();
    
    require 'connection.php';
    if (empty($_SESSION['role'])) {
        header('location: home.php');
    } 
    if($_SERVER['REQUEST_METHOD'] == "GET"){

        $id =  filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT); 

        $sql  = "SELECT * from food where id = ".$id;

        $op =   mysqli_query($con,$sql);

        $sql2  = "SELECT * from categories ";

        $op2 =   mysqli_query($con,$sql2);

        if($op && $op2){

            $data = mysqli_fetch_assoc($op);
            
        }else{
            echo 'No data related to this id ';
        }

        $imagePath = './uploads/'.$data['image'];
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        function clean($str){
    
            return stripcslashes(htmlspecialchars(trim($str)));
    
        }
        $id = $_POST['id'];
        $name = clean($_POST['name']);
        $protein = $_POST['protin'];
        $netcarb = $_POST['netcarb'];
        $fat = $_POST['fat'];
        $cat = $_POST['cat'];
        $oldImage =$_POST['oldImage'];
        
    
        // Validation 
    
        $messages = array();
        $pattern  = "/^[a-zA-Z\s*]*$/";

        
        if (strlen($name) < 2 || strlen($name) > 20||!preg_match($pattern,$name)) {
            $messages[]= 'error in the name';
        } else {
            echo $name.'<br>';
    
        }
    
        if (empty($protein)||empty($netcarb)||empty($name)||empty($fat) ) {
            $messages[]= 'empty fields please add information';
        } else {
            echo $protein.'<br>';
        }
        if (!is_numeric($protein)|| !is_numeric($netcarb)|| !is_numeric($fat) ) {
            $messages[]= 'please enter numbers only';
        } else {
            echo $netcarb.$fat.$cat;
        }
        // image file validation
        if(!empty($_FILES['image']['name'])){

            $fileTmpName = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            //delete old photo
            if(file_exists('./uploads/'.$oldImage)){
                unlink('./uploads/'.$oldImage);
            }
        
            $fileExt = explode('.',$fileName);    
            $count =   count($fileExt);
            $extension = strtolower($fileExt[$count-1]);
        
            $imageName = time().$fileExt[0].'.'.$extension;
        
            $allow_ex = array('jpg','gif','png');
            
            if(in_array($extension,$allow_ex)){
                $uploadFolder = './uploads/'; 
                $destPath = $uploadFolder.$imageName;
        
                if(move_uploaded_file($fileTmpName,$destPath)){
                    echo 'File '.$imageName.' Uploaded<br>';
                    
                }else{
                    $messages[] = 'Error in Upload File';
                }
        
            }else{
        
                $messages[] = 'error in file extension wrong file';
            }
            //override old image
            $oldImage = $imageName;
        
        }
        
    
        if( !empty($messages)){
            
            foreach ($messages as $message) {
                echo $message.'<br>';
            }
    
        }else{
            
            $query = "UPDATE food  SET  name ='$name' , protein='$protein' , netcarb='$netcarb' , fat='$fat',image='$oldImage',cat_id='$cat' where id=".$id;
    
            $result =   mysqli_query($con,$query);
            
                if($result){
                    echo  'data updated ';
                }else{
                    echo   'error in update';
                    
                }
    
        }

        header('Location: home.php');
    
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
        <form method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" value="<?php echo $data['name']; ?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">protin</label>
                <input type="text" name="protin" value="<?php echo $data['protein']; ?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">netcarb</label>
                <input type="text" name="netcarb" value="<?php echo $data['netcarb']; ?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">fats</label>
                <input type="text" name="fat" value="<?php echo $data['fat']; ?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="">
            </div>

            <div class="form-group">
                <label for="inputGroupFile02">Category</label>
                <select class="form-select" aria-label="Default select example" name="cat">
                    <?php while($catData=mysqli_fetch_assoc($op2)) { ?>
                        <option  <?php if($data['cat_id']  ==  $catData['id'] ){ echo 'selected';}?>  value="<?php echo $catData['id']; ?>"><?php echo $catData['name']; ?></option>
            
                    <?php } ?>
                </select>
            </div>

            <div class="form-group ">
                <label for="inputGroupFile02">Image</label>
                <input type="file" name="image" class="form-control" id="inputGroupFile02">
                <img width="150" height="150" src="<?php echo $imagePath ?>" alt="food">
                <input type="hidden"  name="oldImage" value="<?php echo $data['image']; ?>">
            </div>

            <br>

            <button type="submit" class="btn btn-primary">Submit</button>
        
        </form>
        
    </div>
    <br>

</body>

</html>

