<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/part/head.php'; ?>
<ul class="sub-nav-ul">
<?php
if ($handle = opendir('../photo')) {
    $blacklist = array('.', '..', 'dist', 'section', 'rainy-summer-day', 'gif', 'masters', 'index.php');
    ?>
    <?php
    while (false !== ($file = readdir($handle))) {
        if (!in_array($file, $blacklist)) {
          if ( $file == $_GET['album'] )
            $class="on";
          else
            $class = "false";
          echo "<li><a class=\"$class\" href=\"pics.php?album=$file\">$file</a></li>";
        }
    }
    closedir($handle);
}
?>
</ul>

<article>
<?php
  $album = $_GET['album'];
  $dirname = "../photo";
  $images = glob($dirname."/$album"."/.thumb/*.???*");
  if (count($images) ) {
    foreach($images as $image) {
      echo '<a class="thumb-link" href="'.$dirname."/$album".substr($image, strrpos($image, "/")).'"><img class="thumb" src="'.$image.'" /></a>';
    }
  } else {
    echo "<form method=".
    '"post" action="create_thumbs.php"><p><input name="album" type="submit" value="'.
    $_GET['album'].'">Create Thumbs</input></p>';
  }

  echo '<div class="bottom-spacer"></div>';
?>
</article>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/part/foot.php'; ?>
