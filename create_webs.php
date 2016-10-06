<?php
  if (isset($_POST['album'])) {
    $album = $_POST['album'];
    system('bash create_webs.sh '.escapeshellarg($album));
    echo "We just made some webs for $album...";
  } else {
    echo "Error";
  }
?>
