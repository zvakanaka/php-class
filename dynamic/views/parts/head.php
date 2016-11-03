<!DOCTYPE html>
<html lang="en">
  <head>
    <title> <?php echo ucfirst($action); ?> | PHP Class</title>
    <meta name="description" content="PHP Class Dynamic Project">
    <meta name="keywords" content="php, programming, byui, photography">
    <meta name="author" content="Adam Quinton">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="/php-class/dynamic/manifest.json">
  </head>
  <body>
    <header role="navigation">
      <a class="logo" href="/php-class/assignments.php">PHP CLASS</a>
      <?php
      $menu = array("Login" => "register", "Home" => "home");
      foreach(array_keys($menu) as $key){
        echo '<a class="nav-a';
        if ( ''.$action == $menu[$key] )
         echo " on";
         $root = '/php-class/dynamic';
         echo '" href="'.$root."/?action=".$menu[$key].'" id="'.$menu[$key].'_tab">'.$key.'</a>';
      }
      ?>
    </header>
