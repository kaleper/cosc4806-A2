<?php

// Transforms password into non-plain text for security reasons
function hash_password($password) {
  // Uses php built in hashing algorithm
  return $hashedPassword = password_hash($password,  PASSWORD_DEFAULT);
};
