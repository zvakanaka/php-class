<!-- lightbox -->
<div id="light" class="lightbox_fg">
  <img id="lightbox-picture" onError="this.onerror=null;this.src='img/web-not-found.png';"/>
  <div id="lightbox-sidebar">
    <a id="close-lightbox" href="javascript:void(0)" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>
    <br><a id="download-link">Download</a>
    <br><a href='javascript:void(0)' id="rotate-lightbox-img">Rotate</a>

    <br><a href='javascript:void(0)' id="prev-picture">Previous</a>
    <br><a href='javascript:void(0)' id="next-picture">Next</a>
    <br>

    <?php if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] == false) {
      $admin_att = " class='hidden' ";
    } else { $admin_att = "";}?>
      <br><a id="set-as-album-thumb" <?php echo $admin_att;?>>Set as Album Thumb</a>
      <br>

      <?php if (!isset($_SESSION['logged_in'])) {
        $user_att = " class='hidden' ";
      } else { $user_att = "";}?>
      <br><a id="favorite" <?php echo $user_att;?>>Favorite</a>
      <br>

      <br><a id="move-to-trash" <?php echo $admin_att;?>>Hide</a>
      <br><a id="delete-photo" <?php echo $admin_att;?>>Delete</a>
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
