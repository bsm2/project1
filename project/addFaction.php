<?php 

require 'connection.php'; 
if (empty($_SESSION['role'])) {
    header('location: home.php');
}   

if($_SERVER['REQUEST_METHOD'] == "POST"){

    function clean($str){

        return stripcslashes(htmlspecialchars(trim($str)));

    }

    $name = clean($_POST['name']);
    $protin = $_POST['protin'];
    $netcarb = $_POST['netcarb'];
    $fat = $_POST['fat'];
    $cat = $_POST['cat'];
    
    

    // Validation 

    $messages = array();

    if (strlen($_POST['name']) < 2 || strlen($_POST['name']) > 20||empty($_POST['name'])) {
        $messages[]= 'error in the title';
    } else {
        echo $name.'<br>';

    }

    if (empty($protin)||empty($netcarb)||empty($fat) ) {
        $messages[]= 'please add information';
    } else {
        echo $protin.'<br>';
    }
    if (!is_numeric($protin)|| !is_numeric($netcarb)|| !is_numeric($fat) ) {
        $messages[]= 'please inter numbers only';
    } else {
        echo $netcarb;
    }
    // image file validation
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];

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

        
    

    if( !empty($messages)){
        
        foreach ($messages as $message) {
            echo $message.'<br>';
        }

    }else{

        $query = "INSERT into food  (name,protein,netcarb,fat,image,cat_id) values('$name','$protin','$netcarb','$fat','$imageName','$cat')";

        $fresult =   mysqli_query($con,$query);
        //$data=mysqli_fetch_assoc($fresult);
        

            if($fresult){
                echo  'data inserted ';
            }else{
                echo   'error in insert op';
                
            }

    }

}else{


    header('Location:index.php');


}






?>


