<?php
function display_users() {
  if (isset($_SESSION["is_admin"])) {
    $users = get_users();
    include('views/users.php');
    die();
  }
}
?>
