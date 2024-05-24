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
  </body>
</html>