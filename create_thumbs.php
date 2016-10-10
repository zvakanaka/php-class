<?php
  if (isset($_POST['album'])) {
    $album = $_POST['album'];
    $ip = $_SERVER['REMOTE_ADDR'];
    system('bash create_thumbs.sh '.escapeshellarg($album).' '.escapeshellarg($ip));
    echo "Made some thumbs for $album...";
  } else {
    echo "Error";
  }
?>
