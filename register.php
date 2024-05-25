<?php 
session_start();

// Uses session variable from registerToDatabase to display if username has already been taken
if (isset($_SESSION['taken_username_message'])) {
    echo $_SESSION['taken_username_message']; 
    unset($_SESSION['taken_username_message']); 
}
  ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>
  </head>
  <body>

    <h1>Register</h1>
    
    <!-- Form to enter new credentials to sign up -->
    <form action ="/registerToDatabase.php" method="post">
      <label for="username">Enter a Username</label>
      <br>
      <input type="text" id="username" name ="username" pattern=".{3,}" title="Please enter a valid username." required>
      <br>
      <label for="password">Enter a Password</label>
      <br>
      <input type="password" id='password' name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d\s]).{8,}" title="Please enter a valid password." required>
      
      
      <br><br>
      <input type="submit" value= "Sign-Up">
    </form>


    <div id="username-requirements">Username must be at least 3 characters long</span>
    <div id="password-requirements">Must contain at least one number, one uppercase and lowercase leter, one symbol and a length of 8 characters</span>
    
    <br>
    <div id="login-container">
      <a href= "/login.php">Login</a>
    </div>
  </body>
</html>


