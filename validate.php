<?php
  // **File validates that credentials entered on the login page have a match in the database**

  // Initialize session
  session_start();

  require_once ('verifyCredentials.php');

  // Creates an instance of User
  $verifyCredentials = new verifyCredentials();
  
  // Get's all users from database
  $user_list = $verifyCredentials->get_all_users();

  // Pulls credentials from login.php form
  $username = $_REQUEST['username']; 
  $password = $_REQUEST['password'];

  //Checks if username is in database
  $validUsername = $verifyCredentials->verify_username($username);

  // Checks if password matches to password in database
  $validPassword = $verifyCredentials->verify_password($username, $password);

  // Saves username into session variable
  $_SESSION['username'] = $username;

  // Checks if credentials are valid
  if ($validUsername && $validPassword) {
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
    exit;
  }
?> 