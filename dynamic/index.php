<?php
require('model/database.php');
require('model/photo_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
  if ($action == NULL)
    $action = 'register';
}

if ($action == 'register') {
  include('views/login-register.php');
} else if ($action == 'home') {
} else if ($action == 'users') {
  $users = get_users();
  foreach ($users as $user) {
    error_log(sizeof($user));
  }
  include('views/users.php');
} else if ($action == 'insert_user') {
  $email = filter_input(INPUT_POST, 'email');
  $username = filter_input(INPUT_POST, 'username');
  $password = filter_input(INPUT_POST, 'password');

  if ($username == NULL || $username == FALSE || $password == NULL ||
          $password == FALSE || $email == NULL || $email == FALSE) {
      $error = "Invalid user data. Check all fields and try again.";
      include('views/login-register.php');
  } else {
    insert_user($username, $password, $email);
    header("Location: .?action=users");
  }
} else if ($action == 'album') {
  //location get album
  header("Location: .?album=");
}

?>
