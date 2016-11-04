<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/part/head.php'; ?>
<ul class="sub-nav-ul" id="bangs">
<?php
$blacklist = array('.', '..', 'dist', 'kimbirthday', 'section', 'rainy-summer-day', 'gif', 'masters');
if ($handle = opendir('../photo')) {
    while (false !== ($curAlbum = readdir($handle))) {
        if (!in_array($curAlbum, $blacklist)) {
          if ( $curAlbum == $_GET['album'] )
            $class="on";
          else
            $class = "false";
          if (!strpos($curAlbum, '.'))
            echo "<li><a class=\"$class\" id=\"$curAlbum\" href=\"pics.php?album=$curAlbum\">$curAlbum</a></li>";
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
  <div id="lightbox-sidebar">
    <a id="close-lightbox" href="javascript:void(0)" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>
    <br/><a id="download-link">Download</a>
    <br/><a href='javascript:void(0)' id="rotate-lightbox-img">Rotate</a>
    <br/><a id="set-as-album-thumb">Set as Album Thumb</a>
    <br/><a href='javascript:void(0)' id="prev-picture">Previous</a>
    <br/><a href='javascript:void(0)' id="next-picture">Next</a>

  </div>
</div>
<div id="fade" class="lightbox_bg" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">
</div>
<!-- end lightbox -->
<article>
<?php
  $album = $_GET['album'];
  $dirname = "../photo";
  //web-sized images
  $webs = glob($dirname."/$album"."/.web/*.???*");
  if (!isset($_GET['album'])) {
    //if root of photo dir, show album thumbs
    ?>
    <script type="text/javascript">
      document.getElementById("bangs").style = "position:fixed;";
    </script>
    <?php
    if ($handle = opendir('../photo')) {
        while (false !== ($curAlbum = readdir($handle))) {
            if (!in_array($curAlbum, $blacklist) && !strpos($curAlbum, '.')) {
              //highlight the tab while hovering a thumb
              echo '<a class="thumb-link" href="?album='.$curAlbum.'"><img class="thumb" src="'.$dirname.'/'.$curAlbum.'/.album/thumb.jpg"'
              .' onmouseover="document.getElementById(\''.$curAlbum.'\').className=\'on\';"'
              .' onmouseout="document.getElementById(\''.$curAlbum.'\').className=\'\';" /></a>';
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
      echo '<a class="thumb-link" id="thumb-'.substr($image, strrpos($image, "/")+1)
            .'" href="javascript:void(0)" onclick="getAndShow(\''
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
