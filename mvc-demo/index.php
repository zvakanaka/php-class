<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/part/head.php'; ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('model.php');
if (isset($_POST['submit'])) {
  echo "submit is set";
  $insertResult = addCategory($_POST['category']);
  $message = "$insertResult is how many inserted yo<br>"
  ."Categories: ";

  $categories = allCategories();
  echo '<ul>';
  foreach ($categories as $category) {
    echo "<li>".$category['categoryName']."</li>";
  }
  echo '</ul>';
  // header('Location:', 'form.php');
  include 'form.php';
  exit;
} else {
  echo "submit not set";
  require('form.php');
}
?>
