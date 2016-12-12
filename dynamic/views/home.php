<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/head.php'; ?>

<main>
<h1>Albums</h1>
<?php foreach ($albums as $album) { ?>
  <div class="album-thumb">
    <a class="thumb-link" href="?action=album&amp;album=<?php echo $album;?>">
      <img class="album-img" src="<?php echo "$photo_dir/$album/.album/thumb.webp"; ?>" alt="Album thumb for <?php echo $album;?>"/>
    </a>
    <div class="album-desc">
      <?php echo ucfirst($album); ?>
    </div>
  </div>
<?php } ?>

<?php if (isset($_SESSION['is_admin'])) { ?>
<?php
  if (filter_input(INPUT_GET, "hidden") == NULL) { ?>
    <div class="singularity">
      <a href="?action=home&hidden=true">Show Hidden Albums</a>
    </div>
    <?php } else { ?>
      <div class="singularity">
        <a href="?action=home">Hide Hidden Albums</a>
      </div>
<?php }} ?>
</main>


<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/toes.php'; ?>
