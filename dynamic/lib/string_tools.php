<?php
function strip_ext($filename) {
  return preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
}
function strip_extra_params($url) {
  if (strrpos($url,'&') != 0) {
    return substr($url,0,strrpos($url,'&'));
  }
  return $url;
}
?>
