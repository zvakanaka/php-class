<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/part/head.php'; ?>
<ul class="sub-nav-ul">
<?php
$blacklist = array('.', '..', 'dist', 'section', 'rainy-summer-day', 'gif', 'masters', 'index.php');
if ($handle = opendir('../photo')) {
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
<!-- lightbox -->
<div id="light" class="lightbox_fg">
  <img id="lightbox-picture"/>
</div>
<div id="fade" class="lightbox_bg" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">
  <div id="lightbox-sidebar">
    <a href="javascript:void(0)" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>
    <br/><a id="fullsize-link">Full-size</a>
    <br/><a id="set-as-album-thumb">Set as Album Thumb</a>
  </div>
</div>
<!-- end lightbox -->
<article>
<?php
  $album = $_GET['album'];
  $dirname = "../photo";
  //web-sized images
  $webs = glob($dirname."/$album"."/.web/*.???*");
  if (!isset($_GET['album'])) {
    if ($handle = opendir('../photo')) {
        while (false !== ($curAlbum = readdir($handle))) {
            if (!in_array($curAlbum, $blacklist)) {
              echo '<a class="thumb-link" href="?album='.$curAlbum.'"><img class="thumb" src="'.$dirname.'/'.$curAlbum.'/.album/thumb.jpg" /></a>';
            }
        }
        closedir($handle);
    }
  } else if (!count($webs))
    echo "<form method="
    .'"post" action="create_webs.php"><p><input name="album" type="submit" value="'
    .$_GET['album'].'">Create Webs</input></p>';

  $thumbs = glob($dirname."/$album"."/.thumb/*.???*");
  if (!isset($_GET['album'])) {

  } else if (count($thumbs) ) {
    foreach($thumbs as $image) {
      $webUrl = $dirname."/$album/.web".substr($image, strrpos($image, "/"));
      $thumbUrl = $dirname."/$album/.thumb".substr($image, strrpos($image, "/"));
      $fullsizeUrl = $dirname."/$album".substr($image, strrpos($image, "/"));
      echo '<a class="thumb-link" href="javascript:void(0)" onclick="getAndShow(\''
            .$webUrl.'\',\''.$thumbUrl.'\',\''.$fullsizeUrl.'\',\''.$_GET['album']
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
