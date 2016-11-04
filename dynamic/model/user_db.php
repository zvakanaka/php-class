<?php
require('lib/password.php');

function login($username, $password) {
  global $db;
  $statement = $db->prepare('SELECT * FROM users
                             WHERE username=:username');
  $statement->bindValue(':username', $username);
  $statement->execute();
  while ($row = $statement->fetch()) {
    //if (password_verify($password, $row['password'])) {
    if ($password == $row['password']) {
      return true;
    }
  }
  return false;
}

function is_admin($user_id) {
    global $db;
    $query = 'SELECT * FROM users
              WHERE user_id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    if ($user['is_admin']) {
      error_log($user['is_admin']);
      return true;
    }
    return false;
}

function get_users() {
  global $db;
  $query = 'SELECT * FROM users';
  $statement = $db->prepare($query);
  $statement->execute();
  return $statement;
}

function insert_user($username, $password, $email) {
    global $db;
  	$user_exists = false;
  	$exists_stmt = $db->prepare('SELECT username FROM users
                                 WHERE username=:username');
  	$exists_stmt->bindValue(":username", $username);
  	$exists_stmt->execute();
  	while ($row = $exists_stmt->fetch()) {
  		$user_exists = true;
  	}
  	if ($user_exists == true) {
  		return !$user_exists;
  	} else {
      $query = 'INSERT INTO users VALUES
                (NULL, :username, :password, :email, 0)';
  		$statement = $db->prepare($query);
  		$statement->bindValue(":username", $username);
      $password_hash = password_hash($password, PASSWORD_DEFAULT);
  		// $statement->bindValue(":password", $password_hash);
      //TODO: get password hashing working
      $statement->bindValue(":password", $password);
      $statement->bindValue(':email', $email);
  		$statement->execute();
      $statement->closeCursor();
      return !user_exists;
  	}
}

function delete_user($user_id) {
    global $db;
    $query = 'DELETE FROM users
              WHERE user_id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();
}

function set_admin($user_id) {
  $query = 'UPDATE users SET
            is_hidden = TRUE
            WHERE user_id = :user_id';
  $statement = $db->prepare($query);
  $statement->bindValue(":user_id", $user_id);
  $statement->execute();
  $statement->closeCursor();
}

function unset_admin($user_id) {
  $query = 'UPDATE users SET
            is_hidden = FALSE
            WHERE user_id = :user_id';
  $statement = $db->prepare($query);
  $statement->bindValue(":user_id", $user_id);
  $statement->execute();
  $statement->closeCursor();
}
?>
