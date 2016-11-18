<?php
function strip_ext($filename) {
  return preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
} 
?>
