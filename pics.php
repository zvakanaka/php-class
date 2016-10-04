<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/part/head.php'; ?>
<article>

<?php
  $album = $_GET['album'];
  $dirname = "../photo";
  $images = glob($dirname."/$album"."/.thumb/*.JPG");
  if (count($images) ) {
    foreach($images as $image) {
      echo '<a class="thumb-link" href="'.$dirname."/$album".substr($image, strrpos($image, "/")).'"><img class="thumb" src="'.$image.'" /></a>';
    }
  } else {

  }

  echo '<div class="bottom-spacer"></div>';
?>
</article>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/part/foot.php'; ?>
