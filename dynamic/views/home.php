<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/head.php'; ?>

<main>
<?php foreach ($albums as $album) { ?>
    <a class="thumb-link" href="?action=album&amp;album=<?php echo $album;?>">
      <img class="thumb" src="<?php echo "$photo_dir/$album/.album/thumb.jpg"; ?>" onError="this.onerror=null;this.src='img/album-not-found.png';"/>
    </a>
<?php } ?>
</main>

<?php if ($_SESSION['is_admin']) {
  if (filter_input(INPUT_GET, "hidden") == NULL) { ?>
    <section>
      <a href="?action=home&hidden=true">Show Hidden Albums</a>
    </section>
<?php } else { ?>
  <section>
    <a href="?action=home">Hide Hidden Albums</a>
  </section>
<?php }} ?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/toes.php'; ?>
