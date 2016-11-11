<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/head.php'; ?>
<main>
    <h1>Favorites for <a href="mailto:<?php echo get_user_email($user_id);?>"><?php echo get_user_name($user_id);?></a></h1>
    <table>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Request Hidden</th>
          <th>&nbsp;</th>
        </tr>
        <?php foreach ($faves as $fave) : ?>
            <tr>
              <td> <img src=<?php echo "'../../photo/".$fave['album_name']."/.thumb/".$fave['photo_name']."'";?> /></td>
              <td><?php echo "'".$fave['album_name']."/".$fave['photo_name']."'";?></td>
              <td>
                <?php if ($fave['request_hidden']) {?>
                <form action="." method="post">
                  <input type="hidden" name="action" value="move_to_trash">
                  <input type="hidden" name="photo_name"
                         value="<?php echo $fave['photo_name']; ?>">
                 <input type="hidden" name="album_name"
                        value="<?php echo $fave['album_name']; ?>">
                  <input type="submit" value="Hide">
              </form>
              <?php } else { echo "✗";}?>
              </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
<section>
  <a href="?action=zip_favorites&user_id=<?php echo $user_id;?>">Create Zip</a>
</section>
<?php if (filter_input(INPUT_GET, 'zip') != NULL) { ?>
<section>
  <p>You may download <a href="../../zips/<?php echo filter_input(INPUT_GET, 'zip');?>"><?php echo filter_input(INPUT_GET, 'zip');?></a> when it is ready.</p>
</section>
<?php } ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/toes.php'; ?>
