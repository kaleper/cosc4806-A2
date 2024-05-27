<?php
session_start();


  // If user is already logged in, redirects to index.php
  if (isset($_SESSION['authenticated'])) {
    header ("location:/");
    // Exits script after redirecting
    exit;
  }

  // Displays invalid login attempts, if any
  if (isset($_SESSION['failedAttempts'])) {
     echo "<p>
            Invalid credentials entered. 
            Number of failed login attempts: " . $_SESSION['failedAttempts'] .
          "</p>";
    }; 

  if (isset($_SESSION['registration_success_message'])) {
    echo $_SESSION['registration_success_message'];
  }

  // ***TEST***
if (isset($_SESSION['validUsername'])) {
  var_dump($_SESSION['validUsername']);
}
if (isset($_SESSION['validPassword'])) {
 var_dump($_SESSION['validPassword']);
}
if (isset($_SESSION['hashedPassword'])) {
 var_dump($_SESSION['hashedPassword']);
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