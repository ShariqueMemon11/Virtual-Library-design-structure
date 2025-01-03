<?php
$error="";
include("../connection.php");
if(isset($_POST['name']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $age=$_POST['age'];
    $pass=$_POST['password'];
    $result=mysqli_query($conn,"INSERT INTO `users`(`Sno`,`Name`, `Email`, `Age` , `Password`) VALUES (Null,'$name','$email','$age','$pass')");
    if($result)
            header("location:login.php");
        else
            $error="Unable to register User";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Login</title>
    <link rel="stylesheet" href="Register.css">
    
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
              <a class="nav-link" href="../BrowseBooks/index.php">Browse Books</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-light ms-3" href="../Login/index.php">Log In</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 </div>
 <?php
   if(isset($error) && $error!="")
      echo '<p style="color:red;">'.$error.'</p>';
   ?>
 <div class="login-page">
     <div class="login-container">
         <h2 class="form-title">Library Member Login</h2>
         <form action="Register.php" method="POST" onsubmit="return validateForm();">
             <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" id="name" name="name" required>
             </div>
             <div class="form-group">
                 <label for="email">Email</label>
                 <input type="email" id="email" name="email" required>
             </div>
             <div class="Age">
                 <label for="age">Age</label>
                 <input type="number" id="age" name="age" min="10">
             </div>
             <div class="form-group">
                 <label for="password">Password</label>
                 <input type="password" id="password" name="password" required>
             </div>
             <div class="button">
                 <button type="submit"  class="btn-register">Register</button>
             </div>
         </form>
      </div>
 </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
    // Validate the form
    function validateForm() {
        var username = document.getElementById('name').value;
        var password = document.getElementById('password').value;

        // Username validation: allows letters, underscores, dashes, and spaces
        var usernameRegex = /^[A-Za-z _-]+$/;
        if (!usernameRegex.test(username)) {
            alert("Username should only contain letters, underscores, dashes, and spaces.");
            return false;
        }

        // Password validation: enforces strong password rules
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&]{8,}$/;
            if (!passwordRegex.test(password)) {
                alert("Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.");
                return false;
            }

        // If both validations pass
        return true;
    }
</script>
</body>
</html>
