﻿<?php
include("../connection.php");
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
        $_SESSION['role']=$user['role'];
        header("location:Homepage.php");
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

  <header>
  <div class="App">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand" >Virtual Library</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link " href="../HomePage/index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" >My Reading List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../BrowseBooks/index.php">Browse Books</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
</div>
</header>

    <div class="login-page">
        <div class="login-container">
            <h2 class="form-title">Library Member Login</h2>
            <form method="POST" action="Login.php">
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
