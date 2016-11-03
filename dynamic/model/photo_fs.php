<?php

function get_albums($photo_dir, $album_blacklist) {
  $albums = array();
  if ($handle = opendir($photo_dir)) {
      while (false !== ($album = readdir($handle))) {
          if (!in_array($album, $album_blacklist)) {
            if ($album != '.' && $album != '..' && !strpos($album, '.'))
              $albums[] = $album;
          }
      }
      closedir($handle);
  }
  return $albums;
}

function get_images($photo_dir, $album, $image_blacklist) {
  $images = array();
  $all_images = glob($photo_dir."/$album"."/*.{jpg,JPG}", GLOB_BRACE);
  if (!in_array($image, $image_blacklist)) {
      $images[] = $image;
  }
  return $images;
}
?>
