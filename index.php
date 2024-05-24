<?php

session_start();

  // If user is not authenticated, redirects to login page
    if (!isset($_SESSION['authenticated'])) {
      header ('location: /login.php');
      // Exits script after redirecting
      exit;
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Homepage</title>
  </head>
  <body>
    <h1>Homepage</h1>
      <!-- Greets user -->
      <p> Welcome, <?=$_SESSION['username'];?>. </p>
      <!-- Formats date in a readable way -->
      <p> <?php echo "Today is " . date("l, F d, Y.");?> </p>
  </body>

  <footer>
      <!-- Redirects to logout page that destroys session -->
      <p> <a href="/logout.php">Log Out</p>
  </footer>
</html>


<?php 

require_once('user.php');

// Creates an instance of User
$user = new user();

// Get's all users from database
$user_list = $user->get_all_users();

// Print all users
print_r ($user_list);

?>