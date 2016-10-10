<?php
  if (isset($_POST['album'])) {
    $album = $_POST['album'];
    $ip = $_SERVER['REMOTE_ADDR'];
    system('bash create_webs.sh '.escapeshellarg($album).' '.escapeshellarg($ip));
    echo "We just made some webs for $album...";
  } else {
    echo "Error";
  }
?>
