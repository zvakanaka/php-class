<?php
  if (isset($_POST['album'])) {
    $album = $_POST['album'];
    // exec("/usr/bin/bash create_thumbs.sh $album");
    system('bash create_thumbs.sh '.escapeshellarg($album));
    echo system('echo '.escapeshellarg($album));
    echo system('whoami');
    echo "I guess we should make some thumbs for $album...";
  } else {
    echo "Error";
  }
?>
