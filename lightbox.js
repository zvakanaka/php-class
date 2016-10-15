function getAndShow(webUrl, thumbUrl, fullsizeUrl, album) {
  var downloadUrl = thumbUrl.substr(thumbUrl.lastIndexOf("/")+1);
  document.getElementById('lightbox-picture').setAttribute('src', webUrl);
  document.getElementById('download-link').setAttribute('href', fullsizeUrl);
  document.getElementById('download-link').setAttribute('download', downloadUrl);
  document.getElementById('set-as-album-thumb').setAttribute('href', `set_album_thumb.php?album=${album}&thumb=${downloadUrl}`);
  document.getElementById('light').style.display = 'block';
  document.getElementById('fade').style.display = 'block';
}
