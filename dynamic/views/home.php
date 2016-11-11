<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/head.php'; ?>

<main>
<?php foreach ($albums as $album) { ?>
    <a class="thumb-link" href="?action=album&amp;album=<?php echo $album;?>">
      <img class="thumb" src="<?php echo "$photo_dir/$album/.album/thumb.jpg"; ?>" onError="this.onerror=null;this.src='img/album-not-found.png';"/>
    </a>
<?php } ?>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/toes.php'; ?>
