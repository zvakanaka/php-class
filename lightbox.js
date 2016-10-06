function getAndShow(imgUrl) {
  document.getElementById('lightbox-picture').setAttribute('src',imgUrl);
  document.getElementById('light').style.display='block';
  document.getElementById('fade').style.display='block';
}
