<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/head.php'; ?>

<?php foreach ($images as $image) { ?>
    <a class="thumb-link" href="?action=album&amp;album=<?php echo $album;?>">
      <img class="thumb" src="<?php echo "$photo_dir/$album/.album/thumb.jpg";?>"/>
    </a>
<?php } ?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/lightbox.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/toes.php'; ?>
