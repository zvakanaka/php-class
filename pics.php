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
<br><br>
		<div id="light" class="lightbox_fg">
      <img id="lightbox-picture"/>
      </div>
		<div id="fade" class="lightbox_bg" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">

    <div id="lightbox-sidebar">
      <a href="javascript:void(0)" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a></div>
    </div>

<article>
<?php
  $album = $_GET['album'];
  $dirname = "../photo";
  //web-sized images
  $webs = glob($dirname."/$album"."/.web/*.???*");
  if (!count($webs))
    echo "<form method="
    .'"post" action="create_webs.php"><p><input name="album" type="submit" value="'
    .$_GET['album'].'">Create Webs</input></p>';

  $thumbs = glob($dirname."/$album"."/.thumb/*.???*");
  if (count($thumbs) ) {
    foreach($thumbs as $image) {
      // echo '<a class="thumb-link" href="'.$dirname."/$album/.web".substr($image, strrpos($image, "/"))
      //   .'"><img class="thumb" src="'.$image.'" /></a>';
        echo '<a class="thumb-link" href="javascript:void(0)" onclick="getAndShow(\''
                .$dirname."/$album/.web".substr($image, strrpos($image, "/"))
                .'\')"><img class="thumb" src="'.$image.'" /></a>';
    }
  } else {
    echo "<form method=".
    '"post" action="create_thumbs.php"><p><input name="album" type="submit" value="'.
    $_GET['album'].'">Create Thumbs</input></p>';
  }

  echo '<div class="bottom-spacer"></div>';
?>
</article>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/part/lightbox.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/part/foot.php'; ?>
