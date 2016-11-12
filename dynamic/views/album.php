<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/head.php'; ?>

<main>

<?php foreach ($images as $image) { ?>
    <a class="thumb-link" id="thumb-<?php echo $image;?>" href="javascript:void(0)"
        onclick="getAndShow('<?php echo "$photo_dir/$album/.web/$image"; ?>',
                            '<?php echo "$photo_dir/$album/.thumb/$image"; ?>',
                            '<?php echo "$photo_dir/$album/$image"; ?>',
                            '<?php echo $album; ?>')">
      <img class="thumb" src="<?php echo "$photo_dir/$album/.thumb/$image";?>" onError="this.onerror=null;this.src='img/thumb-not-found.png';"/>
    </a>
<?php } ?>

</main>

<?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true) {
  if (filter_input(INPUT_GET, "hidden") == NULL) { ?>
    <section>
      <a href="?action=album&album=<?php echo $album;?>&hidden=true">Show Hidden Photos</a>
    </section>
<?php } else { ?>
  <section>
    <a href="?action=album&album=<?php echo $album;?>">Hide Hidden Photos</a>
  </section>

<?php } ?>
<?php if (!isset($message) && isset($album)) { ?>
  <form class="" action="." method="post">
    <input type="hidden" name="action" value="hide_album" />
    <input type="hidden" name="album_name" value='<?php echo "$album";?>'>
    <input type="submit" name="submit" value="Hide this album">
  </form>
<?php } ?>
<?php } ?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/lightbox.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/toes.php'; ?>

<!-- if query string photo, open lightbox for it -->
<?php if (filter_input(INPUT_GET, 'photo')) {
  $photo = filter_input(INPUT_GET, 'photo');
?>
    <script type="text/javascript">
      var thumbToClick = document.getElementById('<?php echo "thumb-".$photo;?>');
      thumbToClick.click();
    </script>
<?php } ?>
