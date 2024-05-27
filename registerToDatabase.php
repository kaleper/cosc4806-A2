<?php
// File adds credentials to the database from the register.php page
session_start();

require('verifyCredentials.php');

// Monitors for any registration form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Saves username and password from registration form into variables
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Transforms password into non-plain text for security reasons
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Creates instance of verifyCredentials
  $verifyCredentials = new VerifyCredentials();
  $usernameExists = $verifyCredentials->verify_username($username);
  
  // Checks if a username exists already
  if ($usernameExists) {

    // Create session variable message to be displayed on register
    $_SESSION['taken_username_message'] = "Username already exists, please enter a different username.";
    header('location: register.php');
    exit;
    
  // Unique username, add to database 
  } else {

    // Connect to database
    $db = db_connect();

    // Prepared statement to insert username and hashed password into database
    $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :hashedPassword)");

    // Binds parameters from registration
    $statement->bindParam(':username', $username);
    $statement->bindParam(':hashedPassword', $hashedPassword);

    // Executes the statement
    $statement->execute();
    
    // Creates session variable with successful registration message to be displayed on login page
    $_SESSION['registration_success_message'] = "You have successfully registered! Please login.";

    //Redirect back to login page
    header('location: login.php');
    exit;
  }
}
?>
