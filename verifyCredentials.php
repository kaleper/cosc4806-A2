<?php
// **File contains functions that are used in validate.php for authentication**

// Ultimately links to config.php, which has database credentials
require_once ('database.php');

Class VerifyCredentials {

  // Gets all passwords from database
  public function get_all_passwords() {
    $db = db_connect();
    // Uses prepared statement to select all users
    $statement = $db->prepare("SELECT password FROM users;");
    // Executes on the filess.io end
    $statement->execute();
    // Retrieves users from filess.io database
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  // Gets all usernames from database
  public function get_all_users() {
    $db = db_connect();
    // Uses prepared statement to select all users
    $statement = $db->prepare("SELECT username FROM users;");
    // Executes on the filess.io end
    $statement->execute();
    // Retrieves users from filess.io database
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  // Checks if entered username is in database
  public function verify_username($username) {
    // Establish connection to database
    $db = db_connect();

    // Prepared statement for MariaDB
    $statement = $db->prepare("SELECT username FROM users WHERE username = :username");
    
     // Binds parameters from login attempt
    $statement->bindParam(':username', $username);
 
    // Executes on the filess.io end
    $statement->execute();

    // Retrieves credentials from filess.io database
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    // Returns username if it exists in the database
    return $row;
  }

  // Checks if entered username and password has a match in the database
  public function verify_password($username, $password) {

    // Establish connection to database
    $db = db_connect();

    // Prepared statement for MariaDB
    $statement = $db->prepare("SELECT password FROM users WHERE username = :username");

    // Binds username parameter from login attempt
    $statement->bindParam(':username', $username);

    // Executes on the filess.io end
    $statement->execute();

    // Retrieves credentials from filess.io database
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    // Compares entered password in hashed form to hashed password stored in the database
    if ($row) {
      // Fetched if password associated with username
      $hashedPassword = $row['password'];
      // Compares hashed passwords, returns true if they match
      if (password_verify($password, $hashedPassword)) {
        return true;
      } else {
        return false;
      }
    }
  }
}