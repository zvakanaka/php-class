<footer>
  <span id="timestampy"><?php echo 'Last updated: <time datetime="'. date('c') . '">' . date('F j, Y', getlastmod()) . '</time>'; ?></span>
  <noscript id="deferred-styles">
    <link rel="stylesheet" type="text/css" href="/php-class/styles/fixie.css"/>
  </noscript>
  <script>
    //this is what google pageload recommends so I copied this:
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
</footer>
  </main>
</div><!-- end page  -->
<div class="toes">
  <ul class="toes-links">
    <li><a href="/php-class/superglobals.php">Teaching Presentation</a></li>
    <?php $gitHub = substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], "/")); ?>
    <li><a href="https://github.com/zvakanaka/php-class/blob/master<?php echo $gitHub;?>">Code on GitHub</a></li>
  </ul>
</div>
</body>
</html>
