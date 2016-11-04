<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/head.php'; ?>

<main>
<?php foreach ($images as $image) { ?>
    <a class="thumb-link" id="thumb-<?php echo $image;?>" href="javascript:void(0)"
        onclick="getAndShow('<?php echo "$photo_dir/$album/.web/$image"; ?>',
                            '<?php echo "$photo_dir/$album/.thumb/$image"; ?>',
                            '<?php echo "$photo_dir/$album/$image"; ?>',
                            '<?php echo $album; ?>')">
      <img class="thumb" src="<?php echo "$photo_dir/$album/.thumb/$image";?>"/>
    </a>
<?php } ?>
</main>

<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/lightbox.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/toes.php'; ?>
