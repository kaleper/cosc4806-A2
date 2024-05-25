<?php
session_start();



require_once('verifyCredentials.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $verifyCredentials = new VerifyCredentials();
  $credentials = $verifyCredentials->verify_username($username);
  
  // Checks if a username exists already
  if ($credentials) {
      $_SESSION['taken_username_message'] = "Username already exists, please enter a different username.";
    header("location: register.php");
  } else {
  
  
  



  

  

}
}

  
  // // Establish connection to database
  // $db = db_connect();

  // // Prepared statement to insert username and password into database
  //   $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)")
      

?>
