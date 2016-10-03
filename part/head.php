<!DOCTYPE html>
<html lang="en">
  <head>
    <nav role="navigation">
    <ul>
    <?php
    // $menu = array("Raspberry Pi" => "/raspberry_pi", "Commands" => "/commands", "Folio" => "/folio", "Photo" => "/photo", "Rand" => "/rand");
    // foreach(array_keys($menu) as $key){
    //   echo '<li class="nav-li"><a ';
    //   $path_parts = pathinfo("$_SERVER[REQUEST_URI]");
    //   if ( '/'.$path_parts['basename'] == $menu[$key] )
    //    echo "class='on' ";
    //   echo 'href="'.$menu[$key].'" id="'.$menu[$key].'_tab">'.$key.'</a></li>';
    // }
    ?>
    </ul>
    </nav>
    <?php
      $urlName = $_SERVER['PHP_SELF'];
      $path_parts = pathinfo("$urlName");
      $title = ucfirst($path_parts[filename]);
     ?>
    <title> <?php echo $title; ?> | PHP Class</title>
    <meta name="description" content="PHP Class Assignments">
    <meta name="keywords" content="php, programming, byui">
    <meta name="author" content="Adam Quinton">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <div id="page">
      <main class="column1">
        <h1 id="logo" title="howtoterminal.com"><?php echo $title; ?></h1>
