function getAndShow(webUrl, thumbUrl, fullsizeUrl, album) {
  document.getElementById('lightbox-picture').setAttribute('src', webUrl);
  document.getElementById('fullsize-link').setAttribute('href', fullsizeUrl);
  var thumbName = thumbUrl.substr(thumbUrl.lastIndexOf("/")+1);
  document.getElementById('set-as-album-thumb').setAttribute('href', `set_album_thumb.php?album=${album}&thumb=${thumbName}`);
  document.getElementById('light').style.display = 'block';
  document.getElementById('fade').style.display = 'block';
}
