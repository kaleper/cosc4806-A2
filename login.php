<?php
session_start();

  // If user is already logged in, redirects to index.php
  if (isset($_SESSION['authenticated'])) {
    header ("location: /");
    // Prevents additional page code from executing
    exit;
  }

  // Displays invalid login attempts, if any
  if (isset($_SESSION['failedAttempts'])) {
    echo "<p>
            Invalid credentials entered. 
            Number of failed login attempts: " . $_SESSION['failedAttempts'] .
          "</p>";
    // Unsets session variable so that it is only displayed once
    unset($_SESSION['failedAttempts']);
    }; 

  // Confirms successful reigstration after being redirected back to login.php from registerToDatabase.php
  if (isset($_SESSION['registration_success_message'])) {
    echo $_SESSION['registration_success_message'];
    // Unsets session variable so that it is only displayed once
    unset($_SESSION['registration_success_message']);
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
  </head>
  <body>

    <h1>Login</h1>
    <!-- Form to enter login credentials  -->
    <form action ="/validate.php" method="post">
      <label for="username">Username</label>
      <br>
      <input type="text" id="username" name ="username">
      <br>
      <label for="password">Password</label>
      <br>
      <input type="password" id='password' name="password">
      <br><br>
      <input type="submit" value= "Submit">
    </form>
    <br>
    <div id="registration-container">
      <a href= "/register.php">Register</a>
    </div>
  </body>
</html>