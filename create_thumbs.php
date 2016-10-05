<?php
  if (isset($_POST['album'])) {
    $album = $_POST['album'];
    exec("/usr/bin/bash create_thumbs.sh $album");
  }
?>
