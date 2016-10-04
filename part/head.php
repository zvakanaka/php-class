<!DOCTYPE html>
<html lang="en">
  <head>
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
        <nav role="navigation">
          <div id="logo" title="howtoterminal.com"><a href="/php-class/assignments.php">PHP CLASS</a></div>
        <ul id="nav-ul">
        <?php
        $menu = array("Exercises" => "assignments.php", "Photo" => "pics.php");
        foreach(array_keys($menu) as $key){
          echo '<li class="nav-li"><a ';
          $path_parts = pathinfo("$_SERVER[REQUEST_URI]");
          if ( ''.$path_parts['basename'] == $menu[$key] )
           echo "class='on' ";
          echo 'href="'.$menu[$key].'" id="'.$menu[$key].'_tab">'.$key.'</a></li>';
        }
        ?>
        </ul>
        </nav>
