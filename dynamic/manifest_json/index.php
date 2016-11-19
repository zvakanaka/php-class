<?php $album = filter_input(INPUT_GET, "album");?>{
  "name": "Photos of <?php echo $album;?>",
  "short_name": "<?php echo $album;?>",
  "icons": [
    {
      "src": "/photo/<?php echo $album;?>/.img/icon.webp",
      "sizes": "120x120",
      "type": "image/webp"
    }
  ],
  "theme_color": "#4286f4",
  "background_color": "#4286f4",
  "display": "fullscreen",
  "start_url": "/php-class/dynamic/?action=album&album=<?php echo $album;?>",
  "orientation": "landscape"
}
