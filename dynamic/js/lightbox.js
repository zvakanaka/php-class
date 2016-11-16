var img = '';

function getAndShow(webUrl, thumbUrl, fullsizeUrl, album) {
  img = thumbUrl.substr(thumbUrl.lastIndexOf("/")+1);
  var lightPic = document.getElementById('lightbox-picture');
  lightPic.setAttribute('src', thumbUrl);
  // lightPic.style.filter = 'blur(0px)';
  lightPic.setAttribute('src', webUrl);

  document.getElementById('lightbox-picture').setAttribute('onError', "this.onerror=null;this.src='img/web-not-found.png';");

  document.getElementById('download-link').setAttribute('href', fullsizeUrl);
  document.getElementById('download-link').setAttribute('download', img);

  document.getElementById('set-as-album-thumb').setAttribute('href', `?action=set_album_thumb&album_name=${album}&photo_name=${img}`);
  document.getElementById('move-to-trash').setAttribute('href', `?action=move_to_trash&album_name=${album}&photo_name=${img}`);
  var nextPhoto = document.getElementById(`thumb-${img}`).nextElementSibling.id.substr(6);
  document.getElementById('delete-photo').setAttribute('href', `?action=delete_photo&album_name=${album}&photo_name=${img}&next_photo=${nextPhoto}`);

  document.getElementById('favorite').setAttribute('href', `?action=favorite&album_name=${album}&photo_name=${img}`);

  document.getElementById('prev-picture').setAttribute('onclick', `document.getElementById('thumb-${img}').previousElementSibling.click();`);
  document.getElementById('next-picture').setAttribute('onclick', `document.getElementById('thumb-${img}').nextElementSibling.click();`);

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
        document.getElementById(`thumb-${img}`).previousElementSibling.click();
        e.preventDefault();
        break;

        case 39: // right
        document.getElementById(`thumb-${img}`).nextElementSibling.click();
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
