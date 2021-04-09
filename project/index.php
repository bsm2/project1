<?php
    session_start();
    if (isset($_SESSION['name'])) {
        header('location: home.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <title>home</title>
    <style>

        body{
            background-color: #e8e8e8;
        }
        div{
            margin-top: 250px;
            margin-bottom: 200px;
            margin-left: 300px;
            display: block;
            align-items: center;
            
        }
        button{
            border-radius: 10px;
            border: none;
            height: 50px;
            width: 200px;
            font-size: x-large;
            font-weight: bold;
        
            
        }
        a{
            text-decoration: none;
            color: whitesmoke;
            text-decoration-color: none;
        }
    </style>
</head>
<body>
    <div >
        <button class="btn btn-dark"><a href="signin.php">sign in</a></button>
        <button class="btn btn-dark"><a href="signup.php">sign up</a></button>
        <button class="btn btn-dark"><a href="./admin/signin.php"> Admin sign in</a></button>
    </div>
</body>
</html>