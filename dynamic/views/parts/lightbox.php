<!-- lightbox -->
<div id="light" class="lightbox_fg">
  <img id="lightbox-picture"/>
  <div id="lightbox-sidebar">
    <a id="close-lightbox" href="javascript:void(0)" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>
    <br/><a id="download-link">Download</a>
    <br/><a href='javascript:void(0)' id="rotate-lightbox-img">Rotate</a>
    <br/><a id="set-as-album-thumb">Set as Album Thumb</a>
    <br/><a href='javascript:void(0)' id="prev-picture">Previous</a>
    <br/><a href='javascript:void(0)' id="next-picture">Next</a>

  </div>
</div>
<div id="fade" class="lightbox_bg" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">
</div>
<!-- end lightbox -->
<script src="js/lightbox.js"></script>
<noscript id="deferred-styles">
  <link rel="stylesheet" type="text/css" href="/php-class/dynamic/styles/lightbox.css"/>
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
