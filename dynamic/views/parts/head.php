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
  </head>
  <body>
    <header role="navigation">
      <a class="logo" href="/php-class/assignments.php">PHP CLASS</a>
      <?php
      $menu = array("Albums" => "home");

      if (isset($_SESSION["is_admin"])) {
        $menu["Users"] = "users";
        $menu["DSLR"] = "dslr";
      }
      if (isset($_SESSION["logged_in"])) {
        $menu["Log Out"] = "logout";
      } else {
        $menu["Login"] = "register";
      }

      foreach(array_keys($menu) as $key){
        echo '<a class="nav-a';
        if ( ''.$action == $menu[$key] )
         echo " on";
         $root = '/php-class/dynamic';
         echo '" href="'.$root."/?action=".$menu[$key].'" id="'.$menu[$key].'_tab">'.$key.'</a>';
      }
      ?>
    </header>
    <section>
      <?php if (isset($error)) { ?>
        <p class="error">
          <?php echo $error; ?>
        </p>
      <?php } ?>
    </section>
    <section>
    <?php if (isset($message)) { ?>
      <p class="message">
        <?php echo $message; ?>
      </p>
    <?php } ?>
  </section>
