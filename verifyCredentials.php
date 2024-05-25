<?php

// Ultimately links to config.php, which has database credentials
require_once ('database.php');

Class VerifyCredentials {

  public function verify_username($username) {
    // Establish connection to database
    $db = db_connect();

    // Prepared statement for MariaDB
    $statement = $db->prepare("SELECT id, username, password FROM users WHERE username = :username");
    
     // Binds parameters from login attempt
    $statement->bindParam(':username', $username);
 
    // Executes on the filess.io end
    $statement->execute();

    // Retrieves credentials from filess.io database
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    
    return $row;
  }

  public function verify_password($password) {
    
  }
}