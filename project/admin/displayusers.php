<?php 
    session_start();
    if (!isset($_SESSION['role'])) {
        header('location:home.php');
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../header.php'; ?>
</head>
<body>
    <header>

        <?php include '../navbar.php'; ?>
    </header>
    <section class="py-3 text-center container">
        <div class="row py-lg-3">
            <div class="col-lg-6 col-md-6 mx-auto">
                <h1 class="fw-light">List of users</h1>
                
            </div>
        </div>
    </section>
    <table class="table caption-top table-responsive table-dark">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        </tr>
        <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        </tr>
    </tbody>
    </table>
</body>
</html>