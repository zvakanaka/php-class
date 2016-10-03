<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/part/head.php'; ?>
<?php
  $dirname = "../photo/4th";
  $images = glob($dirname."/.thumb/*.JPG");
  foreach($images as $image) {
  echo '<a class="thumb-link" href="'.$dirname.substr($image, strrpos($image, "/")).'"><img class="thumb" src="'.$image.'" /></a>';
  }
?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/part/foot.php'; ?>
