<div class="footer-overflow">
  <p>
    <a href="/superglobals.php">Teaching Presentation</a>
  </p>
</div>
</article>

<footer>
  <a href="javascript:history.back()">Back</a>
  <span id="timestampy"><?php echo 'Last updated: <time datetime="'. date('c') . '">' . date('F j, Y', getlastmod()) . '</time>'; ?></span>
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
</footer>
  </main>
</div>
</body>
</html>
