<?php require 'database/db.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <script lang="javascript" type="text/javascript">
        window.history.forward(); 
    </script> -->


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

    <!--  Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- Fontawsome CSS-->
    <link rel="stylesheet" href="fontawesome/css/all.min.css">

    <!-- Custom CSS-->
    <link rel="stylesheet" href="css/login.css">
    <title>Login Page</title>
</head>
<body>



<!-- Include the login process -->
<?php include 'login.php'; ?>
<!-- // -->




<!-- Login Form -->
    <div class="container">
 
        <form action="login.php" method="post" class="w-25 p-3 bg-white shadow-lg"  >
            <div class="text-center">
                <img src="images/aiulogo.png" width="150" alt="" class="text-center">
            </div>
            <br>
            <!-- Username -->
            <div class="mb-3">
                <input type="char" name="username" class="form-control" aria-describedby="emailHelp" placeholder="Username" required>
            </div>
            <!-- Password -->
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>



<?php if (isset($_SESSION['error'])) {?>
    <div id="errorMessage" class="alert alert-danger"><?php echo $_SESSION['error'];?></div>
    <?php unset($_SESSION['error']);?>
<?php } ?>

                <a href="forgot_password.php">forgot password?</a>
            <br>
                <button type="submit" class="btn btn-primary text-center form-control" name="login">Login</button>    
            <br>
            
            <hr size="10" class= "mt-4 mb-4">
            
                <h5 class="text-center">Dormitory Management System</h5>    
        </form>
    </div>





    <!-- Bootstrap JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>


<!-- <script>
window.setTimeout(function() {
document.getElementById("errorMessage").style.display = "none";
}, 2000);


if (document.getElementById("errorMessage")) {
    document.getElementById("errorMessage").style.display = "block";
    window.setTimeout(function() {
        document.getElementById("errorMessage").style.display = "none";
    }, 2000);
}
</script> -->
