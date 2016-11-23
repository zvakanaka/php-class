<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $action = (isset($action)) ? $action : filter_input(INPUT_GET, 'action'); ?>
    <title> <?php echo ucfirst($action); ?> | PHP Class</title>
    <meta name="description" content="PHP Class Dynamic Project">
    <meta name="keywords" content="php, programming, byui, photography">
    <meta name="author" content="Adam Quinton">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ($action === 'album') { ?>
      <link rel="manifest" href="/php-class/dynamic/manifest_json/<?php echo "?album=$album";?>">
    <?php } else { ?>
      <link rel="manifest" href="/php-class/dynamic/manifest_json/default.json">
    <?php } ?>
    <script>(function(){var WebP=new Image();WebP.onload=WebP.onerror=function(){
if(WebP.height!=2){var sc=document.createElement('script');sc.type='text/javascript';sc.async=true;
var s=document.getElementsByTagName('script')[0];sc.src='js/webpjs-0.0.2.min.js';s.parentNode.insertBefore(sc,s);}};
WebP.src='data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA';})();</script>
  </head>
  <body>
    <header>
      <a class="logo" href="/php-class/assignments.php">PHP CLASS</a>
      <?php
      $menu = array("Albums" => "home");

      if (isset($_SESSION["is_admin"])) {
        $menu["Users"] = "users";
        $menu["DSLR"] = "dslr";
      }
      if (isset($_SESSION["logged_in"])) {
        $menu["Faves"] = "review_favorites&user_id=".$_SESSION['user_id'];
        $menu["Log Out"] = "logout";
      } else {
        $menu["Login"] = "register";
      }

      foreach(array_keys($menu) as $key){
        echo '<a class="nav-a';
        error_log(strip_extra_params($menu[$key]));
        if ( ''.$action == strip_extra_params($menu[$key]))
         echo " on";
         $root = '/php-class/dynamic';
         echo '" href="'.$root."/?action=".$menu[$key].'" id="'.$menu[$key].'_tab">'.$key.'</a>';
      }
      ?>
    </header>
    <div class="singularity">
      <?php if (isset($error)) { ?>
        <p class="error">
          <?php echo $error; ?>
        </p>
      <?php } ?>
    </div>
    <div class="singularity">
    <?php if (isset($message)) { ?>
      <p class="message">
        <?php echo $message; ?>
      </p>
    <?php } ?>
  </div>
