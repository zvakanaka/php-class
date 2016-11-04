<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/head.php'; ?>

<main>
<?php if (isset($message)) { ?>
  <p class="message">
    <?php echo $message; ?>
  </p>
<?php } ?>

<?php if (isset($error)) { ?>
  <p class="error">
    <?php echo $error; ?>
  </p>
<?php } ?>

<?php foreach ($images as $image) { ?>
    <a class="thumb-link" id="thumb-<?php echo $image;?>" href="javascript:void(0)"
        onclick="getAndShow('<?php echo "$photo_dir/$album/.web/$image"; ?>',
                            '<?php echo "$photo_dir/$album/.thumb/$image"; ?>',
                            '<?php echo "$photo_dir/$album/$image"; ?>',
                            '<?php echo $album; ?>')">
      <img class="thumb" src="<?php echo "$photo_dir/$album/.thumb/$image";?>"/>
    </a>
<?php } ?>

<?php if (!isset($message) && isset($album)) { ?>
  <form class="" action="." method="post">
    <input type="hidden" name="action" value="hide_album" />
    <input type="hidden" name="album_name" value='<?php echo "$album";?>'>
    <input type="submit" name="submit" value="Hide this album">
  </form>
<?php } ?>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/lightbox.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/toes.php'; ?>
