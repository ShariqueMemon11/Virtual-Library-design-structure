<?php
include("../includes/connection.php");
session_start();
if(isset($_POST['username']))
{
    $Name=$_POST['username'];
    $password=$_POST['password'];
    $result=mysqli_query($conn,"select * from users where Name='$Name' and Password='$password'");
    if(mysqli_num_rows($result)==1)
    {
        $user=mysqli_fetch_array($result);
        $_SESSION['name']=$user['Name'];
        $_SESSION['role']=$user['Role'];
        header("location:../HomePage/index.php");
    }
    else
    {
        echo "<script>alert('Invalid Username or Password');</script>";
    }    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Login</title>
    <link rel="stylesheet" href="login.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Navbar.css">
</head>
<body>

<?php include '../includes/navbar.php'; ?>
    <div class="login-page">
        <div class="login-container">
            <h2 class="form-title">Library Member Login</h2>
            <form method="POST" action="../Login/index.php">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="button-group">
                <button type="submit" class="btn-login">LogIn</button>
                <button class="btn-signup" onclick="window.location.href='../Register/index.php'">Register</button>
              </div>
                <a href="#" class="forgot-password">Forgot Password?</a>
                
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  
</body>
</html>
