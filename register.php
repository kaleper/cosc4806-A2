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
      <input type="text" id="username" name ="username">
      <br>
      <label for="password">Enter a Password</label>
      <br>
      <input type="password" id='password' name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d\s]).{8,}" title="Must contain at least one number, one uppercase and lowercase letter, one symbol and a length of 8 characters" required>
      <br><br>
      <input type="submit" value= "Sign-Up">
    </form>
    <br>
    <div id="login-container">
      <a href= "/login.php">Login</a>
    </div>
  </body>
</html>