<?php

require_once('user.php');

// Creates an instance of User
$user = new user();

// Get's all users from database
$user_list = $user->get_all_users();

// Print all users
print_r ($user_list);