<?php
function get_hidden_albums() {
    global $db;
    $query = 'SELECT * FROM hidden_albums
              WHERE is_hidden = TRUE
              ORDER BY hidden_album_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}

function hide_album($album_name) {
  if (album_exists($album_name)) {
    $query = 'UPDATE hidden_albums SET
              is_hidden = TRUE
              WHERE album_name = :album_name';
    $statement = $db->prepare($query);
    $statement->bindValue(":album_name", $album_name);
    $statement->execute();
    $statement->closeCursor();
  } else {
    $query = 'INSERT INTO hidden_albums VALUES
              ( NULL
              , :album_name
              , TRUE)';
    $statement = $db->prepare($query);
    $statement->bindValue(":album_name", $album_name);
    $statement->execute();
    $statement->closeCursor();
  }
}

function album_exists($album_name) {
  global $db;
  $query = 'SELECT * FROM hidden_albums
            WHERE album_name = :album_name';
  $statement = $db->prepare($query);
  $statement->bindValue(":album_name", $album_name);
  $statement->execute();
  $hidden_album = $statement->fetch();
  $statement->closeCursor();
  if (sizeof($hidden_album) !== 0) {
    return false;
  }
  return true;
}

function get_hidden_images() {
  global $db;
  $query = 'SELECT * FROM hidden_images
            WHERE is_hidden = TRUE;
            ORDER BY hidden_image_id';
  $statement = $db->prepare($query);
  $statement->execute();
  return $statement;
}

function hide_image($image_name) {
  if (image_exists($image_name)) {
    $query = 'UPDATE hidden_images SET
              is_hidden = TRUE
              WHERE image_name = :image_name';
    $statement = $db->prepare($query);
    $statement->bindValue(":image_name", $image_name);
    $statement->execute();
    $statement->closeCursor();
  } else {
    $query = 'INSERT INTO hidden_images VALUES
              ( NULL
              , :image_name
              , TRUE)';
    $statement = $db->prepare($query);
    $statement->bindValue(":image_name", $image_name);
    $statement->execute();
    $statement->closeCursor();
  }
}

function image_exists($image_name) {
  global $db;
  $query = 'SELECT * FROM hidden_images
            WHERE image_name = :image_name';
  $statement = $db->prepare($query);
  $statement->bindValue(":image_name", $image_name);
  $statement->execute();
  $hidden_image = $statement->fetch();
  $statement->closeCursor();
  if (sizeof($hidden_image) !== 0) {
    return false;
  }
  return true;
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

function add_user($username, $password, $email, $is_admin) {
    global $db;
    $query = 'INSERT INTO users
                 (username, password, email, is_admin)
              VALUES
                 (:username, :password, :email, :is_admin)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $code);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':is_admin', $is_admin);
    $statement->execute();
    $statement->closeCursor();
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
