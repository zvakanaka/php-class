<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Assignment List | PHP Class</title>
        <meta name="description" content="PHP Class Assignments">
        <meta name="keywords" content="php, programming, byui">
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
            </article>
            <footer>
              <a href="javascript:history.back()">Back</a>
              <span id="timestampy"><?php echo 'Last updated: <time datetime="'. date('c') . '">' . date('F j, Y', getlastmod()) . '</time>'; ?></span>
            </footer>
            </main>
        </div>
        <noscript id="deferred-styles">
          <link rel="stylesheet" type="text/css" href="/php-class/styles/fixie.css"/>
        </noscript>
        <script>
          var loadDeferredStyles = function() {
            var addStylesNode = document.getElementById("deferred-styles");
            var replacement = document.createElement("div");
            replacement.innerHTML = addStylesNode.textContent;
            document.body.appendChild(replacement)
            addStylesNode.parentElement.removeChild(addStylesNode);
          };
          var raf = requestAnimationFrame || mozRequestAnimationFrame ||
              webkitRequestAnimationFrame || msRequestAnimationFrame;
          if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
          else window.addEventListener('load', loadDeferredStyles);
        </script>
    </body>
</html>
