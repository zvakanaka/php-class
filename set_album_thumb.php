<?php
  if (isset($_GET['thumb']) && isset($_GET['album'])) {
    $thumb = $_GET['thumb'];
    $album = $_GET['album'];
    $ip = $_SERVER['REMOTE_ADDR'];
    echo "We's about to make this command run: bash create_album_thumb.sh $album $thumb $ip";
    system('bash create_album_thumb.sh '.escapeshellarg($album).' '.escapeshellarg($thumb).' '.escapeshellarg($ip));
    echo "We just made the album thumb for $album...";
  } else {
    echo "Error";
  }
?>
<br/>
<a href="pics.php">Back</a>
