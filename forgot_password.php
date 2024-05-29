<?php require 'database/db.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

    <!--  Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- Fontawsome CSS-->
    <link rel="stylesheet" href="fontawesome/css/all.min.css">

    <!-- Custom CSS-->
    <link rel="stylesheet" href="css/login.css">
    <title>Forgot Password Page</title>
</head>
<body>




<!-- Form -->
    <div class="container">
 
        <form action="send_reset_pwd.php" method="POST" class="w-25 p-3 bg-white shadow-lg"  >
            <div class="text-center">
                <img src="images/aiulogo.png" width="150" alt="" class="text-center">
            </div>
            <br>
            <h5 class="text-center">Reset your Password</h5>
            <br>

            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <br>
                <button type="submit" class="btn btn-primary text-center form-control" name="rest_password">Reset</button>    
            <br>
            
            <hr size="10" class= "mt-4 mb-4">
            
                <h5 class="text-center">Dormitory Management System</h5>    
        </form>
    </div>





    <!-- Bootstrap JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

