<?php
//SIGN UP BACKEND
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'local/dbconnect1.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $secret = $_POST["secret"];
    
    
    $sql_u = "SELECT * FROM `users` WHERE username = '$username'";
    $sql_s = "SELECT * FROM `users` WHERE secret = '$secret'";

    //USERNAME 
    $result = mysqli_query($conn, $sql_u);
    $exist_u = mysqli_num_rows($result);

    //SECRET KEY
    $result1 = mysqli_query($conn, $sql_s);
    $exist_s = mysqli_num_rows($result1);
   
    if($exist_u > 0)
    {
        $showError = "Username Already Exists, Try a new one!";
    }
    else if($exist_s > 0)
    {
        $showError = "Secret Key Already Exists, Try a new one!";
    }

    else{
    if(($password == $cpassword)){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` ( `username`, `password`, `secret`, `dt`) VALUES ('$username', '$hash', '$secret', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }
    }
    else{
        $showError = "Passwords do not match. Please enter it again.";
            }
        }
} 
    
?>



<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>SignUp</title>
  </head>
  <body>
    <?php require 'local/navigation.php' ?>
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can sign in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>

    <div class="container my-4">
     <h1 class="text-center">Sign Up</h1>
     <p class ="para-2">
      Already have an account? <a href="login.php">Sign In</a>
     </p>
    
     <form action="/zoho/signup.php" method="post">
        <div class="form-group">
            <label for="username">Username or Email</label>
            <input type="text" class="form-control" name="username" required>
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" name="cpassword" required>
            
        </div>
        <div class="form-group">
            <label for="secret">Secret Key</label>
            <input type="secret" class="form-control" name="secret" required>
        </div>

         
        <button type="submit" class="btn btn-primary">Sign Up!</button>
     </form>


     <p>
        By clicking the "Sign Up!" button, you are creating an account and agree to<br />
        <a href="#">Terms and Condition</a> and <a href="#">Policy Privacy</a>
      </p>
    </div>
    </div>
  </body>
</html>

<i>Created by Harsh Sharma</i> &copy; <?php echo date('Y'); ?>