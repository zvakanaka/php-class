<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/head.php'; ?>
<main>
  <h1>Download from DSLR</h1>
  <form action="." method="post" id="download_form">
      <input type="hidden" name="action" value="download_from_dslr">

      <label>New Album Name (a directory name):</label>
      <input type="text" name="new_album"<?php if(isset($new_album)) echo " value='$new_album'";?>/>
      <br>

      <label>&nbsp;</label>
      <input type="submit" value="Download" />
      <br>
  </form>
  <h1>Image Optimizations</h1>
      <form action="." method="post" id="thumb_form">
          <input type="hidden" name="action" value="optimize">

          <label>Optimization:</label>
          <select name="optimization_type" required>
            <option value="thumbs">Thumbnails</option>
            <option value="webs">Webs</option>
            <option value="delete_originals">Delete Originals</option>
          </select>
          <br>

          <label>Album:</label>
          <select name="album_name">
            <option disabled selected value> -- select an album -- </option>
            <?php foreach ($albums as $album) { ?>
                <option value="<?php echo $album;?>">
                  <?php echo $album;?>
                </option>
            <?php } ?>
          </select>
          <br>

          <label>&nbsp;</label>
          <input type="submit" value="Optimize Images" />
          <br>
      </form>

    <h1>Upload to Server</h1>
    <form action="." method="post" id="upload_form">
        <input type="hidden" name="action" value="upload_to_server">

        <label>Server Name (IP address or Domain Name):</label>
        <input type="text" name="server_name"<?php if(isset($server_name)) echo " value='$server_name'";?>/>
        <br>

        <label>User Name (On server):</label>
        <input type="text" name="username"<?php if(isset($username)) echo " value='$username'";?>/>
        <br>

        <label>Album:</label>
        <select name="album_name">
          <option disabled selected value> -- select an album -- </option>
          <?php foreach ($albums as $album) { ?>
              <option value="<?php echo $album;?>">
                <?php echo $album;?>
              </option>
          <?php } ?>
        </select>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Upload to Server" />
        <br>
    </form>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'].'/php-class/dynamic/views/parts/toes.php'; ?>
