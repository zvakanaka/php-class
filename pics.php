<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/part/head.php'; ?>
<article>
<?php
if ($handle = opendir('../photo')) {
    $blacklist = array('.', '..', 'somedir', 'somefile.php');
    ?>
    <ul>
    <?php
    while (false !== ($file = readdir($handle))) {
        if (!in_array($file, $blacklist)) {
            echo "<li><a href=\"pics.php?album=$file\">$file</a></li>";
        }
    }
    closedir($handle);
}
?>
</ul>

<?php
  $album = $_GET['album'];
  $dirname = "../photo";
  $images = glob($dirname."/$album"."/.thumb/*.JPG");
  if (count($images) ) {
    foreach($images as $image) {
      echo '<a class="thumb-link" href="'.$dirname."/$album".substr($image, strrpos($image, "/")).'"><img class="thumb" src="'.$image.'" /></a>';
    }
  } else {
    echo "<form method=".
    '"post" action="create_thumbs.php"><p><input type="submit" value="'.
    $_GET['album'].'">Create Thumbs</input></p>';
  }

  echo '<div class="bottom-spacer"></div>';
?>
</article>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/part/foot.php'; ?>
