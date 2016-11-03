var img = '';
function getAndShow(webUrl, thumbUrl, fullsizeUrl, album) {
  img = thumbUrl.substr(thumbUrl.lastIndexOf("/")+1);
  document.getElementById('lightbox-picture').setAttribute('src', webUrl);

  document.getElementById('download-link').setAttribute('href', fullsizeUrl);
  document.getElementById('download-link').setAttribute('download', img);

  document.getElementById('prev-picture').setAttribute('onclick', `document.getElementById('thumb-${img}').previousSibling.click();`);
  document.getElementById('next-picture').setAttribute('onclick', `document.getElementById('thumb-${img}').nextSibling.click();`);

  document.getElementById('set-as-album-thumb').setAttribute('href', `set_album_thumb.php?album=${album}&thumb=${img}`);
  document.getElementById('light').style.display = 'block';
  document.getElementById('fade').style.display = 'block';
}

// Rotate and align
// thanks to http://stackoverflow.com/a/18536194/4151489 for the idea
var step = 0;
var rotateLightbox = document.getElementById('rotate-lightbox-img');
rotateLightbox.addEventListener('click', function rotateImg() {
  var rotateMe = document.getElementById('lightbox-picture');
  var curAngle = rotateMe.className;
  step += 1;
  var offset = rotateMe.width - rotateMe.height;
  rotateMe.style.transform = 'translateY('+ offset/2*(step%2) +'px) '+'rotate('+ step*90 +'deg)';
});

document.onkeydown = function(e) {
    e = e || window.event;
    switch(e.which || e.keyCode) {
        case 37: // left
        document.getElementById(`thumb-${img}`).previousSibling.click();
        e.preventDefault();
        break;

        case 39: // right
        document.getElementById(`thumb-${img}`).nextSibling.click();
        e.preventDefault();
        break;

        case 82:// r
        rotateLightbox.click();
        break;

        case 88: // x
        document.getElementById('close-lightbox').click();
        break;

        default: return;
    }
};
