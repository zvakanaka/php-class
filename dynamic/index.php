<?php
require('model/database.php');
require('model/photo_db.php');
require('model/user_db.php');
require('model/photo_fs.php');
session_start();

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
  $album_blacklist = array();
  $hidden_albums = get_hidden_albums();
  foreach ($hidden_albums as $album) {
    $album_blacklist[] = $album['album_name'];
  }
  $photo_dir = "../../photo";
  $show_hidden = filter_input(INPUT_GET, 'hidden');
  if ($show_hidden == 'true') {
    $albums = get_albums($photo_dir, array());
    include('views/home.php');
  } else {
    $albums = get_albums($photo_dir, $album_blacklist);
    include('views/home.php');
  }
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
    if (insert_user($username, $password, $email)) {
      header("Location: .?action=users");
    } else {
      $error = "Account already exists.";
      include('views/login-register.php');
    }
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
  $album = filter_input(INPUT_GET, 'album');
  if ($album == NULL) {
    $error = "No album. Try again.";
  }
  $image_blacklist = array();
  $hidden_images = get_hidden_images();
  foreach ($hidden_images as $image) {
    $image_blacklist[] = $image['image_name'];
  }
  $hidden_albums = get_hidden_albums();
  $album_blacklist = array();
  foreach ($hidden_albums as $hidden_album) {
    $album_blacklist[] = $hidden_album['album_name'];
  }
  if (in_array($album, $album_blacklist)) {
    $message = "This album is private";
  }
  $photo_dir = "../../photo";
  $images = get_images($photo_dir, $album, $image_blacklist);
  include('views/album.php');
} else if ($action == 'authenticate') {
  $username = filter_input(INPUT_POST, 'username');
  $password = filter_input(INPUT_POST, 'password');
  if ($username == NULL || $username == FALSE || $password == NULL ||
          $password == FALSE) {
      $error = "Invalid user data. Check all fields and try again.";
      include('views/login-register.php');
  }

  if (login($username, $password)) {
    $_SESSION["logged_in"] = $username;
    header("Location: .?action=home");
  } else {
    $error = "Password/username mismatch. Please try again, unless you are a hacker.";
    include('views/login-register.php');
  }
} else if ($action == 'logout') {
  unset($_SESSION["logged_in"]);
  echo "Logged out, redirecting...";
	header( "Refresh:3; url=.?action=home", true, 303);
	die();
} else if ($action == 'hide_album') {
  $album_name = filter_input(INPUT_POST, 'album_name');
  hide_album($album_name);
  header("Location: .?action=album&album=$album_name");
}

?>
