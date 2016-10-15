<?php
require_once 'database.php';
//prepared satements for protection and speed
function addCategory($newCategory) {
  //allow outside variable named $db to be used inside
  global $db;
  $query = 'INSERT INTO categories (categoryName) VALUES (:categoryName)';
  $statement = $db->prepare($query);
  $statement->bindValue(":categoryName", $newCategory);
  $statement->execute();
  $insertAmount = $statement->rowCount();
  $statement->closeCursor();
  return $insertAmount;
}

function allCategories() {
  //allow outside variable named $db to be used inside
  global $db;
  $query = 'SELECT categoryName FROM categories';
  $statement = $db->prepare($query);
  $statement->execute();
  $results = $statement->fetchAll();
  $statement->closeCursor();
  return $results;
}
?>
