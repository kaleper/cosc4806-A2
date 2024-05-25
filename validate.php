<?php
  // Initialize session
session_start();

  require_once ('verifyCredentials.php');
  require_once ('hashPassword.php');
  

  // Creates an instance of User
  $verifyCredentials = new verifyCredentials();
  
  // Get's all users from database
  $user_list = $verifyCredentials->get_all_users();

  // Hardcoded credentials
  $validUsername = "kalen";
  $validPassword = "replit";

  // Pulls credentials from login.php form
  $username = $_REQUEST['username']; 
  $password = $_REQUEST['password'];

  // Saves username into session variable
  $_SESSION['username'] = $username;

  // Checks if credentials are valid
    if ($validUsername == $username && $validPassword == $password) {
      // Authenticates user and redirects to index.php
      $_SESSION['authenticated'] = 1;
      header ('location: /');

    } else {
  // Increments failedAttempts if credentials are invalid
    if (!isset($_SESSION['failedAttempts'])) {
      $_SESSION['failedAttempts'] = 1;
    } else {
      $_SESSION['failedAttempts']++;
    }

      header ('location: /login.php');
  }

// *************** TEST AREA ****************
  $test_password = hash_password($password);
  $_SESSION['test_password'] = $test_password;
?> 