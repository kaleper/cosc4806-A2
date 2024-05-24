<?php
  // Access all data, then erases it all immediately after
  session_start();
  session_destroy();

  // Redirect to login page
  header('Location: /login.php');
?>