<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/part/head.php'; ?>
<style>
.black_overlay{
  display: none;
  position: fixed;
  top: 0%;
  left: 0%;
  width: 100%;
  height: 100%;
  background-color: black;
  z-index:1001;
  -moz-opacity: 0.8;
  opacity:.80;
  filter: alpha(opacity=80);
}
.white_content {
  display: none;
  position: fixed;
  top: 2%;
  left: 1%;
  width: 95%;
  height: 95%;
  padding: 0px;
  z-index:1002;
  overflow: hidden;
}
#lightbox-picture {
  height: 100%;
}
#lightbox-sidebar {
  float: right;
  color: white;
  z-index:1003;
}
</style>
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
		<div id="light" class="white_content">
      <img id="lightbox-picture"/>
      </div>
		<div id="fade" class="black_overlay" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">

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
<script src="lightbox.js"></script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/part/foot.php'; ?>
