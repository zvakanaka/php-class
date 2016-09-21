<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Superglobals | PHP Class</title>
        <meta name="description" content="How to use $_SERVER, $_GET, and $_POST superglobals.">
        <meta name="keywords" content="php, programming, byui, tutorial, guide, superglobal">
        <link href="/php-class/styles/fixie.css" type="text/css" rel="stylesheet" media="screen" />
        <meta name="author" content="Adam Quinton">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- VVV magic trick VVV  -->
      <?php 
        $background_color = 'white';
        if(strpos($_SERVER['QUERY_STRING'], 'monkey=') !== false)
        {
          $background_color = substr($_SERVER['QUERY_STRING'], 7);
        }
      ?>
      <style>
        body {
          background-color: <?php echo $background_color; ?>;
        }
      </style>
      <!-- end magic trick -->
    </head>
    <body>
      <div id="page">
        <main class="column1">
          <article>
            <h1 id="logo" title="howtoterminal.com">SUPERGLOBALS</h1>
         
          <h2>$_POST Form Result</h2>
          <code>echo $_POST["animal"];</code> =
          <code><?php echo $_POST["animal"]; ?></code>
            <p><a href="javascript:history.back()">Back</a></p>
            </article>
            <footer>
              <a href="https://docs.google.com/presentation/d/1L5FgS5rUtvyic7fU87eTLgYTQhlt4QD_-E5zHp8XkRU/edit?usp=sharing">Slides</a>
              <span id="timestampy"><?php echo 'Last updated: <time datetime="'. date('c') . '">' . date('F j, Y', getlastmod()) . '</time>'; ?></span>
            </footer>
            </main>
        </div>
    </body>
</html>
