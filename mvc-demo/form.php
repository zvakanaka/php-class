<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Form</title>
  </head>
  <body>
    <?php
    if (isset($message)) {
      echo "<p>$message</p>";
    }
     ?>
     <?php
     if (isset($allCategories)) {
       echo '<ul>';
       foreach ($categories as $category) {
         echo "<li>".$category['categoryName']."</li>";
       }
       echo '</ul>';
     } ?>
    <form class="" action="." method="post">
      <input type="text" name="category">
      <input type="submit" name="submit">
    </form>
  </body>
</html>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/part/foot.php'; ?>
