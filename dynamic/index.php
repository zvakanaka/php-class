<?php
require('model/database.php');
require('model/photo_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
  if ($action == NULL) {
    $action = 'register';
  }
}

function display_users() {
  $users = get_users();
  include('views/users.php');
}

if ($action == 'register') {
  include('views/login-register.php');
} else if ($action == 'home') {
} else if ($action == 'users') {
  display_users();
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
} else if ($action == 'delete_user') {
  $user_id = filter_input(INPUT_POST, 'user_id',
        FILTER_VALIDATE_INT);
  if ($user_id == NULL || $user_id == FALSE) {
      $error = "Missing user id.";
  }
  delete_user($user_id);
  display_users();
} else if ($action == 'album') {
  //location get album
  header("Location: .?album=");
}

?>
