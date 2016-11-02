<?php
function get_hidden_albums() {
    global $db;
    $query = 'SELECT * FROM hidden_albums
              WHERE is_hidden = TRUE;
              ORDER BY hidden_album_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}

function hide_album($album_name) {
  if (album_exists($album_name)) {
    $query = 'UPDATE hidden_albums SET
              is_hidden = TRUE
              WHERE album_name = :album_name;';
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
            WHERE album_name = :album_name;';
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

function get_($category_id) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE products.categoryID = :category_id
              ORDER BY productID';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function get_product($product_id) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":product_id", $product_id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

function delete_product($product_id) {
    global $db;
    $query = 'DELETE FROM products
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_product($category_id, $code, $name, $price) {
    global $db;
    $query = 'INSERT INTO products
                 (categoryID, productCode, productName, listPrice)
              VALUES
                 (:category_id, :code, :name, :price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
}
?>
