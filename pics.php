<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Assignment List | PHP Class</title>
        <meta name="description" content="PHP Class Assignments">
        <meta name="keywords" content="php, programming, byui">
        <link href="/php-class/styles/fixie.css" type="text/css" rel="stylesheet" media="screen" />
        <meta name="author" content="Adam Quinton">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
      <div id="page">
        <h1 id="logo" title="howtoterminal.com">Photo</h1>
        <main class="column1">
          <article>
            <?php
              $dirname = "../photo/4th";
              $images = glob($dirname."/.thumb/*.JPG");
              foreach($images as $image) {
              echo '<a class="thumb-link" href="'.$dirname.substr($image, strrpos($image, "/")).'"><img class="thumb" src="'.$image.'" /></a>';
              }
            ?>
              <p><a href="javascript:history.back()">Back</a></p>
            </article>
            <footer>
              <span id="timestampy"><?php echo 'Last updated: <time datetime="'. date('c') . '">' . date('F j, Y', getlastmod()) . '</time>'; ?></span>
            </footer>
            </main>
        </div>
    </body>
</html>
