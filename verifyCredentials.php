<?php

// Ultimately links to config.php, which has database credentials
require_once ('database.php');

Class VerifyCredentials {

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

  public function create_user ($username, $password) {
    // TODO: Finish Function
  }
}