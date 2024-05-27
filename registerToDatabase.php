<?php
session_start();

require('verifyCredentials.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $username = $_POST['username'];
  $password = $_POST['password'];

  // Transforms password into non-plain text for security reasons
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $verifyCredentials = new VerifyCredentials();
  $usernameExists = $verifyCredentials->verify_username($username);
  
  // Checks if a username exists already
  if ($usernameExists) {
      $_SESSION['taken_username_message'] = "Username already exists, please enter a different username.";
    header('location: register.php');
    exit;
  // Unique username, adds to database 
  } else {
    $db = db_connect();

    // Prepared statement to insert username and hashed password into database
    $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :hashedPassword)");

    // Binds parameters from registration
    $statement->bindParam(':username', $username);
    $statement->bindParam(':hashedPassword', $hashedPassword);

    // Executes the statement
    $statement->execute();
    // Creates session variable with successful registration message 
      $_SESSION['registration_success_message'] = "You have successfully registered! Please login.";

    // Unsets any previous failed attempts so it doesn't display on loign 
    unset($_SESSION['failedAttempts']);   

    //Redirect back to login page
    header('location: login.php');
  
  }
}
  

?>
