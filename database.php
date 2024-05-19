<?php

// Allows access to config.php
require_once('config.php');

// Connect to database
function db_connect() {
    try {
      // Creates an instance of PDO with database connection parameters
      $dbh = new PDO('mysql:host=' . DB_HOST .   ';port=' . DB_PORT . ';dbname='. DB_DATABASE, DB_USER, DB_PASS);
      return $dbh;
    } catch (PODException $e) {
      // TODO - Add global variable to announce when DB is down
    }
}

?>